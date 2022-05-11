<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offering;
use App\Http\Requests\Offerings\StoreOfferingRequest;
use App\Http\Requests\Offerings\UpdateOfferingRequest;

class OfferingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offerings = Offering::withTrashed()->get();

        return response()->json($offerings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferingRequest $request) {
        $offering = Offering::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'type' => $request->type,
            'comments' => $request->comments
        ]);
        
        return response()->json($offering);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offering = Offering::withTrashed()->findOrfail($id);
        
        return response()->json($offering);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferingRequest $request, $id) {
        $offering = Offering::findOrFail($id)->update([
            'date' => $request->date,
            'amount' => $request->amount,
            'type' => $request->type,
            'comments' => $request->comments
        ]);

        return response()->json($offering);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyOffering = Offering::findOrFail($id)->delete();

        return response()->json($destroyOffering);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreOffering = Offering::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreOffering);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteOffering = Offering::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteOffering);
    }
}

