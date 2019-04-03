<?php

namespace App\Http\Controllers\Admin;

use App\Number;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard', [
            'numbers' => Number::lastNumbers(5),
            'amount_numbers' => Number::count(),
        ]);
    }
}
