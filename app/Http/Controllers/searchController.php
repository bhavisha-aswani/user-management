<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search(Request $request)
    {
        $search_text = $_GET['term'];
        $users = Employee::where('name','LIKE','%'.$search_text.'%')->get();
        return view('user/search', compact('users')); 
    }
}
