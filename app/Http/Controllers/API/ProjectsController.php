<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::all();

        $projects = DB::table('projects')
                        ->leftJoin('debtor_company_det','debtor_company_det.debtor_company_det_id','=','projects.company_id')
                        ->orderBy('projects.updated_at','DESC')
                        ->where('projects.boolean_value','1')
                        ->get();
		return response()->json($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newProjects = new Projects([
			'project_name' => $request->get('project_name'),
			'rera' => $request->get('rera'),
            'location' => $request->get('location'),
            'region_id' => $request->get('reagion_id'),
            'subregion_id' => $request->get('subregion_id'),
            'company_id' => $request->get('company_id'),
            'profile_score' => $request->get('profile_score')
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
			'project_name' => 'required|unique:projects,project_name',
			'rera' => '',
            'location' => '',
            'region_id' => 'required',
            'subregion_id' => 'required',
            'company_id' => '',
            'profile_score'
		]);

		$newProjects = new Projects([
			'project_name' => $request->get('project_name'),
            'rera' => $request->get('rera'),
            'location' => $request->get('location'),
            'region_id' => $request->get('region_id'),
            'subregion_id' => $request->get('subregion_id'),
			'company_id' => $request->get('company_id'),
            'profile_score' => $request->get('profile_score')
		]);

		$newProjects->save();

		return response()->json($newProjects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        $projects = Projects::findOrFail($project_id) ;
		return response()->json($projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
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
    public function update(Request $request, $project_id)
    {
		$projects = Projects::findOrFail($project_id);
		
		$projects = Projects::find($project_id);
        $projects->update($request->all());
        return $projects;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        $projects = Projects::findOrFail($project_id);

        $projects = Projects::find($project_id);
        if ($projects) {
            $projects->boolean_value = 0;
            $projects->save();
            return $projects;
        }

    }
	
}
