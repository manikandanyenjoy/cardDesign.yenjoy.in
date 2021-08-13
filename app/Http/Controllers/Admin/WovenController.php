<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\DesignCard;
use App\Models\CustomerMaster;
use App\Models\LoomMaster;
use App\Models\Staf_master;
use App\Models\WarpMaster;
use App\Models\FinishingMachineMaster;
use App\Http\Requests\Admin\WovenRequest;

class WovenController extends Controller
{
    public function index()
    {
        $wovens = DesignCard::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("woven.index", compact("wovens"));
    }


    public function create()
    {   
        $data['customer'] = CustomerMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['looms'] = LoomMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['designer'] = Staf_master::where('role_id',1)->orderBy('created_at', 'DESC')->get()->toArray();
        $data['salesrep'] = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        $data['warp'] = WarpMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['finishing'] = FinishingMachineMaster::orderBy('created_at', 'DESC')->get()->toArray();
        return view("woven.create",compact('data'));
    }
   
    public function store(WovenRequest $request)
    {
      

        try {
            $validatedFields = $request->validated();
            unset($validatedFields["image"]);

            $result = DesignCard::Insert(array(
                'date' => $request->first_name,
                'customer_id' => $request->last_name,
                'lable' => $request->mobile_number,
                'designer_id' => $request->email,
                'design_number' => Hash::make($request->password),
                'salesrep_id' => $request->status,
                'weaver_id' => $request->bank_name,
                'warps_id' => $request->account_no,
                'picks' => $request->status,
                'total_picks' => $request->IFSCCode,
                'loom_id' => $request->opening_balance,
                'total_repet' => $request->credit_period,
                'wastage' => $request->billing_address,
                'finishing_id' => $shipping,
                'cost_in_roll' => $request->grade,
                'loom_id' => $request->opening_balance,
                'total_repet' => $request->credit_period,
                'wastage' => $request->billing_address,
                'finishing_id' => $shipping,
                'cost_in_roll' => $request->grade,
            ));

            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $filePath = $file->store("{$user->id}/business_document", [
                    "disk" => "folds",
                ]);
            }

            if (isset($filePath)) {
                $user->update([
                    "image" => $filePath,
                ]);
            }

           

            return redirect()
        ->route("folds.index")
        ->with("success", "Design card created successfully.");
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(
                    "danger",
                    "Something went wrong" . $exception->getMessage()
                );
        }
        
    } 
    
    
    public function edit(DesignCard $woven)
    {   
        
        $colour = DesignCard::where('id',$woven->id)->first();
        return view("woven.edit", compact("fold"));
    }


    public function update(WovenRequest $request, DesignCard $fold)
    {

        try {
            $validatedFields = $request->validated();
            unset($validatedFields["image"]);

            $woven->update($request->all());

            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $filePath = $file->store("{$woven->id}/business_document", [
                    "disk" => "folds",
                ]);
            }

            if (isset($filePath)) {
                $fold->update([
                    "image" => $filePath,
                ]);
            }

           

            return redirect()
        ->route("folds.index")
        ->with("success", "fold created successfully.");
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(
                    "danger",
                    "Something went wrong" . $exception->getMessage()
                );
        }
    }
    
    public function show($woven)
    {
        $woven = DesignCard::findOrFail($woven);
        return view("woven.show", compact("$woven"));
    }


    public function destroy(DesignCard $woven)
    {
        $woven->delete(); 
        return redirect()
        ->route("woven.index")
        ->with("success", "Design card deleted successfully.");
    }
}
