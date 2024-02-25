<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCrops extends Model
{
    use HasFactory;

    protected $connection = 'pmit_project';
    protected $table = 'tbl_crops';

}
