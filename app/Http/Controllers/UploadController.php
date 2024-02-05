<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        $users = User::all(); // You can customize this query based on your needs
        return view('upload.index', compact('users'));
    }

    public function upload(Request $request)
    {
        // Handle the file upload and update the database
        // You can use the $request->file('file') to get the file and process it

        // Example:
        // $file = $request->file('file');
        // $file->storeAs('uploads', $file->getClientOriginalName());

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }
}
