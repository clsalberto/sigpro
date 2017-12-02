<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_date_id', 'registration_id', 'punctuation',
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
