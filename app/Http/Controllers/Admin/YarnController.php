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
        return view("yarns.create");
    }
   
    public function store(YarnRequest $request)
    {

        $user = YarnMaster::create($request->all());

        return redirect()
        ->route("yarns.index")
        ->with("success", "yarn created successfully.");
    } 
    
    
    public function edit(YarnMaster $yarn)
    {   
        
        $colour = YarnMaster::where('id',$yarn->id)->first();
        return view("yarns.edit", compact("yarn"));
    }


    public function update(YarnRequest $request, YarnMaster $yarn)
    {
        $yarn->update($request->all());

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
