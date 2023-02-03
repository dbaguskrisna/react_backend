<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs = Customer::get();

        return response()->json($rs,200);
    }

    public function indexById(Request $request){
        try {
            $id = $request->id;

            $rs = Customer::find($id);

            if($rs == null){
                return response()->json(["message" => "not found"],404);
            } else {
                return response()->json($rs,200);
            }
        } catch (\PDOException $e) {
            return response()->json($e,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->industry = $request->industry;
            $customer->save();
    
            return response()->json(["status"=>"success","message" => "Success add new customer"],200);
        } catch (\PDOException $e) {
            return response()->json(["status"=>"failed","message" => $e], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $id = $request->id;

            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->industry = $request->industry;
            $customer->save();
    
            return response()->json(["message" => "success"],200);
        } catch (\PDOException $e) {
            return response()->json(["message" => $e], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Customer $customer)
    {
        try {
            $id = $request->id;
            $customer = Customer::find($id);
            $customer->delete();

            return response()->json(["message" => "success"], 200);
        } catch (\PDOException $e) {
            return response()->json(["message" => $e], 200);
        }
    }
}
