<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\YarnMaster;
use App\Http\Requests\Admin\YarnRequest;

class YarnController extends Controller
{
    public function index()
    {
        $yarns = YarnMaster::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("yarns.index", compact("yarns"));
    }


    public function create()
    {   
        $editYarn = "";
        return view("yarns.create",compact('editYarn'));
    }
   
    public function store(YarnRequest $request)
    {

        $user = YarnMaster::create($request->validated());

        return redirect()
        ->route("yarns.index")
        ->with("success", "yarn created successfully.");
    } 
    
    
    public function edit(YarnMaster $yarn)
    {   
        $editYarn = YarnMaster::where('id',$yarn->id)->first();
        return view("yarns.create",compact('editYarn'));
    }


    public function update(YarnRequest $request, YarnMaster $yarn)
    {
        $yarn->update($request->validated());

        return redirect()
        ->route("yarns.index")
        ->with("success", "yarn updated successfully.");
    }
    
    public function show($yarn)
    {
        $yarn = YarnMaster::findOrFail($yarn);
        return view("yarns.show", compact("yarn"));
    }


    public function destroy(YarnMaster $yarn)
    {
        $yarn->delete(); 
        return redirect()
        ->route("yarns.index")
        ->with("success", "yarn deleted successfully.");
    }
}
