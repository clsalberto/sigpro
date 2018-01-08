<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed punctuation_a
 * @property mixed punctuation_c
 * @property mixed punctuation_b
 * @property mixed registration
 */
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
        'class_date_id', 'registration_id', 'punctuation_a', 'punctuation_b', 'punctuation_c', 'punctuation_d',
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

    /**
     * Get the room's is daytime or nighttime.
     *
     * @return string
     */
    public function getAverageAttribute()
    {
        $formula = $this->registration->room->formula_id;
        if ($formula == 2) {
            if ($this->punctuation_d > 0) {
                return ctof(intval($this->punctuation_d));
            } else {
                return ctof(intval(($this->punctuation_a + $this->punctuation_c) / 2));
            }
        } elseif ($formula == 3) {
            if ($this->punctuation_d > 0) {
                return ctof(intval($this->punctuation_d));
            } else {
                return ctof(intval(($this->punctuation_a + $this->punctuation_b + $this->punctuation_c) / 3));
            }
        } else {
            return ctof('0');
        }
    }

    /**
     * Get the score has form.
     *
     * @return boolean
     */
    public function getHasFormAttribute()
    {
        $formula = (int) $this->registration->room->formula_id;
        return $formula > 2 ? true : false;
    }

}
