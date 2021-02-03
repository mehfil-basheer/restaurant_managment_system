<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\Category;
use InstWa\Menu;

class ApiController extends Controller
{
    public function menus()
    {
        return response(Menu::all());
    }

    public function categories()
    {
        $category = Category::all();

        foreach ($category as $ca) {
            dd($ca);
        }

        return response(Category::all());
    }

    public function delivery_locations()
    { }
}
