<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;



class UsersController extends Controller
{
    

    public function index()
    { 
        
        $users = Users::all();
        $users = DB::table('users')
                ->join('emp_status', 'emp_status.emp_status_id', '=', 'users.status_id')
                ->join('designations', 'designations.designation_id', '=', 'users.designation')
                ->select('users.*','emp_status.*','designations.*')
                ->orderBy('users.updated_at','DESC')
                ->get();
		return response()->json($users);
}

    /**
     * Show the form for creating a new resource.
     * 
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
            //'name' => $request->get('name'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'date_of_birth' => $request->get('date_of_birth'),
            'pan_no' => $request->get('pan_no'),
            'qualification' => $request->get('qualification'),
            'marital_status' => $request->get('marital_status'),
            'joining_date' => $request->get('joining_date'),
            'experience_in_year' => $request->get('experience_in_year'),
            'last_package' => $request->get('last_package'),
			'designation' => $request->get('designation'),
            'remember_token' => $request->get('remember_token'),
            'permanant_address' => $request->get('permanant_address'),
            'current_address' => $request->get('current_address'),
            'home_contactno' => $request->get('home_contactno'),
            'resignation_date' => $request->get('resignation_date'),
            'status_id' => $request->get('status_id'),
            'experience_in_months' => $request->get('experience_in_months'),
            'privious_company_contactname' => $request->get('privious_company_contactname'),
            'privious_company_contact' => $request->get('privious_company_contact'),
            'source' => $request->get('source'),
            'source_by' => $request->get('source_by'),
            'remark_by_HR' => $request->get('remark_by_HR'),
            'api_token' => $request->get('api_token'),

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
    
        //dd($token);

        $request->validate([
			'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            //'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'date_of_birth' => 'required',
            'pan_no' => 'required',
            'qualification' => 'required',
            'marital_status' => 'required',
            'joining_date' => 'required',
            'experience_in_year' => 'required',
            'last_package' => 'required',
			'designation' => 'required',
            'remember_token' => 'required',
            'permanant_address' => 'required',
            'current_address' => 'required',
            'home_contactno' => 'required',
            'resignation_date' => 'required',
            'status_id' => 'required',
            'experience_in_months' => 'required',
            'privious_company_contactname' => 'required',
            'privious_company_contact' => 'required',
            'source' => 'required',
            'source_by' => 'required',
            'remark_by_HR' => 'required',
            'api_token' => ''
		]);

		$newUsers = new Users([
			'firstname' => $request->get('firstname'),
            'middlename' => $request->get('middlename'),
            'lastname' => $request->get('lastname'),
            'mobile_no' => $request->get('mobile_no'),
            'email' => $request->get('email'),
            //'name' => $request->get('name'),
            'password' => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'date_of_birth' => $request->get('date_of_birth'),
            'pan_no' => $request->get('pan_no'),
            'qualification' => $request->get('qualification'),
            'marital_status' => $request->get('marital_status'),
            'joining_date' => $request->get('joining_date'),
            'experience_in_year' => $request->get('experience_in_year'),
            'last_package' => $request->get('last_package'),
			'designation' => $request->get('designation'),
            'remember_token' => $request->get('remember_token'),
            'permanant_address' => $request->get('permanant_address'),
            'current_address' => $request->get('current_address'),
            'home_contactno' => $request->get('home_contactno'),
            'resignation_date' => $request->get('resignation_date'),
            'status_id' => $request->get('status_id'),
            'experience_in_months' => $request->get('experience_in_months'),
            'privious_company_contactname' => $request->get('privious_company_contactname'),
            'privious_company_contact' => $request->get('privious_company_contact'),
            'source' => $request->get('source'),
            'source_by' => $request->get('source_by'),
            'remark_by_HR' => $request->get('remark_by_HR'),
            'api_token' =>$request->get('api_token'),
           

            
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
    public function show($user_id)
    {
        // $users = Users::findOrFail($user_id);
		// return response()->json($users);
        if(is_numeric($user_id)){
            $users = users::findOrFail($user_id);
            return response()->json($users);
        }else{
            $users = DB::table('users')->where('email','=',$user_id)->get();
		   return response()->json($users);
        }


    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
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
    public function update(Request $request, $user_id)
    {
        $users = Users::findOrFail($user_id);
		
		$users = Users::find($user_id);
        $users->update($request->all());
        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $users = Users::findOrFail($user_id);
		$users->delete();

		return response()->json($users::all());
    }

    public function getUser($id){
        $data=DB::table('users')->where('user_id',$id)->get();
        return $data;
    }
    public function getUserActive(){
        $data=DB::table('users')->where('status_id',1)->get();
        return $data;
    }


    function updatedateteam(Request $request){
      $resignation_date = $request->get('resignation_date');
      $user_id = $request->get('user_id');
    //   dd($resignation_date, $user_id);
      $temsdateupdate = DB::table('teamdetails')
                        ->where('user_id',$user_id)
                        ->update(['to_date'=> $resignation_date]);
                       

    return response()->json($temsdateupdate);
    
    }
  
 
}
