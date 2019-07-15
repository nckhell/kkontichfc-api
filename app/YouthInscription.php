<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YouthInscription extends Model
{
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
                            'firstname',
                            'lastname',
                            'email',
                            'sex',
                            'address',
                            'postal',
                            'city',
                            'tel',
                            'birthDate',
                            'birthPlace',
                            'RRN',
                            'legalRepresentative',
                            'landOfOrigin',
                            'adressAbroad',
                            'dateOfArrivalInBelgium',
                            'previousClub',
                            'position',
                            'bankNumber',
                            'affiliatedWithOtherClub',
                            'diseaseAndMedication',
                            'remarks',
                            'dateOfInscription',
                        ];
}
