<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'avatar', 'name', 'surname', 'gender', 'email', 'cpf',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Set the student's name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = proper_case($value);
    }

    /**
     * Set the student's surname.
     *
     * @param  string  $value
     * @return void
     */
    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = proper_case($value);
    }

    /**
     * Set the student's gender.
     *
     * @param  string  $value
     * @return void
     */
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtoupper($value);
    }

    /**
     * Relationship with rooms.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class)->using(Registration::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }
}
