<?php

namespace App\Http\Controllers\API;
//use DB   
use Illuminate\Support\Facades\DB;;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subprojects;

class SubprojectsController extends Controller
{
    public function index()
    {
        $subprojects = Subprojects::all();
        $subprojects = DB::table('subprojects')
                        ->join('projects', 'projects.project_id', '=', 'subprojects.project_id')
                        ->select('projects.project_name','subprojects.*')
                        ->where('subprojects.boolean_value', '1')
                        ->orderBy('subprojects.updated_at','DESC')
                        ->get();
      
		return response()->json($subprojects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newSubprojects = new Subprojects([
			'project_id' => $request->get('project_id'),
			'subproject_name' => $request->get('subproject_name'),
            'rera' => $request->get('rera')
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
		 	'project_id' => 'required',
		 	'subproject_name' => 'required|unique:subprojects,subproject_name',
            'rera' => ''
		]);

		$newSubprojects = new Subprojects([
			'project_id' => $request->get('project_id'),
			'subproject_name' => $request->get('subproject_name'),
            'rera' => $request->get('rera')
		]);

		$newSubprojects->save();

		return response()->json($newSubprojects);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subproject_id)
    {
        $subprojects = Subprojects::findOrFail($subproject_id);
		return response()->json($subprojects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subproject_id)
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
    public function update(Request $request, $subproject_id)
    {
		
		$subprojects = Subprojects::findOrFail($subproject_id);
		
		$subprojects = Subprojects::find($subproject_id);
        $subprojects->update($request->all());
        return $subprojects;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subproject_id)
    {
        $subprojects = Subprojects::findOrFail($subproject_id);

        $subprojects = Subprojects::find($subproject_id);
        if ($subprojects) {
            $subprojects->boolean_value = 0;
            $subprojects->save();
            return $subprojects;
        }

    }

    public function getSubproject($project_id){
        $subprojectsModel = new Subprojects();
        $data = $subprojectsModel->getState($project_id);
        return response()->json($data);
    }

}
