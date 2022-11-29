<?php

namespace App\Http\Controllers\API;
use App\Models\CreditNote;
// //use DB   
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditNoteController extends Controller
{
    
    public function index()
    {
        $creditnote = Creditnote::all();
        $creditnote = DB::table('credit_note')
        ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id', '=', 'credit_note.company_id')
        ->join('invoice', 'invoice.invoice_id', '=', 'credit_note.invoice_id')
        ->select('credit_note.*','invoice.invoice_id','invoice.invoice_num', 'debtor_company_det.cname','debtor_company_det.debtor_company_det_id')
        ->orderBy('credit_note.updated_at','DESC')
        ->get();
        return response()->json($creditnote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newCreditnote = new Creditnote([
			
			'invoice_id' => $request->get('invoice_id'),
            'company_id' => $request->get('company_id'),
            'credit_note_num' => $request->get('credit_note_num'),
            'credit_note_date' => $request->get('credit_note_date'),
            'payout_percenatge' => $request->get('payout_percenatge'),
            'taxable_amt' => $request->get('taxable_amt'),
            'cgst_amt' => $request->get('cgst_amt'),
            'sgst_amt' => $request->get('sgst_amt'),
            'igst_amt' => $request->get('igst_amt'),
            'total_gst_amt' => $request->get('total_gst_amt'),
            'total_credit_note_amt' => $request->get('total_credit_note_amt'),
            'icredit_note_status' => $request->get('icredit_note_status'),
            'credit_note_submitted_date' => $request->get('credit_note_submitted_date'),
            
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
		
		
           
           
            'invoice_id' => 'required',
            'company_id' => 'required',
            'credit_note_num' => 'required',
            'credit_note_date' => 'required',
            'payout_percenatge' => 'required',
            'taxable_amt' => 'required',
            'cgst_amt' => 'required',
            'sgst_amt' =>'required',
            'igst_amt' => 'required',
            'total_gst_amt' => 'required',
            'total_credit_note_amt' => 'required',
            'icredit_note_status' => 'required',
            'credit_note_submitted_date' => 'required'
		]);

		$newCreditnote = new Creditnote([
		
		
            'invoice_id' => $request->get('invoice_id'),
            'company_id' => $request->get('company_id'),
            'credit_note_num' => $request->get('credit_note_num'),
            'credit_note_date' => $request->get('credit_note_date'),
            'payout_percenatge' => $request->get('payout_percenatge'),
            'taxable_amt' => $request->get('taxable_amt'),
            'cgst_amt' => $request->get('cgst_amt'),
            'sgst_amt' => $request->get('sgst_amt'),
            'igst_amt' => $request->get('igst_amt'),
            'total_gst_amt' => $request->get('total_gst_amt'),
            'total_credit_note_amt' => $request->get('total_credit_note_amt'),
            'icredit_note_status' => $request->get('icredit_note_status'),
            'credit_note_submitted_date' => $request->get('credit_note_submitted_date'),
		]);

		$newCreditnote->save();

		return response()->json($newCreditnote);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($credit_note_id)
    {
        $creditnote = DB::table('credit_note')
        ->join('debtor_company_det', 'debtor_company_det.debtor_company_det_id', '=', 'credit_note.company_id')
        ->join('invoice', 'invoice.invoice_id', '=', 'credit_note.invoice_id')
        ->select('credit_note.*','invoice.invoice_id','invoice.invoice_num', 'debtor_company_det.cname','debtor_company_det.debtor_company_det_id')
        ->where('credit_note.credit_note_id',$credit_note_id)
        ->get();
		return response()->json($creditnote);

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

        $creditnote = Creditnote::findOrFail($client_id);
		
		$creditnote = Creditnote::find($client_id);
        $creditnote->update($request->all());
        return $creditnote;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id)
    {
        $creditnote = Creditnote::findOrFail($client_id);
		$creditnote->delete();

		return response()->json($creditnote::all());
    }
}
