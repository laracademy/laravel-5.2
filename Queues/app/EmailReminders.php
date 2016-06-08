<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailReminders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sent',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'sent' => 'boolean',
    ];
}
