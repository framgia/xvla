<?php

namespace Framgia\Xvla;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['name', 'content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
