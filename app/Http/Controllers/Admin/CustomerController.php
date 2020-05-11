<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\Customer;
use App\Models\Account;
use App\Models\Rank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('customer')
        ->paginate(10);

        return view('pages.admin.customer.index',compact('customer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //vì dây là thêm kh nên role_id=3
        $account['username'] =$request->username;
        $account['password'] =  Hash::make($request->password);
        $account['role_id'] = 3;

        $customer_id = DB::table('account')->insertGetId( $account);
        $customer['rank_id'] =$request->rank_id;
        $customer['customer_name'] =$request->customer_name;
        $customer['customer_birth'] =$request->customer_birth;
        $customer['customer_tel'] =$request->customer_tel;
        $customer['customer_gender'] =$request->customer_gender;
        $customer['customer_email'] =$request->customer_email;
        $customer['customer_address'] =$request->customer_address;
        $customer['customer_identity_card'] =$request->customer_identity_card;
        $customer['account_id'] = $customer_id;


         $result = DB::table('customer')->insert($customer);
         if($result)
         {
             Session::put('mess','Thêm Khách hàng thành công !');
             return redirect()->route('customer.create');
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
        $customer = Customer::where('customer_id',$id)->get();
        foreach($customer as $i)
        {
            $ac_id = $i->account_id;
        }
       $ac = DB::table('account')->where('account_id',$ac_id)->first();

        return view('pages.admin.customer.edit',compact('customer','ac'));
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
        //vì dây là thêm kh nên role_id=3
        // dd($request->customer_birth );

        if($request->password != ''&& $request->customer_birth != null)
        {
            $account['username'] =$request->username;
            $account['password'] =  Hash::make($request->password);
            $account['role_id'] = 3;
            $customer_id = DB::table('customer')->where('customer_id',$id)->first();
            $ac_id = $customer_id->account_id;
            //    dd($ac_id);
            DB::table('account')->where('account_id',$ac_id)->update($account);
            $customer['rank_id'] =$request->rank_id;
            $customer['customer_name'] =$request->customer_name;
            $customer['customer_birth'] =$request->customer_birth;
            $customer['customer_tel'] =$request->customer_tel;
            $customer['customer_gender'] =$request->customer_gender;
            $customer['customer_email'] =$request->customer_email;
            $customer['customer_address'] =$request->customer_address;
            $customer['customer_identity_card'] =$request->customer_identity_card;
            $customer['account_id'] =  $ac_id;
            // dd($st[ff);
            $result =  DB::table('customer')->where('customer_id',$id)->update($customer);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');
                return redirect()->route('customer.index');
            }


        }

       if($request->password == '' && $request->customer_birth != null)
           {

            $customer_id = DB::table('customer')->where('customer_id',$id)->first();
            $ac_id = $customer_id->account_id;
            //    dd($ac_id);
            DB::table('account')->where('account_id',$ac_id)->update($account);
            $customer['rank_id'] =$request->rank_id;
            $customer['customer_name'] =$request->customer_name;
            $customer['customer_birth'] =$request->customer_birth;
            $customer['customer_tel'] =$request->customer_tel;
            $customer['customer_gender'] =$request->customer_gender;
            $customer['customer_email'] =$request->customer_email;
            $customer['customer_address'] =$request->customer_address;
            $customer['customer_identity_card'] =$request->customer_identity_card;
            $customer['account_id'] =  $ac_id;
            // dd($st[ff);
            $result =DB::table('customer')->where('customer_id',$id)->update($customer);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');
                return redirect()->route('customer.index');
            }
        }

       if($request->password == '' && $request->customer_birth == null)
           {


            $customer_id = DB::table('customer')->where('customer_id',$id)->first();
            $ac_id = $customer_id->account_id;
            $customer_birth=$customer_id->customer_birth;

            $customer['rank_id'] =$request->rank_id;
            $customer['customer_name'] =$request->customer_name;
            $customer['customer_birth'] =$customer_birth;
            $customer['customer_tel'] =$request->customer_tel;
            $customer['customer_gender'] =$request->customer_gender;
            $customer['customer_email'] =$request->customer_email;
            $customer['customer_address'] =$request->customer_address;
            $customer['customer_identity_card'] =$request->customer_identity_card;
            $customer['account_id'] =  $ac_id;
            // dd($customer);
            $result = DB::table('customer')->where('customer_id',$id)->update($customer);
            if($result)
            {
                Session::put('mess','Cập nhật nhân viên thành công !');

            }
            return redirect()->route('customer.index');
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


        $data =  Customer::where('customer_id',$id)->get();
        $customer = Customer::where('customer_id',$id)->delete();
        foreach($data as $val)
        {
            $ac_id = $val->account_id;
        }

        $account = Account::where('account_id',$ac_id)->delete();


        if($customer){
            Session::put('mess','Xóa nhân viên thành công !');
            return redirect()->route('customer.index');
        }

    }

    public function find(Request $req){
        if($req->loc==0){
        $cus=  Customer::where('customer_name','like','%'.$req->name.'%')
                         ->OrWhere('customer_email','like','%'.$req->name.'%')
                         ->OrWhere('customer_birth','like','%'.$req->name.'%')
                         ->OrWhere('customer_tel','like','%'.$req->name.'%')
                         -> OrWhere('customer_gender','like','%'.$req->name.'%')
                         -> OrWhere('customer_address','like','%'.$req->name.'%')
                         -> OrWhere('customer_identity_card','like','%'.$req->name.'%')
        // ->paginate(5)
        ->get();}

        // $rank=  Rank::where('rank_id','like',$req->name)
        // ->get();

        // DB::table('customer')
        //   ->whereExists(function ($query,$req) {
        //       $query->select(DB::raw(7))
        //             ->from('customer')
        //             ->whereRaw('customer_name','like','%'.$req->name.'%')
        //             ->OrWhere('customer_email','like','%'.$req->name.'%')
        //             ->OrWhere('customer_birth','like','%'.$req->name.'%')
        //             ->OrWhere('customer_tel','like','%'.$req->name.'%')
                    // -> OrWhere('customer_gender','like','%'.$req->name.'%')
        //             -> OrWhere('customer_address','like','%'.$req->name.'%')
        //             -> OrWhere('	customer_identity_card','like','%'.$req->name.'%')
        //             ->get();
        //   })
        //   ->get();
        //   dd($query);
        else{
        $cus=  Customer::where('rank_id','like',$req->name)
        ->get();
        }
        $tukhoa = $req->name;
        return view('pages.admin.customer.find',compact('cus','tukhoa'));

    }
}
