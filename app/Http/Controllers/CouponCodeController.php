<?php

namespace InstWa\Http\Controllers;

use Illuminate\Http\Request;
use InstWa\Coupon;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coupons'] = Coupon::all();
        return view('couponcode.index')->with($data);
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

        if(Coupon::create($data)) {
            return back()->with('success_flash', 'New Coupon Code created successfully..!');
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
    public function edit(Coupon $coupon)
    {
        return view('couponcode.edit')->with('coupon', $coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $data = $this->validate_data($request, $coupon->id);

        $coupon->fill($data);
        if($coupon->save()) {
            return redirect()->route('coupon.index')->with('success_flash', 'Coupon Code updated successfully..!');
        } else {
            return back()->with('error_flash', 'Oops..! Something wen wrong..!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        if ($coupon->delete()) {
            return response(1);
        }
        return response(0);
    }

    private function validate_data($request, $id = null)
    {
        return $request->validate([
            'code' => 'required|unique:coupons,code,' . $id,
            'percentage' => 'required',
            'description' => 'required',
            'unit' => '',
            'expires_at' => '',
        ]);
    }
}
