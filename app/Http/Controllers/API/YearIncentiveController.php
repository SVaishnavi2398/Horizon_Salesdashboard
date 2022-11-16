<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YearIncentive;
use DB;

class YearIncentiveController extends Controller
{
    public function index(){
        // $YearIncentive = YearIncentive::all();
		// return response()->json($YearIncentive);

        $YearIncentive = YearIncentive::all();
        $YearIncentive = DB::table('year_incentive')
                        ->join('users', 'users.user_id', '=', 'year_incentive.user_id')
                        ->select('users.firstname','users.middlename','users.lastname', 'year_incentive.*')
                        ->get();
		return response()->json($YearIncentive);
    }

    public function create()
    {
        $newYearIncentive = new YearIncentive([
			'yearsourcing_no' => $request->get('yearsourcing_no'),
			'yearsourcing_amt' => $request->get('yearsourcing_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);
    }

    public function store(Request $request)
    {
        $request->validate([
			'yearsourcing_no' => '',
			'yearsourcing_amt' => '',
            'from_date' => '',
            'to_date' => '',
            'user_id' =>'',
            'eligibility_ince'=>''
		]);

		$newYearIncentive = new YearIncentive([
			'yearsourcing_no' => $request->get('yearsourcing_no'),
			'yearsourcing_amt' => $request->get('yearsourcing_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);

		$newYearIncentive->save();

		return response()->json($newYearIncentive);
    }

    public function show($id)
    {
        $YearIncentive = YearIncentive::findOrFail($id) ;
		return response()->json($YearIncentive);
    }

    public function update(Request $request, $id)
    {
       
		$YearIncentive = YearIncentive::findOrFail($id);
		
		$YearIncentive = YearIncentive::find($id);
        $YearIncentive->update($request->all());
        return $YearIncentive;
		
    }

    public function destroy($id)
    {
        $YearIncentive = YearIncentive::findOrFail($id);
		$YearIncentive->delete();

		return response()->json($YearIncentive::all());
    }

    public function upCreYearInce(Request $request){
        
        $YearIncentive = YearIncentive::updateOrCreate(
  
        [   'user_id' => $request->get('user_id'),
            'from_date' =>  $request->get('from_date'),
            'to_date' =>  $request->get('to_date'),
        ],
          [
            'eligibility_ince' => $request->get('eligibility_ince')
            // 'yearsourcing_no' => $request->get('yearsourcing_no'),
			// 'yearsourcing_amt' => $request->get('yearsourcing_amt')
          ]
      );
      return response()->json($YearIncentive);
    }

    public function updateCreYear(Request $request){
        $YearIncentive = YearIncentive::
            where(['user_id' => $request->get('user_id'),
                    'from_date' =>  $request->get('from_date'),
                    'to_date' =>  $request->get('to_date')
            ])
            ->update([
                'eligibility_ince' => $request->get('eligibility_ince'),
                'yearsourcing_no' => $request->get('yearsourcing_no'),
			    'yearsourcing_amt' => $request->get('yearsourcing_amt')

            ]);
        return $YearIncentive;
    }

    public function SourceYearD(Request $request){

        $year_from_date=$request->year_from_date;
        $year_to_date=$request->year_to_date;
        $year_user_id = $request->year_user_id;
        // $year_from_date='2021-01-31';
        // $year_to_date='2021-12-31';
        // $year_user_id = '10';


        $data = DB::table('tbl_monthly_incentive')
        ->select(DB::raw('SUM(gi_no_of_sourcing) as leadcount'),DB::raw("SUM(business_value) as business_value"))
        ->where('user_id',$year_user_id)
        ->whereBetween('from_date', [$year_from_date, $year_to_date])
        ->get();
        return response()->json($data);
    }

    public function YearDetailsInce(Request $request){

        $year_to_date = $request->year_to_date;
        $cv_range = $request->cv_range;
        $leadcount = $request->leadcount;
        $ince_freq = 'Yearly Incentive';

        $rang_data = DB::table('tbl_incentives')
        ->select($cv_range)
        ->where('tbl_incentives.cat1_target','<=',$leadcount)
        ->where('tbl_incentives.ince_freq',$ince_freq)
        ->where('tbl_incentives.from_date','<=',$year_to_date)
        ->where('tbl_incentives.to_date','>=',$year_to_date)
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();

        $data3 = response()->json($rang_data);
        $cv_range1 = $data3->getData();

        return response()->json($cv_range1);
    }

    public function getyearIncenUser_id($user_id){

        $data=DB::table('users')
        ->join('year_incentive','year_incentive.user_id','=','users.user_id')
        ->select('users.firstname','users.lastname','year_incentive.*')
        ->where('users.user_id',$user_id)
        ->get();
        return response()->json($data);
    }
}
