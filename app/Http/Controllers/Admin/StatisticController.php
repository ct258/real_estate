<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DepositContract;
use App\Models\DetailFee;
use App\Models\RealEstate;
use App\Models\District;
use App\Models\Cart;
use Carbon;
// use App\Speed;
use DB;


class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function real_estate()
    {

            $range = \Carbon\Carbon::now()->subYears(5)->format('Y-m-d H:i:s');
            $realMonths = DB::table('real_estate')
                        ->select(DB::raw('month(created_at) as getMonth'), DB::raw('COUNT(*) as value'))
                        ->where('created_at', '>=', $range)
                        ->groupBy('getMonth')
                        ->orderBy('getMonth', 'ASC')
                        ->get();
            $realWeeks = DB::table('real_estate')
                        ->select(DB::raw('week(created_at) as getWeek'), DB::raw('COUNT(*) as value'))
                        ->where('created_at', '>=', $range)
                        ->groupBy('getWeek')
                        ->orderBy('getWeek', 'ASC')
                        ->get();

            $getDays = DB::table('real_estate')
                        ->select(DB::raw('date(created_at) as getDay'), DB::raw('COUNT(*) as value'))
                       ->where('created_at', '>=', $range)
                        ->groupBy('getDay')
                        ->orderBy('getDay', 'ASC')
                        ->get();
                        $cotNgay= date('Y-m-d H:i:s');
            // $cotNgay ->format('Y-m-d H:i:s') ;
            $cotNgay =$getDays->pluck('getDay');

            $giaTriNgay= $getDays-> pluck('value');
            // dd($cotNgay);

            // return view('fdfadmin.chart.get_year', compact('orderYear'));

    // function orderByYear() mình sẽ lấy tổng các order trong vòng 5 năm tính từ năm hiện tại và fill vào **bar chart**

        // $real = DB::table('real_estate')->get();
        // dd($realMonths);
        // dd($realWeeks);
        $cottuan1 =  $realWeeks->pluck('getWeek');
        // ->json(array(
        //     'code'  => 200,
        //     'data' => $data,
        // ));
        $cotgiatri1 =  $realWeeks->pluck('value');

        // dd($cottuan1);

        // return response()->json(array(
        //     'code'  => 200,
        //     'cottuan1' => $cottuan1,
        //     'cotgiatri1' => $cotgiatri1,
        // ));
        // return response()->json(['data'=>$cottuan1],200);
        // dd($data);
        return view('pages.admin.statistic.real_estate',compact('realMonths','realWeeks','cotgiatri1','cottuan1','giaTriNgay','cotNgay'));
    }
    public function jsonthongke(){
        // $range = \Carbon\Carbon::now()->subYears(5);
        // $realMonths = DB::table('real_estate')
        //             ->select(DB::raw('month(created_at) as getMonth'), DB::raw('COUNT(*) as value'))
        //             ->where('created_at', '>=', $range)
        //             ->groupBy('getMonth')
        //             ->orderBy('getMonth', 'ASC')
        //             ->get();
        // $realWeeks = DB::table('real_estate')
        //             ->select(DB::raw('week(created_at) as getWeek'), DB::raw('COUNT(*) as value'))
        //             ->where('created_at', '>=', $range)
        //             ->groupBy('getWeek')
        //             ->orderBy('getWeek', 'ASC')
        //             ->get();
        //  $cottuan1 =  $realWeeks->pluck('getWeek');
        //  $cotgiatri1 =  $realWeeks->pluck('value');
        //  return response()->json(['data'=>$cottuan1],200);
    }
    public function basic()
    {
         $user = DB::table('Customer')->count();
        //  deposit_contract_total_money
         $money = DB::table('deposit_contract')->sum('deposit_contract_total_money');
         $cart = DB::table('detail_fee')->sum('detail_fee_id');


        //  dd($money);
        return view('pages.admin.dashboard',compact('user','money','cart'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBanChay(){
//         SELECT province_name, COUNT(*) AS 'cho duyet'
// from district, province, real_estate
// where province.province_id = district.province_id and district.district_id = real_estate.district_id
// 	AND real_estate.real_estate_status = 'Chờ duyệt'
// GROUP BY province_name
        $cart1 = DB::table('province')
        ->join('district','province.province_id' , 'district.province_id')
        ->join('real_estate','district.district_id' ,'real_estate.district_id')
        ->select('province_name as name' ,DB::raw('COUNT(*) as value') )
        ->where('real_estate.real_estate_status','Chờ duyệt')
        ->groupBy('province_name')
        // ->limit()
        ->get();
        $a= $cart1->pluck('name');
        $a=$a->implode(", ",$a);;
        $b= $cart1->pluck('value');
        // dd($a);
        // $cart = Cart::join('detail_cart','card.card_id','detail_cart.detail_cart_id')
        // ->join('real_estate','detail_cart.real_estate_id','real_estate.real_estate_id')
        // ->join('district','real_estate.district_id','district.district_id')
        // ->join('provice','district.provice_id','provice.provice_id')
        // ->select('provice_name','real_estate_status')
        // ->where('real_estate_status','Chờ duyệt')
        // ->orderBy('', 'desc')
        // ->limit(5)
        // ->get();
        // // dd($cart);

        return view('pages.admin.statistic.cart',compact('a','b'));


    }

    public function create()
    {
        //

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
        //
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
        //
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
