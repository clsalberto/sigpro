<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modalities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Set the modality's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = proper_case($value);
    }

    /**
     * Relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Relationship with courses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Relationship with pacts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacts()
    {
        return $this->hasMany(Pact::class);
    }
}
