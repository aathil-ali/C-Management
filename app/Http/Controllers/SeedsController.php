<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seed;
use App\Http\Requests\Seeds\StoreSeedRequest;
use App\Http\Requests\Seeds\UpdateSeedRequest;

class SeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seeds = Seed::withTrashed()->with(['user:id,name'])->get();

        return response()->json($seeds);
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
    public function store(StoreSeedRequest $request) {
        $seed = Seed::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'user_id' => $request->user_id,
            'comments' => $request->comments
        ]);
        
        return response()->json([
            'message' => 'Seed recorded successfully',
            'data' => $seed
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
        $seed = Seed::withTrashed()->with(['user:id,name'])->findOrfail($id);
        
        return response()->json($seed);
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
    public function update(UpdateSeedRequest $request, $id) {
        $seed = Seed::findOrFail($id)->update([
            'date' => $request->date,
            'amount' => $request->amount,
            'user_id' => $request->user->user_id,
            'comments' => $request->comments
        ]);

        return response()->json($seed);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroySeed = Seed::findOrFail($id)->delete();

        return response()->json($destroySeed);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreSeed = Seed::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreSeed);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteSeed = Seed::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteSeed);
    }
}

