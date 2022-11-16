<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoicedetids;

class InvoicedetidsController extends Controller
{
  
    public function index()
    {
        $invoicedetids = Invoicedetids::all();
        return response()->json($invoicedetids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newInvoicedetids = new Invoicedetids([
			
			'invoice_multi_id' => $request->get('invoice_multi_id'),
            'sales_id' => $request->get('sales_id'),
            'client_id' => $request->get('client_id'),
            'payout_value' => $request->get('payout_value'),
            'consideration_value' => $request->get('consideration_value'),
            'taxable_amt' => $request->get('taxable_amt')

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
		    'invoice_multi_id' => 'required',
            'sales_id' => 'required',
            'client_id' => 'required',
            'payout_value' => 'required',
            'consideration_value' => 'required',
            'taxable_amt' => 'required'
        
		]);

		$newInvoicedetids = new Invoicedetids([

		    'invoice_multi_id' => $request->get('invoice_multi_id'),
            'sales_id' => $request->get('sales_id'),
            'client_id' => $request->get('client_id'),
            'payout_value' => $request->get('payout_value'),
            'consideration_value' => $request->get('consideration_value'),
            'taxable_amt' => $request->get('taxable_amt')
		]);

		$newInvoicedetids->save();

		return response()->json($newInvoicedetids);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    
    public function show($invoicedetids_id)
    {
        $invoicedetids = Invoicedetids::findOrFail($invoicedetids_id);
		return response()->json($invoicedetids);

     

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoicedetids_id)
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
    public function update(Request $request, $invoicedetids_id)
    {

        $invoicedetids = Invoicedetids::findOrFail($invoicedetids_id);
		
		$invoicedetids = Invoicedetids::find($invoicedetids_id);
        $invoicedetids->update($request->all());
        return $invoicedetids;

        // $teamleaders = Teamleaders::findOrFail($team_leader_id);

        // $teamleaders = Teamleaders::find($team_leader_id);
        // $teamleaders->status = $request->input('status');
        // $teamleaders->update();
        
        // return response()->json($teamleaders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($invoicedetids_id)
    {
        $invoicedetids = Invoicedetids::findOrFail($invoicedetids_id);
		$invoicedetids->delete();

		return response()->json($invoicedetids::all());
    }
}
