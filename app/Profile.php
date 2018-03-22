<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'gender', 'address', 'about_me',
    ];

    /**
     * Set the profile's surname.
     *
     * @param  string  $value
     * @return void
     */
    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = proper_case($value);
    }

    /**
     * Set the profile's address.
     *
     * @param  string  $value
     * @return void
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = proper_case($value);
    }

    /**
     * Set the profile's gender.
     *
     * @param  string  $value
     * @return void
     */
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = strtoupper($value);
    }

    /**
     * Relationship with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
