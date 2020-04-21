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


    // tạo khuyến mãi CODE
    public function codeindex()
    {
        $code =  DB::table('code')->get();
        return view('pages.admin.promotion.codeindex',compact('code'));
        
    }


    public function codecreate()
    {
        
        $code_type = DB::table('code_type')->get();
        $type = DB::table('type')->join('type_translation','type_translation.type_id','type.type_id')->where('type_translation.type_translation_locale','vi')->get();
        // dd($type);
       
        return view('pages.admin.promotion.codecreate',compact('code_type','type'));
    }
    public function codestore(Request $request)
    {
        
        $code_type = DB::table('code_type')->get();
        $type = DB::table('type')
        ->join('type_translation','type_translation.type_id','type.type_id')
        ->where('type_translation.type_translation_locale','vi')->get();

       $data['code_name'] = $request->code_name;
       $data['code_note'] = $request->code_note;
       $data['code_code'] = $request->code_code;
       $data['code_amount'] = $request->code_amount;
       $data['code_per'] = $request->code_per;
       $data['code_begin'] = $request->code_begin;
       $data['code_end'] = $request->code_end;
       $data['code_type_id'] = $request->code_type_id;
       $data['type_id'] = $request->type_id;
    

       $result = DB::table('code')->insert($data);
       if($result )
       {
           Session::put('mess','Thêm  khuyến mãi thành công!');
          return view('pages.admin.promotion.codecreate',compact('code_type','type'));
       }
      
    }

    public function codeedit($id)
    {
        $code_type = DB::table('code_type')->get();
        $type = DB::table('type')
        ->join('type_translation','type_translation.type_id','type.type_id')
        ->where('type_translation.type_translation_locale','vi')->get();
        $data = DB::table('code')->where('code_id',$id)->first();
       
        // dd($code_type);
        return view('pages.admin.promotion.codeedit',compact('data','code_type','type'));
    }

    public function codeupdate(Request $request, $id){

       

        $c = DB::table('code')->where('code_id',$id)->first();
        

        $data['code_name'] = $request->code_name;
        $data['code_note'] = $request->code_note;
        $data['code_amount'] = $request->code_amount;
        $data['code_per'] = $request->code_per;
        if($request->code_begin == null)
        {
            $data['code_begin'] = $c->code_begin;
        }
        else{
             $data['code_begin'] = $request->code_begin;
        }
        if($request->code_end == null)
        {
            $data['code_end'] = $c->code_end;
        }
        else{
            $data['code_end'] = $request->code_end;
        }
       
        $data['code_type_id'] = $request->code_type_id;
        $data['type_id'] = $request->type_id;
        // dd($data);
        $result = DB::table('code')->where('code_id',$id)->update($data);
        if($result)
        {
            $code =  DB::table('code')->get();
            Session::put('mess','Cập nhật khuyến mãi thành công!');
            return view('pages.admin.promotion.codeindex',compact('code'));
        }
        else{
            echo "Phải thay đổi phần trăm khuyến mãi! Đang cố gắn sữa lỗi chổ này";
        }

    }

    public function codedestroy($id)
    {
        
        $data = DB::table('code')->where('code_id',$id)->delete();
        if($data)
        {
            $code =  DB::table('code')->get();
            Session::put('mess','Xóa khuyến mãi thành công!');
            return view('pages.admin.promotion.codeindex',compact('code'));
        }
    }
}
