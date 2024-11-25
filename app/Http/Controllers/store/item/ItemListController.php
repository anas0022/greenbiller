<?php

namespace App\Http\Controllers\store\item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Tax;
use App\Models\Brand;
use App\Models\Coresetting;

class ItemListController extends Controller
{
    public function itemlist()
    {
        $items = Item::where('store_id', Auth::user()->store_id)->get();

        $categories = Category::all();
        $unites = Unit::all();
        $tax = Tax::all();

        $brand = Brand::all();

        $logo = Coresetting::all();
        return view('store.items.itemlist', compact('logo', 'items', 'categories', 'brand', 'unites', 'tax'));
    }
}
