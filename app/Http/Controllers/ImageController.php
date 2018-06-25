<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Validator;

class ImageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }


    public function upload(Request $request, $x = NULL, $y = NULL) {

        $id = Auth::id();

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000000',
        ]);

        if ($validator->passes()) {

            $image = $request->file('image');
            $input['image'] = time().'.'.$image->getClientOriginalExtension();

            // THUMBNAILS
            $destinationPath = public_path('uploads'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'thumbnails');
            $img = Image::make($image->getRealPath());
            // $img->crop(100, 100, 0, 0)->save($destinationPath.'/'.$input['image']);
            $img->fit(100, 100)->save($destinationPath.DIRECTORY_SEPARATOR.$input['image']);

            // NORMAL
            $destinationPath = public_path('uploads'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'normals');
            $img = Image::make($image->getRealPath());
            $img->fit(1000, 1000)->save($destinationPath.DIRECTORY_SEPARATOR.$input['image']);

            // COVER
            $destinationPath = public_path('uploads'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'covers');
            $img = Image::make($image->getRealPath());
            $img->fit(1300, 700);
            $img->blur(60)->save($destinationPath.DIRECTORY_SEPARATOR.$input['image']);

            // ORIGINAL
            $destinationPath = public_path('uploads'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'originals');
            $image->move($destinationPath, $input['image']);

            Profile::find($id)->update(['avatar'=> $input['image']]);

            return response()->json(['success'=>'done', 'url'=> $input['image'] ]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
   }

}