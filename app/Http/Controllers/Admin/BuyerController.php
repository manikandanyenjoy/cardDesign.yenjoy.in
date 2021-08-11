<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuyerRequest;
use App\Models\CustomerMaster;
use App\Models\CustomerShippingAddress;
use App\Models\CustomerBillingAddress;
use Illuminate\Support\Facades\Hash;



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
        
          
        if($request->same_as){ $shipping = $request->billing_address;}else{ $shipping = $request->shipping_address;}
        $result = CustomerMaster::Insert(array(
            'company_name' => $request->company_name,
            'company_phone'=> $request->company_phone,
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
            ->route("buyers.index")
            ->with("success", "Buyer created successfully.");
    }

    public function edit(CustomerMaster $buyer)
    {
        
    
        return view("buyers.edit", compact("buyer"));
    }

    public function update(BuyerRequest $request, CustomerMaster $buyer)
    {
        
        if($request->same_as){ $shipping = $request->billing_address;}else{ $shipping = $request->shipping_address;}
        $result = CustomerMaster::where('id', $buyer->id)->update(array(
            'company_name' => $request->company_name,
            'company_phone'=> $request->company_phone,
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
            ->route("buyers.index")
            ->with("success", "Buyer updated successfully");
    }

    public function show($buyer)
    {
        $buyer = CustomerMaster::findOrFail($buyer);

        return view("buyers.show", compact("buyer"));
    }

    public function destroy(CustomerMaster $buyer)
    {
        $buyer->delete();
        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer deleted successfully");
    }
}
