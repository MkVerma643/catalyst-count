<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Adjust this data as needed
        DB::table('data_table')->insert([
            'uniqueNo' => 'Value 1',
            'name' => 'Value 2',
            'domain' => 'Value 2',
            'year founded' => 'Value 2',
            'industry' => 'Value 2',
            'size range' => 'Value 2',
            'locality' => 'Value 2',
            'country' => 'Value 2',
            'linkedin url' => 'Value 2',
            'current employee' => 'Value 2',
            'total employee estimate' => 'Value 2',
            // Add more columns as needed
        ]);
    }
}
