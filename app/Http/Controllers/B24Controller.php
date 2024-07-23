<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use X3Group\B24Api\Http\Controllers\B24Controller as B24ControllerBase;


class B24Controller extends B24ControllerBase
{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('b24api/index', []);
    }

    public function custom(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        dump($request);
        return view('b24api/custom', []);
    }

}
