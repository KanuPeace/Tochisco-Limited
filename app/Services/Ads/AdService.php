<?php

namespace App\Services\Ads;

use App\Exceptions\AdException;
use App\Helpers\VideoProcessor;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdService
{
    const PREFFERRED_VIDEO_LENGTH_IN_SECONDS = 120;

    public static function validateVideoUpload(Request $request)
    {
        $videoFiles = $request->ad_files;
        if (count($videoFiles) > 1) {
            throw new AdException("You can only upload one video!");
        }

        $video = $videoFiles[0];

        $videoFilePath = putFileInPrivateStorage($video, "temp");
        File::move($videoFilePath , public_path($videoFilePath));
        self::validateVideoLength($videoFilePath, self::PREFFERRED_VIDEO_LENGTH_IN_SECONDS);
    }

    public static function validateVideoLength($publicVideoFilePath, $preferredLength)
    {
        $getLength = VideoProcessor::mediaLength($publicVideoFilePath);
        deleteFileFromPublicStorage($publicVideoFilePath);
        if (floatval($getLength) > $preferredLength) {
            throw new AdException("Preferred video length is $preferredLength seconds");
        }
    }

    public static function logEvent($ad_id , $actor_id ,  $title , $description)
    {
        $ad = Ad::find($ad_id);
        $log = !empty($oldLog = $ad->log) ? json_decode($oldLog , true) : [];

        $actor = User::find($actor_id);
        $log[] = [
            "actor_id" => $actor_id,
            "actor_name" => $actor->names(),
            "title" => $title,
            "description" => $description,
            "timestamp" => now()
        ];
        $ad->update(["log" => json_encode($log)]);
    }

    public static function getById($id): Ad
    {
        $ad = Ad::where("id", $id)->first();
        if (empty($ad)) {
            throw new AdException(
                "Ad not found",
            );
        }
        return $ad;
    }

}
