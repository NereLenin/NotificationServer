<?php

namespace App\Controllers;
use App\Models\OAuthModel;
use App\Services\OAuth;
use OAuth2\Request;

class OAuthController extends BaseController
{
    private $OAuthModel;
    private $OAuth;

    public function __construct()
    {
        $this->OAuth = new OAuth();
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
        Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method
    }

    public function Authorize()
    {

        $request = Request::createFromGlobals();
        $this->OAuth->server->handleTokenRequest($request)->send();

    }


}
