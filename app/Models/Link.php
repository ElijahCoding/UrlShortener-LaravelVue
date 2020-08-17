<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'user_id', 'local_link', 'link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
