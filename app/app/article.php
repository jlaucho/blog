<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
    
    protected $table = "articles";
    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

        public function category()
    {
    	return $this->belongsTo('App\category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
    	return $this->hasMany('App\image');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}

