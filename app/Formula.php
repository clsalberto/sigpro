<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'formulas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'description',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
