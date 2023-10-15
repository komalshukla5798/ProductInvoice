<?php

namespace App\Http\Controllers;

use App\Photo;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    function index()
    {
     return view('dropzone');
    }

    function upload(Request $request)
    {

     $image = $request->file('file');

     $imageName = rand(0,9999999).rand(0,999).".".$image->extension();

     $image->move(public_path('images'), $imageName);

     $photo = new Photo([
        'photo' => $imageName
     ]);

     $photo->save();

     return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
     $images = Photo::get();
     $output = '<div class="row">';
     foreach($images as $image)
     {
      $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('images/' . $image->photo ).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" name="'.$image->photo.'" id="'.$image->id.'">Remove</button>
            </div>
      ';
     }
     $output .= '</div>';
     echo $output;
    }

    function delete(Request $request)
    {
    $name = $request->get('name');
    $id = $request->get('id');
    Photo::find($id)->delete();
    \File::delete(public_path('images/' . $name));
    }
}
?>