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
        $subscription->customer_app = $request->input('customer');
        $subscription->dealers_app = $request->input('dealer');
        $subscription->executive_app = $request->input('executive');
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

    public function sub_list(){
        $sublist = Subscription::all();
        $logo   = Coresetting::all();
        $type = $sublist->pluck('type');
      $method = sub_method::where('id',$type)->first();
        return view('supperadmin.subscription.sublist', compact('sublist','logo','method'));
    }
}
