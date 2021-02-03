<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\Category;
use InstWa\CategoryDiscount;
use InstWa\Menu;
use InstWa\ProductDiscount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product_discounts'] = ProductDiscount::all();
        $data['category_discounts'] = CategoryDiscount::all();

        $data['categories'] = Category::all();
        $data['products'] = Menu::all();
        return view('discount.index')->with($data);
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
        if ($request->category_id != null) {
            $data = $this->validate_category_data($request);
            CategoryDiscount::create($data);

            return back()->with('success_flash', 'Discount for category has been added..!');
        } else if ($request->menu_id != null) {
            $data = $this->validate_product_data($request);
            ProductDiscount::create($data);

            return back()->with('success_flash', 'Discount for category has been added..!');
        }
        return back()->with('error_flash', 'Something went wrong..!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validate_category_data($request, $id = null)
    {
        return $request->validate([
            'category_id' => 'required|numeric',
            'percentage' => 'required|numeric',
            'description' => 'required',
        ]);
    }

    private function validate_product_data($request, $id = null)
    {
        return $request->validate([
            'menu_id' => 'required|numeric',
            'percentage' => 'required|numeric',
            'description' => 'required',
        ]);
    }
}
