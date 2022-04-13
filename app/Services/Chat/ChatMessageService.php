<?php

namespace App\Services\Chat;

use App\Exceptions\ChatException;
use App\Helpers\MediaHandler;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\QueryBuilders\ChatQueryBuilder;
use App\QueryBuilders\GigQueryBuilder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ChatMessageService
{
    public static  function list(Request $request , $id): LengthAwarePaginator
    {
        $request["chat_id"] = $id;
        return ChatQueryBuilder::listMessages($request)->paginate($request->pagination);
    }



    public static  function sendMessage(Request $request)
    {
        $collect_messages = collect();
        $collect_files = collect();
        DB::beginTransaction();
        try {
            $validator =  Validator::make($request->all(), [
                'chat_id' => 'bail|required|exists:chats,id',
                "message" => "bail|string|" . Rule::requiredIf(empty($request->files)),
                "files" => "nullable|array|" . Rule::requiredIf(empty($request->message)),
                "files.*" => "required|file|mimetypes:" . imageMimes() . "," . docMimes() . "," . videoMimes()
            ]);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $data = $validator->validated();

            $user = auth()->user();

            $chat = Chat::find($data["chat_id"]);
            $check = $chat->participants()->where("user_id", $user->id)->count();
            if (!$check) {
                throw new ChatException("You cannot send a message on this chat");
            }
            $batch_no = time();

            if (!empty($message = $data["message"] ?? null)) {
                $collect_messages->push(ChatMessage::create([
                    "message" => $message,
                    "chat_id" => $chat->id,
                    "user_id" => $user->id,
                    "batch_no" => $batch_no
                ]));
            }

            if (!empty($files = $data["files"] ?? null)) {
                $fileHandler = new MediaHandler;
                foreach ($files as $rawFile) {
                    $path = putFileInPrivateStorage($rawFile, "temp");
                    $file = $fileHandler->save(storage_path("app/".$path), "chat_message_files", null, $user->id);
                    $collect_files->push($file);
                    $collect_messages->push(ChatMessage::create([
                        "message" => null,
                        "file_id" => $file->id,
                        "chat_id" => $chat->id,
                        "user_id" => $user->id,
                        "batch_no" => $batch_no
                    ]));

                }
            }

            DB::commit();
            return $collect_messages;
        } catch (Exception $e) {
            foreach ($collect_files as $file) {
                $file->cleanDelete();
            }
            DB::rollback();
            throw $e;
        }
    }
}
