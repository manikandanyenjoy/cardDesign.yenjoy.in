<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuyerRequest;
use App\Models\Buyer;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = Buyer::with("location")
            ->desc()
            ->paginate(config("motorTraders.paginate.perPage"));
        return view("buyers.index", compact("buyers"));
    }

    public function create()
    {
        return view("buyers.create");
    }

    public function store(BuyerRequest $request)
    {
        Buyer::create($request->validated());

        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer created successfully.");
    }

    public function edit(Buyer $buyer)
    {
        return view("buyers.edit", compact("buyer"));
    }

    public function update(BuyerRequest $request, Buyer $buyer)
    {
        $buyer->update($request->validated());

        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer updated successfully");
    }

    public function show($buyer)
    {
        $buyer = Buyer::with(["location"])->findOrFail($buyer);
        return view("buyers.show", compact("buyer"));
    }

    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect()
            ->route("buyers.index")
            ->with("success", "Buyer deleted successfully");
    }
}
