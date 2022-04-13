<?php

namespace App\Services\Share;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\ShareActivity;
use App\Models\User;
use App\Services\Finance\TransactionService;
use App\Services\Finance\WalletService;

class ShareActivityService
{


    public static function onVisit($ref_code, $ad_id , $is_sponsored)
    {

        $sharer = User::where("ref_code", $ref_code)->first();

        if (!$sharer) {
            return;
        }

        $user_id = null;
        if (!empty($id = auth()->id())) {
            $user_id = $id;
            if ($sharer->id == $user_id) {
                return;
            }
        }

        $referrer_url = request()->headers->get('referer');

        if (!empty($referrer_url)) {
            $domain = parse_url($referrer_url)["host"] ?? null;
            $platform = explode(".", $domain)[0] ?? null;
        }

        $data = [
            "user_id" => $user_id,
            "sharer_id" => $sharer->id,
            "ad_id" => $ad_id,
            "referrer_url" => $referrer_url,
            "platform" => $platform ?? null,
            "domain" => $domain ?? null,
            "bonus" => 0,
            "is_sponsored" => $is_sponsored
        ];

        $share = ShareActivity::create($data);

        $other_shares = ShareActivity::where("sharer_id", $sharer->id)
        ->where("ad_id", $ad_id)
        ->whereNotIn("id" , [$share->id])
        // ->where("is_sponsored", 1)
        // ->orderby("bonus" , "desc")

        ->count();

        if ($other_shares == 0) {
            self::creditSharer($share->id);
        }

    }

    public static function creditSharer($share_id)
    {
        $share = ShareActivity::whereHas("ad")->with("ad")->find($share_id);
        if(empty($share)){
            return;
        }

        $user_id = $share->sharer_id;
        $amount = 0.2;

        WalletService::credit(WalletService::WALLET_ELITE_POINTS, $user_id, $amount);
        TransactionService::create([
            "user_id" => $user_id,
            "amount" => $amount,
            "fee" => 0,
            "description" => "Earnings for sharing Advert with reference #".$share->ad->reference,
            "activity" => TransactionActivityConstants::SHARE_ACTIVITY_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);

        $share->update([
            "bonus" => $amount
        ]);
    }
}
