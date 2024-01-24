<?php

namespace App\Http\Controllers;

use App\Abonnement;
use App\plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Omnipay\Omnipay;

class CheckoutController extends Controller
{
    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);//mettre a false en mode live
    }
    public function checkout(Request $request)
    {

        $plan = plan::find($request->plan);
        //dd($request->all());

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->quantity($request->quantity)->create($request->token, ['name' => $request->name]);
        $subscription->ends_at = Carbon::now()->addMonth($request->quantity);
        $subscription->save();
        $data = [];

        return redirect()->route('connexion')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
    }
    public function fedapay(Request $request)
    {
        //dd($request->all());
        $end_at = Carbon::now()->addMonth($request->quantity);

        $user_abonnement_exist = Abonnement::where('user_id', $request->user_id)->first();
        //dd($user_abonnement_exist);
        if ($user_abonnement_exist) {
            $data = ["status" => 'actif', "quantity" => $request->quantity, "price" => $request->price, "ends_at" => $end_at, "type_abonnement" => $request->type_abonnement];
            //dd($data);
            $status = $user_abonnement_exist->fill($data)->save();
            if ($status) {
                return redirect()->route('espacemembre')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
            } else {
                return back()->with('error', 'Erreur de souscription');
            }
        } else {
            $check = DB::insert('insert into abonnements (user_id,type_abonnement,status,quantity,price,ends_at) values(?,?,?,?,?,?)', [
                $request->user_id, $request->type_abonnement, $request->status, $request->quantity, $request->price, $end_at
            ]);
            if ($check) {
                return redirect()->route('connexion')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
            } else {
                return back()->with('error', 'Erreur de souscription');
            }
        }
        //dd($end_at);
        // 

    }
    public function paypal(Request $request){
        $price = $request->price;
       //dd($price);
            try{

                $purchase= $this->gateway->purchase(array(
                    'user_id'=>$request->user_id,
                    'amount'=>$request->price,
                    'quantity'=>$request->quantity,
                    'status'=>$request->status,
                    'type_abonnement'=>$request->type_abonnement,
                    'currency'=>env('PAYPAL_CURRENCY'),
                    'returnUrl'=>url('successPaypal/'.$request->user_id.'/'.$price.'/'.$request->quantity.'/'.$request->status.'/'.$request->type_abonnement.'/'),
                    'cancelUrl'=>url('index'),
                ));

                //$purchase->parameter($request->all());
                $response=$purchase->send();

                if($response->isRedirect()){
                    dd('redirection');
                    $response->redirect();
                }else{
                    return $response->getMessage();
                }
            }catch(Exception $e){
                dd('error catch');

                return $e->getMessage();
            }
        
    }

    public function success(Request $request,$user_id,$price,$quantity,$status,$type_abonnement){
        if($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'=>$request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId')
            ));
            $response = $transaction->send();

            if($response->isSuccessful()){
                $arr_body = $response->getData();
                dd($arr_body);
                // Faire les requestes pour l'enregistrement dans la db
            }
        }else{
            return dd('Erreur de la transaction');
        }
    }
    public function freePass(Request $request)
    {
        //dd($request->all());
        $end_at = Carbon::now()->addMonth($request->quantity);

        $user_abonnement_exist = Abonnement::where('user_id', $request->user_id)->first();
        //dd($user_abonnement_exist);
        if ($user_abonnement_exist) {
            $data = ["status" => 'actif', "quantity" => $request->quantity, "price" => $request->price, "ends_at" => $end_at, "type_abonnement" => $request->type_abonnement];
            //dd($data);
            $status = $user_abonnement_exist->fill($data)->save();
            if ($status) {
                return redirect()->route('espacemembre')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
            } else {
                return back()->with('error', 'Erreur de souscription');
            }
        } else {
            $check = DB::insert('insert into abonnements (user_id,type_abonnement,status,quantity,price,ends_at) values(?,?,?,?,?,?)', [
                $request->user_id, $request->type_abonnement, $request->status, $request->quantity, $request->price, $end_at
            ]);
            if ($check) {
                return redirect()->route('connexion')->with(['message' => 'Votre compte est maintenant actif, veuillez vous connecter']);
            } else {
                return back()->with('error', 'Erreur de souscription');
            }
        }
    }
}
