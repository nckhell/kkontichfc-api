<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'API_covid';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'postal',
        'tel',
        'email'
    ];
}
