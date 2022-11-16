<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teamdetails;

class TeamdetailsController extends Controller
{
    public function index()
    {
        $teamdetails = Teamdetails::all();
        $teamdetails = DB::table('teamdetails')
                        ->join('users', 'users.user_id', '=', 'teamdetails.user_id')
                        ->join('teams', 'teams.team_id', '=', 'teamdetails.team_id')
                        ->join('team_status','team_status.team_status_id','=','teamdetails.status')
                        ->join('designations','designations.designation_id','=','teamdetails.designation_id')
                        ->select('users.firstname','users.middlename','users.lastname', 'teams.teamname', 'team_status.teamstatus','designations.designation','teamdetails.*')
                        ->orderBy('teamdetails.updated_at', 'DESC')
                        ->get();
		return response()->json($teamdetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTeamdetails = new Teamdetails([
			
			'user_id' => $request->get('user_id'),
            'team_id' => $request->get('team_id'),
            'designation_id' => $request->get('designation_id'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'status' => $request->get('status'),
            'team_leader_name' => $request->get('team_leader_name')
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
		
			'user_id' => 'required',
            'team_id' => 'required',
            'designation_id' => 'required',
            'from_date' => 'required',
            'status' => 'required',
            'team_leader_name' => 'required',
		]);

		$newTeamdetails = new Teamdetails([
		
			'user_id' => $request->get('user_id'),
            'team_id' => $request->get('team_id'),
            'designation_id' => $request->get('designation_id'),
            'from_date' => $request->get('from_date'),
            'status' => $request->get('status'),
            'team_leader_name' => $request->get('team_leader_name')

		]);

		$newTeamdetails->save();

		return response()->json($newTeamdetails);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($team_detail_id)
    {
        $teamdetails = Teamdetails::findOrFail($team_detail_id);
        return response()->json($teamdetails);


    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_detail_id)
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
    public function update(Request $request, $team_detail_id)
    {

        $teamdetails = Teamdetails::findOrFail($team_detail_id);
		
		$teamdetails = Teamdetails::find($team_detail_id);
        $teamdetails->update($request->all());
        return $teamdetails;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_detail_id)
    {
        $teamdetails = Teamdetails::findOrFail($team_detail_id);
		$teamdetails->delete();

		return response()->json($teamdetails::all());
    }
}
