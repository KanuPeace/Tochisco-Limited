<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cleanDelete($id = null, $delete = true){
        $file = !empty($id) ? self::find($id) : $this;
        if(!empty($file)){
            deleteFileFromPrivateStorage($file->path);
            if($delete){
                $file->delete();
            }
        }
    }

    public function url()
    {
        if (!empty($path = $this->path)) {
            return readFileUrl("encrypt", $path);
        }
    }
}
