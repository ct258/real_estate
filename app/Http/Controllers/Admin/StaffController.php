<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\Staff;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session; 
use Hash;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        // dd( $staff);
        return view('pages.admin.staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //vì dây là thêm nhân viên nên role_id=2
       $account['username'] =$request->username;
       $account['password'] =  Hash::make($request->password);
       $account['role_id'] = 2;
       
       $staff_id = DB::table('account')->insertGetId( $account);
       
       $staff['staff_code'] =$request->staff_code;
       $staff['staff_name'] =$request->staff_name;
       $staff['staff_birth'] =$request->staff_birth;
       $staff['staff_tel'] =$request->staff_tel;
       $staff['staff_gender'] =$request->staff_gender;
       $staff['staff_email'] =$request->staff_email;
       $staff['staff_address'] =$request->staff_address;
       $staff['account_id'] = $staff_id;
       
        $result = DB::table('staff')->insert($staff);
        if($result)
        {
            Session::put('mess','Thêm nhân viên thành công !');
            return redirect()->route('staff.create');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::where('staff_id',$id)->get();
        $staff1 = Staff::where('staff_id',$id)->first();
        $ac =Account::where('account_id',$staff1->account_id)->first();
        
        return view('pages.admin.staff.edit',compact('staff','ac'));
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
         //vì dây là thêm nhân viên nên role_id=2
        // dd($request->staff_birth );
        
        if($request->password != ''&& $request->staff_birth != null)
        {
            $account['username'] =$request->username;
            $account['password'] =  Hash::make($request->password);
            $account['role_id'] = 2;
            $staff_id = DB::table('staff')->where('staff_id',$id)->first();
            $ac_id = $staff_id->account_id;
            //    dd($ac_id);
            DB::table('account')->where('account_id',$ac_id)->update($account);
            $staff['staff_code'] =$request->staff_code;
            $staff['staff_name'] =$request->staff_name;
            $staff['staff_birth'] =$request->staff_birth;
            $staff['staff_tel'] =$request->staff_tel;
            $staff['staff_gender'] =$request->staff_gender;
            $staff['staff_email'] =$request->staff_email;
            $staff['staff_address'] =$request->staff_address;
            $staff['account_id'] =  $ac_id;
            // dd($staff);
            $result = DB::table('staff')->where('staff_id',$id)->update($staff);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');
                return redirect()->route('staff.index');
            }


        }
     
       if($request->password == '' && $request->staff_birth != null)
           { 

            $staff_id = DB::table('staff')->where('staff_id',$id)->first();
            $ac_id = $staff_id->account_id;

            $staff['staff_code'] =$request->staff_code;
            $staff['staff_name'] =$request->staff_name;
            $staff['staff_birth'] =$request->staff_birth;
            $staff['staff_tel'] =$request->staff_tel;
            $staff['staff_gender'] =$request->staff_gender;
            $staff['staff_email'] =$request->staff_email;
            $staff['staff_address'] =$request->staff_address;
            $staff['account_id'] =  $ac_id;
            // dd($staff);
            $result = DB::table('staff')->where('staff_id',$id)->update($staff);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');
                return redirect()->route('staff.index');
            }
        }
        
       if($request->password == '' && $request->staff_birth == null)
           { 

        
            $staff_id = DB::table('staff')->where('staff_id',$id)->first();
            $ac_id = $staff_id->account_id;
            $staff_birth=$staff_id->staff_birth;
           

            $staff['staff_code'] =$request->staff_code;
            $staff['staff_name'] =$request->staff_name;
            $staff['staff_birth'] =$staff_birth;
            $staff['staff_tel'] =$request->staff_tel;
            $staff['staff_gender'] =$request->staff_gender;
            $staff['staff_email'] =$request->staff_email;
            $staff['staff_address'] =$request->staff_address;
            $staff['account_id'] =  $ac_id;
            // dd($staff);
            $result = DB::table('staff')->where('staff_id',$id)->update($staff);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');
                
            }
            return redirect()->route('staff.index');
        }
           
           

         
       
       
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $data = Staff::where('staff_id',$id)->get();
        $staff = Staff::where('staff_id',$id)->delete();
        foreach($data as $val)
        {
            $ac_id = $val->account_id;
        }
       
        $account = Account::where('account_id',$ac_id)->delete();
       
       
        if($staff){
            Session::put('mess','Xóa nhân viên thành công !');
            return redirect()->route('staff.index');
        }
        
    }
}
