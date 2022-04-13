<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\QueryBuilder\SubscriptionQueryBuilder;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function index(Request $request)
    {
        $subscriptions = SubscriptionQueryBuilder::filterIndex($request)
            ->latest()
            ->paginate();
        $plans = Plan::get(["id", "name"]);
        return view("admin.membership_plans.subscriptions.index", [
            "subscriptions" => $subscriptions,
            "searchByOptions" => [
                "user_info" => "User",
                "payment_reference" => "Payment Reference",
            ],
            "statusOptions" => StatusConstants::SUBSCRIPTION_OPTIONS,
            "plans" => $plans
        ]);
    }
}
