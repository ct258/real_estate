<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Form;
use App\Models\Province;
use App\Models\Image;
use App\Models\Translation;
use App\Models\RealEstate;
use App\Models\Unit;
use App\Models\Convenience;
use Carbon\Carbon;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form=Form::join('form_translation','form.form_id','form_translation.form_id')
        ->where("form_translation_locale",\Session::get('lang', config('app.locale')))
        ->get();
        $type=Type::join('type_translation','type.type_id','type_translation.type_id')
        ->where("type_translation_locale",\Session::get('lang', config('app.locale')))
        ->get();
        $province = Province::select('province_id', 'province_name')->orderBy('province_name', 'asc')->get();

        return view('pages.user.account.post', compact('type', 'form', 'province'));
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
        // var_dump($request->request);die;
        if($request->bando==false){

            $real_estate_longitude=null;
            $real_estate_latitude=null;
        }
        $real_estate_longitude=floatval(substr($request->LatLng,0,strpos($request->LatLng,",")));
        $real_estate_latitude=floatval(trim(strstr($request->LatLng," ")));
        // dd($real_estate_longitude);
        if ($request->hasFile('avatar')) {
            $unit=Unit::where('unit_id',$request->unit)->first();
            $customer_id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
            $file=$request->file('avatar')->getClientOriginalName();
            $type_file = \File::extension($file);
            $time=str_replace([':', '-', ' '], '_', date('Y-m-d H:i:s'));
            $name_file="Customer_".md5($customer_id).'_'.$time.'.'.$type_file;

            //lưu filed
            $request->file('avatar')->move(
            public_path('/img/Product/'.$customer_id), //nơi cần lưu
            $name_file,
            );

            $real_estate_id = RealEstate::insertGetId(array(
                    'real_estate_price' => $request->price*$unit->unit_value,
                    'real_estate_acreage' => $request->acreage,
                    'type_id' => $request->type,
                    'street_id' => $request->street,
                    'ward_id' => $request->ward,
                    'district_id' => $request->district,
                    'unit_id' => $request->unit,
                    'real_estate_status' => "Đang bán",
                    'real_estate_contract' => $request->contract,
                    'real_estate_deposit' => $request->deposit*$unit->unit_value,
                    'real_estate_avatar' =>'img/Product/'.$customer_id.'/'.$name_file,
                    'real_estate_longitude' =>$real_estate_longitude,
                    'real_estate_latitude' =>$real_estate_latitude,
                    'customer_id' => $customer_id,
                ));
            Translation::insert([[
                    'translation_name' => $request->name_vi,
                    'translation_description' => $request->description_vi,
                    'translation_address' => $request->address_vi,
                    'translation_locale' => 'vi',
                    'real_estate_id' => $real_estate_id,
            ],[
                'translation_name' => $request->name_en,
                'translation_description' => $request->description_en,
                'translation_address' => $request->address_en,
                'translation_locale' => 'en',
                'real_estate_id' => $real_estate_id,
            ]]);
            if($request->house=='true'){
                Convenience::insert([
                    'convenience_facade'=>$request->convenience_facade,
                    'convenience_way'=>$request->convenience_way,
                    'convenience_floor'=>$request->convenience_floor,
                    'convenience_bedroom'=>$request->convenience_bedroom,
                    'convenience_bathroom'=>$request->convenience_bathroom,
                    'convenience_air_conditioning'=>$request->Air_conditioning,
                    'convenience_BBQ_area'=>$request->BBQ_area,
                    'convenience_CCTV'=>$request->CCTV,
                    'convenience_concierge'=>$request->Concierge,
                    'convenience_fitness'=>$request->Fitness,
                    'convenience_garden'=>$request->Garden,
                    'convenience_library'=>$request->Library,
                    'convenience_mountain_view'=>$request->Mountain_view,
                    'convenience_parking'=>$request->Packing,
                    'convenience_playground'=>$request->Playground,
                    'convenience_ocean_view'=>$request->Sea,
                    'convenience_security'=>$request->Security,
                    'convenience_swimming_pool'=>$request->Swimming_pool,
                    'convenience_tennis'=>$request->Tennis,
                    'convenience_wifi'=>$request->wifi,
                    'direction_code'=>$request->direction,
                    'real_estate_id'=>$real_estate_id,
                ]);
            }

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $value) {
                    $file=$value->getClientOriginalName();
                    $type_file = \File::extension($file);
                    $time=str_replace([':', '-', ' '], '_', date('Y-m-d H:i:s'));
                    $name_file="Customer_".md5($customer_id).'_'.$time.'.'.$type_file;
        
                    //lưu filed
                    $value->move(
                    public_path('/img/Product/'.$customer_id), //nơi cần lưu
                    $name_file,
                    );
                    Image::insert([
                        'real_estate_id' => $real_estate_id,
                        'image_path' => '/img/Product/'.$customer_id.'/'.$name_file,
                    ]);
                    sleep(1);
                }
            }

            return redirect()->route('account.my_re')->with('success', 'Đã thêm thành công bất động sản');
        } else {
            return redirect()->back()->withInput()->with('error', 'Bất động sản phải có hình ảnh');
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
    public function edit($real_estate_id)
    {

        $real_estate = RealEstate::leftjoin('convenience','convenience.real_estate_id','real_estate.real_estate_id')
        ->join('type','type.type_id','real_estate.type_id')
        ->join('type_translation','type.type_id','type_translation.type_id')
        ->join('form','form.form_id','type.form_id')
        ->join('form_translation','form.form_id','form_translation.form_id')
        ->join('unit','unit.unit_id','real_estate.unit_id')
        ->join('unit_translation','unit.unit_id','unit_translation.unit_id')
        ->join('ward','ward.ward_id','real_estate.ward_id')
        ->join('district','district.district_id','ward.district_id')
        ->join('province','province.province_id','district.province_id')
        ->leftjoin('street','street.street_id','real_estate.street_id')
        ->where([
            ['real_estate.real_estate_id',$real_estate_id],
            ['form_translation_locale',\Session::get('lang',config('app.locale'))],
            ['type_translation_locale',\Session::get('lang',config('app.locale'))],
            ['unit_translation_locale',\Session::get('lang',config('app.locale'))],
            ])->first();
        $real_estate->real_estate_price=$real_estate->real_estate_price/$real_estate->unit_value;
        // dd($real_estate);
            $tran_vi=RealEstate::join('translation','translation.real_estate_id','real_estate.real_estate_id')
            ->where('translation_locale','vi')->first();
            $tran_en=RealEstate::join('translation','translation.real_estate_id','real_estate.real_estate_id')
            ->where('translation_locale','en')->first();

        $image=Image::where('real_estate_id',$real_estate_id)->get();
        $form=Form::join('form_translation','form.form_id','form_translation.form_id')->where('form_translation_locale',\Session::get('lang',config('app.locale')))->get();
        $province=Province::all();
        return view('pages.user.account.edit',compact('tran_en','tran_vi','real_estate','image','form','province'));
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
    public function sold($id)
    {
        // dd($id);
        $data['real_estate_status']='Chờ xác nhận';
         DB::table('real_estate')->where('real_estate_id',$id)->update($data);
         return  redirect()->route('account.my_re');

    }
}
