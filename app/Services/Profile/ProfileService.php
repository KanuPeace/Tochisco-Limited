<?php
namespace App\Services\Profile;

use App\Helpers\Constants;
use App\Models\User;
use App\Services\Notifications\AppMailer;
use App\Services\Finance\WalletService;

class ProfileService{


   public static function canPostAd(User $user): bool
   {
      if(empty($user->phone)){
          return false;
      }
      return true;
   }
}
