<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Http\Requests\Visitors\StoreVisitorRequest;
use App\Http\Requests\Visitors\UpdateVisitorRequest;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitors = Visitor::withTrashed()->get();

        return response()->json($visitors);
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
    public function store(StoreVisitorRequest $request) {
        $visitor = Visitor::create([
            'date' => $request->date,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'purpose_of_visit' => $request->purpose_of_visit,
            'comments' => $request->comments
        ]);
            
        return response()->json([
            'message' => 'Visitor added successfully',
            'data' => $visitor
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
        $visitor = Visitor::withTrashed()->findOrfail($id);
        
        return response()->json($visitor);
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
    public function update(UpdateVisitorRequest $request, $id) {
        $visitor = Visitor::findOrFail($id)->update([
            'date' => $request->date,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'purpose_of_visit' => $request->purpose_of_visit,
            'comments' => $request->comments
        ]);

        return response()->json($visitor);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyVisitor = Visitor::findOrFail($id)->delete();

        return response()->json($destroyVisitor);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreVisitor = Visitor::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreVisitor);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteVisitor = Visitor::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteVisitor);
    }
}

