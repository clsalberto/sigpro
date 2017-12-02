<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modality_id', 'name', 'workload', 'active'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Set the course's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = proper_case($value);
    }

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

    /**
     * Relationship with modules.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
