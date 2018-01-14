<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'registrations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'room_id', 'workload',
    ];

    /**
     * Relationship with student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
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

    public function frequency($class_date_id, $registration_id)
    {
        return $this->frequencies()->where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->first();
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
     * @param $registration_id
     * @return Model|null|static
     */
    public function score($registration_id)
    {
        return $this->scores()->where('registration_id', $registration_id)
            ->first();
    }

}
