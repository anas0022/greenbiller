<?php

namespace App\Http\Controllers\store\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coresetting;
use Illuminate\Http\Request;

class CategoryListController extends Controller
{
    public function category() {
        // Fetch categories ordered by updated_at in descending order (newest first)
        $category = Category::orderBy('updated_at', 'desc')->get();
        $logo = Coresetting::all();
        return view('store.items.category', compact('category','logo'));
    }

   
}
