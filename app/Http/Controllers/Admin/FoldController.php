<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\FoldMaster;
use App\Http\Requests\Admin\FoldRequest;

class FoldController extends Controller
{
    public function index()
    {
        $folds = FoldMaster::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("folds.index", compact("folds"));
    }


    public function create()
    {   
        return view("folds.create");
    }
   
    public function store(FoldRequest $request)
    {
      

        try {
            $validatedFields = $request->validated();
            unset($validatedFields["image"]);

            $user = FoldMaster::create($request->all());

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
    
    
    public function edit(FoldMaster $fold)
    {   
        
        $colour = FoldMaster::where('id',$fold->id)->first();
        return view("folds.edit", compact("fold"));
    }


    public function update(FoldRequest $request, FoldMaster $fold)
    {

        try {
            $validatedFields = $request->validated();
            unset($validatedFields["image"]);

            $fold->update($request->all());

            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $filePath = $file->store("{$fold->id}/business_document", [
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
    
    public function show($fold)
    {
        $fold = FoldMaster::findOrFail($fold);
        return view("folds.show", compact("fold"));
    }


    public function destroy(FoldMaster $fold)
    {
        $fold->delete(); 
        return redirect()
        ->route("folds.index")
        ->with("success", "fold deleted successfully.");
    }
}
