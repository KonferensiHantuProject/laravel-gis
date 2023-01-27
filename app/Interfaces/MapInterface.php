<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use App\Http\Requests\Map\StoreRequest;
interface MapInterface
{
    public function index();

    public function location();

    public function location_detail(int $id);
    
    public function save_location(StoreRequest $request);

    public function delete_location(Request $request);

    public function update_location(Request $request);

    public function saved();
}
