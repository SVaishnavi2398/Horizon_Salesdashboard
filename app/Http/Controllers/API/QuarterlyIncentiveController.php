<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuarterlyIncentive;
// //use DB   use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\DB;

class QuarterlyIncentiveController extends Controller
{
    public function index(){
        // $QuarterlyIncentive = QuarterlyIncentive::all();
		// return response()->json($QuarterlyIncentive);

        $QuarterlyIncentive = QuarterlyIncentive::all();
        $QuarterlyIncentive = DB::table('quarterly_incentive')
                        ->join('users', 'users.user_id', '=', 'quarterly_incentive.user_id')
                        ->select('users.firstname','users.middlename','users.lastname', 'quarterly_incentive.*')
                        ->get();
		return response()->json($QuarterlyIncentive);
    }

    public function create(Request $request)
    {
        $newQuarterlyIncentive = new QuarterlyIncentive([
			'soucring_no' => $request->get('soucring_no'),
			'sourcing_amt' => $request->get('sourcing_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);
    }

    public function store(Request $request)
    {
        $request->validate([
			'soucring_no' => '',
			'sourcing_amt' => '',
            'from_date' => '',
            'to_date' => '',
            'user_id' =>'',
            'eligibility_ince'=>''
		]);

		$newQuarterlyIncentive = new QuarterlyIncentive([
			'soucring_no' => $request->get('soucring_no'),
			'sourcing_amt' => $request->get('sourcing_amt'),
            'from_date' => $request->get('from_date'),
            'to_date' => $request->get('to_date'),
            'user_id' => $request->get('user_id'),
            'eligibility_ince' => $request->get('eligibility_ince')
		]);

		$newQuarterlyIncentive->save();

		return response()->json($newQuarterlyIncentive);
    }

    public function show($id)
    {
        $QuarterlyIncentive = QuarterlyIncentive::findOrFail($id) ;
		return response()->json($QuarterlyIncentive);
    }

    public function update(Request $request, $id)
    {
       
		$QuarterlyIncentive = QuarterlyIncentive::findOrFail($id);
		
		$QuarterlyIncentive = QuarterlyIncentive::find($id);
        $QuarterlyIncentive->update($request->all());
        return $QuarterlyIncentive;
		
    }

    public function destroy($id)
    {
        $quarterlyIncentive = QuarterlyIncentive::findOrFail($id);
		$quarterlyIncentive->delete();

		return response()->json($quarterlyIncentive::all());
    }

    public function upCreQuarInce(Request $request){
        
        $newQuarterlyIncentive = QuarterlyIncentive::updateOrCreate(
  
        [   'user_id' => $request->get('user_id'),
            'from_date' =>  $request->get('from_date'),
            'to_date' =>  $request->get('to_date'),
        ],
          [
            'eligibility_ince' => $request->get('eligibility_ince')
            // 'soucring_no' => $request->get('soucring_no'),
			// 'sourcing_amt' => $request->get('sourcing_amt')
          ]
      );
      return response()->json($newQuarterlyIncentive);
    }

    public function getUsersQ(){

        $data = DB::table('users')
        ->select('user_id','firstname','lastname')
        ->where(function ($query) {
            $query ->where('users.designation',8)
            ->orWhere('users.designation',9)
            ->orWhere('users.designation',10);
        })  
        ->get();
        return response()->json($data);
    }

    public function SourceQuaData(Request $request){

        $from_date=$request->from_date;
        $to_date=$request->to_date;
        $user_id = $request->user_id;

        $data = DB::table('tbl_monthly_incentive')
        ->select(DB::raw('SUM(gi_no_of_sourcing) as leadcount'),DB::raw("SUM(business_value) as business_value"))
        ->where('user_id',$user_id)
        ->whereBetween('from_date', [$from_date, $to_date])
        // ->whereBetween('to_date', [$from_date, $to_date])
        ->get();
        return response()->json($data);
    }

    public function quarterlyData(Request $request){

        $from_date = $request->from_date;
        $cv_range = $request->cv_range;
        $leadcount = $request->leadcount;
        $ince_freq = 'Quaterly Incentive';

        $rang_data = DB::table('tbl_incentives')
        ->select($cv_range)
        ->where('tbl_incentives.cat1_target','<=',$leadcount)
        ->where('tbl_incentives.ince_freq',$ince_freq)
        ->where('tbl_incentives.from_date','<=',$from_date)
        ->where('tbl_incentives.to_date','>=',$from_date)
        ->orderBy('id','DESC')
        ->limit(1)
        ->get();

        $data3 = response()->json($rang_data);
        $cv_range1 = $data3->getData();

        return response()->json($cv_range1);
    }

    public function updateQuarterly(Request $request){
        // dd($request->all());
        $QuarterlyIncentive = QuarterlyIncentive::
            where(['user_id' => $request->get('user_id'),
                    'from_date' =>  $request->get('from_date'),
                    'to_date' =>  $request->get('to_date')
            ])
            ->update([
                'eligibility_ince' => $request->get('eligibility_ince'),
                'soucring_no' => $request->get('soucring_no'),
			    'sourcing_amt' => $request->get('sourcing_amt')

            ]);
        return $QuarterlyIncentive;
    }
    public function quarterlydetails($user_id){

        $data=DB::table('users')
        ->join('quarterly_incentive','quarterly_incentive.user_id','=','users.user_id')
        ->select('users.firstname','users.lastname','quarterly_incentive.*')
        ->where('users.user_id',$user_id)
        ->get();
        return response()->json($data);
    }

}
