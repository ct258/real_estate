<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Customer;
use App\Models\RealEstate;
use Session; 

class CustomerReportController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $staff = Staff::all();
    //     dd( $staff);
          //  return view('pages.user.report.index');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      // $cus = Session::get('customer');
      $report= new Report;
      // $cus = new Customer;
      // $real = new RealEstate;
      $report->report_content = $request->content;
      $report->report_status= 'Chưa xử lý';

      $report->real_estate_id = $id;
    //    $report->customer_id = 2;
      $report->customer_id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;

      $report->save();
      // $result = DB::table('report')->insert($report);
      // if($result)
      // {
          Session::put('mess','Thêm báo cáo thành công !');
          return redirect()->back();
      }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

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