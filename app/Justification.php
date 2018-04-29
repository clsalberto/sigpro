<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Justification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'justifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'frequency_id', 'comments', 'document',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'frequency_id';

    /**
     * Relationship with frequency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function frequency()
    {
        return $this->belongsTo(Frequency::class);
    }
}
