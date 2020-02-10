<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'response_query', 'type_log',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
