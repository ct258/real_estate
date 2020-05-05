<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use DB;
use Carbon\Carbon;
class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logo()
    {
        // ->max('banner_id')
        $data = DB::table('banner')->where('banner_type','Logo')->get();
        // dd($data);
        return view('pages.admin.display.logo',compact('data'));
    }


    public function storelogo(Request $request)
    {
        // $logo->save();
        // return redirect()->back();

        if ($request->hasFile('avatar')) {
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            // $name_file=$file.'.'.$type_file;

            //lưu filed
            $request->file('avatar')->move(
            public_path('/img/banner/logo'), //nơi cần lưu
            $file,
            );

        $logo = new Banner;
        $logo->banner_title = $file;
        $logo->banner_path = public_path('/img/banner/logo');
        $logo->banner_type = 'Logo';
        
            $logo->save();
            return redirect()->route('logo')->with('success', 'Đã thêm thành công logo');
            
    }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        

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
        if ($request->hasFile('avatar')) {
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            // $name_file=$file.'.'.$type_file;

            //lưu filed
            $request->file('avatar')->move(
            public_path('img\banner'), //nơi cần lưu
            $file,
            );
            
        }

        DB::table('banner')->where('banner_id',$id )
        ->update(['banner_title' => $file,
         'banner_path'=> public_path('img\banner') ]
        );

        // dd($blog[0]->blog_translation_title);
        return view('pages.admin.display.banner');
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
