<?php

namespace App\Http\Controllers;

use App\ProduitIST;
use Illuminate\Http\Request;

class ProduitIstController extends Controller
{
    //
    public function index(){
        $produits = ProduitIST::where("etat", 1)->orderBy("id", "desc")->get();
        
        return view("Admin.Consultation.liste-medicament")
                ->with(["produits" => $produits])
                ->with(["page" => "liste-medicament"]);
    }

	public function saveProduitIST(Request $request){
     
		$produit = new ProduitIST();
		
        $produit->molecules = $request["molecule"];
        $produit->cond = $request["cond"];
        $produit->cout_unitaire = $request["cout_u"];
        $produit->nombre_kit = $request["nbre_kit"];
        $produit->cout_m_kit = $request["cout_m_kit"];
        $produit->etat = 1;
		
        $produit->save();

        return redirect()->back()->with(["message" => "Produit IST enrégistré avec succès"]);
	}
	
	public function postEditProduitIST(Request $request){
        $produit = ProduitIST::where("id", $request["id"])->first();
        if($produit == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        }
		
        $produit->molecules = $request["molecule"];
        $produit->cond = $request["cond"];
        $produit->cout_unitaire = $request["cout_u"];
        $produit->nombre_kit = $request["nbre_kit"];
        $produit->cout_m_kit = $request["cout_m_kit"];
        
		$produit->save();

        return redirect()->back()->with(["message" => "Produit IST modifié avec succès"]);
    }

    public function postDeleteProduitIST(Request $request){
         $produit = ProduitIST::where("id", $request["id"])->first();
        
		if($produit == null){
            return redirect()->back()->with(["erreur" => "Une erreur s'est produite, impossible de modifier."]);
        } 
		
        $produit->etat = 0;
		$produit->save();
        return redirect()->back()->with(["message" => "Produit IST supprimé avec succès"]);
    }
}
