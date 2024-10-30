<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function dashboard(Request $request)
    {
         // Get the search query from the request
         $query = $request->input('query');
        
         // Search the users based on name or email
         $users = User::search($query)->paginate(10);


        return view('dashboard', [
            'users' => $users
        ]);
    }
}
