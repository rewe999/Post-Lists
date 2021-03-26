<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_data';

    protected $fillable = [
        'avatar', 'description','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
