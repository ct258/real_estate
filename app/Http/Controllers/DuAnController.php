<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuAn;
use App\Models\TinhThanhPho;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;
use App\Models\DuongPho;
use Auth;

class DuAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::guard('taikhoan')->user());
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
        $ttp = TinhThanhPho::select('ttp_id', 'ttp_ten')->orderBy('ttp_ten', 'asc')->get();
        $qh = QuanHuyen::select('qh_id', 'qh_ten')->orderBy('ttp_id', 'asc')->get();

        return view('pages.admin.duan.create', compact('ttp', 'qh'));
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

    public function visits()
    {
        return visits($this);
    }

    public function get_quanhuyen($ttp_id)
    {
        $quanhuyen = QuanHuyen::select('qh_id', 'qh_ten')->where('ttp_id', $ttp_id)->orderBy('qh_ten', 'asc')->get();

        echo "<option value=''>-- Chọn Quận/Huyện --</option>";

        foreach ($quanhuyen as $item) {
            echo "<option value='".$item->qh_id."'>".$item->qh_ten.'</option>';
        }
    }

    public function get_phuongxa($ttp_id, $qh_id)
    {
        $phuongxa = PhuongXa::select('px_id', 'px_ten')
        ->where([
            ['ttp_id', $ttp_id],
            ['qh_id', $qh_id], ])
        ->orderBy('px_ten', 'asc')->get();
        echo "<option value=''>-- Chọn Phường/Xã --</option>";
        foreach ($phuongxa as $item) {
            echo "<option value='".$item->px_id."'>".$item->px_ten.'</option>';
        }
    }

    public function get_duongpho1($ttp_id)
    {
        $duongpho = DuongPho::select('dp_id', 'dp_ten')
        ->where('ttp_id', $ttp_id)
        ->orderBy('dp_ten', 'asc')->get();

        echo "<option value=''>-- Chọn Đường/Phố --</option>";

        foreach ($duongpho as $item) {
            echo "<option value='".$item->dp_id."'>".$item->dp_ten.'</option>';
        }
    }

    public function get_duongpho2($ttp_id, $qh_id)
    {
        $duongpho = DuongPho::select('dp_id', 'dp_ten')
        ->where([
            ['ttp_id', $ttp_id],
            ['qh_id', $qh_id], ])
        ->orderBy('dp_ten', 'asc')->get();

        echo "<option value=''>-- Chọn Đường/Phố --</option>";

        foreach ($duongpho as $item) {
            echo "<option value='".$item->dp_id."'>".$item->dp_ten.'</option>';
        }
    }

    // public function reset_quanhuyen($ttp_id)
    // {
    //     if ($ttp_id == 1) {
    //         echo "<option value=''>- Chọn Đường -</option>";
    //     }
    // }

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
