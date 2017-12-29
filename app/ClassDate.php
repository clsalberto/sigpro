<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassDate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_dates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'class_date', 'avaliation', 'active',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relationship with room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function programContent()
    {
        return $this->hasOne(ProgramContent::class);
    }

    /**
     * Relationship with room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Relationship with frequencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function frequencies()
    {
        return $this->hasMany(Frequency::class);
    }

    /**
     * Relationship with scores.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    /**
     * Get the class date has content.
     *
     * @return string
     */
    public function getHasContentAttribute()
    {
        return count($this->programContent) > 0 ? true : false;
    }
}
