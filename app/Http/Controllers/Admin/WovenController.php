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
use App\Models\WovenQuality;
use App\Http\Requests\Admin\WovenRequest;

class WovenController extends Controller
{
    public function index()
    {

        $wovens = DB::table('design_cards')->select('design_cards.*','customer_masters.first_name','customer_masters.last_name')
        ->join('customer_masters', 'customer_masters.id', '=', 'design_cards.customer_id')
        ->orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
      // echo "<pre>"; print_r($wovens);exit;
        return view("woven.index", compact("wovens"));
    }


    public function create()
    {   
        $data = $this->mastersDatas();
        $editdesignCard = "";
        return view("woven.create", compact("data","editdesignCard"));
    }

//    WovenRequest
    public function store(WovenRequest $request)
    {
      //  print_r($request->all());exit;

        try {

            $validatedFields                    = $request->validated();
            $validatedFields['loom_id']         = json_encode($request->looms);
            $validatedFields['total_repet']     = json_encode($request->total_repeat);
            $validatedFields['add_on_cast']     = json_encode($request->add_on_cast);
            $validatedFields['needle']          = json_encode($request->needle);
            
            // dd($validatedFields);
        //    Sample Weaver mutliple sotre json format
            
            $result = DesignCard::create($validatedFields);

          
            // $validatedFields = $request->validated();
            // unset($validatedFields["image"]);

            // $result = DesignCard::create([
            //     'date' => $request->date,
            //     'customer_id' => $request->customer,
            //     'lable' => $request->label,
            //     'designer_id' => $request->designer,
            //     'design_number' => $request->design_no,
            //     'salesrep_id' => $request->sales_rep,
            //     'weaver_id' => $request->warp,
            //     'warps_id' => $request->warp,
            //     'picks' => $request->pick,
            //     'total_picks' => $request->total_pick,
            //     'loom_id' => json_encode($request->looms),
            //     'total_repet' => json_encode($request->total_repeat),
            //     'wastage' => $request->wastage,
            //     'finishing_id' => $request->finishings,
            //     'cost_in_roll' => $request->cast_inch,
            //     'total_cost' => $request->total_area,
            //     'catagory' => $request->catagory,
            //     'length' => $request->length,
            //     'sq_inch'=> $request->sq_inch,
            //     'customer_grade'=> $request->customer_grade,
            //     'width' =>$request->width,
            //     'add_on_cast'=>json_encode($request->add_on_cast),
            //     'needle'=>json_encode($request->needle)
            // ]);

            // if ($request->hasFile("document_name")) {
            //     $file = $request->file("document_name");
            //     $filePath = $file->store("{$result->id}", [
            //         "disk" => "cardsDocuments",
            //     ]);
            // }

            // if (isset($filePath)) {
            //     $result->update([
            //         "document_name" => $filePath,
            //     ]);
            // }
            // if ($request->hasFile("crap_image")) {
            //     $file = $request->file("crap_image");
            //     $filePath = $file->store("{$result->id}", [
            //         "disk" => "cardsImage",
            //     ]);
            // }

            // if (isset($filePath)) {
            //     $result->update([
            //         "crap_image" => $filePath,
            //     ]);
            // }
        return redirect()
                ->route("woven.index")
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
        $data           = $this->mastersDatas();
        $editdesignCard = DesignCard::where('id',$woven->id)->first();
        // dd($editdesignCard->needle);
        return view("woven.edit", compact("woven","data","editdesignCard"));
    }

// WovenRequest
    public function update(Request $request, DesignCard $woven)
    {
        // $validatedFields                    = $request->validated();
        // $validatedFields                    = $request->all();
        // $validatedFields['loom_id']         = json_encode($request->looms);
        // $validatedFields['total_repet']     = json_encode($request->total_repeat);
        // $validatedFields['add_on_cast']     = json_encode($request->add_on_cast);
        // $validatedFields['needle']          = json_encode([$request->needle]);
        // dd($validatedFields);
        try {
              $validatedFields                    = $request->all();
        $validatedFields['weaver_id']         = json_encode($request->weaver);
        $validatedFields['loom_id']         = json_encode($request->looms);
        $validatedFields['total_repet']     = json_encode($request->total_repeat);
        $validatedFields['add_on_cast']     = json_encode($request->add_on_cast);
        $validatedFields['needle']          = json_encode([$request->needle]);
         $woven->update($validatedFields);
            // $validatedFields = $request->validated();
            // unset($validatedFields["image"]);

            // $woven->update($request->all());

            // if ($request->hasFile("image")) {
            //     $file = $request->file("image");
            //     $filePath = $file->store("{$woven->id}/business_document", [
            //         "disk" => "folds",
            //     ]);
            // }

            // if (isset($filePath)) {
            //     $fold->update([
            //         "image" => $filePath,
            //     ]);
            // }

           

            return redirect()
        ->route("woven.index")
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
        $woven = DesignCard::with(['customerDetail','designerDetail','salesRepDetail','warpDetail','finishingDetail'])->findOrFail($woven);
        // dd($woven);
        return view("woven.show", compact("woven"));
    }


    public function destroy(DesignCard $woven)
    {
        $woven->delete(); 
        return redirect()
        ->route("woven.index")
        ->with("success", "Design card deleted successfully.");
    }

    public function mastersDatas()
    {
        $data['customerMaster']   = CustomerMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['loomMaster']       = LoomMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['designerMaster']   = Staf_master::where('role_id',1)->orderBy('created_at', 'DESC')->get()->toArray();
        $data['salesrepMaster']   = Staf_master::where('role_id',2)->orderBy('created_at', 'DESC')->get()->toArray();
        $data['warpMaster']       = WarpMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['finishingMaster']  = FinishingMachineMaster::orderBy('created_at', 'DESC')->get()->toArray();
        $data['wovenQuality']     = WovenQuality::get()->toArray();
        return $data;
    }
}
