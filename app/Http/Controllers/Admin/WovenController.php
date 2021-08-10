<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Woven;
use App\Http\Requests\Admin\WovenRequest;

class WovenController extends Controller
{
    public function index()
    {
        $wovens = Woven::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("woven.index", compact("wovens"));
    }


    public function create()
    {   
        return view("woven.create");
    }
   
    public function store(WovenRequest $request)
    {
      

        try {
            $validatedFields = $request->validated();
            unset($validatedFields["image"]);

            $user = Woven::create($request->all());

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
    
    
    public function edit(Woven $woven)
    {   
        
        $colour = Woven::where('id',$woven->id)->first();
        return view("woven.edit", compact("fold"));
    }


    public function update(WovenRequest $request, FoldMaster $fold)
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
        $woven = Woven::findOrFail($woven);
        return view("woven.show", compact("$woven"));
    }


    public function destroy(Woven $woven)
    {
        $woven->delete(); 
        return redirect()
        ->route("woven.index")
        ->with("success", "Design card deleted successfully.");
    }
}
