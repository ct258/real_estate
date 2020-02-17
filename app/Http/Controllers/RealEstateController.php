<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\RealEstate;
use App\Models\Type;
use App\Models\Form;
use App\Models\Image;
use App\Models\ImageRealEstate;
use Carbon\Carbon;

class RealEstateController extends Controller
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
        $real_estate = RealEstate::all();

        return view('pages.admin.real_estate.index', compact('real_estate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = Form::select('form_id', 'form_name')->get();
        $province = Province::select('province_id', 'province_name')->orderBy('province_name', 'asc')->get();

        return view('pages.admin.real_estate.create', compact('province', 'form'));
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
            $real_estate_id = RealEstate::insertGetId(array(
                    'real_estate_name' => $request->name,
                    'real_estate_price' => $request->price,
                    'real_estate_address' => $request->address,
                    'real_estate_acreage' => $request->acreage,
                    'real_estate_description' => $request->description,
                    'loaibds_id' => 1,
                ));

            $file_name = $request->file('avatar')->getClientOriginalName(); //Trả về tên file
            //lưu file
            $request->file('avatar')->move(
            'img/Product', //nơi cần lưu
            $file_name,
            );
            $avatar_path = Image::insertGetId(array(
                'image_path' => 'img/Product/'.$time.'_'.$file_name,
            ));

            ImageRealEstate::insert([
                'real_estate_id' => $real_estate_id,
                'image_id' => $avatar_path,
                'image_real_estate_note' => 'Avatar',
            ]);
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $value) {
                    $file_name = $value->getClientOriginalName();
                    $value->move(
                        'img/Product', //nơi cần lưu
                        $file_name,
                        );
                    $hinhanh = Image::insertGetId(array(
                        'image_path' => 'img/Product/'.$time.'_'.$file_name,
                    ));
                    ImageRealEstate::insert([
                        'real_estate_id' => $real_estate_id,
                        'image_id' => $hinhanh,
                        'image_real_estate_note' => 'Image',
                    ]);
                }
            }

            return redirect('real_estate')->with('success', 'Đã thêm thành công bất động sản');
        } else {
            return redirect()->back()->withInput()->with('error', 'Bất động sản phải có hình ảnh');
        }
    }

    public function visits()
    {
        return visits($this);
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
    public function edit($real_estate_id)
    {
        $real_estate = RealEstate::findOrFail($real_estate_id);

        return view('pages.admin.real_estate.edit', compact('real_estate', 'real_estate_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $real_estate_id)
    {
        RealEstate::where('real_estate_id', $real_estate_id)
        ->update([
            'real_estate_name' => $request->name,
            'real_estate_price' => $request->price,
            'real_estate_description' => $request->description,
            'real_estate_status' => $request->status,
            'real_estate_address' => $request->address,
            'real_estate_acreage' => $request->acreage,
        ]);

        return redirect('real_estate')->with('success', 'Đã cập nhật thành công dự án');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($real_estate_id)
    {
        RealEstate::where('real_estate_id', $real_estate_id)->delete();

        return redirect('real_estate')->with('success', 'Đã xóa thành công dự án');
    }

    //xem các dự án đã xóa
    public function index_trash()
    {
        $removed = RealEstate::withTrashed()->get();

        return view('pages.admin.removed.real_estate', compact('removed'));
    }

    //khôi phục lại dự án đó
    public function restore($real_estate_id)
    {
        RealEstate::where('real_estate_id', $real_estate_id)->restore();
        //xóa vĩnh viên forceDelete()

        return redirect('real_estate')->with('success', 'Đã khôi phục thành công dự án');
    }

    public function get_type($form_id)
    {
        $type = Type ::select('type_id', 'type_name')->where('form_id', $form_id)->get();

        echo "<option value=''>-- Chọn --</option>";

        foreach ($type as $item) {
            echo "<option value='".$item->type_id."'>".$item->type_name.'</option>';
        }
    }
}
