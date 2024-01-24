<?php

namespace App\Http\Controllers;

use App\NotifToken;
use Illuminate\Http\Request;

class InfoBipMessageController extends Controller
{
    public function __invoke(Request $request)
    {
        info('data received', ['data' => $request->all(), 'method' => $request->method()]);
        
        (new NotifToken())->sendProviderSMS('22892709501', 'InfoBipMessageController data received');
    }
}