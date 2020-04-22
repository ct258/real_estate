<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Appointmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($real_estate_id, $customer_id)
    {
        // echo $real_estate_id;
        // echo $customer_id;

        $real_estate = DB::table('translation')->where('real_estate_id',$real_estate_id)
        ->where('translation_locale','vi')->first();
        
        $customer = DB::table('customer')->where('customer_id',$customer_id)->first();
        
       

        return view('pages.user.appointment.index',compact('real_estate','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$c_id ,$r_id)
    {
       $data['customer_id'] = $c_id;
       $data['real_estate_id'] = $r_id;
       $data['appointment_time'] = $request->time;
       $data['appointment_content'] = $request->content;
       $data['appointment_status'] = 'Đang xử lý';

       $result = DB::table('appointment')->insert($data);
       if($result)
       {

        $real_estate = DB::table('translation')->where('real_estate_id',$r_id)
        ->where('translation_locale','vi')->first();
        $customer = DB::table('customer')->where('customer_id',$c_id)->first();
        return view('pages.user.appointment.index',compact('real_estate','customer'));
       }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
