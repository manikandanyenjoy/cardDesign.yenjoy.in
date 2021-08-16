<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuyerRequest;
use App\Models\CustomerMaster;
use App\Models\CustomerShippingAddress;
use App\Models\CustomerBillingAddress;
use App\Models\Staf_master;
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
    {     $data['salesrep'] = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        return view("buyers.create",compact('data'));
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
            'secondary_email' => $request->secondary_email,
            'sales_rep'=>$request->sales_rep,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
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
        
        $data['salesrep'] = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        return view("buyers.edit", compact("buyer","data"));
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
            'secondary_email' => $request->secondary_email,
            'sales_rep'=>$request->sales_rep,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
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
        $salesrep = Staf_master::where('id',$buyer->sales_rep)->first();
        return view("buyers.show", compact("buyer","salesrep"));
    }

    public function destroy(CustomerMaster $buyer)
    {
        $buyer->delete();
        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer deleted successfully");
    }
}
