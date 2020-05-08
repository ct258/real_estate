<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\RealEstate;
use App\Models\Cart;

class BillController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $cart=Cart::join('detail_cart','cart.cart_id','detail_cart.cart_id')
        ->join('real_estate','detail_cart.real_estate_id','real_estate.real_estate_id')
        ->where('cart.cart_status',$id)
        ->get();
        return view('pages.admin.bill.show',compact('cart'));
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
    public function deposit()
    {
        $cart=Cart::where('cart_status','Chờ duyệt')
        // ->get();
        // $real_estate=RealEstate::join('detail_cart','detail_cart.real_estate_id','real_estate.real_estate_id')
        // ->join('cart','cart.cart_id','detail_cart.cart_id')
        // ->where('cart_status','Chờ duyệt')
        // ->groupBy('cart.cart_id')
        ->paginate(10);

        foreach($cart as $value){
            $real_estate=RealEstate::join('detail_cart','detail_cart.real_estate_id','real_estate.real_estate_id')
            ->join('cart','cart.cart_id','detail_cart.cart_id')
            ->join('translation','translation.real_estate_id','real_estate.real_estate_id')
            ->where([['cart.cart_id',$value->cart_id],['translation_locale','vi']])
            ->get();
            $array=explode(' ',$real_estate[0]->translation_name);
            $text[$value->cart_id]='';
            for($i=0;$i<10;$i++){
                $text[$value->cart_id]=$text[$value->cart_id].' '.$array[$i];
            }
            $count=count($real_estate);
            if($count>1){
                $text[$value->cart_id]=$text[$value->cart_id].' ... và '.$count.' bất động sản khác';
            }
        }
        return view('pages.admin.bill.deposit',compact('cart','text'));
    }
}
