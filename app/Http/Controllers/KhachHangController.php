<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachhang = KhachHang::all();

        return view('pages.admin.khachhang.index',compact('khachhang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KhachHang::insert([
            'kh_hoten' => $request->kh_hoten,
            'kh_ngaysinh' => $request->kh_ngaysinh,
            'kh_sdt' => $request->kh_sdt,
            'kh_diachi' => $request->kh_diachi,
            'kh_cmnd' => $request->kh_cmnd,
            'kh_ngaycap' => $request->kh_ngaycap,
            'kh_noicap' => $request->kh_noicap,
            
        ]);

        return redirect('khachhang/')->with('success', 'Đã thêm thành công khách hàng!');
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
    public function edit($kh_id)
    {
        $khachhang =KhachHang::findorFail($kh_id);

        return view('pages.admin.khachhang.edit', compact('khachhang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kh_id)
    {
        KhachHang::where('kh_id', $kh_id)
        ->update([
            'kh_hoten' => $request->kh_hoten,
            'kh_ngaysinh' => $request->kh_ngaysinh,
            'kh_sdt' => $request->kh_sdt,
            'kh_diachi' => $request->kh_diachi,
            'kh_cmnd' => $request->kh_cmnd,
            'kh_ngaycap' => $request->kh_ngaycap,
            'kh_noicap' => $request->kh_noicap,
        ]);

        return redirect('khachhang')->with('success', 'Đã cập nhật thành công khách hàng');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kh_id)
    {
        KhachHang::where('kh_id', $kh_id)->delete();

        return redirect('khachhang')->with('success', 'Đã Xóa thành công khách hàng');
    }
}
