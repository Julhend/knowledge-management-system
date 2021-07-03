<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function childs()
    {
        return $this->hasMany(Comment::class, 'parent');
    }
}
