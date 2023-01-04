<?php

namespace App\Api;

class PetApi
{
    static function getPets($offset = 0)
    {
        $pets = json_decode(file_get_contents('https://petstore.swagger.io/v2/pet/findByStatus?status=available'), true);

        return $pets;
    }
}
