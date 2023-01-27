<?php

namespace App\Repositories;

use App\Interfaces\MapInterface;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Requests\Map\StoreRequest;
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

    public function location_detail(int $id)
    {
        try {

            $location = Location::find($id);

            return response()->json([
                'success'=>'Data is successfully retrieved',
                'id' => $location->id,
                'location' => $location->location,
                'lat' => $location->lat,
                'long' => $location->long,
                'created_at' => $location->created_at
            ]);

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function save_location(StoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $data = new Location;
            $data->location = $request->location;
            $data->lat = $request->longitude;
            $data->long = $request->latitude;
            $data->save();

            DB::commit();

            return redirect('/')->with('success', 'Custom Location Name Saved');
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function delete_location(Request $request)
    {
        DB::beginTransaction();
        try {

            // Deleting Data
            $data = Location::find($request->id);
            $data->delete();

            DB::commit();

            return redirect('/map/saved')->with('deleted', 'Custom Location Deleted');
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function update_location(Request $request)
    {
        DB::beginTransaction();
        try {

            // Deleting Data
            $data = Location::find($request->id);
            $data->location = $request->location;
            $data->lat = $request->longitude;
            $data->long = $request->latitude;
            $data->save();

            DB::commit();

            return redirect('/map/saved')->with('updated', 'Custom Location Name Updated');
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
