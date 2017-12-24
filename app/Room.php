<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'course_id', 'module_id', 'pact_id', 'city_id', 'shift', 'inicial_date', 'final_date',
    ];

    /**
     * Get of the course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get of the module.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get of the pact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pact()
    {
        return $this->belongsTo(Pact::class);
    }

    /**
     * Get of the city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get all of the class dates for the rooms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * Get all of the class dates.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classDates()
    {
        return $this->hasMany(ClassDate::class);
    }

    /**
     * Get the room's is daytime or nighttime.
     *
     * @return string
     */
    public function getShiftDescriptionAttribute()
    {
        return $this->shift == 'D' ? 'Diurno' : 'Noturno';
    }
}
