<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RankController extends Controller
{
    public function changeLogo(Request $request){
        $settings=Rank::find(1);
        $logo_path='assets/rank/';
        $old_logo=$settings->getAttributes()['logo'];
        $file=$request->file('logo');
        $filename=time().'_'.rand(1,1000).'_logo.png';

        if($request->hasFile('logo')){
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload=$file->move(public_path($logo_path),$filename);
            if($upload){
                $settings->update([
                    'logo'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'Le  de la fondation Rank a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    public function index()
    {
        return view('administration.ui.rank.index');
    }
}
