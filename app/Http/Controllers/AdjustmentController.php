<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UniInventory;
class AdjustmentController extends Controller
{
    // public function inv_adjustment() {
    //     return view('adjustments.inv_adjustment');
    // }
    public function inv_adjustment(Request $request)
    {
        return view('adjustments.inv_adjustment');
    }
}