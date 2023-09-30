<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class AppController extends BaseController
{
    function index()
    {
        echo 'hello from controller';
    }
}
