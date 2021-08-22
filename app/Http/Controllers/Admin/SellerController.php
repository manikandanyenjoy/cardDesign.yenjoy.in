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
        $editVendor="";
        return view("sellers.create",compact('editVendor'));

    }

    public function store(SellerRequest $request)
    {
        if($request->same_as){ 
            $shipping = $request->billing_address;
        }else{
            $shipping = $request->shipping_address;
        }

        $data               = $request->validated(); 
        $data['password']   = Hash::make($request->password);
        $data['status']     = $request->status; 

        VendorMaster::create($data);
       
        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller created successfully.");
    }

    public function edit(VendorMaster $seller)
    {   
        $editVendor= $seller;
        return view("sellers.create",compact('editVendor'));
    }

    public function update(SellerRequest $request, VendorMaster $seller)
    {
        if($request->same_as){
            $shipping = $request->billing_address;
        }else{
            $shipping = $request->shipping_address;
        }

        $data           = $request->validated(); 
        $data['status'] = $request->status; 

        if($request->password != "")
        {
            $data['password'] = Hash::make($request->password);
        }

       VendorMaster::where('id', $seller->id)->update($data);
       
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
