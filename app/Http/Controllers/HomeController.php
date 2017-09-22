<?php

namespace App\Http\Controllers;
use App\Dish;
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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::take(3)->get();
        return view('home', compact('dishes'));
    }
}
