<?php

namespace App\Services\Ads;

use App\Models\AdCategorySpecification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdCategorySpecificationService
{

    public $list = [];

    public static function validate($data)
    {
        $validator = Validator::make($data, [
            "category_id" => "required|exists:ad_categories,id",
            "key" => "required|string",
            "value" => "nullable|string",
            "placeholder" => "required|string",
            "required" => "required|string|in:0,1",
            "option_type" => "required|string",
            "available_options" => "nullable|string"
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }

    public static function save($data, $id = null): AdCategorySpecification
    {
        $data = self::validate($data);
        $key = $data["key"];
        $data["placeholder"] = $data["placeholder"] ?? "Enter $key value...";

        if (empty($id)) {
            $specification = AdCategorySpecification::create($data);
        } else {

            $specification = AdCategorySpecification::find($id);
            $specification->update($data);
        }

        return $specification->refresh();
    }

    public static function remove($id): void
    {
        AdCategorySpecification::where("id", $id)->delete();
    }

    public static function clear($category_id): void
    {
        AdCategorySpecification::where("category_id", $category_id)->delete();
    }
}
