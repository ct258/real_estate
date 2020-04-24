<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rank;
use App\Models\RankTranslation;
use DB;
use Session;
class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('rank')->join('rank_translation','rank.rank_id','rank_translation.rank_id')
        ->where('rank_translation.rank_translation_locale','vi')->get();
        // dd($data);

        return view('pages.admin.rank.index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         return view('pages.admin.rank.create');
     }
    public function store(Request $request)
    {
        $level = $request->rank_level;
       
        $rank_id = DB::table('rank')->insertGetId([
            'rank_level' => $level
        ]);
         // dd($level);
         $rank_vi['rank_translation_name'] = $request->rank_translation_name;
         $rank_vi['rank_translation_description']  = $request->rank_translation_des;
         $rank_vi['rank_translation_locale']  ='vi' ;
         $rank_vi['rank_id']=$rank_id;
         // dd($rank_vi);
         $rank_en['rank_translation_name'] = $request->rank_translation_name_en;
         $rank_en['rank_translation_description']  = $request->rank_translation_des_en;
         $rank_en['rank_translation_locale']  ='en' ;
         $rank_en['rank_id']=$rank_id;
        
         
       $result1 = DB::table('rank_translation')->insert($rank_vi);
        if($result1)
        {
             $result2 = DB::table('rank_translation')->insert($rank_en);
        }
      
       if($result1 == true && $result2 == true)
       {
           Session::put('mess','Thêm thành công loại thành viên');
           return view('pages.admin.rank.create');
       }
       
    }

    public function edit($id){


        $data1 = DB::table('rank')->join('rank_translation','rank.rank_id','rank_translation.rank_id')
        ->where('rank_translation.rank_id',$id)->where('rank_translation_locale','vi')->first();
        // dd($data1);
        $data2 = DB::table('rank')->join('rank_translation','rank.rank_id','rank_translation.rank_id')
        ->where('rank_translation.rank_id',$id)->where('rank_translation_locale','en')->first();
        

        return view('pages.admin.rank.edit',compact('data1','data2'));
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
        $level = $request->rank_level;
       
        DB::table('customer')->where('customer_id',$id)->update([
            'rank_level' => $level
        ]);
        $rank_id = $id;
         // dd($level);
         $rank_vi['rank_translation_name'] = $request->rank_translation_name;
         $rank_vi['rank_translation_description']  = $request->rank_translation_des;
         $rank_vi['rank_translation_locale']  ='vi' ;
         $rank_vi['rank_id']=$rank_id;
         // dd($rank_vi);
         $rank_en['rank_translation_name'] = $request->rank_translation_name_en;
         $rank_en['rank_translation_description']  = $request->rank_translation_des_en;
         $rank_en['rank_translation_locale']  ='en' ;
         $rank_en['rank_id']=$rank_id;

         $data = DB::table('rank')->join('rank_translation','rank.rank_id','rank_translation.rank_id')
         ->where('rank_translation.rank_translation_locale','vi')->get();

       $result1 = DB::table('rank_translation')->where('rank_id',$id)->update($rank_vi);
       $result2 = DB::table('rank_translation')->where('rank_id',$id)->update($rank_en);
       if($result1 == true && $result2 == true)
       {
           Session::put('mess','Cập nhật thành công loại thành viên');
           return view('pages.admin.rank.index',compact('data'));

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
        $result = DB::table('rank')->where('rank_id',$id)->delete();
        $data = DB::table('rank')->join('rank_translation','rank.rank_id','rank_translation.rank_id')
        ->where('rank_translation.rank_translation_locale','vi')->get();
        if($result){
            Session::put('mess','Xóa thành công loại thành viên');
            return view('pages.admin.rank.index',compact('data'));
        }
    }
}
