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
        'registration_id', 'punctuation_a', 'punctuation_b', 'punctuation_c', 'punctuation_d',
    ];

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
        $formula = (int) $this->registration->room->formula_id;

        $punct_a = is_null($this->punctuation_a) ? 0 : $this->punctuation_a;
        $punct_b = is_null($this->punctuation_b) ? 0 : $this->punctuation_b;
        $punct_c = is_null($this->punctuation_c) ? 0 : $this->punctuation_c;
        $punct_d = is_null($this->punctuation_d) ? 0 : $this->punctuation_d;

        if ($formula == 2) {
            if ($punct_d > 0) {
                //$average = intval(($punct_a + $punct_c) / 2);
                return round_score(ctof($punct_d));
            } else {
                return round_score(ctof(intval(($punct_a + $punct_c) / 2)));
            }
        } elseif ($formula == 3) {
            if ($punct_d > 0) {
                //$average = intval(($punct_a + $punct_b + $punct_c) / 3);
                return round_score(ctof($punct_d));
            } else {
                return round_score(ctof(intval(($punct_a + $punct_b + $punct_c) / 3)));
            }
        } else {
            return round_score(ctof('0'));
        }
    }

    /**
     * Get the score has form.
     *
     * @return boolean
     */
    public function getHasFormAttribute()
    {
        $formula = $this->registration->room->formula_id;
        return $formula > 2 ? true : false;
    }
}
