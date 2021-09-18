<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WovenQuality;
use App\Http\Requests\Admin\WovenQualityRequest;
use DB;

class wovenQualityController extends Controller
{
    
    public function index(Request $request)
    {
         $master = new WovenQuality();
      
        if($request->search){
          $columnsToSearch = DB::getSchemaBuilder()->getColumnListing('woven_qualities');

          $searchQuery = '%' . $request->search . '%'; 

          foreach($columnsToSearch as $column) {
              $master = $master->orWhere($column, 'LIKE', $searchQuery);
          }
        }
      
        $wovenqualitys = $master->orderBy('created_at', 'DESC')
        ->paginate(config("motorTraders.paginate.perPage"));
       
       
        return view("wovenqualitys.index", compact("wovenqualitys"));
    }


    public function create()
    {   
        return view("wovenqualitys.create");
    }
   
    public function store(WovenQualityRequest $request)
    {

        $user = WovenQuality::create($request->all());

        return redirect()
        ->route("wovenqualitys.index")
        ->with("success", "WovenQuality created successfully.");
    } 
    
    
    public function edit(WovenQuality $wovenquality)
    {   
        
        $colour = WovenQuality::where('id',$wovenquality->id)->first();
        return view("wovenqualitys.edit", compact("wovenquality"));
    }


    public function update(WovenQualityRequest $request, WovenQuality $wovenquality)
    {
        $wovenquality->update($request->all());

        return redirect()
        ->route("wovenqualitys.index")
        ->with("success", "WovenQuality updated successfully.");
    }
    
    public function show($wovenquality)
    {
        $wovenquality = WovenQuality::findOrFail($wovenquality);
        return view("wovenqualitys.show", compact("wovenquality"));
    }


    public function destroy(WovenQuality $wovenquality)
    {
        $wovenquality->delete(); 
        return redirect()
        ->route("wovenqualitys.index")
        ->with("success", "WovenQuality deleted successfully.");
    }

}
