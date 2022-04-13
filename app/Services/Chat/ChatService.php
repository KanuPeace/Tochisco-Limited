<?php

namespace App\Services\Chat;

use App\Exceptions\ChatException;
use App\Models\Chat;
use App\Models\ChatUser;
use App\QueryBuilders\ChatQueryBuilder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ChatService
{

    const CHAT_AREADY_EXISTS_ERROR = 10000;
    public static  function list(Request $request): LengthAwarePaginator
    {
        $user = auth()->user();
        return ChatQueryBuilder::list($request)
            ->whereHas("participants", function ($query) use ($user) {
                $query->where("user_id", $user->id);
            })->paginate($request->pagination);
    }


    public static  function fetch($chat_id): Chat
    {
        $user = auth()->user();
        $chat = Chat::whereHas("participants", function ($query) use ($user) {
            $query->where("user_id", $user->id);
        })->where("id" , $chat_id)->first();

        return $chat;
    }

    public static  function initiate(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator =  Validator::make($request->all(), [
                'recipient_id' => 'bail|required|exists:users,id',
                'ad_id' => 'bail|nullable|exists:ads,id',
                "message" => "bail|string|" . Rule::requiredIf(empty($request->files)),
                "files" => "nullable|array|" . Rule::requiredIf(empty($request->message)),
                "files.*" => "required|file|mimetypes:" . imageMimes() . "," . docMimes() . "," . videoMimes()
            ]);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
            $data = $validator->validated();

            $user = auth()->user();
            $ad_id = $data["ad_id"] ?? null;
            $recipient_id = $data["recipient_id"];

            if ($user->id == $recipient_id) {
                throw new ChatException("You can`t chat with yourself");
            }

            $chat = Chat::where("ad_id", $ad_id)
                ->whereHas("participants", function ($query) use ($user) {
                    $query->whereIn("user_id", [$user->id]);
                })->first();

            if (!empty($chat)) {
                // throw new ChatException("Chat already exists" , self::CHAT_AREADY_EXISTS_ERROR);
                $request["chat_id"] = $chat->id;
                ChatMessageService::sendMessage($request);
                DB::commit();
                return $chat;
            }

            $chat = Chat::create([
                "user_id" => $user->id,
                "ad_id" => $ad_id
            ]);

            ChatUser::create([
                "user_id" => $user->id,
                "chat_id" => $chat->id
            ]);

            ChatUser::create([
                "user_id" => $recipient_id,
                "chat_id" => $chat->id
            ]);

            $request["chat_id"] = $chat->id;
            ChatMessageService::sendMessage($request);
            DB::commit();
            return $chat;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
