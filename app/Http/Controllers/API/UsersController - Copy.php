<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;



class UsersController extends Controller
{
    

    public function index()
    {
        $users = Users::all();
		return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$UsersData = $Users->getUsers($request->email);




        $newUsers = new Users([
			'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'mobile_no' => $request->get('mobile_no'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'date_of_birth' => $request->get('date_of_birth'),
            'pan_no' => $request->get('pan_no'),
            'qualification' => $request->get('qualification'),
            'marital_status' => $request->get('marital_status'),
            'joining_date' => $request->get('joining_date'),
            'experience_in_year' => $request->get('experience_in_year'),
            'last_package' => $request->get('last_package'),
			'designation' => $request->get('designation')
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'date_of_birth' => 'required',
            'pan_no' => 'required',
            'qualification' => 'required',
            'marital_status' => 'required',
            'joining_date' => 'required',
            'experience_in_year' => 'required',
            'last_package' => 'required',
			'designation' => 'required'
		]);

		$newUsers = new Users([
			'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'mobile_no' => $request->get('mobile_no'),
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'date_of_birth' => $request->get('date_of_birth'),
            'pan_no' => $request->get('pan_no'),
            'qualification' => $request->get('qualification'),
            'marital_status' => $request->get('marital_status'),
            'joining_date' => $request->get('joining_date'),
            'experience_in_year' => $request->get('experience_in_year'),
            'last_package' => $request->get('last_package'),
			'designation' => $request->get('designation')
		]);

		$newUsers->save();

		//return response()->json($newUsers);

        return redirect('/form/Userslist')->with('message','Success! You have added data successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Users::findOrFail($id);
		return response()->json($users);
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
    public function update(Request $request, $id)
    {
        $users = Users::findOrFail($id);
		
		$users = Users::find($id);
        $users->update($request->all());
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::findOrFail($id);
		$users->delete();

		return response()->json($users::all());
    }
}
