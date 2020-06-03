<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\RealEstate;
use App\Models\Type;
use App\Models\Form;
use App\Models\Image;
use App\Models\ImageRealEstate;
use App\Models\Direction;
use App\Models\Bank;
use App\Models\DetailDeposit;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $real_estate=RealEstate::join('translation','real_estate.real_estate_id','translation.real_estate_id')
        ->where('translation_locale','vi')->paginate(10);
        

        return view('pages.admin.real_estate.index', compact('real_estate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $direction = Direction::select('direction_id', 'direction_name')->get();
        // $form = Form::select('form_id', 'form_name')->get();
        $province = Province::select('province_id', 'province_name')->orderBy('province_name', 'asc')->get();

        return view('pages.admin.real_estate.create', compact('province'));
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
        request()->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
        // dd($request->session());
        // dd($request);
        if ($request->hasFile('avatar')) {
            $time = str_replace(' ', '', Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString());
            $real_estate_id = RealEstate::insertGetId(array(
                    'real_estate_price' => $request->price,
                    'real_estate_address' => $request->address,
                    'real_estate_acreage' => $request->acreage,
                    'type_id' => $request->type,
                    'street_id' => $request->street,
                    'ward_id' => $request->ward,
                    'district_id' => $request->district,
                    'unit_id' => $request->unit,
                    'status_id' => 1,
                    //Phải dùng tài khoản khách hàng để tạo
                    // 'customer_id' => Auth::guard('account')->user()->account_id,
                ));
            Translation::insert([
                    'translation_name' => $request->name,
                    'translation_description' => $request->description,
                    'translation_locale' => 'vi',
                    'real_estate_id' => $real_estate_id,
                ]);

            $file_name = $request->file('avatar')->getClientOriginalName(); //Trả về tên file
            //lưu file
            $request->file('avatar')->move(
            'img/Product', //nơi cần lưu
            $time.'_'.$file_name,
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
                        $time.'_'.$file_name,
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

    public function captchaForm()
    {
        return view('captchaform');
    }

    public function storeCaptchaForm(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        dd('successfully validate');
    }
    public function VNPay(Request $request)
    {
        // dd($request->total);
        $id="".$request->iden.",".$request->deposit;
        $value=\Crypt::encrypt($id);

        // dd(\Crypt::decrypt($id));
            // dd(\Crypt::encrypt('eyJpdiI6Ino4MG9aek5hb1NYUGs3bVc3OVVCQVE9PSIsInZhbHVlIjoiM3hQZ0NrR0JweFJUQ0F0U0JtNUZ1Zz09IiwibWFjIjoiMDk0NDNkNjA3ZjExZTM4MTgwN2NkYjQ4MWQ4ZTdhNTkyNDlkNTgxNmIxZTJhODhjZGIwZjQxNGYzYzVmYjNlYSJ9 '));
            session(['cost_id' => $request->id]);
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = 'UDOPNWS1'; //Mã website tại VNPAY
            $vnp_HashSecret = 'EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN'; //Chuỗi bí mật
            $vnp_Url = 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
            $vnp_Returnurl = 'http://localhost/real_estate/public/post/return-vnpay';
            // $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_TxnRef = $value; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán hóa đơn phí dich vụ';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $request->total*100; // số tiền *100
            $vnp_Locale = 'vn'; //ngôn ngữ
            $vnp_IpAddr = request()->ip();
    
            $inputData = array(
                'vnp_Version' => '2.0.0',
                'vnp_TmnCode' => $vnp_TmnCode,
                'vnp_Amount' => $vnp_Amount,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => date('YmdHis'), //Ngày tạo
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnp_IpAddr,
                'vnp_Locale' => $vnp_Locale,
                'vnp_OrderInfo' => $vnp_OrderInfo,
                'vnp_OrderType' => $vnp_OrderType,
                'vnp_ReturnUrl' => $vnp_Returnurl,
                'vnp_TxnRef' => $vnp_TxnRef,
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != '') {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&'.$key.'='.$value;
                } else {
                    $hashdata .= $key.'='.$value;
                    $i = 1;
                }
                $query .= urlencode($key).'='.urlencode($value).'&';
            }
    
            $vnp_Url = $vnp_Url.'?'.$query;
            if (isset($vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret.$hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash='.$vnpSecureHash;
            }
    
            return redirect($vnp_Url);
        }

    public function return(Request $request)
    {
        
        // dd(\Auth::guard('account')->user()->load('customer')->customer->customer_id);
        $url = session('url_prev', '/');
        if ($request->vnp_ResponseCode == '00') {
            // thành công
            $id=\Crypt::decrypt($request->vnp_TxnRef);
            // dd($id);
            // dd($request);
            // dd(substr($id,-1,strpos($id,',')));
            $bank_id=Bank::insertGetId([
                'b_txnref'=>$id,
                'b_orderInfo'=>$request->vnp_OrderInfo,
                'b_amount'=>$request->vnp_Amount,
                'b_responseCode'=>$request->vnp_ResponseCode,
                'b_bankcode'=>$request->vnp_BankCode,
                'b_vnp_TmnCode'=>$request->vnp_TmnCode,
                'b_vnp_HashSecret'=>'EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN'
            ]);
            if($bank_id){

                DetailDeposit::insert([
                    'real_estate_id'=>substr($id,0,strpos($id,',')),
                    'd_id'=>substr($id,-1,strpos($id,',')),
                    'b_id'=>$bank_id
                ]);
            }
            else{
                DetailDeposit::insert([
                    'real_estate_id'=>substr($id,0,strpos($id,',')),
                    'd_id'=>substr($id,-1,strpos($id,',')),
                ]);
            }

            return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');

        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
    public function done()
    {
        $real_estate=RealEstate::join('translation','real_estate.real_estate_id','translation.real_estate_id')
        // ->join('appointment as a','a.real_estate_id','real_estate.real_estate_id')
        ->where('translation_locale','vi')
        ->where('real_estate_status','Chờ xác nhận')
        ->paginate(10);
        
       
        return view('pages.admin.real_estate.done',compact('real_estate'));
    }
    public function getdata(Request $request)
    {
        $id = $request->get('id');
        $real_estate=DB::table('appointment')->where('real_estate_id',$id)->get();
        // dd($real_estate);
         return response()->json(['success'=>$real_estate, 200]);
       
        // return view('pages.admin.real_estate.done',compact('real_estate'));
    }
    public function change_status($id)
    {
        RealEstate::where('real_estate_id', $id)
        ->update([
            'real_estate_status' => 'Đã bán', 
        ]);

        return redirect()->route('real_estate.done')->with('success', 'Duyệt thành công BĐS đã bán');
    }
}
