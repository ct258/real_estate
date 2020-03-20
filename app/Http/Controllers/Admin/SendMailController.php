<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mail;

class SendMailController extends Controller
{
    protected $input;

    public function send(Request $request)
    {
        // dd($request);
        // $input = $request->all();
        // $input['comment'] = 'Chúng tôi gửi tới bạn thông tin bất động sản có thể bạn quan tâm
        // Facebook: https://www.facebook.com/minhnghia2311';
        // Mail::send('pages\admin\mail\mail', array('name' => $input['Name'], 'email' => $input['Email'], 'content' => $input['comment']), function ($message) {
        //     $message->to('minhnghia2311@gmail.com', 'Nghĩa bất động sản')->subject('tin bất động sản hot');
        // });
        // Session::flash('flash_message', 'Send message successfully!');
        $this->input = $request->all();
        Mail::send(
            'pages\admin\mail\mail_template',
            [
                'name' => $this->input['Name'],
            ],
            function ($message) {
                $message->to($this->input['Email'], $this->input['Name'])
                    ->subject('Tin bất động sản hot nhất');
            }
        );

        return redirect('/mail');
    }
}
