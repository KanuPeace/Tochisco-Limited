<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class GuestHelper
{
    private $keyName = "acting_guest_user";
    private $keyValue;
    public function __construct()
    {
        $this->getKey();
        // dd($this->keyValue);
    }

    public function getKey()
    {
        // dd(request()->hasCookie($this->keyName));
        if(!request()->hasCookie($this->keyName)){
            $key = uniqid();
            Cookie::queue($this->keyName , $key , 10);
        }
        else{
            $key = request()->cookie($this->keyName);
        }
        $this->keyValue = $key;
    }

    public function actorSessionId()
    {
        return $this->keyValue;
    }

    public function actor()
    {
        if($user = auth()->user()){
            return $user;
        }
        else{
            return new User([
                "id" => $this->keyValue,
                "role" => "Guest"
            ]);
        }
    }
}
