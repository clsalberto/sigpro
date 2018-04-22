<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed programContent
 */
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
        'room_id', 'class_date', 'avaliation', 'active', 'check_frequency', 'workload',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClassHoursMonth($query, $room_id, $month, $year)
    {
        return $query
            ->where('room_id', $room_id)
            ->whereMonth('class_date', $month)
            ->whereYear('class_date', $year)
            ->sum('workload');
    }

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
     * @return bool
     */
    public function getHasContentAttribute()
    {
        $content = collect($this->programContent);

        return $content->count() > 0 ? true : false;
    }
}
