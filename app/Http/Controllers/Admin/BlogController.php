<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTranslation;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::join('blog_translation','blog.blog_id','blog_translation.blog_id')
        ->join('staff','staff.staff_id','blog.staff_id')
        // ->select('blog.blog_id',
        // 'blog.created_at',
        // 'blog_translation_title',
        // 'staff_name')
        ->where('blog_translation_locale','vi')
        ->paginate(10);
        return view('pages.admin.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        // request()->validate([
        //         'g-recaptcha-response' => 'required|captcha',
        //     ]);
            
            
        if ($request->hasFile('avatar')) {
            $staff_id=\Auth::guard('account')->user()->load('staff')->staff->staff_id;
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            $time=str_replace([':', '-', ' '], '_', date('Y-m-d H:i:s'));
            $name_file="Staff_".md5($staff_id).'_'.$time.'.'.$type_file;

            //lưu filed
            $request->file('avatar')->move(
            public_path('/img/blog/'), //nơi cần lưu
            $name_file,
            );

            $blog_id=Blog::insertGetId([
                'staff_id'=>$staff_id,
                'blog_avatar'=>'img/blog/'.$name_file,
            ]);
            BlogTranslation::insert([[
                    'blog_id'=>$blog_id,
                    'blog_translation_title'=>$request->title_vi,
                    'blog_translation_content'=>$request->content_vi,
                    'blog_translation_content'=>$request->intro_vi,
                    'blog_translation_locale'=>'vi',
                ],[
                    'blog_id'=>$blog_id,
                    'blog_translation_title'=>$request->title_en,
                    'blog_translation_content'=>$request->content_en,
                    'blog_translation_intro'=>$request->intro_en,
                    'blog_translation_locale'=>'en',
                ]
            ]);
        }
    return view('pages.admin.blog.create');
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
    public function edit($blog_id)
    {
        $blog=Blog::join('blog_translation','blog.blog_id','blog_translation.blog_id')
        ->select('blog.blog_id',
        'blog_avatar',
        'blog_translation_title',
        'blog_translation_content',
        'blog_translation_locale'
        )
        ->where('blog.blog_id',$blog_id)
        ->get();
        // dd($blog[0]->blog_translation_title);
        return view('pages.admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        dd($request);
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
