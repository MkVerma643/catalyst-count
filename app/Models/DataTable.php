<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    use HasFactory;

    protected $table = 'data_table';

    protected $fillable = [
        'uniqueNo',
        'name',
        'domain',
        'year founded',
        'industry',
        'size range',
        'locality',
        'country',
        'linkedin url',
        'current employee',
        'total employee estimate'
    ];
}
