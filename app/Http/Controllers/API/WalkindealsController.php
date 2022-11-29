<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Walkindeals;
//use DB   
use Illuminate\Support\Facades\DB;;

class WalkindealsController extends Controller
{
    public function index()
    {
        $Walkindeals = Walkindeals::all();
		return response()->json($Walkindeals);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$WalkindealsData = $Walkindeals->getWalkindeals($request->email);




        $newWalkindeals = new Walkindeals([
			'id' => $request->get('id'),
            'date' => $request->get('date'),
            'client_name' => $request->get('client_name'),
            'project_id' => $request->get('project_id'),
            'sourcing_emp_id' => $request->get('sourcing_emp_id'),
            'closing_emp_id' => $request->get('closing_emp_id'),
            'team_id' => $request->get('team_id'),
            'team_leader_id' => $request->get('team_leader_id'),
            'revisit' => $request->get('revisit'),
            'videopresentation' => $request->get('videopresentation'),
            'leadsource_id' => $request->get('leadsource_id'),
            'remark' => $request->get('remark'),
            'presentwithclient' => $request->get('presentwithclient'),
            'closingtisite' => $request->get('closingtisite')
            
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
			'id' => '',
            'date' => '',
            'client_name' => '',
            'project_id' => '',
            'sourcing_emp_id' => '',
            'closing_emp_id' => '',
            'team_id' => '',
            'team_leader_id' => '',
            'revisit' => '',
            'videopresentation' => '',
            'leadsource_id' => '',
            'remark' => '',
            'presentwithclient' => '',
            'closingtisite' => ''
		]);

		$newWalkindeals = new Walkindeals([
			'id' => $request->get('id'),
            'date' => $request->get('date'),
            'client_name' => $request->get('client_name'),
            'project_id' => $request->get('project_id'),
            'sourcing_emp_id' => $request->get('sourcing_emp_id'),
            'closing_emp_id' => $request->get('closing_emp_id'),
            'team_id' => $request->get('team_id'),
            'team_leader_id' => $request->get('team_leader_id'),
            'revisit' => $request->get('revisit'),
            'videopresentation' => $request->get('videopresentation'),
            'leadsource_id' => $request->get('leadsource_id'),
            'remark' => $request->get('remark'),
            'presentwithclient' => $request->get('presentwithclient'),
            'closingtisite' => $request->get('closingtisite')
		]);

		$newWalkindeals->save();

		return response()->json($newWalkindeals);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Walkindeals = Walkindeals::findOrFail($id);
		return response()->json($Walkindeals);
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
        $Walkindeals = Walkindeals::findOrFail($id);
		
		$Walkindeals = Walkindeals::find($id);
        $Walkindeals->update($request->all());
        return $Walkindeals;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Walkindeals = Walkindeals::findOrFail($id);
		$Walkindeals->delete();

		return response()->json($Walkindeals::all());
    }


    public function getteamdetails1(Request $request){
        $team_leader_name = $request->get('team_leader_name');

        $data=DB::table('teamdetails') 
        ->join('users','users.user_id','=','teamdetails.user_id')
        ->join('salary_package','salary_package.user_id','=','teamdetails.user_id')
        ->select('teamdetails.*','users.firstname','users.lastname','salary_package.monthly_salary')
        ->where('team_leader_name',$team_leader_name)
        ->get();
        return response()->json($data);
    }

    public function getuserdetails(){
        // $sourcing_emp_id_emp_id = $request->get('sourcing_emp_id_emp_id');

        $data=DB::table('users')
        ->select('users.firstname','users.middlename','users.lastname','users.designation','users.user_id','users.emp_code')
        ->where('designation','=' ,'9')
        ->get();
        return response()->json($data);

    }

    public function getwalkinlist($team_leader_name){
        // dd($team_leader_name);

        $data=DB::table('walkin_deals')
       
        ->join('users', 'users.user_id','=','walkin_deals.sourcing_emp_id')
        // ->join('walkin_deals', 'walkin_deals.closing_emp_id','=','users.user_id')
        // ->join('clientdetails', 'clientdetails.client_id','=','walkin_deals.client_id')
        ->join('projects', 'projects.project_id','=','walkin_deals.project_id')
        ->join('teams', 'teams.team_id','=','walkin_deals.team_id' )
        ->join('team_leaders','team_leaders.team_leader_id','=','walkin_deals.team_leader_id')
        ->join('leadsource','leadsource.leadsource_id','=','walkin_deals.leadsource_id')
        ->select('walkin_deals.*','projects.project_name', 'teams.teamname', 'team_leaders.team_leader_name' , 'leadsource.leadsource' , 'users.firstname', 'users.lastname')
        ->where('team_leaders.team_leader_name',$team_leader_name)
        ->get();
        return response()->json($data);
       
    }


