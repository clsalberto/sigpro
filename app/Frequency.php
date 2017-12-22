<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'frequencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_date_id', 'registration_id', 'presence_a', 'presence_b', 'presence_c', 'presence_d',
    ];

    /**
     * Relationship with class date.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classDate()
    {
        return $this->belongsTo(ClassDate::class);
    }

    /**
     * Relationship with registration.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
