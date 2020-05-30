<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =DB::table('deposit')->join('staff','staff.staff_id','deposit.staff_id')->get();
        
        return view('pages.admin.deposit.index',compact('data'));
    }
    public function createform()
    {
       // $data =DB::table('deposit')->join('staff','staff.staff_id','deposit.staff_id')->get();
        
        return view('pages.admin.deposit.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['d_amount']= $request->d_amount;
        $data['d_time']= $request->d_day;
        $data['d_per']=$request->d_per;
        $data['staff_id']=\Auth::guard('account')->id();
       
        //  dd($data);  
       
            $result = DB::table('deposit')->insert($data);
            if($result)
            {
                Session::put('mess','Thêm đặt cọc thành công !');
                return redirect()->route('deposit.index');
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
        $deposit =DB::table('deposit')->where('d_id',$id)->delete();


        if($deposit){
            Session::put('mess','Xóa đặt cọc thành công !');
            return redirect()->route('deposit.index');
        }

    }
}
