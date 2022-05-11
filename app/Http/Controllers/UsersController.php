<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::withTrashed()->with(['family:id,name','tithe:user_id,date,amount','seed:user_id,date,amount'])->get();

        return response()->json($users);
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
    public function store(StoreUserRequest $request) {
        logger('working');
        logger($request->all());
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'residence' => $request->residence,
            'family_id' => $request->family_id,
            'ministry' => $request->ministry,
            'phone_number' => $request->phone_number,
            'profession' => $request->profession,
            'marital_status' => $request->marital_status,
            'email' => $request->email
        ]);
           
        return response()->json([
            'message' => 'You have successfully added a new member.',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withTrashed()->with(['family:id,name','tithe:user_id,date,amount','seed:user_id,date,amount'])->findOrfail($id);
        
        return response()->json($user);
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
    public function update(UpdateUserRequest $request, $id) {
        $user = User::findOrFail($id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'residence' => $request->residence,
            'family_id' => $request->family_id,
            'family' => $request->family,
            'ministry' => $request->ministry,
            'phone_number' => $request->phone_number,
            'profession' => $request->profession,
            'marital_status' => $request->marital_status,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'Updated user successfully',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage temporarily.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Member Deleted Successfully',
            'data' => $deleteUser
        ]);
    }

    /** 
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $restoreUser = User::withTrashed()->findOrFail($id)->restore();

        return response()->json([
            'message' => 'Member Restored Successfully',
            'data' => $restoreUser
        ]);
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deleteUser = User::onlyTrashed()->findOrFail($id)->delete();

        return response()->json($deleteUser);
    }
}
