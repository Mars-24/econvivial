<?php

namespace App\Http\Controllers;

use App\User;
use App\Region;
use App\NotifToken;
use Illuminate\Http\Request;

class SendSmsController extends Controller
{
    public function index()
    {
        $page = 'send-sms';
        
        $regions = Region::pluck('libelle', 'id');
        
        return view('Admin.send_sms.index', compact('page', 'regions'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        
        // $tokens = NotifToken::whereIn('user_id', $request->users)->pluck('token');
        
        // $tokens = [];
        
        foreach($request->users as $user) {
            $notifToken  = NotifToken::where('user_id', $user)->first();
            
            if ($notifToken !== null) {
                // $tokens[] = $notifToken->token;
                
                $result = (new NotifToken())->sendNotificationToUser([$notifToken->token], $request->titre,  $request->description);
                
                info('notification result', compact('result'));
            }
        }
        
        // info('notification tokens', compact('tokens'));
        
        // $result = (new NotifToken())->sendNotificationToUser($tokens, $request->titre,  $request->description);
        
        // info('notification result', compact('result'));
        
        // if (!str_contains($result, 'result')) {
        //     return back()->with(['error' => 'Une erreur est survenue lors de l\'envoie, reessayer !']);
        // }
        
        return back()->with(['message' => 'Notification envoyé avec succèss']);
    }
}