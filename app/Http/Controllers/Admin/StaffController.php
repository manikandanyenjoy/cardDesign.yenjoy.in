<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Admin\DesignerRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\Staf_master;
use App\Models\Role_master;
use App\Models\Staf_address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;

class StaffController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $editStaff = "";
        $roles     = Role_master::get();
        return view("staff.create",compact("roles","editStaff"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignerRequest $request)
    {   

        try {
            $validatedFields                       = $request->validated(); 
            $validatedFields['password']           = Hash::make($request->password);
            $user                                  = Staf_master::create($validatedFields);

            if ($request->hasFile("document_name")) {
                $file = $request->file("document_name");
               
                // if(Storage::disk('staffs_document')->makeDirectory("{$user->id}", 0777, true))
                if(File::makeDirectory("staffs_document", 0755, true))
                {
                    $filePath = $file->store("{$user->id}", [
                        "disk" => "staffs",
                    ]);
                }
            }

            if (isset($filePath)) {
                $user->update([
                    "document_name" => $filePath,
                ]);
            }

            switch($request->role_id) {
                case 1: 
                    return redirect()
                ->route("designers.index")
                ->with("success", "Designers created successfully.");
                break;
                case 2: 
                    return redirect()
                ->route("salesreps.index")
                ->with("success", "Sales Reps created successfully.");
                break;
                case 3: 
                    return redirect()
                ->route("printers.index")
                ->with("success", "Printers created successfully.");
                break;
                case 4: 
                    return redirect()
                ->route("finishers.index")
                ->with("success", "Finishers created successfully.");
                break;
                case 5: 
                    return redirect()
                ->route("loomoperators.index")
                ->with("success", "Loom Operators created successfully.");
                break;
                case 6: 
                    return redirect()
                ->route("finishingoperators.index")
                ->with("success", "Finishing Operators created successfully.");
                break;
                case 7: 
                    return redirect()
                ->route("qualitycheckers.index")
                ->with("success", "Qualitycheckers created successfully.");
                break;
            }


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staf_master $staff)
    { 
        $editStaff = $staff;
        $roles = Role_master::get();
        return view("staff.create", compact("editStaff","roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignerRequest $request, Staf_master $staff)
    {
       
        try {
            $validatedFields                       = $request->validated(); 
            if($request->password != "" && $request->password != null)
            {
                $validatedFields['password']       = Hash::make($request->password);
            }
            else
            {
                unset($validatedFields['password']);
            }
            
            $staff->update($validatedFields);

            if ($request->hasFile("document_name")) {
                $file = $request->file("document_name");
                // if(Storage::disk('staffs_document')->makeDirectory("{$staff->id}", 0755, true))
                if(File::makeDirectory("staffs_document", 0755, true))
                {
                    $filePath = $file->store("{$staff->id}", [
                        "disk" => "staffs",
                    ]);
                }
            }

            if (isset($filePath)) {
                $staff->update([
                    "document_name" => $filePath,
                ]);
            }

            switch($request->role_id) {
                case 1: 
                    return redirect()
                ->route("designers.index")
                ->with("success", "Designers created successfully.");
                break;
                case 2: 
                    return redirect()
                ->route("salesreps.index")
                ->with("success", "Sales Reps created successfully.");
                break;
                case 3: 
                    return redirect()
                ->route("printers.index")
                ->with("success", "Printers created successfully.");
                break;
                case 4: 
                    return redirect()
                ->route("finishers.index")
                ->with("success", "Finishers created successfully.");
                break;
                case 5: 
                    return redirect()
                ->route("loomoperators.index")
                ->with("success", "Loom Operators created successfully.");
                break;
                case 6: 
                    return redirect()
                ->route("finishingoperators.index")
                ->with("success", "Finishing Operators created successfully.");
                break;
                case 7: 
                    return redirect()
                ->route("qualitycheckers.index")
                ->with("success", "Qualitycheckers created successfully.");
                break;
            }


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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staff)
    {
        $staff = Staf_master::withTrashed()->findOrFail($staff);
       
        return view("staff.show", compact("staff"));
    }
}
