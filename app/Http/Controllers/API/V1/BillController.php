<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;



class BillController extends BaseController
{
    protected $Bill = '';
    
    public function __construct(Bill $bill)
    {
        $this->middleware('auth:api');
        $this->bill = $bill;
    }
    
    public function index()
    {
        $bills = $this->bill->latest()->with('customers')->paginate(10);

        return $this->sendResponse($bills, 'Product list');
    }

    public function store(Request $request)
    {
        
        $bill = $this->bill->create([   
            'customer_id' => $request->customer_id,
            'bill_month' => $request->month,
            'amount' => $request->amount,
            'status' => $request->status,
        ]);

        // update pivot table
        //$tag_ids = [];
        // foreach ($request->get('tags') as $tag) {
        //     $existingtag = Tag::whereName($tag['text'])->first();
        //     if ($existingtag) {
        //         $tag_ids[] = $existingtag->id;
        //     } else {
        //         $newtag = Tag::create([
        //             'name' => $tag['text']
        //         ]);
        //         $tag_ids[] = $newtag->id;
        //     }
        // }
        // $bill->tags()->sync($tag_ids);

        return $this->sendResponse($bill, 'Product Created Successfully');
    }
    public function update(Request $request, $id)
    {
        $bill = $this->bill->findOrFail($id);

        $bill->update($request->all());

        // update pivot table

        return $this->sendResponse($bill, 'Product Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('isAdmin');

        $bill = $this->bill->findOrFail($id);

        $bill->delete();

        return $this->sendResponse($bill, 'Product has been Deleted');
    }
}