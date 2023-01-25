<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MapInterface;

class MapController extends Controller
{
    public function __construct(MapInterface $mapInterface)
    {
        $this->mapInterface = $mapInterface;
    }

    public function index()
    {
       return $this->mapInterface->index();
    }

    public function location()
    {
       return $this->mapInterface->location();
    }

    public function save_location(Request $request)
    {
       return $this->mapInterface->save_location($request);
    }
    public function saved()
    {
       return $this->mapInterface->saved();
    }
}
