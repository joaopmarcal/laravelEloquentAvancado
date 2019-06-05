<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description'];
    protected $appends = ['resume_title'];
    protected $hidden = ['title'];

    public function getResumeTitleAttribute(){
        if (isset($this->attributes['title'][3])){
        return mb_substr($this->attributes['title'], 0, 3) . '...';
        }

        return $this->attributes['title'];
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = strtoupper($value);
    }
}
