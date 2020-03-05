<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HDDC;

class HDDCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $hddc = HDDC::all();

        return view('pages.admin.hddc.index', compact('hddc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.hddc.create');
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
        HDDC::insert([
            'hddc_ma' => $request->hddc_ma,
            'hddc_tiencoc' => $request ->hddc_tiencoc,
            'hddc_ngaydc' => $request->hddc_ngaydc,
        ]);

        return redirect('hddc/create')->with('success', 'Đã thêm thành công hợp đồng đặt cọc');   
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
    public function edit($hddc_id)
    {
        $hddc = HDDC::findOrFail($hddc_id);

        return view('pages.admin.hddc.edit', compact('hddc', 'hddc_id'));
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
    public function destroy($hddc_id)
    {
        HDDC::where('hddc_id', $hddc_id)->delete();

        return redirect('hddc')->with('success', 'Đã xóa thành công dự án');
    }

    public function restore($hddc_id)
    {
        HDDC::where('hddc_id', $hddc_id)->restore();

        return redirect('hddc')->with('success', 'Đã khôi phục thành công dự án');
    }
}
