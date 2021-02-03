<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('category.index')->with($data);
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

        if (Category::create($data)) {
            return back()->with('success_flash', 'New Category created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $data = $this->validate_data($request, $category->id);

        if (isset($data['image']) && $data['image'] != $category->image && $data['image'] != '') {
            $data['image'] = $this->upload_image($request);
        }

        $category->fill($data);
        if($category->save()) {
            return redirect()->route('category.index')->with('success_flash', 'Category has been updated');
        } else {
            return back()->with('error_flash', 'Something went wrong..! try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return response(1);
        }

        return response(0);
    }

    public function all()
    {
        $category = Category::all();

        return response($category);
    }

    private function validate_data($request, $id = null)
    {
        return $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'sort_order' => 'integer',
        ]);
    }

    private function upload_image($request)
    {
        $imageName = time() . uniqid() . '.' . $request->image->getClientOriginalExtension();

        // $data['image'] = $imageName;

        $destinationPath = public_path('images/category');
        $request->image->move($destinationPath, $imageName);

        return $imageName;
    }
}
