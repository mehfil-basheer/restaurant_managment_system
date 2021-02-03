<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\Category;
use InstWa\Menu;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['menus'] = Menu::all();
        return view('fooditem.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate_data($request);

        if (!isset($data['image'])) {
            $data['image'] = 'placeholder.png';
        } else {
            $data['image'] = $this->upload_image($request);
        }

        if (Menu::create($data)) {
            return redirect()->route('menu.index')->with('success_flash', 'New Menu item created successfully');
        } else {
            return back()->with('error_flash', 'Something went wrong..! ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $data['categories'] = Category::all();
        $data['menu'] = $menu;
        return view('fooditem.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $this->validate_data($request, $menu->id);


        if (isset($data['image']) && $data['image'] != $menu->image && $data['image'] != '') {
            $data['image'] = $this->upload_image($request);
        }

        $menu->fill($data);
        if ($menu->save()) {
            return redirect()->route('menu.index')->with('success_flash', 'Menu item updates successfully..!');
        } else {
            return back()->with('error_flash', 'Something went wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            return response(1);
        }
        return response(0);
    }

    public function all()
    {
        $menu = Menu::all();
        return response($menu);
    }

    private function validate_data($request, $id = null)
    {
        return $request->validate([
            'name' => 'required|unique:menus,name,' . $id,
            'category_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'sort_order' => 'integer',
        ]);
    }

    private function upload_image($request)
    {
        $imageName = time() . uniqid() . '.' . $request->image->getClientOriginalExtension();

        $destinationPath = public_path('images/menu');
        $request->image->move($destinationPath, $imageName);

        return $imageName;
    }
}
