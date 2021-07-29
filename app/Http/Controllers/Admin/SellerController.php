<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SellerRequest;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::with(["location", "subscriptionPlan"])
            ->desc()
            ->paginate(config("motorTraders.paginate.perPage"));
        return view("sellers.index", compact("sellers"));
    }

    public function create()
    {
        return view("sellers.create");
    }

    public function store(SellerRequest $request)
    {
        Seller::create($request->validated());

        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller created successfully.");
    }

    public function edit(Seller $seller)
    {
        return view("sellers.edit", compact("seller"));
    }

    public function update(SellerRequest $request, Seller $seller)
    {
        $seller->update($request->validated());

        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller updated successfully");
    }

    public function show($seller)
    {
        $seller = Seller::with(["location", "subscriptionPlan"])->findOrFail(
            $seller
        );
        return view("sellers.show", compact("seller"));
    }

    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()
            ->route("sellers.index")
            ->with("success", "Seller deleted successfully");
    }
}
