<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Category;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();

        return view('back.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $menus = Menu::all();
    return view('back.dishes.create', compact('menus'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id'
        ]);

        $dish = new Dish([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'menu_id' => $request->get('menu_id')
        ]);
        $dish->save();

        return redirect('/dishes')->with('success', 'Patiekalas sėkmingai pridėtas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        $menus = Menu::all();

        return view('back.dishes.edit', compact('dish', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id'
        ]);

        $dish = Dish::find($id);
        $dish->name = $request->get('name');
        $dish->description = $request->get('description');
        $dish->price = $request->get('price');
        $dish->menu_id = $request->get('menu_id');
        $dish->save();

        return redirect('/dishes')->with('success', 'Patiekalas sėkmingai atnaujintas!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $dish = Dish::find($id);
        $dish->delete();

        return redirect('/dishes')->with('success', 'Patiekalas sėkmingai ištrintas!');
    }
}
