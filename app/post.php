<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;

    protected $fillable = ['judul','slug', 'category_id', 'content', 'gambar'];

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\tag');
    }
}
