<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatDongSan;
use App\Models\TinhThanhPho;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;
use App\Models\DuongPho;
use App\Models\ChiTietHinhAnh;
use DB;
use Carbon\Carbon;

class BatDongSanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytime = Carbon::now();
        echo $mytime->toDateTimeString();
        $bds = BatDongSan::all();

        return view('pages.admin.batdongsan.index', compact('bds'));
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

        return view('pages.admin.batdongsan.create', compact('ttp', 'qh'));
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
        if ($request->hasFile('avatar')) {
            $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            $real_estate_id = BatDongSan::insertGetId(array(
                    'bds_ten' => $request->name,
                    'bds_gia' => $request->price,
                    'bds_diachi' => $request->address,
                    'bds_dientich' => $request->acreage,
                    'bds_loaidat' => $request->category,
                    'bds_mota' => $request->description,
                    'loaibds_id' => 1,
                ));

            $file_name = $request->file('avatar')->getClientOriginalName(); //Trả về tên file
            //lưu file
            $request->file('avatar')->move(
            'img/Product', //nơi cần lưu
            $file_name,
            );
            $avatar_path = DB::table('hinhanh')->insertGetId(array(
                'ha_duongdan' => 'img/Product/'.$time.'_'.$file_name,
            ));

            ChiTietHinhAnh::insert([
                'bds_id' => $real_estate_id,
                'ha_id' => $avatar_path,
                'ctha_mota' => 'Avatar',
            ]);
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $value) {
                    $file_name = $value->getClientOriginalName();
                    $value->move(
                        'img/Product', //nơi cần lưu
                        $file_name,
                        );
                    $hinhanh = DB::table('hinhanh')->insertGetId(array(
                        'ha_duongdan' => 'img/Product/'.$time.'_'.$file_name,
                    ));
                    ChiTietHinhAnh::insert([
                        'bds_id' => $real_estate_id,
                        'ha_id' => $hinhanh,
                        'ctha_mota' => 'Image',
                    ]);
                }
            }
            //     $this->validate($request, [
            //         'book_title' => 'required',
            //         'book_price' => 'required',
            //         'sale_price' => 'required',
            //    ]);

            return redirect('batdongsan')->with('success', 'Đã thêm thành công bất động sản');
        } else {
            return redirect()->back()->withInput()->with('error', 'Bất động sản phải có hình ảnh');
        }
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
    public function edit($batdongsan_id)
    {
        $batdongsan = BatDongSan::findOrFail($batdongsan_id);

        return view('pages.admin.batdongsan.edit', compact('batdongsan', 'batdongsan_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $batdongsan_id)
    {
        BatDongSan::where('bds_id', $batdongsan_id)
        ->update([
            'bds_ten' => $request->name,
            'bds_gia' => $request->price,
            'bds_mota' => $request->description,
            'bds_trangthai' => $request->status,
            'bds_diachi' => $request->address,
            'bds_dientich' => $request->acreage,
        ]);

        return redirect('batdongsan')->with('success', 'Đã cập nhật thành công dự án');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($batdongsan_id)
    {
        BatDongSan::where('bds_id', $batdongsan_id)->delete();

        return redirect('batdongsan')->with('success', 'Đã xóa thành công dự án');
    }

    //xem các dự án đã xóa
    public function index_trash()
    {
        $daxoa = BatDongSan::withTrashed()->get();

        return view('pages.admin.daxoa.batdongsan', compact('daxoa'));
    }

    //khôi phục lại dự án đó
    public function restore($batdongsan_id)
    {
        BatDongSan::where('bds_id', $batdongsan_id)->restore();
        //xóa vĩnh viên forceDelete()

        return redirect('batdongsan')->with('success', 'Đã khôi phục thành công dự án');
    }
}
