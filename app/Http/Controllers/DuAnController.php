<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuAn;

class DuAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duan = DuAn::all();

        return view('pages.admin.duan.index', compact('duan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.duan.create');
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
        DuAn::insert([
            'da_ten' => $request->name,
            'da_gia' => $request->price,
            'da_diachi' => $request->address,
            'da_dientich' => $request->acreage,
            'da_trangthai' => $request->status,
            'da_mota' => $request->description,
        ]);

        return redirect('duan')->with('success', 'Đã thêm thành công dự án');
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
    public function edit($duan_id)
    {
        $duan = DuAn::findOrFail($duan_id);

        return view('pages.admin.duan.edit', compact('duan', 'duan_id'));
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
        // dd($request);
        // DuAn::select('')->where('ádasd','>','ád')->get();
        DuAn::where('da_id', $duan_id)
        ->update([
            'da_ten' => $request->name,
            'da_gia' => $request->price,
            'da_mota' => $request->description,
            'da_trangthai' => $request->status,
            'da_diachi' => $request->address,
            'da_dientich' => $request->acreage,
        ]);

        return redirect('duan')->with('success', 'Đã cập nhật thành công dự án');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($duan_id)
    {
        DuAn::where('da_id', $duan_id)->delete();

        return redirect('duan')->with('success', 'Đã xóa thành công dự án');
    }

    public function restore($duan_id)
    {
        DuAn::where('da_id', $duan_id)->restore();

        return redirect('duan')->with('success', 'Đã khôi phục thành công dự án');
    }
}
