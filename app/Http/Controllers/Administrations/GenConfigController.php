<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use App\Models\GenConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GenConfigController extends Controller
{
    public function changeBg(Request $request){
        $settings=GenConfig::find(1);
        $logo_path='assets/images/img/';
        $old_logo=$settings->getAttributes()['bg_image'];
        $file=$request->file('bg_image');
        $filename=time().'_'.rand(1,1000).'_bg_image.png';

        if($request->hasFile('bg_image')){
            //File::ensureDirectoryExists(public_path($logo_path."resizes/"));
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $deletePath="resizes/resized_".$old_logo;
            if($old_logo!=null && File::exists(public_path($logo_path.$deletePath))){
                File::delete(public_path($logo_path.$deletePath));
            }
            $deletethumb="resizes/thumb_".$old_logo;
            if($old_logo!=null && File::exists(public_path($logo_path.$deletethumb))){
                File::delete(public_path($logo_path.$deletethumb));
            }


            $upload=$file->move(public_path($logo_path),$filename);
            $resizes_path=$logo_path.'resizes/';
            $this->ImageProcess($resizes_path,$logo_path,$filename);

            if($upload){
                $settings->update([
                    'bg_image'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'image de fond du site a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    public function changeLogo(Request $request){
        $settings=GenConfig::find(1);
        $logo_path='assets/favicons/';
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
                return response()->json(['status'=>1,'msg'=>'Le Logo a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }
    public function changeIcon48(Request $request){
        $settings=GenConfig::find(1);
        $logo_path='assets/favicons/';
        $old_logo=$settings->getAttributes()['favicon48'];
        $file=$request->file('favicon48');
        $filename=time().'_'.rand(1,1000).'_favicon.ico';

        if($request->hasFile('favicon48')){
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload=$file->move(public_path($logo_path),$filename);
            if($upload){
                $settings->update([
                    'favicon48'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'Icon 48x48 a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    public function changeIcon16(Request $request){
        $settings=GenConfig::find(1);
        $logo_path='assets/favicons/';
        $old_logo=$settings->getAttributes()['favicon16'];
        $file=$request->file('favicon16');
        $filename=time().'_'.rand(1,1000).'_favicon16.png';

        if($request->hasFile('favicon16')){
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload=$file->move(public_path($logo_path),$filename);
            if($upload){
                $settings->update([
                    'favicon16'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'Icone 16x16 a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    public function changeAppleIcon(Request $request){
        $settings=GenConfig::find(1);
        $logo_path='assets/favicons/';
        $old_logo=$settings->getAttributes()['appleicon18'];
        $file=$request->file('appleicon18');
        $filename=time().'_'.rand(1,1000).'_appleicon18.png';

        if($request->hasFile('appleicon18')){
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload=$file->move(public_path($logo_path),$filename);
            if($upload){
                $settings->update([
                    'appleicon18'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'Icone 180x180 a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    //possibilité d'enregistrer une image redimensionnée

    /**
     * @param string $thumbnail_path
     * @param string $folder
     * @param string $new_file
     * @return void
     */
    public function ImageProcess(string $resized_path, string $folder, string $new_file): void
    {

        //square thumbnail
        Image::make(public_path( $folder . $new_file))
            ->fit(200, 200)
            ->save(public_path( $resized_path . 'thumb_' . $new_file));

        //resized image
        Image::make(public_path( $folder . $new_file))
            ->fit(1920, 670)
            ->save(public_path( $resized_path . 'resized_' . $new_file));
    }

    public function index()
    {
        return view('administration.ui.settings.index');
    }
}
