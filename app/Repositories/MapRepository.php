<?php

namespace App\Repositories;

use App\Interfaces\MapInterface;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
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

    public function location()
    {
        try {

            $data = [
                'title' => 'Location',
            ];
    
            return view('map.location', $data);

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function save_location(Request $request)
    {
        DB::beginTransaction();
        try {

            $data = new Location;
            $data->location = $request->location;
            $data->lat = $request->longitude;
            $data->long = $request->latitude;
            $data->save();

            DB::commit();

            return redirect('/');
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function saved()
    {
        try {

            // Get All Locations
            $locations = Location::get();

            $data = [
                'title' => 'Saved Location',
                'locations' => $locations
            ];
    
            return view('map.custom', $data);

        } catch (Exception $e) {
            dd($e);
        }
    }
}
