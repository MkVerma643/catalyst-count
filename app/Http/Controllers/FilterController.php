<?php

namespace App\Http\Controllers;

use App\Models\DataTable;
use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        $users = User::all(); // You can customize this query based on your needs
        return view('filter.index', compact('users'));
    }
    
    public function filter(Request $request)
    {
        $query = DataTable::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Add more conditions for other filters...

        $filteredData = $query->get();

        return view('filter.results', ['filteredData' => $filteredData]);
    }
}
