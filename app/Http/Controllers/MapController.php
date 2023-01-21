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
}
