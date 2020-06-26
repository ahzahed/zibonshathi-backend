<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{

    public function save(Request $request)
        {
        request()->validate([
            'gimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('gimage')) {

            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = '/frontend/images/users';
            $ImageUpload->save($originalPath.time().$files->getClientOriginalName());

            // for save thumnail image
            $thumbnailPath = 'public/frontend/images/users/';
            $ImageUpload->resize(250,125);
            $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());

        $photo = new Image();
        $photo->photo_name = time().$files->getClientOriginalName();
        $photo->save();
        }

        return Redirect()->route('viewProfile');


        }
}
