<?php

namespace App\Http\Controllers;

use App\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class SubscribeController extends Controller
{
    //
    public function index()
    {
        $plans = plan::orderBy('id','asc')->get();
        //return dd($plans);
        return view('Subscribe.subscribe',compact('plans'));
    }

    public function order($id)
    {
       // $id = decrypt($id);
        $plan= plan::where('id',$id)->first();
        // dd($plan);
        $intent = auth()->user()->createSetupIntent();
        //dd($intent);

        return view('Subscribe.order',compact('plan','intent'));
    }
    
}
