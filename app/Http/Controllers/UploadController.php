<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataTable;
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
        $request->validate([
            'file' => 'required|mimes:csv|max:2048000', // 2GB
        ]);

        $file = $request->file('file');
        $path = Storage::putFileAs('uploads', $file, Str::random(40) . '.' . $file->extension());

        $rows = collect();
        $chunkSize = 500; 

        Storage::stream($path, function ($contents) use ($chunkSize, &$rows) {
            collect(preg_split("/\r\n|\n|\r/", $contents))->chunk($chunkSize)->each(function ($chunk) use (&$rows) {
                $rows = [];

                // Process each row and map it to the data_table columns
                foreach ($chunk as $line) {
                    $data = explode(',', $line);

                    $rows[] = [
                        'uniqueNo' => $data[0] ?? null,
                        'name' => $data[1] ?? null,
                        'domain' => $data[2] ?? null,
                        'year founded' => $data[3] ?? null,
                        'industry' => $data[4] ?? null,
                        'size range' => $data[5] ?? null,
                        'locality' => $data[6] ?? null,
                        'country' => $data[7] ?? null,
                        'linkedin url' => $data[8] ?? null,
                        'current employee' => $data[9] ?? null,
                        'total employee estimate' => $data[10] ?? null
                    ];
                }

                // Insert into the data_table
                DataTable::insert($rows);
            });
        });

        // Save to the database
        // Your database insertion logic goes here with $rows

        return redirect()->route('upload.form')->with('success', 'File uploaded successfully.');
    }
}
