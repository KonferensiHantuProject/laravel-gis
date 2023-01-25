<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
interface MapInterface
{
    public function index();

    public function location();
    
    public function save_location(Request $request);

    public function saved();
}
