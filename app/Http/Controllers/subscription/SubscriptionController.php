<?php

namespace App\Http\Controllers\subscription;

use App\Http\Controllers\Controller;
use App\Models\Coresetting;
use App\Models\sub_method;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subsciptionadd(){
        $logo = Coresetting::all();
        $method = sub_method::all();
        return view("supperadmin.subscription.subscriptionadd", compact("logo","method"));
    }

    public function subsciptionpost(Request $request){
        $validatedData = $request->validate([
            'duration' => 'required',
            'store_count' => 'required',
            'rate' => 'required',
            'note' => 'nullable',
            'type'=>'required'
        ]);

        $subscription = new Subscription();
        $subscription->duration = $request->input('duration');
        $subscription->store_count = $request->input('store_count');
        $subscription->rate = $request->input('rate');
        $subscription->note = $request->input('note');
        $subscription->type = $request->input('type');
        $subscription->save();
        $sub_token = $subscription->type.'_'.$subscription->id;
        $subscription->sub_token = $sub_token;
        $subscription->save();
        return redirect()->back()->with('success','subscription added');

    }
}