<?php

namespace Diplom\Http\Controllers\Backend;

use Diplom\Http\Controllers\Backend;


class MainController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }
}