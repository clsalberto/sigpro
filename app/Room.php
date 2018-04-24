<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed shift
 * @property mixed formula
 */
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
        'id', 'course_id', 'module_id', 'pact_id', 'city_id', 'shift', 'formula_id', 'inicial_date', 'final_date', 'check_score',
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
     * Get of the formula.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formula()
    {
        return $this->belongsTo(Formula::class);
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

    /**
     * Get the class date has formula.
     *
     * @return bool
     */
    public function getHasFormulaAttribute()
    {
        $formula = $this->formula;

        return $formula->id > 1 ? true : false;
    }

    /**
     * Get the scores has closure.
     *
     * @return bool
     */
    public function getHasClosureAttribute()
    {
        foreach ($this->registrations as $registration) {
            if (ctoi($registration->score->average) < ctoi(config('template.institution.media')) && $registration->score->punctuation_d == '')
            {
                return false;
            }
        }
        return true;
    }

    public function totalActived()
    {
        return $this->classDates()
            ->select('active')
            ->where('active', true)
            ->count();
    }

    public function percent($value, $total)
    {
        return ctoi(($value * 10) / $total);
    }
}