    public function getdata($user_id){
        // dd($team_leader_name);

        $data=DB::table('walkin_deals')
       
        ->join('users', 'users.user_id','=','walkin_deals.sourcing_emp_id')
        // ->join('walkin_deals', 'walkin_deals.closing_emp_id','=','users.user_id')
        // ->join('clientdetails', 'clientdetails.client_id','=','walkin_deals.client_id')
        ->join('projects', 'projects.project_id','=','walkin_deals.project_id')
        ->join('teams', 'teams.team_id','=','walkin_deals.team_id' )
        ->join('team_leaders','team_leaders.team_leader_id','=','walkin_deals.team_leader_id')
        ->join('leadsource','leadsource.leadsource_id','=','walkin_deals.leadsource_id')
        ->select('walkin_deals.*', 'projects.project_name', 'teams.teamname', 'team_leaders.team_leader_name' , 'leadsource.leadsource' , 'users.firstname', 'users.lastname')
        ->where('users.user_id',$user_id)
        ->get();
        return response()->json($data);
       
    }

    public function getclemp($user_id){
        // dd($team_leader_name);

        $data=DB::table('walkin_deals')
       
        ->join('users', 'users.user_id','=','walkin_deals.closing_emp_id')
        // ->join('walkin_deals', 'walkin_deals.closing_emp_id','=','users.user_id')
        // ->join('clientdetails', 'clientdetails.client_id','=','walkin_deals.client_id')
        ->join('projects', 'projects.project_id','=','walkin_deals.project_id')
        ->join('teams', 'teams.team_id','=','walkin_deals.team_id' )
        ->join('team_leaders','team_leaders.team_leader_id','=','walkin_deals.team_leader_id')
        ->join('leadsource','leadsource.leadsource_id','=','walkin_deals.leadsource_id')
        ->select('walkin_deals.*', 'projects.project_name', 'teams.teamname', 'team_leaders.team_leader_name' , 'leadsource.leadsource' , 'users.firstname', 'users.lastname')
        ->where('users.user_id',$user_id)
        ->get();
        return response()->json($data);
       
    }

    public function getuserid(){


        $data=DB::table('users')

        ->select('users.firstname', 'users.lastname','salesdetails.*')
        ->join('salesdetails', 'salesdetails.sourcing_emp_id', '=', 'users.user_id' )

        ->get();
        return response()->json($data);
    }


    public function getdeals(){

        $data=DB::table('users')

        ->select('users.firstname', 'users.lastname','deals_details.*')
        ->join('deals_details', 'deals_details.user_id', '=', 'users.user_id' )

        ->get();
        return response()->json($data); 

    }


    // DB::table('users')
    // ->select('users.id','users.name','profiles.photo')
    // ->join('profiles','profiles.id','=','users.id')
    // ->where(['something' => 'something', 'otherThing' => 'otherThing'])
    // ->get();


    public function filterdata(Request $request){

        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $user_id = $request->get('user_id');
        
        if($user_id == null  && $user_id == ""){
            $data = DB::table('walkin_deals')
            ->join('users', 'walkin_deals.sourcing_emp_id', '=', 'users.user_id')
            ->select('walkin_deals.*','users.firstname','users.lastname')
            ->where('walkin_deals.date','>=',$from_date)
            ->where('walkin_deals.date','<=',$to_date)
            ->get();  
        }else{
        $data = DB::table('walkin_deals')
        ->join('users', 'walkin_deals.sourcing_emp_id', '=', 'users.user_id')
        ->select('walkin_deals.*','users.firstname','users.lastname')
        ->where('walkin_deals.user_id',$user_id)
       ->where('walkin_deals.date','>=',$from_date)
        ->where('walkin_deals.date','<=',$to_date)
        ->get();
        }
        return response()->json($data);

    }


}
