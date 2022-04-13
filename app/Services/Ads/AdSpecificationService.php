<?php

namespace App\Services\Ads;

use App\Models\AdSpecification;

class AdSpecificationService
{

    public $list = [];

    public static function add(string $key, string $value = null, bool $required = true, $placeholder = null): AdSpecification
    {
        $data = [
            "key" => $key,
            "value" => $value,
            "required" => $required,
            "placeholder" => $placeholder ?? "Enter $key value..."
        ];
        return AdSpecification::create($data);
    }

    public static function remove($id): void
    {
       AdSpecification::where("id", $id)->delete();
    }

    public static function clear($category_id): void
    {
        AdSpecification::where("category_id", $category_id)->delete();
    }


}
