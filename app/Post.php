<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'avatar','name','price','desc','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $guarded = [];
    /**
     * @var mixed
     */

}
