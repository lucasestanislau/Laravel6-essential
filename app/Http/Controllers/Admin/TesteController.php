<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste()
    {
        $data = 123;

        //return view('teste', ['data' => $data]);

        return view('teste', compact('data'));
    }
}
