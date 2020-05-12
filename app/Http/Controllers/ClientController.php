<?php

namespace App\Http\Controllers;
use DB;
use App\Models\RealEstate;
use App\Models\Form;
use App\Models\Province;
use App\Models\Direction;
use App\Models\RealEstateTranslation;
use App\Models\StandardAcreage;
use App\Models\Currency;
use App\Models\Evaluate;
use App\Models\Blog;
use App\Models\CookieUser;
use App\Models\ViewProduct;
use App\Models\WishList;
use App\Models\WishListTemp;
use App\Models\Cart;
use App\Models\DetailCart;
use App\Models\Convenience;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function list($type_id)
    { 
        // dd(\Session::get('lang', config('app.locale')));
        app()->setLocale(\Session::get('lang', config('app.locale')));
        // \App::setLocale('vi');
        // $content = RealEstateTranslation::getTranslation('vi')->first();
        // dd($content);
        $real_estate = RealEstate::join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
            // ->join('image', 'real_estate.real_estate_id', 'image.real_estate_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit','unit.unit_id','real_estate.unit_id')
            ->join('unit_translation','unit.unit_id','unit_translation.unit_id')
            ->join('type','type.type_id','real_estate.type_id')
            ->select('real_estate.real_estate_id',
            'real_estate_avatar',
            'translation_name',
            'translation_address',
            'translation_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'province.province_name',
            'district.district_name',
            'unit.*',
            'unit_translation.*')
            ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'],
                ['real_estate.type_id',$type_id] ])
            ->paginate(6);
        // tính thời gian đăng
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $day=[];
        if($real_estate->isNotEmpty()){
            foreach ($real_estate as $key => $value) {
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $value->real_estate_price = ($value->real_estate_price * $rate->currency_rate)/$value->unit_value;
        }
        }
        // lấy dữ liệu cho search form
        $form = Form::join('form_translation', 'form.form_id', 'form_translation.form_id')
        ->select('form.form_id', 'form_translation_name')
        ->where('form_translation_locale', \Session::get('lang', config('app.locale')))
        ->get();
        
        $province = Province::select('province_id', 'province_name')->get();
        return view('pages.user.page.list', compact('real_estate', 'day', 'form', 'province','rate'));
    }

    public function searchFullText(Request $request)
    {
        // dd($request);
        $real_estate = RealEstate::query();
        if ($request->search) {
            $real_estate = $real_estate->FullTextSearch($request->search);
        } else { //lọc
            if ($request->type) {
                $real_estate = $real_estate->where('real_estate.type_id', $request->type);
            }
            if ($request->district) {
                $real_estate = $real_estate->join('district', 'real_estate.district_id', 'district.district_id')
                ->where('real_estate.district_id', $request->district);
            }
            if ($request->ward) {
                $real_estate = $real_estate->join('ward', 'real_estate.ward_id', 'ward.ward_id')
                ->select('ward.ward_name')->where('real_estate.ward_id', $request->ward);
            }
            if ($request->street) {
                $real_estate = $real_estate->join('street', 'real_estate.street_id', 'street.street_id')
                ->select('street.street_name')->where('real_estate.street_id', $request->street);
            }
            if ($request->direction) {
                $real_estate = $real_estate->join('direction', 'real_estate.direction_id', 'direction.direction_id')
                ->select('direction.direction_name')->where('real_estate.direction_id', $request->direction);
            }
            if ($request->acreage) {
                $value_acreage[] = explode(',', $request->acreage);
                $real_estate = $real_estate->whereBetween('real_estate.real_estate_acreage', $value_acreage);
            }
            if ($request->price) {
                $value_price[] = explode(',', $request->price);
                $real_estate = $real_estate->whereBetween('real_estate.real_estate_price_total', $value_price);
            }
        }
        $real_estate = $real_estate
        ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
        ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->select('real_estate.real_estate_id',
            'real_estate_avatar',
            'translation_name',
            'translation_address',
            'translation_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'province.province_name',
            'district.district_name')
            ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'] ])
        ->paginate(6);
        // dd($real_estate);
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        // tính thời gian đăng
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $day=array();
        foreach ($real_estate as $key => $value) {
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $value->real_estate_price = $value->real_estate_price * $rate->currency_rate;
        }

        $form = Form::join('form_translation', 'form.form_id', 'form_translation.form_id')
        ->select('form.form_id', 'form_translation_name')
        ->where('form_translation_locale', \Session::get('lang', config('app.locale')))
        ->get();
        $province = Province::select('province_id', 'province_name')->get();

        return view('pages.user.page.list', compact('real_estate', 'day', 'form', 'province','rate'));
    }
    public function add_view_product($real_estate_id)
    {
        /*
        thêm vào danh sách đã xem

        tìm xem đã có cookie trong csdl chưa
        tìm trong sp đã xem có cookie đó chưa
        nếu chưa thì tạo
        nếu có rồi thì tìm sp đã xem có sp đó chưa
        */
        
            $view_product=ViewProduct::where('cookie_user_id',\Cookie::get('real_estate'))
            ->first();
            $re_vp=ViewProduct::where('real_estate_id',$real_estate_id)->first();
            if(!$view_product || (!$re_vp&& $view_product)){
                ViewProduct::insert([
                    'real_estate_id'=>$real_estate_id,
                    'cookie_user_id'=>\Cookie::get('real_estate'),
                ]);
            }
        
    }
    public function check_wishlist($real_estate_id)
    {
        $checklogin1=false;
            if(\Auth::guard('account')->check()){

                $checklogin1=\Auth::guard('account')->user()->hasRole('Customer');
            }
            if($checklogin1){
                $check_wishlist=WishList::where([
                    ['customer_id',\Auth::guard('account')->user()->load('customer')->customer->customer_id],
                    ['real_estate_id',$real_estate_id]])->first();
            }
            else{
                $check_wishlist=WishListTemp::where([
                    ['cookie_user_id',\Cookie::get('real_estate')],
                    ['real_estate_id',$real_estate_id]])->first();
            }
            if($check_wishlist){
                $heart=true;
            }
            else{
                $heart=false;
            }
            return $heart;
    }
    public function get_evaluate($request,$real_estate,$real_estate_id)
    {
        //Đánh giá
        
        $evaluate = Evaluate::join('customer', 'evaluate.customer_id', 'customer.customer_id')
        ->select('customer.customer_avatar',
        'customer.customer_name',
        'evaluate.evaluate_rank',
        'evaluate.evaluate_title',
        'evaluate.evaluate_content',
        'evaluate.updated_at'
        )
        ->where('evaluate.real_estate_id', $real_estate->real_estate_id)
        ->get();
        $count_rank = count($evaluate);
        $average_rank = number_format($evaluate->avg('evaluate_rank'), 1);
        $image = RealEstate::join('image', 'real_estate.real_estate_id', 'image.real_estate_id')
        ->select('image.image_path','real_estate.real_estate_avatar')
        ->where('real_estate.real_estate_id', $real_estate->real_estate_id)
        ->get();
        $evaluate = Evaluate::join('customer', 'evaluate.customer_id', 'customer.customer_id')
        ->select('customer.customer_avatar',
        'customer.customer_name',
        'evaluate.evaluate_rank',
        'evaluate.evaluate_id',
        'evaluate.evaluate_reply',
        'evaluate.evaluate_title',
        'evaluate.evaluate_content',
        'evaluate.real_estate_id',
        'evaluate.updated_at',
        'evaluate.customer_id'
        )
        ->where('evaluate.real_estate_id', $real_estate->real_estate_id)
        ->get();
        $count_rank = count($evaluate);
        $rank_5 = 0;
        $rank_4 = 0;
        $rank_3 = 0;
        $rank_2 = 0;
        $rank_1 = 0;
        $per_rank_5 = 0;
        $per_rank_4 = 0;
        $per_rank_3 = 0;
        $per_rank_2 = 0;
        $per_rank_1 = 0;
        if($count_rank!=0){
            foreach ($evaluate as $item) {
                switch ($item->evaluate_rank) {
                    case 5:
                        $rank_5++;
                    break;
                    case 4:
                        $rank_4++;
                    break;
                    case 3:
                        $rank_3++;
                    break;
                    case 2:
                        $rank_2++;
                    break;
                    case 1:
                        $rank_1++;
                    break;
                }
            }
            $per_rank_5 = number_format($rank_5/$count_rank);
            $per_rank_4 = number_format($rank_4/$count_rank);
            $per_rank_3 = number_format($rank_3/$count_rank);
            $per_rank_2 = number_format($rank_2/$count_rank);
            $per_rank_1 = number_format($rank_1/$count_rank);
        }
        //bao nhiêu phản hồi
        
        //số sao trung bình
        $average_rank = number_format($evaluate->avg('evaluate_rank'), 1);
        //tính %
        $average_rank_per = $average_rank * 100 / 5;

        return [$image,
        $evaluate,
        $count_rank,
        $average_rank,
        $average_rank_per,
        $rank_5,
        $rank_4,
        $rank_3, 
        $rank_2,
        $rank_1,
        $per_rank_5,
        $per_rank_4,
        $per_rank_3,
        $per_rank_2,
        $per_rank_1];
    }
    public function single_list(Request $request, $real_estate_id)
    {
        // dd(\Auth::guard('account')->user()->load('customer')->customer->customer_name);
        // dd($request);
        $province=Province::all();

        //thêm vào danh sách sp đã xem
        $real_id=$real_estate_id;
        $this->add_view_product($real_estate_id);

        $real_estate = RealEstate::
        join('ward', 'real_estate.ward_id', 'ward.ward_id')
        ->join('district', 'ward.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
        ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
        ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
        ->select('real_estate.real_estate_id',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate_longitude',
        'real_estate_latitude',
        'real_estate.created_at',
        'translation.*',
        'unit_value',
        'unit_translation.unit_translation_name',
        'province.province_name',
        'district.district_name')
        ->where([
            ['real_estate.real_estate_id', $real_estate_id],
            ['translation_locale', \Session::get('lang', config('app.locale'))],
            ['unit_translation_locale', \Session::get('lang', config('app.locale'))], ])
        ->first();
        $real_estate->real_estate_price=$real_estate->real_estate_price/$real_estate->unit_value;
        $convenience=Convenience::where('real_estate_id',$real_estate_id)->first();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        $real_estate->real_estate_price = $real_estate->real_estate_price * $rate->currency_rate;
        // lấy hàm kiểm tra đã thích hay chưa
        $heart=$this->check_wishlist($real_estate_id);
        // gọi là dấy danh sách tương tác
        list($image,
        $evaluate,
        $count_rank,
        $average_rank,
        $average_rank_per,
        $rank_5,
        $rank_4,
        $rank_3, 
        $rank_2,
        $rank_1,
        $per_rank_5,
        $per_rank_4,
        $per_rank_3,
        $per_rank_2,
        $per_rank_1)=$this->get_evaluate($request, $real_estate, $real_estate);
        // var_dump($image);die;
        return view('pages.user.page.single_list', compact('real_estate',
        'image',
        'rate',
        'evaluate',
        'count_rank',
        'average_rank',
        'average_rank_per',
        'rank_5',
        'rank_4',
        'rank_3',
        'rank_2',
        'rank_1',
        'per_rank_5',
        'per_rank_4',
        'per_rank_3',
        'per_rank_2',
        'per_rank_1',
        'heart',
        'real_id',
        'province',
        'convenience'
        ));
    }

    //write Comment
    public function write_cmt (Request $request, $idsp){
        $idkh= \Auth::guard('account')->user()->load('customer')->customer->customer_id;
       
        $title = $request->title;
        $content = $request->content;
        $evaluate_rank=$request->rating;
        // dd($evaluate_rank);
        $data = DB::table('evaluate')->insert(
            [
                'evaluate_title' => $title,
                'evaluate_content' => $content,
                'real_estate_id' => $idsp,
                'customer_id' => $idkh,
                'evaluate_rank' => $evaluate_rank
               
            ]
        );
        return redirect()->route('single_list', ['real_estate_id' => $idsp]);
    }

    //delete comment

    public function delete_cmt($idcmt, $idsp){
       
        DB::table('evaluate')->where('evaluate_id',$idcmt)->delete();
        return redirect()->route('single_list', ['real_estate_id' => $idsp]);
    }
    // write reply comment
    public function reply_cmt (Request $request , $idsp,$idrep)
    {
        $idcmt = \Auth::guard('account')->user()->load('customer')->customer->customer_id;
        // dd($idrep);
        $title = $request->title;
        $content = $request->content;
        $data = DB::table('evaluate')->insert(
            [
                // 'evaluate_title' => $title,
                'evaluate_content' => $content,
                'real_estate_id' => $idsp,
                'customer_id' => $idcmt,
                'evaluate_reply' => $idrep,

            ]
        );
        return redirect()->route('single_list', ['real_estate_id' => $idsp]);
    }


    public function list_blog(Request $request)
    {
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        
        $blog=Blog::join('blog_translation','blog.blog_id','blog_translation.blog_id')
        ->join('staff','staff.staff_id','blog.staff_id')
        ->select('blog_translation.*','blog.*','staff.staff_name')
        ->where('blog_translation.blog_translation_locale', \Session::get('lang', config('app.locale')))
        ->orderBy('blog.created_at', 'desc')
        ->paginate(5);
        // dd($blog);
        foreach ($blog as $key => $value) {
            $day_blog[$value['blog_id']] = $value->created_at->diffForHumans(($now));
        }
        return view('pages.user.blog.list',compact('blog','day_blog'));
    }
    public function single_blog(Request $request,$blog_id)
    {
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $blog=Blog::join('blog_translation','blog.blog_id','blog_translation.blog_id')
        ->join('staff','staff.staff_id','blog.staff_id')
        ->select('blog_avatar',
        'blog_translation_title',
        'blog_translation_content',
        'blog.created_at',
        'staff_name')
        ->where([
            ['blog_translation_locale',\Session::get('lang', config('app.locale'))],
        ['blog.blog_id',$blog_id]
        ])
        ->first();
        // dd($blog);
            $day_blog = $blog->created_at->diffForHumans(($now));
        return view('pages.user.blog.single_blog',compact('blog','day_blog'));
    }

    public function subscription(Request $request)
    {
        $id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
        $find=Subscription::where('customer_id',$id)->first();
        if(!$find){
            Subscription::insert([
                'customer_id'=>$id
            ]);
        }
        return redirect()->back();
    }

    public function view_product(Request $request)
    {
        // dd($request);
        $view_product=ViewProduct::join('cookie_user','view_product.cookie_user_id','cookie_user.cookie_user_id')
        ->join('real_estate','view_product.real_estate_id','real_estate.real_estate_id')
        ->join('translation','real_estate.real_estate_id','translation.real_estate_id')
        ->join('district', 'real_estate.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->select(
        'real_estate.real_estate_id',
        'real_estate_avatar',
        'real_estate_avatar',
        'real_estate.created_at',
        'real_estate_price',
        'translation_name',
        'translation_address',
        'translation_description',
        'translation.translation_name',
        'province.province_name',
        'district.district_name')
        ->where([['cookie_user.cookie_user_id',\Cookie::get('real_estate')],
        ['translation_locale', \Session::get('lang', config('app.locale'))],
        ['real_estate_status','Đang bán']])
        ->limit(6)
        ->get();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        Carbon::setlocale('vi');
        $now = Carbon::now();
        foreach ($view_product as $key => $value) {
            // dd(Carbon::parse($value->created_at));
            // dd($value['real_estate_id']);
            // $value['real_estate_id'] = $value->created_at->diffForHumans(($now));

            $value->created_at= Carbon::parse($value->created_at)->diffForHumans($now);
            $value->real_estate_price = $value->real_estate_price * $rate->currency_rate;
        }
        return view('pages.user.index',compact('view_product','rate'));
    }

    public function wishlist_customer(Request $request)
    {
        if(request()->ajax())
        {
            $real_estate_id = $request->get('real_estate_id');
            $customer_id = $request->get('customer_id');

                $check_product=WishList::where([['customer_id',$customer_id],['real_estate_id',$real_estate_id]])->first();
                if($check_product){
                    echo "alert('sản phẩm đã có trong danh sách yêu thích')";
                }
                else{
                    WishList::insert([
                        'real_estate_id'=>$real_estate_id,
                        'customer_id'=>$customer_id,
                    ]);
                }
            echo "<i class='fas fa-heart' id='heart'>";
        }
    }
    public function wishlist_cookie(Request $request)
    {
        if(request()->ajax())
        {
            $real_estate_id = $request->get('real_estate_id');
            

                $check_product=WishListTemp::where('cookie_user_id',\Cookie::get('real_estate'))->first();
                    if($check_product){
                        echo "alert('sản phẩm đã có trong danh sách yêu thích')";
                    }
                    else{
                        WishListTemp::insert([
                            'real_estate_id'=>$real_estate_id,
                            'cookie_user_id'=>\Cookie::get('real_estate')
                        ]);
                    }
            
            echo "<i class='fas fa-heart' id='heart'>";
            }
    }
    public function list_city(Request $request)
    {
        app()->setLocale(\Session::get('lang', config('app.locale')));
        $real_estate = RealEstate::join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('type','type.type_id','real_estate.type_id')
            ->select('real_estate.real_estate_id',
            'real_estate_avatar',
            'translation_name',
            'translation_address',
            'translation_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'province.province_name',
            'district.district_name')
            ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'],
                ['real_estate.type_id',$type_id] ])
            ->paginate(6);
        // tính thời gian đăng
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $day=[];
        if($real_estate->isNotEmpty()){
        foreach ($real_estate as $key => $value) {
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $value->real_estate_price = $value->real_estate_price * $rate->currency_rate;
        }
        }
        // lấy dữ liệu cho search form
        $form = Form::join('form_translation', 'form.form_id', 'form_translation.form_id')
        ->select('form.form_id', 'form_translation_name')
        ->where('form_translation_locale', \Session::get('lang', config('app.locale')))
        ->get();
        
        $province = Province::select('province_id', 'province_name')->get();
        return view('pages.user.page.list', compact('real_estate', 'day', 'form', 'province','rate'));
    }
}
