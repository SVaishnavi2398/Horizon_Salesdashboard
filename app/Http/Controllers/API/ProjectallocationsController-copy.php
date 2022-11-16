<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projectallocations;
use DB;

class ProjectallocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projectallocations = Projectallocations::all();
		return response()->json($projectallocations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newRoles = new Projectallocations([
			'user_id' => $request->get('user_id'),
			'project_id' => $request->get('project_id'),
            'subproject_name' => $request->get('subproject_name')
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
			'project_id' => 'required',
            'subproject_name' => 'required'
		]);

		$newProjectallocations = new Projectallocations([
			'user_id' => $request->get('user_id'),
            'project_id' => $request->get('project_id'),
			'subproject_name' => $request->get('subproject_name')
		]);

		$newProjectallocations->save();

		return response()->json($newProjectallocations);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectallocations = Projectallocations::findOrFail($id);
		return response()->json($projectallocations);
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
        /* $roles = Roles::findOrFail($id);

		$request->validate([
			'slug' => 'slug',
			'name' => 'name'
		]);

		$roles->slug = $request->get('slug');
		$roles->name = $request->get('name');

		$roles->save();

		return response()->json($roles); */
		
		$projectallocations = Projectallocations::findOrFail($id);
		
		$projectallocations = Projectallocations::find($id);
        $projectallocations->update($request->all());
        return $projectallocations;
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectallocations = Projectallocations::findOrFail($id);
		$projectallocations->delete();

		return response()->json($projectallocations::all());
    }
}
