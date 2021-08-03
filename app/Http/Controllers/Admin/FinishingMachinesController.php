<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinishingMachineMaster;
use App\Http\Requests\Admin\FinishingMachineRequest;

class FinishingMachinesController extends Controller
{
       public function index()
    {
        $finishingmachines = FinishingMachineMaster::orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
        return view("finishingmachines.index", compact("finishingmachines"));
    }


    public function create()
    {   
        return view("finishingmachines.create");
    }
   
    public function store(FinishingMachineRequest $request)
    {

        $user = FinishingMachineMaster::create($request->all());

        return redirect()
        ->route("finishingmachines.index")
        ->with("success", "finishingmachine created successfully.");
    } 
    
    
    public function edit(FinishingMachineMaster $finishingmachine)
    {   
        
        $colour = FinishingMachineMaster::where('id',$finishingmachine->id)->first();
        return view("finishingmachines.edit", compact("finishingmachine"));
    }


    public function update(FinishingMachineRequest $request, FinishingMachineMaster $finishingmachine)
    {
        $finishingmachine->update($request->all());

        return redirect()
        ->route("finishingmachines.index")
        ->with("success", "finishingmachine updated successfully.");
    }
    
    public function show($finishingmachine)
    {
        $finishingmachine = FinishingMachineMaster::findOrFail($finishingmachine);
        return view("finishingmachines.show", compact("finishingmachine"));
    }


    public function destroy(FinishingMachineMaster $finishingmachine)
    {
        $finishingmachine->delete(); 
        return redirect()
        ->route("finishingmachines.index")
        ->with("success", "finishingmachine deleted successfully.");
    }
}
