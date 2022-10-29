<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =['firstName','lastName','company','email','phone','birthday','user_id'];
    protected $with = ['photos'];

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public static function randBackgroundColor(){
        $background_colors = array('#d4c7be', '#faaf92', '#d8cc5e', '#9fedd4', '#d6dfc2');

        $rand_background = $background_colors[array_rand($background_colors)];
        return $rand_background;
    }
}


