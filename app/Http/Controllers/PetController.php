<?php

namespace App\Http\Controllers;

use App\Api\PetApi;
use Illuminate\Routing\Controller as BaseController;

class PetController extends BaseController
{
    /**
     * Gets all pets from API.
     */
    public function getAll()
    {
        $pets = PetApi::getPets();

        return view('pets')->with('pets', $pets);
    }
}
