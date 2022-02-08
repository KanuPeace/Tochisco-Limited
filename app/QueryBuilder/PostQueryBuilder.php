<?php
namespace App\QueryBuilder;

use App\Models\Post;
use Illuminate\Http\Request;

class PostQueryBuilder {
    static function filterIndex(Request $request)
    {
        $builder = Post::with("category")->with("coverImage")->with("coverVideo");

        if(!empty($key = $request->keywords)){
            $builder = $builder->where("title" , "like" , "%$key%");
        }
        if(!empty($key = $request->category_id)){
            $builder = $builder->where("category_id" , $key);
        }
        if(!empty($key = $request->type)){
            $builder = $builder->where("type" , $key);
        }
        if(!empty($key = $request->is_sponsored)){
            $builder = $builder->where("is_sponsored" , $key);
        }
        if(!empty($key = $request->is_top_story)){
            $builder = $builder->where("is_top_story" , $key);
        }
        if(!empty($key = $request->is_featured)){
            $builder = $builder->where("is_featured" , $key);
        }
        if(!empty($key = $request->is_published)){
            $builder = $builder->where("is_published" , $key);
        }
        if(!empty($key = $request->can_comment)){
            $builder = $builder->where("can_comment" , $key);
        }

        return $builder;
    }
}
