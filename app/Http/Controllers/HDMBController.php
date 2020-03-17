<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HDMuaBan;

class HDMBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $hdmb = HDMuaBan::all();

        return view('pages.admin.hdmb.index', compact('hdmb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.hdmb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        HDMuaBan::insert([
            'hdmb_ma' => $request->hdmb_ma,
            'hdmb_ngayki' => $request ->hdmb_ngayki,
            'hdmb_noidung' => $request->hdmb_noidung,
            'hdmb_ghichu' => $request->hdmb_ghichu,
        ]);

        return redirect('hdmb/create')->with('success', 'Đã thêm thành công hợp đồng đặt cọc');   
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($hdmb_id)
    {
        $hdmb = HDMuaBan::findOrFail($hdmb_id);

        return view('pages.admin.hdmb.edit', compact('hdmb', 'hdmb_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $duan_id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($hdmb_id)
    {
        HDMuaBan::where('hdmb_id', $hdmb_id)->delete();

        return redirect('hdmb')->with('success', 'Đã xóa thành công dự án');
    }

    public function restore($hdmb_id)
    {
        HDMuaBan::where('hdmb_id', $hdmb_id)->restore();

        return redirect('hdmb')->with('success', 'Đã khôi phục thành công dự án');
    }
}
