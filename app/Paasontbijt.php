<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paasontbijt extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'API_inschrijvingen_paasontbijten';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'order' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'tel',
        'email',
        'order',
        'total_price',
        'ophaal_of_levering',
        'dag',
        'uur'
    ];
}
