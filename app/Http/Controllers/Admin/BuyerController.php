<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuyerRequest;
use App\Models\CustomerMaster;
use App\Models\CustomerShippingAddress;
use App\Models\CustomerBillingAddress;


class BuyerController extends Controller
{
    public function index()
    {
        $buyers = CustomerMaster::orderBy('created_at', 'DESC')
            ->paginate(config("motorTraders.paginate.perPage"));
        return view("buyers.index", compact("buyers"));
    }

    public function create()
    {
        return view("buyers.create");
    }

    public function store(BuyerRequest $request)
    {
        $user = CustomerMaster::create($request->all());

        $result = CustomerShippingAddress::Insert(array(
            'customer_id' => $user->id,
            'fullname' => $request->first_name." ".$request->last_name,
            'flatno' => $request->flatno,
            'apartment' => $request->apartment,
            'landmark' => $request->landmark,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
        $result_billing = CustomerBillingAddress::Insert(array(
            'customer_id' => $user->id,
            'fullname' => $request->first_name." ".$request->last_name,
            'flatno' => $request->billing_flatno,
            'apartment' => $request->billing_apartment,
            'landmark' => $request->billing_landmark,
            'area' => $request->billing_area,
            'city' => $request->billing_city,
            'state' => $request->billing_state,
            'country' => $request->billing_country,
            'zipcode' => $request->billing_zipcode,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));

        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer created successfully.");
    }

    public function edit(CustomerMaster $buyer)
    {
        
         $shippingAddress = CustomerShippingAddress::where('customer_id',$buyer->id)->first();
         $billingAddress = CustomerBillingAddress::where('customer_id',$buyer->id)->first();
        return view("buyers.edit", compact("buyer","shippingAddress","billingAddress"));
    }

    public function update(BuyerRequest $request, CustomerMaster $buyer)
    {
        
        $buyer->update($request->all());

        $result = CustomerShippingAddress::where('customer_id', $buyer->id)->update(array(
            
            'fullname' => $request->first_name." ".$request->last_name,
            'flatno' => $request->flatno,
            'apartment' => $request->apartment,
            'landmark' => $request->landmark,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
        $result_billing = CustomerBillingAddress::where('customer_id', $buyer->id)->update(array(
    
            'fullname' => $request->first_name." ".$request->last_name,
            'flatno' => $request->billing_flatno,
            'apartment' => $request->billing_apartment,
            'landmark' => $request->billing_landmark,
            'area' => $request->billing_area,
            'city' => $request->billing_city,
            'state' => $request->billing_state,
            'country' => $request->billing_country,
            'zipcode' => $request->billing_zipcode,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));

        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer updated successfully");
    }

    public function show($buyer)
    {
        $buyer = CustomerMaster::findOrFail($buyer);

    
        $shippingAddress = CustomerShippingAddress::where('customer_id',$buyer->id)->first();
         $billingAddress = CustomerBillingAddress::where('customer_id',$buyer->id)->first();
        return view("buyers.show", compact("buyer","shippingAddress","billingAddress"));
    }

    public function destroy(CustomerMaster $buyer)
    {
        $buyer->delete();
        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer deleted successfully");
    }
}
