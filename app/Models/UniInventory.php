<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class UniInventory extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'ebs.uni_inventory';

}



