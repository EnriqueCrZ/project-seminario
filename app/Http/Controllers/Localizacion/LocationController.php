<?php

namespace App\Http\Controllers\Localizacion;

use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    private static $LOCATIONS = [
        '0'=>[
            'location'=>'Carr. Jacobo Arbenz Guzmán',
            'latitude'=>'15.697267',
            'longitude'=>'-88.585246'
        ],
        '1' => [
            'location'=>'Carr. Jacobo Arbenz Guzmán',
            'latitude'=>'15.700386',
            'longitude'=>'-88.586480'
        ],
        '2' => [
            'location'=>'Ruta #3',
            'latitude'=>'15.696809',
            'longitude'=>'-88.585904'
        ],
    ];

    public static function getLocations(): array
    {
        return self::$LOCATIONS;
    }
}

