<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenditure;
use App\Http\Requests\Expenditure\StoreExpenditureRequest;
use App\Http\Requests\Expenditure\UpdateExpenditureRequest;

class ExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $expenditure = Expenditure::withTrashed()->get();

        return response()->json($expenditure);
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
    public function store(StoreExpenditureRequest $request) {
        $expenditure = Expenditure::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'type' => $request->type,
            'comments' => $request->comments
        ]);
        
        return response()->json($expenditure);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenditure = Expenditure::withTrashed()->findOrfail($id);
        
        return response()->json($expenditure);
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
    public function update(UpdateExpenditureRequest $request, $id) {
        $expenditure = Expenditure::findOrFail($id)->update([
            'date' => $request->date,
            'amount' => $request->amount,
            'type' => $request->type,
            'comments' => $request->comments
        ]);

        return response()->json($expenditure);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyExpenditure = Expenditure::findOrFail($id)->delete();

        return response()->json($destroyExpenditure);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreExpenditure = Expenditure::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreExpenditure);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteExpenditure = Expenditure::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteExpenditure);
    }
}

