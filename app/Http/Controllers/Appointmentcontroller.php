<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\RealEstate;
use App\Models\Currency;
use Carbon\Carbon;
use Session;    
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
       $data['appointment_status'] = 0;

       $result = DB::table('appointment')->insert($data);
       if($result)
       {

        $real_estate = DB::table('translation')->where('real_estate_id',$r_id)
        ->where('translation_locale','vi')->first();
        $customer = DB::table('customer')->where('customer_id',$c_id)->first();
        return view('pages.user.appointment.index',compact('real_estate','customer'));
       }

    }
    
    public function detail($id){

        $result = DB::table('appointment')->where('customer_id',$id)->get();

       return view('pages.user.appointment.appointmentdetail',compact('result','id'));
    }



    //appointmnet admin

    public function admin_index()
    {
        $result = DB::table('appointment')->get();
        
        return view('pages.user.appointment.adminindex',compact('result'));
    }


    public function admin_status($id)
    {

            $data = DB::table('appointment')->where('appointment_id',$id)->first();
         
           if($data->appointment_status == 0){
                 DB::table('appointment')->where('appointment_id',$id)->update([
                    'appointment_status'=>1
                ]);
                Session::put('mess','Chấp nhận lịch hẹn!');
           }
        else{
             DB::table('appointment')->where('appointment_id',$id)->update([
                'appointment_status'=>0
            ]);
            Session::put('mess','Không chấp nhận lịch hẹn!');
        }
          
        
        return redirect()->route('appointment.admin.index');
        
       
        
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
    public function admin_destroy($id)
    {
        DB::table('appointment')->where('appointment_id',$id)->delete();
        Session::put('mess','Xóa lịch hẹn thành công!');
        return redirect()->route('appointment.admin.index');
    }
    public function destroy($id)
    {
        DB::table('appointment')->where('appointment_id',$id)->delete();
        // return redirect()->route('appointment.detail');
        $result = DB::table('appointment')->where('customer_id',$id)->get();

        return view('pages.user.appointment.appointmentdetail',compact('result','id'));
    }
}
