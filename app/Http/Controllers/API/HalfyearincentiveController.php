<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halfyearincentive;
//use DB   
use Illuminate\Support\Facades\DB;;

class HalfyearincentiveController extends Controller
{
    public function index(){
        // $Halfyearincentive = Halfyearincentive::all();
		// return response()->json($Halfyearincentive);

        $Halfyearincentive = Halfyearincentive::all();
        $Halfyearincentive = DB::table('halfyear_incentive')
                        ->join('users', 'users.user_id', '=', 'halfyear_incentive.user_id')
                        ->select('users.firstname','users.middlename','users.lastname', 'halfyear_incentive.*')
                        ->get();
		return response()->json($Halfyearincentive);
    }

    public function create(Request $request)
    {
        $newHalfyearincentive = new Halfyearincentive([
			'halfsoucring_no' => $request->get('halfsoucring_no'),
			'halfsoucring_amt' => $request->get('halfsoucring_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);
    }

    public function store(Request $request)
    {
        $request->validate([
			'halfsoucring_no' => '',
			'halfsoucring_amt' => '',
            'from_date' => '',
            'to_date' => '',
            'user_id' =>'',
            'eligibility_ince'=>''
		]);

		$newHalfyearincentive = new Halfyearincentive([
			'halfsoucring_no' => $request->get('halfsoucring_no'),
			'halfsoucring_amt' => $request->get('halfsoucring_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);

		$newHalfyearincentive->save();

		return response()->json($newHalfyearincentive);
    }

    public function show($id)
    {
        $Halfyearincentive = Halfyearincentive::findOrFail($id) ;
		return response()->json($Halfyearincentive);
    }

    public function update(Request $request, $id)
    {
       
		$Halfyearincentive = Halfyearincentive::findOrFail($id);
		
		$Halfyearincentive = Halfyearincentive::find($id);
        $Halfyearincentive->update($request->all());
        return $Halfyearincentive;
		
    }

    public function destroy($id)
    {
        $Halfyearincentive = Halfyearincentive::findOrFail($id);
		$Halfyearincentive->delete();

		return response()->json($Halfyearincentive::all());
    }
    public function upCreHalfInce(Request $request){
        
        $newHalfyearincentive = Halfyearincentive::updateOrCreate(
  
        [   'user_id' => $request->get('user_id'),
            'from_date' =>  $request->get('from_date'),
            'to_date' =>  $request->get('to_date'),
        ],
          [
            'eligibility_ince' => $request->get('eligibility_ince')
            // 'halfsoucring_no' => $request->get('halfsoucring_no'),
			// 'halfsoucring_amt' => $request->get('halfsoucring_amt')
          ]
      );
      return response()->json($newHalfyearincentive);
    }
    public function updatehalfYear(Request $request){
        // dd($request->all());
        $Halfyearincentive = Halfyearincentive::
            where(['user_id' => $request->get('user_id'),
                    'from_date' =>  $request->get('from_date'),
                    'to_date' =>  $request->get('to_date')
            ])
            ->update([
                'eligibility_ince' => $request->get('eligibility_ince'),
                'halfsoucring_no' => $request->get('halfsoucring_no'),
			    'halfsoucring_amt' => $request->get('halfsoucring_amt')

            ]);
        return $Halfyearincentive;
    }
    public function SourcehalfyearData(Request $request){

        $half_from_date=$request->half_from_date;
        $half_to_date=$request->half_to_date;
        $half_user_id = $request->half_user_id;

        $data = DB::table('tbl_monthly_incentive')
        ->select(DB::raw('SUM(gi_no_of_sourcing) as leadcount'),DB::raw("SUM(business_value) as business_value"))
        ->where('user_id',$half_user_id)
        ->whereBetween('from_date', [$half_from_date, $half_to_date])
        ->get();
        return response()->json($data);
    }
    public function HalfYearDetails(Request $request){

        $half_from_date = $request->half_from_date;
        $cv_range = $request->cv_range;
        $leadcount = $request->leadcount;
        $ince_freq = 'Half Yearly Incentive';

        $rang_data = DB::table('tbl_incentives')
        ->select($cv_range)
        ->where('tbl_incentives.cat1_target','<=',$leadcount)
        ->where('tbl_incentives.ince_freq',$ince_freq)
        ->where('tbl_incentives.from_date','<=',$half_from_date)
        ->where('tbl_incentives.to_date','>=',$half_from_date)
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();

        $data3 = response()->json($rang_data);
        $cv_range1 = $data3->getData();

        return response()->json($cv_range1);
    }
    public function gethalfyearUser($user_id){

        $data=DB::table('users')
        ->join('halfyear_incentive','halfyear_incentive.user_id','=','users.user_id')
        ->select('users.firstname','users.lastname','halfyear_incentive.*')
        ->where('users.user_id',$user_id)
        ->get();
        return response()->json($data);
    }
}
