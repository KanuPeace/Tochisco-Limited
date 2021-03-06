<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Auth\AuthorizationService;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "can_read_posts",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_posts",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_Posts",
                "guard_name" => "web",
            ],
            'guards' => [
                'web' => [
                    'driver' => 'session',
                    'provider' => 'users',
                ],
                'api' => [
                    'driver' => 'token',
                    'provider' => 'users',
                ],
                'admin' => [
                    'driver' => 'session',
                    'provider' => 'admin',
                ]
            ],
            [
                "name" => "can_delete_posts",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_post_categories",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_post_categories",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_post_categories",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_post_categories",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_users",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_users",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_users",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_users",
                "guard_name" => "web",
            ],
            [
                "name" => "can_update_wallet_balance",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_payments",
                "guard_name" => "web",
            ],

            [
                "name" => "can_edit_payments",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_payments",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_payments",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_complete_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_decline_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_terminate_products",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_coupons",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_coupons",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_coupons",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_coupons",
                "guard_name" => "web",
            ],
            [
                "name" => "can_create_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_edit_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_delete_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_complete_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_decline_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_terminate_orders",
                "guard_name" => "web",
            ],
            [
                "name" => "can_read_user_activities",
                "guard_name" => "web",
            ],

        ];

        foreach ($data as $perm) {
            Permission::firstOrCreate($perm);
        }

        AuthorizationService::syncAdminRoles();

    }
    
}
