<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\HomeInterface;

class HomeController extends Controller
{
    public function __construct(HomeInterface $homeInterface)
    {
        $this->homeInterface = $homeInterface;
    }

    public function index()
    {
       return $this->homeInterface->index();
    }

}
