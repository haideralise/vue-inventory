<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private function add_image_urls($model, $id)
    {
        for ($i = 1; $i <= 4; $i++) {
            $model['image_'.$i] = asset('images/'.$id .'/Image_'.$i.'.jpg');
        }
        return $model;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
