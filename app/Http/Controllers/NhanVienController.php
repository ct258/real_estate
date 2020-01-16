<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien = NhanVien::all();

        return view('pages.admin.nhanvien.index', compact('nhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.nhanvien.create');
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
        NhanVien::insert([
            'nv_ma' => $request->nv_ma,
            'nv_ten' => $request->nv_ten,
            'nv_sdt' => $request->nv_sdt,
            'nv_diachi' => $request->nv_diachi,
            'nv_ngaysinh' => $request->nv_ngaysinh,
            'nv_gioitinh' => $request->nv_gioitinh,
        ]);

        return redirect('nhanvien/create')->with('success', 'Đã thêm thành công nhân viên');
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
    public function edit($nv_id)
    {
        $nhanvien = NhanVien::findorFail($nv_id);

        return view('pages.admin.nhanvien.edit', compact('nhanvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
