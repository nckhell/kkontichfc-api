<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kleding extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'API_kleding';

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
        'firstname',
        'lastname',
        'email',
        'birth_date',
        'member_type',
        'sweater_champ',
        'socks_glasgow',
        'short_manchester_black',
        't_shirt_jako_red',
        'training_pants_classico'
    ];
}
