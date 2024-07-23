<?php

namespace App\Http\Controllers;

use X3Group\B24Api\B24Api;
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
        $memberId = null;
        if ($request->has('auth') && !empty($request->get('auth')['member_id']))
            $memberId = $request->get('auth')['member_id'];

        if ($request->has('member_id') && !empty($request->get('member_id')))
            $memberId = $request->get('member_id');

        $portal = new B24Api($memberId); 
        $data = $portal->getApi()->request('crm.contact.get', [
            'id' => '2085',
        ])->getResponseData();
        
        dump($data->getResult()->getResultData());
        return view('b24api/custom', []);
    }

}
