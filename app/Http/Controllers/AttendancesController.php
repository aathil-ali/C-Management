<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Http\Requests\Attendance\UpdateAttendanceRequest;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attendances = Attendance::withTrashed()->get();

        return response()->json($attendances);
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
    public function store(StoreAttendanceRequest $request) {
        $attendance = Attendance::create([
            'date' => $request->date,
            'men' => $request->men,
            'women' => $request->women,
            'children' => $request->children,
            'visitors' => $request->visitors,
            'comments' => $request->comments
        ]);
            
        return response()->json($attendance);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::withTrashed()->findOrfail($id);
        
        return response()->json([
            "message" => "success",
            "body" => $attendance
        ]);
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
    public function update(UpdateAttendanceRequest $request, $id) {
        $attendance = Attendance::findOrFail($id)->update([
            'date' => $request->date,
            'men' => $request->men,
            'women' => $request->women,
            'children' => $request->children,
            'visitors' => $request->visitors,
            'comments' => $request->comments
        ]);

        return response()->json($attendance);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyAttendance = Attendance::findOrFail($id)->delete();

        return response()->json($destroyAttendance);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreAttendance = Attendance::withTrashed()->findOrFail($id)->restore();

        return response()->json($restoreAttendance);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteAttendance = Attendance::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteAttendance);
    }
}

