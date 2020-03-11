<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $CurrencyActive = [
        'VND',
        'USD',
        'EUR',
        'JPY',
        'GBP',
    ];

    public function changeCurrency(Request $request, $currency)
    {
        // dd(in_array($currency, $this->CurrencyActive));
        if (in_array($currency, $this->CurrencyActive)) {
            //  $request->session()->put(['lang' => $currency]);
            $request->session()->put(['currency' => $currency]);
            // \Session::flash('currency', $currency);
            // dd(\Session::get('currency'));
            // dd($request);

            return redirect()->back();
        }
    }
}
