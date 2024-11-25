<?php

namespace App\Http\Controllers\store\user;

use App\Http\Controllers\Controller;
use App\Models\UserList;
use Illuminate\Http\Request;

class UserDeleteController extends Controller
{
    public function deleteUser(Request $request)
    {
        try {
            $user = UserList::findOrFail($request->id);
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete user: ' . $e->getMessage()
            ], 500);
        }
    }
    
}
