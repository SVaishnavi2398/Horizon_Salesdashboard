<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\InvoiceMulti;
//use DB   
use Illuminate\Support\Facades\DB;;
use Illuminate\Http\Request;

class InvoiceMultiController extends Controller
{
    
    public function index()
    {
        $InvoiceMulti = InvoiceMulti::all();
        $InvoiceMulti = DB::table('invoice_multi')
        ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id', '=', 'invoice_multi.company_id')
        ->join('inv_status', 'inv_status.inv_status_id', '=', 'invoice_multi.inv_status_id')
        ->select('invoice_multi.invoice_multi_id','invoice_multi.invoice_num','invoice_multi.company_id','invoice_multi.total_gst_amt','debtor_company_det.cname', 'debtor_company_det.cgst','inv_status.status')
        ->orderBy('invoice_multi.updated_at','DESC')
        ->get();
		return response()->json($InvoiceMulti);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newInvoiceMulti = new InvoiceMulti([
			
			// 'client_id' => $request->get('client_id'),
            'company_id' => $request->get('company_id'),
            // 'sales_id' => $request->get('sales_id'),
            'invoice_num' => $request->get('invoice_num'),
            'invoice_date' => $request->get('invoice_date'),
            'payout_percentage' => $request->get('payout_percentage'),
            'taxable_amt' => $request->get('taxable_amt'),
            'cgst_amt' => $request->get('cgst_amt'),
            'sgst_amt' => $request->get('sgst_amt'),
            'igst_amt' => $request->get('igst_amt'),
            'total_gst_amt' => $request->get('total_gst_amt'),
            'total_invoice_amt' => $request->get('total_invoice_amt'),
            'tds_rate' => $request->get('tds_rate'),
            'receivable_tds_amt' => $request->get('receivable_tds_amt'),
            'receivable_amt' => $request->get('receivable_amt'),
            'received_amt' => $request->get('received_amt'),
            'suspense_amt' => $request->get('suspense_amt'),
            'inv_status_id' => $request->get('inv_status_id'),
            'inv_submitted_date' => $request->get('inv_submitted_date'),
            'due_amt' => $request->get('due_amt'),
            'credit_note_amt' => $request->get('credit_note_amt')

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
		
		
            // 'client_id' => '',
            // 'sales_id' => '',
            'company_id' => 'required',
            'invoice_num' => 'required',
            'invoice_date' => 'required',
            'payout_percentage' => '',
            'taxable_amt' => 'required',
            'cgst_amt' => 'required',
            'sgst_amt' => 'required',
            'igst_amt'=>'',
            'total_gst_amt' => 'required',
            'total_invoice_amt' => 'required',
            'tds_rate' => 'required',
            'receivable_tds_amt' =>'required',
            'receivable_amt' => 'required',
            'received_amt'=>'',
            'suspense_amt'=>'',
            'inv_status_id' => 'required',
            'inv_submitted_date' => 'required',
            'due_amt' => '',
            'credit_note_amt' => '',
           
		]);

		$newInvoiceMulti = new InvoiceMulti([
		
		
            // 'client_id' => $request->get('client_id'),
            'company_id' => $request->get('company_id'),
            // 'sales_id' => $request->get('sales_id'),
            'invoice_num' => $request->get('invoice_num'),
            'invoice_date' => $request->get('invoice_date'),
            'payout_percentage' => $request->get('payout_percentage'),
            'taxable_amt' => $request->get('taxable_amt'),
            'cgst_amt' => $request->get('cgst_amt'),
            'sgst_amt' => $request->get('sgst_amt'),
            'igst_amt' => $request->get('igst_amt'),
            'total_gst_amt' => $request->get('total_gst_amt'),
            'total_invoice_amt' => $request->get('total_invoice_amt'),
            'tds_rate' => $request->get('tds_rate'),
            'receivable_tds_amt' => $request->get('receivable_tds_amt'),
            'receivable_amt' => $request->get('receivable_amt'),
            'received_amt' => $request->get('received_amt'),
            'suspense_amt' => $request->get('suspense_amt'),
            'inv_status_id' => $request->get('inv_status_id'),
            'inv_submitted_date' => $request->get('inv_submitted_date'),
            'due_amt' => $request->get('due_amt'),
            'credit_note_amt' => $request->get('credit_note_amt')
		]);

		$newInvoiceMulti->save();

		return response()->json($newInvoiceMulti);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($invoice_multi_id)
    {
        $InvoiceMulti = DB::table('invoice_multi')
        ->join('invoicedetids','invoicedetids.invoice_multi_id','=','invoice_multi.invoice_multi_id')
        ->join('clientdetails', 'clientdetails.client_id','=','invoicedetids.client_id')
        ->join('inv_status', 'inv_status.inv_status_id', '=', 'invoice_multi.inv_status_id')
        ->join('salesdetails', 'salesdetails.client_id', '=', 'invoicedetids.client_id')
        ->join('projects','projects.project_id','=','salesdetails.project_id')
        ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id','=','invoice_multi.company_id')
        ->select('invoice_multi.*','clientdetails.name','projects.project_name','clientdetails.client_id','salesdetails.*','debtor_company_det.*','inv_status.*','invoicedetids.*')
        ->where('invoice_multi.invoice_multi_id',$invoice_multi_id)
        ->get();
		return response()->json($InvoiceMulti);

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id)
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
    public function update(Request $request, $client_id)
    {
        $InvoiceMulti = InvoiceMulti::findOrFail($client_id);
		
		$InvoiceMulti = InvoiceMulti::find($client_id);
        $InvoiceMulti->update($request->all());
        return $InvoiceMulti;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id)
    {
        $InvoiceMulti = InvoiceMulti::findOrFail($client_id);
		$InvoiceMulti->delete();

		return response()->json($InvoiceMulti::all());
    }

    public function getCgst($id){
        $debtor_company_det = DB::table('debtor_company_det')
        ->select('*')
        ->where('debtor_company_det_id',$id)
        ->get();
      
		return response()->json($debtor_company_det);

    }

    public function getlastid(){
        $debtor_company_det = DB::table('invoice_multi')
        ->select('*')
        ->limit(1)
        ->orderBy('invoice_multi.invoice_multi_id','DESC')
        ->get();
      
		return response()->json($debtor_company_det);

    }
    public function getReceivableamt($id){
        
        $data=DB::table('invoice_multi')->where('invoice_multi_id',$id)->get();
        return $data;
    }
    public function getclientid($id){
        $data=DB::table('salesdetails')
        ->join('clientdetails','clientdetails.client_id','=','salesdetails.client_id')
        ->select('clientdetails.client_id','clientdetails.name','salesdetails.sales_id')
        ->where('salesdetails.debtor_company_det_id',$id)
        ->get();
        return response()->json($data);
    }


    public function in_Maha(Request $request){
            //dd($request->all());
            $year = $request->get('year');
            $year1 = json_decode($year);
            $month = $request->get('month');

            $month1 = json_decode($month);
            $InvoiceMulti = InvoiceMulti::all();
            $InvoiceMulti = DB::table('invoice_multi')
                    ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id', '=', 'invoice_multi.company_id')
                    ->select('invoice_date as in_invoice_date','payout_percentage as in_payout_percentage',DB::raw('SUM(taxable_amt) as in_taxable_total'), DB::raw('SUM(cgst_amt) as in_ctotal'), DB::raw('SUM(invoice_multi.sgst_amt) as in_stotal'),DB::raw('SUM(igst_amt) as in_itotal'),DB::raw('SUM(total_gst_amt) as in_total_gst_amt'))
                    ->where('debtor_company_det.cgst', 'like', '27%')
                    ->whereYear('invoice_date', '=' ,$year1)
                    ->whereMonth('invoice_date', '=' ,$month1)
                    ->groupBy('invoice_date','payout_percentage')
                    ->get();
                    
            return response()->json($InvoiceMulti);
    }

    public function out_of_Maha(Request $request){
            $year = $request->get('year');
            $year1 = json_decode($year);
            $month = $request->get('month');
            $month1 = json_decode($month);
            $InvoiceMulti = InvoiceMulti::all();
            $outOfMahaInvoice = DB::table('invoice_multi')
            ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id', '=', 'invoice_multi.company_id')
            ->select('invoice_date','payout_percentage',DB::raw('SUM(taxable_amt) as taxable_total'), DB::raw('SUM(cgst_amt) as ctotal'), DB::raw('SUM(invoice_multisgst_amt) as stotal'),DB::raw('SUM(igst_amt) as itotal'),DB::raw('SUM(total_gst_amt) as total_gst_amt'))
            ->where('debtor_company_det.cgst', 'not like', '%27%')
            ->whereYear('invoice_date', '=' ,$year1)
            ->whereMonth('invoice_date', '=' ,$month1)  
            ->groupBy('invoice_date','payout_percentage')
            ->get();

            return response()->json($outOfMahaInvoice);
    }
    public function getallinvoice(){

        $tdsrate = InvoiceMulti::all();
        return response()->json($tdsrate);
    }

   function pendinginvoice(){
    $pendinginvoice = DB::table('invoice_multi')
                   ->select('*')
                   ->where('inv_status_id','2')
                   ->get();

return response()->json($pendinginvoice);
    }
}