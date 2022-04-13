<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    // public function price()
    // {
    //    return format_money($this->price);
    // }

    public function getFeatures()
    {
       return json_decode($this->features , true);
    }

    public function scopeActive($query)
    {
        return $query->where("is_active" , 1);
    }

    public function commissions()
    {
        return $this->hasMany(PlanCommission::class, "plan_id", "id")->orderBy("level" , "asc");
    }

    public function benefits()
    {
        return $this->hasMany(PlanBenefit::class, "plan_id", "id");
    }

    public function logo()
    {
        return $this->hasOne(File::class, "id", "logo_id");
    }

    public function logoUrl()
    {
        $logo = $this->logo;

        $filepath = optional($logo)->path;

        if (!empty($filepath)) {
            return readFileUrl("encrypt", $filepath);
        }

        $name = $this->name;
        return my_asset("plan_logos/".$name."_plan_logo.jpeg");
    }
}
