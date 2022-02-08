<?php

namespace App\Helpers;

use App\Models\Post;
use App\Models\ShareActivity;
use App\Models\User;

class ShareActivityHelper
{

    // public function onShare(Post $post)
    // {
    //     if($user = auth()->user()){

    //     }
    // }

    // public function canShareNow()
    // {
    //     $currentHour = now()->format("H");
    //     $time_1 = "06";
    //     $time_2 = "11";

    //     if ($currentHour > 16) {
    //         $time_1 = "17";
    //         $time_2 = "23";
    //     }

    //     if(in_array($currentHour , [$time_1 , $time_2])){
    //         return true;
    //     }
    //     return false;
    // }

    public function onVisit($ref_code, $post_id, $is_sponsored)
    {


        // $count_all_shares = ShareActivity::where("post_id", $post_id)
        //     ->whereDate("created_at", today())
        //     // ->whereTime('created_at', '>=', $time_1)
        //     // ->whereTime('created_at', '<', $time_2)
        //     ->count();


        // $count_all_subscribers = User::whereHas("plan")->count();
        // $allowed_sharers = $count_all_subscribers * 0.2;

        // if ($count_all_shares >= $allowed_sharers) {
        //     return null;
        // }


        $sharer = User::where("ref_code", $ref_code)->with("plan")->first();

        if (!$sharer) {
            return null;
        }

        $user_id = null;
        if (!empty($id = auth()->id())) {
            $user_id = $id;
            if ($sharer->id == $user_id) {
                return;
            }
        }

        // $count_by_shares = ShareActivity::where("post_id", $post_id)
        //     ->where("sharer_id", $sharer->id)->count();

        $count_by_shares = ShareActivity::where("sharer_id", $sharer->id)
            ->whereDate("created_at", today())
            ->count();


        if ($count_by_shares > 0) {
            return;
        }

        $referrer_url = request()->headers->get('referer');

        if (!empty($referrer_url)) {
            $domain = parse_url($referrer_url)["host"] ?? null;
            $platform = explode(".", $domain)[0] ?? null;
        }

        $data = [
            "user_id" => $user_id,
            "sharer_id" => $sharer->id,
            "post_id" => $post_id,
            "referrer_url" => $referrer_url,
            "platform" => $platform ?? null,
            "domain" => $domain ?? null,
            "bonus" => optional($sharer->plan)->sponsored_post_bonus ?? 0,
            "is_sponsored" => $is_sponsored,
            "count_by_post" => $count_by_shares++
        ];
        ShareActivity::create($data);
        $this->creditSharer($ref_code);
    }

    public function creditSharer($ref_code)
    {
        $sharer = User::where("ref_code", $ref_code)->with("plan")->first();
        if (!$sharer) {
            return;
        }

        $plan = $sharer->plan;
        if (empty($plan)) {
            return;
        }

        $sharedActivity = ShareActivity::where("sharer_id", $sharer->id)
            ->whereDate("created_at", today())
            ->count();

        if ($sharedActivity <= $plan->sponsored_posts_per_day) {
            Wallet::credit(
                Constants::WALLET_NON_REFERRAL,
                $sharer,
                $plan->sponsored_post_bonus ?? 0,
                "Sponsored post bonus",
                Constants::COMPLETED,
                true,
                true
            );
        }
    }
}
