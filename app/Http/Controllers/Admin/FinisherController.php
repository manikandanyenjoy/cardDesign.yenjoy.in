<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\FinisherRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\Staf_master;
use App\Models\Role_master;
use App\Models\Staf_address;
use Illuminate\Support\Facades\Auth;
use DB;

class FinisherController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
      public function index(Request $request)
    {
        $staf = Staf_master::where('role_id',4);
      
        if($request->search){
          $columnsToSearch = DB::getSchemaBuilder()->getColumnListing('staf_masters');

          $searchQuery = '%' . $request->search . '%'; 

         $staf ->where(function ($query) use ($columnsToSearch,$searchQuery) {
            foreach($columnsToSearch as $column) {
                      $query = $query->orWhere($column, 'LIKE', $searchQuery);
                  }
			});
          
        }
      
        $finishers = $staf->orderBy('created_at', 'DESC')->withTrashed()->paginate(config("motorTraders.paginate.perPage"));
      
        /*$finishers = Staf_master::where('role_id',4)->orderBy('id', 'DESC')->withTrashed()->paginate(
            config("motorTraders.paginate.perPage")
        );*/

        return view("finisher.index", compact("finishers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $roles = Role_master::get();
        return view("finisher.create",compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinisherRequest $request)
    {
        $user = Staf_master::create($request->all());
       // print_r($user->id);exit;
        $result = Staf_address::Insert(array(
            'staf_id' => $user->id,
            'fullname' => $request->name,
            'flatno' => $request->flatno,
            'apartment' => $request->apartment,
            'landmark' => $request->landmark,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ));
       
        return redirect()
            ->route("finishers.index")
            ->with("success", "finishers created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($finisher)
    {
        $finisher = Staf_master::with('roleDetial')->withTrashed()->findOrFail($finisher);
        $address = Staf_address::where('staf_id',$finisher->id)->first();
        return view("finisher.show", compact("finisher","address"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staf_master $finisher)
    { 
        $address = Staf_address::where('staf_id',$finisher->id)->first();
        return view("finisher.edit", compact("finisher","address"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinisherRequest $request, Staf_master $finisher)
    {
        $finisher->update($request->all());
        
        $result = Staf_address::where('staf_id', $finisher->id)->update(array(
            'fullname' => $request->name,
            'flatno' => $request->flatno,
            'apartment' => $request->apartment,
            'landmark' => $request->landmark,
            'area' => $request->area,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'updated_at' => date('Y-m-d H:i:s')
        ));
        return redirect()
            ->route("finishers.index")
            ->with("success", "finishers updated successfully");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staf_master $finisher)
    {
        $finisher->delete(); 
        return redirect()
            ->route("finishers.index")
            ->with("success", "finishers deleted successfully");
    }
}
