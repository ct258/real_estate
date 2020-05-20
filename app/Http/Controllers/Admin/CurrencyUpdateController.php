<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =DB::table('currency')->get();
        return view('pages.admin.currency.index',compact('data'));
    }
    public function edit($id)
    {
       
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gia = (int)$request->money;

        $data['currency_rate']= 1/$gia;

        $result = DB::table('currency')->where('currency_id',$id)->update($data);
        if($result){
            Session::put('mess','Cập nhật tỉ giá thành công !');
             return redirect()->route('currency.index');
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
        //
    }
}
