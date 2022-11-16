<?php

namespace App\Http\Controllers\API;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salesdetails;
use App\Models\Leadsource;
use Illuminate\Support\Facades\Schema;

class SalesdetailsController extends Controller
{

    public function index()
    {
        $salesdetails = Salesdetails::all();
        $salesdetails = DB::table('salesdetails')
                        ->join('clientdetails', 'clientdetails.client_id', '=', 'salesdetails.client_id')
                        ->join('projects', 'projects.project_id', '=', 'salesdetails.project_id')
                        ->join('booking_status','booking_status.deal_status_id','=','salesdetails.deal_status_id')
                        ->join('leadsource','leadsource.leadsource_id','=','salesdetails.leadsource_id')
                        ->join('channelpartner','channelpartner.cp_id','=','salesdetails.cp_id')
                        ->join('users','users.user_id','=','salesdetails.sourcing_emp_id')
                        ->join('teams','teams.team_id','=','salesdetails.team_id')
                        ->select('salesdetails.*','clientdetails.name','projects.project_name', 'booking_status.status', 'leadsource.leadsource','salesdetails.booking_date','channelpartner.cp_name','users.firstname','users.middlename','users.lastname','teams.teamname')
                        ->orderBy('salesdetails.updated_at','DESC')
                        ->get();
		return response()->json($salesdetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newSalesdetails = new Salesdetails([
			
			'client_id' => $request->get('client_id'),
            'debtor_company_det_id' => $request->get('debtor_company_det_id'),
            'project_id' => $request->get('project_id'),
            'subproject_id' => $request->get('subproject_id'),
            'booking_date' => $request->get('booking_date'),
            'building_name' => $request->get('building_name'),
            'wing' => $request->get('wing'),
            'flat_no' => $request->get('flat_no'),
            'consideration_value' => $request->get('consideration_value'),
            'case_payout_percentage' => $request->get('case_payout_percentage'),
            'extra_payout_percentage' => $request->get('extra_payout_percentage'),
            'extra_payout_value' => $request->get('extra_payout_value'),
            'net_extra_payout' => $request->get('net_extra_payout'),
            'payout_value' => $request->get('payout_value'),
            'deal_status_id' => $request->get('deal_status_id'),
            'cp_id' => $request->get('cp_id'),
            'shared_payout' => $request->get('shared_payout'),
            'net_payout' => $request->get('net_payout'),
            //'pending_invoice_amount' => $request->get('pending_invoice_amount'),
            'payout_status_id' => $request->get('payout_status_id'),
            'sourcing_emp_id' => $request->get('sourcing_emp_id'),
            'closing_emp_id' => $request->get('closing_emp_id'),
            'team_id' => $request->get('team_id'),
            'leadsource_id' => $request->get('leadsource_id'),
            'booking_id' => $request->get('booking_id'),
            'remark' => $request->get('remark'),
            'BA1_amt_paid' => $request->get('BA1_amt_paid'),
            'BA2_amt_paid' => $request->get('BA2_amt_paid'),
            'registration_date' => $request->get('registration_date'),
            'cv_range' => $request->get('cv_range'),
            'business_value' => $request->get('business_value')

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
       
            'client_id' => 'required',
            'cp_id' => 'required',
            'debtor_company_det_id' => 'required',
            'project_id' => 'required',
            'subproject_id' => '',
            'booking_date' => 'required',
            'building_name' => '',
            'wing' => 'required',
            'flat_no' => 'required',
            'consideration_value' => 'required',
            'case_payout_percentage' => '',
            'extra_payout_percentage' => '',
            'extra_payout_value' => '',
            'net_extra_payout' => '',
            'payout_value' => '',
            'deal_status_id' => '',  
            'shared_payout' => '',
            'net_payout' => '',
            //'pending_invoice_amount' => 'required',
            'payout_status_id' => 'required',
            'sourcing_emp_id' => 'required',
            'closing_emp_id' => 'required',
            'team_id' => 'required',
            'leadsource_id' => 'required',
            'booking_id' => 'required',
            'remark' => '',
            'BA1_amt_paid' => 'required',
            'BA2_amt_paid' => 'required',
            'registration_date' => '',
            'cv_range' =>'',
            'business_value' =>'',
        ]);

        $newSalesdetails = new Salesdetails([
       
            'client_id' => $request->get('client_id'),
            'debtor_company_det_id' => $request->get('debtor_company_det_id'),
            'project_id' => $request->get('project_id'),
            'subproject_id' => $request->get('subproject_id'),
            'booking_date' => $request->get('booking_date'),
            'building_name' => $request->get('building_name'),
            'wing' => $request->get('wing'),
            'flat_no' => $request->get('flat_no'),
            'consideration_value' => $request->get('consideration_value'),
            'case_payout_percentage' => $request->get('case_payout_percentage'),
            'extra_payout_percentage' => $request->get('extra_payout_percentage'),
            'extra_payout_value' => $request->get('extra_payout_value'),
            'net_extra_payout' => $request->get('net_extra_payout'),
            'payout_value' => $request->get('payout_value'),
            'deal_status_id' => $request->get('deal_status_id'),
            'cp_id' => $request->get('cp_id'),
            'shared_payout' => $request->get('shared_payout'),
            'net_payout' => $request->get('net_payout'),
            //'pending_invoice_amount' => $request->get('pending_invoice_amount'),
            'payout_status_id' => $request->get('payout_status_id'),
            'sourcing_emp_id' => $request->get('sourcing_emp_id'),
            'closing_emp_id' => $request->get('closing_emp_id'),
            'team_id' => $request->get('team_id'),
            'leadsource_id' => $request->get('leadsource_id'),
            'booking_id' => $request->get('booking_id'),
            'remark' => $request->get('remark'),
            'BA1_amt_paid' => $request->get('BA1_amt_paid'),
            'BA2_amt_paid' => $request->get('BA2_amt_paid'),
            'registration_date' => $request->get('registration_date'),
            'cv_range' => $request->get('cv_range'),
            'business_value' => $request->get('business_value')
        ]);

        $newSalesdetails->save();

        return response()->json($newSalesdetails);
    
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($sales_id)
    {
        $salesdetails = Salesdetails::findOrFail($sales_id);
		return response()->json($salesdetails);


    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sales_id)
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
    public function update(Request $request, $sales_id)
    {

        $salesdetails = Salesdetails::findOrFail($sales_id);
		
		$salesdetails = Salesdetails::find($sales_id);
        $salesdetails->update($request->all());
        return $salesdetails;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sales_id)
    {
        $salesdetails = Salesdetails::findOrFail($sales_id);
		$salesdetails->delete();

		return response()->json($salesdetails::all());
    }

    public function getTableColumns()
{
    //return DB::getSchemaBuilder()->getColumnListing($salesdetails);

    // OR

    //return Schema::getColumnListing($table);

    $salesdetails= new Salesdetails;
    
    $table = $salesdetails->getTable();
    
    $columns  = \Schema::getColumnListing($table);

    //dd($columns);
    return $columns;

}

    public function getSalesCount()
    {   

        
        $leadsource = Leadsource::all();
        $leadsource = DB::table('leadsource')
                    ->pluck('leadsource')
                    ->toArray();
        $data1 = response()->json($leadsource);
        $leadsource1 = $data1->getData();
        $length = count($leadsource1);
        for($i=0; $i<$length; $i++){

        $salesdetails[] = DB::table('salesdetails')
                        ->join('leadsource','leadsource.leadsource_id','=','salesdetails.leadsource_id')
                        ->select('leadsource.leadsource')
                        ->where('leadsource',$leadsource1[$i])
                        ->get();
        }
        for($i=0; $i<count($salesdetails); $i++){
                $count[] = count($salesdetails[$i]);
            } 
        return response()->json($count);
    }

    public function getApply($data)
    {
        $data1 = explode(',',$data); 
        $date1 = $data1[0];
        $date2 = $data1[1];

        $leadsource = Leadsource::all();
        $leadsource = DB::table('leadsource')
                    ->pluck('leadsource')
                    ->toArray();
        $data1 = response()->json($leadsource);

         $leadsource1 = $data1->getData();
        
        $length = count($leadsource1);
        for($i=0; $i<$length; $i++){

        $salesdetails[] = DB::table('salesdetails')
                        ->join('leadsource','leadsource.leadsource_id','=','salesdetails.leadsource_id')
                        ->select('leadsource.leadsource')
                        ->where('leadsource',$leadsource1[$i])
                        ->whereBetween('salesdetails.booking_date', [$date1,$date2])
                        ->get();
        }
        for($i=0; $i<count($salesdetails); $i++){
            $count[] = count($salesdetails[$i]);
        } 
		    return response()->json($count);
}
    
public function getsales($client_id)
{
        $sales = DB::table('salesdetails')
        ->join('projects','projects.project_id','=','salesdetails.project_id')
        ->select('salesdetails.*','projects.project_name')
        ->where('client_id',$client_id)
        ->get();
return response()->json($sales);
    }

    public function getbookingid()
{
        $sales = DB::table('salesdetails')
        ->select('salesdetails.*')
        ->orderBy('sales_id','DESC')
        ->get();
return response()->json($sales);
    }
}
