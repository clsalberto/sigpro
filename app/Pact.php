<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modality_id', 'year', 'active',
    ];

    /**
     * Relationship with modality
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    /**
     * Relationship with rooms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
