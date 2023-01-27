<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Map\StoreRequest;
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

    public function location_detail(int $id)
    {
       return $this->mapInterface->location_detail($id);
    }

    public function save_location(StoreRequest $request)
    {
       return $this->mapInterface->save_location($request);
    }

    public function delete_location(Request $request)
    {
       return $this->mapInterface->delete_location($request);
    }

    public function update_location(Request $request)
    {
       return $this->mapInterface->update_location($request);
    }

    public function saved()
    {
       return $this->mapInterface->saved();
    }
}
