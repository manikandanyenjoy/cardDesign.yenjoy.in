<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarpMaster;
use App\Http\Requests\Admin\WarpRequest;


class WarpController extends Controller
{
    
    public function index()
    {
        $warps = WarpMaster::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("warps.index", compact("warps"));
    }


    public function create()
    {   
        return view("warps.create");
    }
   
    public function store(WarpRequest $request)
    {

        $user = WarpMaster::create($request->all());

        return redirect()
        ->route("warps.index")
        ->with("success", "Colour created successfully.");
    } 
    
    
    public function edit(WarpMaster $warp)
    {   
        
        $colour = WarpMaster::where('id',$warp->id)->first();
        return view("warps.edit", compact("warp"));
    }


    public function update(WarpRequest $request, WarpMaster $warp)
    {
        $warp->update($request->all());

        return redirect()
        ->route("warps.index")
        ->with("success", "Colour updated successfully.");
    }
    
    public function show($warp)
    {
        $warp = WarpMaster::findOrFail($warp);
        return view("warps.show", compact("warp"));
    }


    public function destroy(WarpMaster $warp)
    {
        $warp->delete(); 
        return redirect()
        ->route("warps.index")
        ->with("success", "Colour deleted successfully.");
    }

}
