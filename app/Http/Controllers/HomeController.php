<?php

namespace App\Http\Controllers;
use App\Models\Coresetting;
use App\Models\template;
use Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{public function home() {
    $user = Auth::user();
    $logo = Coresetting::all();
    if (!$user) {
        return redirect()->route('login'); // Redirect to login if not authenticated
    }
    return view('admin.dashboard.home', compact('user','logo'));
}
    public function tem(){
        return view ('template');
    }
    public function tempost(Request $request){
        $template = new template();
        $template->template_name = $request->input('template_name');
        $template->template_html = $request->input('template_html');

        $template->save();
    }
}
