<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session; 
use Hash;
class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('code_type')->get();
        return view('pages.admin.promotion.index',compact('data'));
    }



    public function create()
    {
        
        return view('pages.admin.promotion.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['code_type_name'] = $request->code_type_name;

        $result = DB::table('code_type')->insert($data);
        if($result )
        {
            Session::put('mess','Thêm loại khuyến mãi thành công!');
            return view('pages.admin.promotion.create');
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
    public function edit($id)
    {
        
        $data = DB::table('code_type')->where('code_type_id',$id)->first();
        
        return view('pages.admin.promotion.edit',compact('data'));
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
       
        $name['code_type_name'] =$request->code_type_names;

        
        $data1 = DB::table('code_type')->where('code_type_id',$id)->update($name);
        if($data1)
        {
            $data = DB::table('code_type')->get();
            Session::put('mess','Cập nhật loại khuyến mãi thành công!');
            return view('pages.admin.promotion.index',compact('data'));
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
        $data1 = DB::table('code_type')->where('code_type_id',$id)->delete();
        if($data1)
        {
            $data = DB::table('code_type')->get();
            Session::put('mess','Xóa loại khuyến mãi thành công!');
            return view('pages.admin.promotion.index',compact('data'));
        }
    }
}
