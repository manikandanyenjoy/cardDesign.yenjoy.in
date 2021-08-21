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
use Illuminate\Support\Facades\Storage;

class WovenController extends Controller
{
    public function index()
    {

        // $wovens = DB::table('design_cards')->select('design_cards.*','customer_masters.first_name','customer_masters.last_name')
        // ->join('customer_masters', 'customer_masters.id', '=', 'design_cards.customer_id')
        // ->orderBy('created_at', 'DESC')
        // ->paginate(config("motorTraders.paginate.perPage"));

      // echo "<pre>"; print_r($wovens);exit;

        $wovens = DesignCard::with(['salesRepDetail','customerDetail'])->paginate(5);
        return view("woven.index", compact("wovens"));
    }


    public function create()
    {   
        $data = $this->mastersDatas();
        $editdesignCard = "";
        return view("woven.create", compact("data","editdesignCard"));
    }

    public function decodeBase64Image($request, $id, $type)
    {
        // $image = $request->input('front_image'); // image base64 encoded
        // preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
        //         $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
        //         $image = str_replace(' ', '+', $image);
        //         $imageName = '1/image_' . time() . '.' . $image_extension[1]; //generating unique file name;
        //         // dd($imageName);
        //         Storage::disk('cardsImage')->put($imageName,base64_decode($image));
        $image = $request; // image base64 encoded

        preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension

        $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part

        $image = str_replace(' ', '+', $image);

        $filePath = "{$id}/{$type}_".time(). '.' . $image_extension[1]; //generating unique file name;

        Storage::disk('cardsImage')->put($filePath, base64_decode($image));

        return $filePath;
    }

