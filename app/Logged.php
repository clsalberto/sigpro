<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logged extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'loggeds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'logged',
    ];
}
