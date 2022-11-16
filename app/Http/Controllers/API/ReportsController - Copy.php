<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Teams;
use App\Models\Reports;

class ReportsController extends Controller

{
    public function index()
    {
        $reports = Reports::all();
        $reports = DB::table('report1')
                        ->join('teams', 'teams.team_id', '=', 'report1.team_id')
                        ->join('projects', 'projects.project_id', '=', 'report1.project_id')
                        ->join('subprojects', 'subprojects.subproject_id', '=', 'report1.subproject_id')
                        ->join('clientdetails', 'clientdetails.client_id', '=', 'report1.client_id')
                        ->join('salesdetails', 'salesdetails.booking_date', '=', 'report1.booking_date')
                        ->join('booking_status', 'booking_status.deal_status_id', '=', 'report1.deal_status_id')
                        ->select('teams.teamname','projects.project_name','subprojects.subproject_name','clientdetails.name','salesdetails.booking_date','booking_status.status')
                        ->get();
		return response()->json($reports);
    }

    public function store(Request $request)
    {
		$newReports = new Reports([
			//'slug' => $request->get('slug'),
			//'teamname' => $request->get('teamname')
            'team_id' => $request->get('team_id'),
            'project_id' => $request->get('project_id'),
            'subproject_id' => $request->get('subproject_id'),
            'client_id' => $request->get('client_id'),
            'booking_date' => $request->get('booking_date'),
            'deal_status_id' => $request->get('deal_status_id')
		]);

		$newReports->save();

		return response()->json($newReports);
    }


}
