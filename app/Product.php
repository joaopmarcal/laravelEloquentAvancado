<?php

namespace App;

use App\Scopes\ActivatedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description','activated'];
    protected $appends = ['resume_title'];
    protected $hidden = ['title'];

    protected $dispatchesEvents = [
      'created' => \App\Events\ProductsCreated::class,
      'creating' => \App\Events\ProductsCreating::class,
    ];

    protected static function boot(){
        parent::boot();

        static::addGlobalScope(new ActivatedScope);
    }

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
