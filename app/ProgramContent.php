<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramContent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'program_contents';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'class_date_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_date_id', 'content',
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
}
