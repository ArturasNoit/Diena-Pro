<?php

namespace App\Http\Controllers;
use Auth;
use App\Dish;
use Illuminate\Http\Request;
use App\Http\Requests\Dish_validation;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::all();

      //dd($dishes); Naudojama pratestavimui
      return view('dishes/index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dishes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required|min:3',
          'description' => 'required',
          'image_url' => 'required|max:2047',
          'price' => 'required|numeric',
        ]);

        $dish = new Dish;
        $dish->title = $request->title;
        $dish->description = $request->description;
        $dish->image_url = $request->image_url;
        $dish->price = $request->price;
        $dish->save();

        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // dd($dish);
        return view('dishes/edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish, Dish_validation $request2)
    {


        $dish->title = $request->title;
        $dish->description = $request->description;
        $dish->image_url = $request->image_url;
        $dish->price = $request->price;
        $dish->save();
        $request->session()->flash('update', $request->title . "was successfully updated");
        return redirect()->route('dishes.edit', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }
}
