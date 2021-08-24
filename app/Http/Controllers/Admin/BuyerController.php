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
    {   
        $editCustomer = "";  
        $data['salesrep'] = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        return view("buyers.create",compact('data','editCustomer'));
    }

    public function store(BuyerRequest $request)
    {
        if($request->same_as){
            $shipping = $request->billing_address;
        }else{
            $shipping = $request->shipping_address;
        }

        $data                       = $request->validated(); 
        $data['password']           = Hash::make($request->password);
        $data['status']             = $request->status; 
        $data['secondary_email']    = $request->secondary_email; 

        CustomerMaster::create($data);

        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer created successfully.");
    }

    public function edit(CustomerMaster $buyer)
    {
        $editCustomer = $buyer;  
        $data['salesrep'] = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        return view("buyers.create", compact("editCustomer","data"));
    }

    public function update(BuyerRequest $request, CustomerMaster $buyer)
    {
        if($request->same_as){
            $shipping = $request->billing_address;
        }else{
            $shipping = $request->shipping_address;
        }

        $data                    = $request->validated(); 
        $data['status']          = $request->status; 
        $data['secondary_email'] = $request->secondary_email; 

        if($request->password != "" && $request->password != null)
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }
        
        CustomerMaster::where('id', $buyer->id)->update($data);

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
