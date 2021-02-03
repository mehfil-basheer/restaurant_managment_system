<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\customer;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = customer::all();
        return view('customer.index')->with($data);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
          $data = $this->validate_data($request);
          customer::create($data);
          return back()->with('success_flash', 'New Category created successfully');

    }

    private function validate_data($request, $id = null)
    {
        return $request->validate([
            'name' => 'required' . $id,
            'mobile' => 'required|numeric',
            'address'=>'min:5'


        ]);
    }
    private function edit()
    {

    }

    public function destroy(customer $customer)
    {
        if($customer->delete()) {
            return response(1);
        }


    }

}
