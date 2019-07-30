<?php

namespace Diplom\Http\Controllers\Admin;

use Diplom\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }
}