    public function store(WovenRequest $request)
    {
        try {
          
            $mulitpleDesignFile = [];

            $uploadFiles        = [];

            $validatedFields = $this->addOrEditRequest($request);         

            $result = DesignCard::create($validatedFields);

            if ($request->hasFile("front_image")) {
                $frontFileName = $this->decodeBase64Image($request->front_image, $result->id, 'front_image');

                $uploadFiles["front_image"] = $frontFileName;
            }else{
                unset($validatedFields["front_image"]);
            }

            // if ($request->hasFile("front_crop_image")) {
            //     $frontImage      = $request->file("front_crop_image");

            //     $frontFilename = $frontImage->store("{$result->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $uploadFiles["front_image"] = $frontFilename;
            // }

            if ($request->hasFile("back_image")) {
                $backFilename = $this->decodeBase64Image($request->back_image, $result->id, 'back_image');

                $uploadFiles["back_image"] = $backFilename;
            }else{
                unset($validatedFields["back_image"]);
            }

            // if ($request->hasFile("back_crop_image")) {
            //     $backImage      = $request->file("back_crop_image");
                
            //     $backFilename = $backImage->store("{$result->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $uploadFiles["back_image"] = $backFilename;
            // }

            if ($request->hasFile("all_view_image")) {
                $viewAllFilename = $this->decodeBase64Image($request->all_view_image, $result->id, 'all_view_image');

                $uploadFiles["all_view_image"] = $viewAllFilename;
            }else{
                unset($validatedFields["all_view_image"]);
            }

            // if ($request->hasFile("all_view_crop_image")) {
            //     $viewAllImage = $request->file("all_view_crop_image");
                
            //     $viewAllFilename = $viewAllImage->store("{$result->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $uploadFiles["all_view_image"] = $viewAllFilename;
            // }

            if($request->hasfile('design_files'))
            {
                foreach($request->file('design_files') as $file)
                {
                    $filePaths = $file->store("{$result->id}", [
                        "disk" => "cardsDocuments",
                    ]);
                    $mulitpleDesignFile[] = $filePaths;  
                }
                $uploadFiles['design_file'] = json_encode($mulitpleDesignFile);
            }else{
                unset($validatedFields["design_file"]);
            }
            
            if($request->hasfile('back_image') || $request->hasfile('front_image') || $request->hasfile('all_view_image') || $request->hasfile('design_files'))
            {
                $result->update($uploadFiles);
            }
           
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
        // dd($editdesignCard->back_image);
        return view("woven.create", compact("data","editdesignCard"));
    }

    public function update(WovenRequest $request, DesignCard $woven)
    {
        try {
            $mulitpleDesignFile = [];
            
            $validatedFields    = $this->addOrEditRequest($request);

            // if ($request->hasFile("front_crop_image")) {
            //     $frontImage      = $request->file("front_crop_image");

            //     $frontFilename = $frontImage->store("{$woven->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $validatedFields["front_image"] = $frontFilename;
            // }

            // if ($request->hasFile("back_crop_image")) {
            //     $backImage      = $request->file("back_crop_image");
                
            //     $backFilename = $backImage->store("{$woven->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $validatedFields["back_image"] = $backFilename;
            // }

            // if ($request->hasFile("all_view_crop_image")) {
            //     $viewAllImage = $request->file("all_view_crop_image");
                
            //     $viewAllFilename = $viewAllImage->store("{$woven->id}", [
            //         "disk" => "cardsImage",
            //     ]);

            //     $validatedFields["all_view_image"] = $viewAllFilename;
            // }

            if ($request->hasFile("front_image")) {
                $frontFileName = $this->decodeBase64Image($request->front_image, $woven->id, 'front_image');

                $validatedFields["front_image"] = $frontFileName;
            }else{
                unset($validatedFields["front_image"]);
            }
            
            if ($request->hasFile("back_image")) {
                $backFilename = $this->decodeBase64Image($request->back_image, $woven->id, 'back_image');

                $validatedFields["back_image"] = $backFilename;
            }else{
                unset($validatedFields["back_image"]);
            }

            if ($request->hasFile("all_view_image")) {
                $viewAllFilename = $this->decodeBase64Image($request->all_view_image, $woven->id, 'all_view_image');

                $validatedFields["all_view_image"] = $viewAllFilename;
            }else{
                unset($validatedFields["all_view_image"]);
            }

            if(request()->hasFile('design_files'))
            {
                $designFiles                = request()->file('design_files');

                foreach($designFiles as $key => $designFile)
                {
                    $designfileName   = time().$key.'.'.$designFile->getClientOriginalExtension();
                    $mulitpleDesignFile[] = $designfileName;
                 
                    $filePath = $designFile->store("{$woven->id}", [
                        "disk" => "cardsDocuments",
                    ]);
                    
                }
                $validatedFields['design_file']   = json_encode($mulitpleDesignFile);
            }else{
                unset($validatedFields["design_file"]);
            }
          
            $woven->update($validatedFields);
        
            return redirect()
        ->route("woven.index")
        ->with("success", "Desgin card updated successfully.");
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
        $viewDesignCard = DesignCard::with(['customerDetail','designerDetail','salesRepDetail','warpDetail','finishingDetail'])->findOrFail($woven);
        $weavers         = LoomMaster::whereIn('id',$viewDesignCard->weaver)->get()->toArray();
        // dd($viewDesignCard->main_label['total_repeat']);
        return view("woven.show", compact("viewDesignCard","weavers"));
    }


    public function destroy(DesignCard $woven)
    {
        $woven->delete(); 
        return redirect()
        ->route("woven.index")
        ->with("success", "Design card deleted successfully.");
    }

    public function addOrEditRequest($request)
    {
        $validatedFields                        = $request->all();
        $validatedFields['weaver']              = json_encode($request->weaver);
        $validatedFields['main_label']          = json_encode($request->main_label);
        $validatedFields['tab_label']           = json_encode($request->tab_label);
        $validatedFields['size_label']          = json_encode($request->size_label);
        $validatedFields['add_on_main_cost']    = json_encode($request->main_cost);
        $validatedFields['add_on_tab_cost']     = json_encode($request->tab_cost);
        $validatedFields['add_on_size_cost']    = json_encode($request->size_cost);
        $validatedFields['needle']              = json_encode($request->needle);
        
        return $validatedFields;
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
