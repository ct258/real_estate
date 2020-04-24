<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Customer;
use App\Models\RealEstate;
use DB;
use Session;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $report=Report::all();
        // foreach($report as $i)
        // {
        //     $ac_id = $i->account_id;
        $report = DB::table('report')
        ->join('customer', 'report.customer_id', '=', 'customer.customer_id')
         ->join('real_estate', 'report.real_estate_id', '=', 'real_estate.real_estate_id')
         ->select('report.*', 'customer.customer_name','real_estate.real_estate_avatar')->where('report_status','Chưa xử lý')
         ->get();

        // $report=Report::with('customer','real_estate')->select('report.*','customer.customer_name','real_estate.real_estate_status')->get;
        return view('pages.admin.report.index',compact('report'));
    }

    public function fix()
    {
        // $report=Report::all();
        // foreach($report as $i)
        // {
        //     $ac_id = $i->account_id;
        $report = DB::table('report')
        ->join('customer', 'report.customer_id', '=', 'customer.customer_id')
         ->join('real_estate', 'report.real_estate_id', '=', 'real_estate.real_estate_id')
         ->select('report.*', 'customer.customer_name','real_estate.real_estate_avatar')->where('report_status','Đã xử lý')
         ->get();

        // $report=Report::with('customer','real_estate')->select('report.*','customer.customer_name','real_estate.real_estate_status')->get;
        return view('pages.admin.report.fix_report',compact('report'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // dd($id);
         // $report=Report::all();
        // foreach($report as $i)
        // {
        //     $ac_id = $i->account_id;
        DB::table('report')->where('report_id',$id )->update(['report_status' => 'Đã xử lý']);
        

        // $report = DB::table('report')
        // ->join('customer', 'report.customer_id', '=', 'customer.customer_id')
        //  ->join('real_estate', 'report.real_estate_id', '=', 'real_estate.real_estate_id')
        //  ->select('report.*', 'customer.customer_name','real_estate.real_estate_avatar')->where('report_status','Đã xử lý')
        //  ->get();

        // $report=Report::with('customer','real_estate')->select('report.*','customer.customer_name','real_estate.real_estate_status')->get;
        return view('pages.admin.report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
