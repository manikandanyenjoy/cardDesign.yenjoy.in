<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SellerRequest;
use App\Models\VendorMaster;
use App\Models\VendorBillingAddress;
use App\Models\VendorShippingAddress;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = VendorMaster::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("sellers.index", compact("sellers"));
    }

    public function create()
    {
        return view("sellers.create");

    }

    public function store(SellerRequest $request)
    {
        //print_r($request->all());exit;
       $user = VendorMaster::create($request->all());
        
        $result = VendorShippingAddress::Insert(array(
            'vendor_id' => $user->id,
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
        $result_billing = VendorBillingAddress::Insert(array(
            'vendor_id' => $user->id,
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
            ->route("sellers.index")
            ->with("success", "Seller created successfully.");
    }

    public function edit(VendorMaster $seller)
    {    $shippingAddress = VendorShippingAddress::where('vendor_id',$seller->id)->first();
         $billingAddress = VendorBillingAddress::where('vendor_id',$seller->id)->first();
        return view("sellers.edit", compact("seller","shippingAddress","billingAddress"));
    }

    public function update(SellerRequest $request, VendorMaster $seller)
    {
        $seller->update($request->all());
        
        $result = VendorShippingAddress::where('vendor_id', $seller->id)->update(array(
            
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
        $result_billing = VendorBillingAddress::where('vendor_id', $seller->id)->update(array(
    
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
            ->route("sellers.index")
            ->with("success", "Seller updated successfully");
    }

    public function show($seller)
    {
        $seller = VendorMaster::findOrFail(
            $seller
        );
        $shippingAddress = VendorShippingAddress::where('vendor_id',$seller->id)->first();
         $billingAddress = VendorBillingAddress::where('vendor_id',$seller->id)->first();
        return view("sellers.show", compact("seller","shippingAddress","billingAddress"));
    }

    public function destroy(VendorMaster $seller)
    {
        $seller->delete();
        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller deleted successfully");
    }
}
