<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SellerRequest;
use App\Models\VendorMaster;
use Illuminate\Support\Facades\Hash;


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
        if($request->same_as){ $shipping = $request->billing_address;}else{ $shipping = $request->shipping_address;}
        $result = VendorMaster::Insert(array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
            'status' => $request->status,
            'IFSCCode' => $request->IFSCCode,
            'opening_balance' => $request->opening_balance,
            'credit_period' => $request->credit_period,
            'billing_address' => $request->billing_address,
            'shipping_address' => $shipping,
            'grade' => $request->grade,
        ));
       
        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller created successfully.");
    }

    public function edit(VendorMaster $seller)
    {   
        return view("sellers.edit", compact("seller"));
    }

    public function update(SellerRequest $request, VendorMaster $seller)
    {
       
        if($request->same_as){ $shipping = $request->billing_address;}else{ $shipping = $request->shipping_address;}
       $result = VendorMaster::where('id', $seller->id)->update(array(
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'mobile_number' => $request->mobile_number,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'status' => $request->status,
           'bank_name' => $request->bank_name,
           'account_no' => $request->account_no,
           'status' => $request->status,
           'IFSCCode' => $request->IFSCCode,
           'opening_balance' => $request->opening_balance,
           'credit_period' => $request->credit_period,
           'billing_address' => $request->billing_address,
           'shipping_address' => $shipping,
           'grade' => $request->grade,
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
       
        return view("sellers.show", compact("seller"));
    }

    public function destroy(VendorMaster $seller)
    {
        $seller->delete();
        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller deleted successfully");
    }
}
