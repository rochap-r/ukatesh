<?php

namespace App\Http\Controllers\Administrations;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    //aboutImg
    //projectImg
    public function aboutImg(Request $request){
        $settings=About::find(1);
        $logo_path='assets/about/';
        $old_logo=$settings->getAttributes()['about_img'];
        $file=$request->file('about_img');
        $filename=time().'_'.rand(1,1000).'_about_img.png';

        if($request->hasFile('about_img')){
            //File::ensureDirectoryExists(public_path($logo_path."resizes/"));
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $deletePath="resized_".$old_logo;
            if($old_logo!=null && File::exists(public_path($logo_path.$deletePath))){
                File::delete(public_path($logo_path.$deletePath));
            }


            $upload=$file->move(public_path($logo_path),$filename);
            $resizes_path=$logo_path;
            $this->ImageProcess($resizes_path,$logo_path,$filename);

            if($upload){
                $settings->update([
                    'about_img'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'image de la section about a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }


    public function projectImg(Request $request){
        $settings=About::find(1);
        $logo_path='assets/about/';
        $old_logo=$settings->getAttributes()['project_img'];
        $file=$request->file('project_img');
        $filename=time().'_'.rand(1,1000).'_project_img.png';

        if($request->hasFile('project_img')){
            //File::ensureDirectoryExists(public_path($logo_path."resizes/"));
            if($old_logo!=null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $deletePath="resized_".$old_logo;
            if($old_logo!=null && File::exists(public_path($logo_path.$deletePath))){
                File::delete(public_path($logo_path.$deletePath));
            }


            $upload=$file->move(public_path($logo_path),$filename);
            $resizes_path=$logo_path;
            $this->ImageProcess($resizes_path,$logo_path,$filename);

            if($upload){
                $settings->update([
                    'project_img'=>$filename
                ]);
                return response()->json(['status'=>1,'msg'=>'L\'image de la section Projet a été mis à jour avec succès']);
            }else{
                return response()->json(['status'=>0,'msg'=>'Quelque chose n\'a pas bien marché, réessayez']);
            }
        }
    }

    public function ImageProcess(string $resized_path, string $folder, string $new_file): void
    {
        //resized image
        Image::make(public_path( $folder . $new_file))
            ->fit(960, 540)
            ->save(public_path( $resized_path . 'resized_' . $new_file));
    }
}
