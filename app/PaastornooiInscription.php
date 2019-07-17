<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaastornooiInscription extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'API_paastornooi_inscriptions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gc',
        'club',
        'stamnummer',
        'shirtColor',
        'pantsColor',
        'team',
        'contactName',
        'contactAddress',
        'contactTel',
        'contactEmail'
    ];
}
