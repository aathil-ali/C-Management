<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tithe;
use App\Http\Requests\Tithes\StoreTitheRequest;
use App\Http\Requests\Tithes\UpdateTitheRequest;

class TithesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tithes = Tithe::withTrashed()->with(['user:id,name'])->get();

        return response()->json($tithes);
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
    public function store(StoreTitheRequest $request) {
        $tithe = Tithe::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'comments' => $request->comments
        ]);
        
        return response()->json([
            'message' => 'Tithe recorded successfully',
            'data' => $tithe
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tithe = Tithe::withTrashed()->with(['user:id,name'])->findOrfail($id);
        
        return response()->json($tithe);
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
    public function update(UpdateTitheRequest $request, $id) {
        $tithe = Tithe::findOrFail($id)->update([
            'date' => $request->date,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'comments' => $request->comments
        ]);

        return response()->json($tithe);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyTithe = Tithe::findOrFail($id)->delete();

        return response()->json($destroyTithe);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreTithe = Tithe::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreTithe);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteTithe = Tithe::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteTithe);
    }
}

