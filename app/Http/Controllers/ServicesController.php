<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    function insert_image(Request $request)
    {

        echo ($request); exit();

        $request->validate([
            'user_name'  => 'required',
            'user_image' => 'required|image'  //|max:2048
        ]);

        $image_file = $request->user_image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $form_data = array(
            'name'  => $request->name,
            'icon_image' => $image
        );

        Images::create($form_data);

        return redirect()->back()->with('success', 'Image store in database successfully');
    }
}
