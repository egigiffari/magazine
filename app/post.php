<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;

    protected $fillable = ['judul','slug', 'category_id', 'content', 'gambar', 'user_id'];

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\tag');
    }

    public function user()
    {
        // Jika Nama Field foreign key tidak sama dengan nama tabel yang direlasikan
        // Maka defenisikan field tersebut ke dalam parameter berikutnya
        // parameter pertama adalah foreign key (Tabel : Posts, field : user_id)
        // parameter kedua adalah field id pada tabel yang direlasikan (Tabel : users, field: id)
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
