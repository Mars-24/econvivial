<?php
namespace App\Http\Controllers;

use App\ActiviteeConvivial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ActiviteeConvivialController extends Controller
{
    
	public function index()
    {
        $activites = ActiviteeConvivial::orderBy("id", "desc")->get();
        return view("Admin.ActiviteeConvivial.index")
                ->with(["activites" => $activites])
                ->with(["page" => "admin-activite-eConvivial"]);
    }
    
    public function saveActiviteeConvivial(Request $request){

        $this->validate($request, [
           "titre" => "required",
           "description" => "required",
        ]);

        $activites = new ActiviteeConvivial();
        $activites->titre = $request["titre"];
        $activites->description = $request["description"];
		
        // Image
		$image = $request->file('image');
	
		if ($image) {
			$extension = $image->getClientOriginalExtension();
            $file_name =time()."image.".$extension;
            //Storage::disk('image')->put($file_name,File::get($image));
            Image::make($image)->save(time()."image.".$extension);
			$activites->image = $file_name;
        }
		
		

        $activites->save();
        return redirect()->back()->with(["message" => "Activité eConvivial enrégistrer avec succès"]);
    }

    public function detailActiviteeConvivial(){
        if( isset($_GET)){
            $id = $_GET["ref"];
            $activites = ActiviteeConvivial::where("id", $id)->first();
            if($activites == null){
                return redirect()->back();
            }
            return view("Admin.ActiviteeConvivial.detailActiviteeConvivial")->with(["activites" => $activites]);
        }
        return redirect()->back();
    }

    public function deleteActiviteeConvivial(Request $request){
        $activites = ActiviteeConvivial::where("id", $request["id"])->first();

         if($activites == null){
            return redirect()->back()->with(["error" => "Une erreur s'est produite, impossible de supprimer"]);
         }  
         $activites->delete();
          return redirect()->back()->with(["message" => "Activité eConvivial supprimé avec succès"]);
    }

    public function getActiviteeConvivial(){
        return view("Activite.activiteeConvivial")->with(["page" => "activites"]);
    }
    
}
