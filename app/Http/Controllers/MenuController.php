<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Restaurant;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('back.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $restaurants = Restaurant::all();

        return view('back.menus.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $menu = new Menu([
            'title' => $request->get('title'),
            'restaurant_id' => $request->get('restaurant_id')
        ]);
        $menu->save();

        return redirect('/menus')->with('success', 'Meniu sėkmingai pridėtas!');
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $restaurants = Restaurant::all();

        return view('back.menus.edit', compact('menu', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $menu = Menu::find($id);
        $menu->title = $request->get('title');
        $menu->restaurant_id = $request->get('restaurant_id');
        $menu->save();

        return redirect('/menus')->with('success', 'Meniu sėkmingai atnaujintas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('/menus')->with('success', 'Meniu sėkmingai ištrintas!');
    }
}
