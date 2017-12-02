<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'description', 'workload',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relationship with course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
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
