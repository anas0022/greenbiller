<?php

namespace App\Http\Controllers\store\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDeleteController extends Controller
{
    public function cat_delte(Request $request)
    {
        try {
            $category = Category::findOrFail($request->input('id'));
            
            // Delete the category
            if($category->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Category deleted successfully'
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category'
            ], 400);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting category: ' . $e->getMessage()
            ], 500);
        }
    }
}
