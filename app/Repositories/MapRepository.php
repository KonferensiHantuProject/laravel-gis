<?php

namespace App\Repositories;

use App\Interfaces\MapInterface;
use Exception;

class MapRepository implements MapInterface
{

    public function index()
    {
        try {

            $data = [
                'title' => 'Map',
            ];
    
            return view('map.index', $data);

        } catch (Exception $e) {
            dd($e);
        }
    }

}
