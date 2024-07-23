<?php

namespace App\Http\Controllers;

use Exception;
use X3Group\B24Api\B24Api;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class B24InstallController extends Controller
{
    use ValidatesRequests;

    /**
     * Данный метод следует скопировать в свой контроллер и дополнить установку согласно логики.
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|string|\Illuminate\Contracts\Foundation\Application
     */
    public function install(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|string|\Illuminate\Contracts\Foundation\Application
    {
        $memberId = null;
        if ($request->has('auth') && !empty($request->get('auth')['member_id']))
            $memberId = $request->get('auth')['member_id'];

        if ($request->has('member_id') && !empty($request->get('member_id')))
            $memberId = $request->get('member_id');

        try {
            $resultInstall = B24Api::install($memberId, $request);
            if ($resultInstall['install'] === true) {
                if ($resultInstall['rest_only']) {
                    //todo: some code
                    return '';
                } else {
                    $portal = new B24Api($memberId); 
                    $api = $portal->getApi();

                    $data = $api->taskStages()->get(0);
                    // $portal->call('placement.bind', [
                    //     'PLACEMENT' => 'CRM_DEAL_DETAIL_TAB',
                    //     'HANDLER' => env('APP_URL') . '/custom',
                    //     'TITLE' => 'DEMO',
                    // ]);
                    dump($data);
                    return view('b24api/install', []);
                }
            }
        } catch (Exception $exception) {
            return view('b24api/install-fail', []);
        }
        return view('b24api/install-fail', []);
    }
}
