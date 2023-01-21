<?php

namespace App\Repositories;

use App\Interfaces\HomeInterface;
use Exception;

class HomeRepository implements HomeInterface
{

    public function index()
    {
        try {

            $data = [
                'title' => 'Index',
            ];
    
            return view('home', $data);

        } catch (Exception $e) {
            dd($e);
        }
    }

}
