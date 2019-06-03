<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getResumeTitleAttribute(){
        if (isset($this->attributes['title'][3])){
        return mb_substr($this->attributes['title'], 0, 3) . '...';
        }

        return $this->attributes['title'];
    }
}
