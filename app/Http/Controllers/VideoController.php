<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function create()
    {

        return view('videos.create');
    }


    public function store(Request $request)
   {
      $this->validate($request, [
         'title' => 'required|string|max:255',
         'video' => 'required|file|mimetypes:video/mp4',
   ]);
   $video = new Video();
   $video->title = $request->title;
   if ($request->hasFile('video'))
   {
     $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
    $video->video = $path;
   }
   $video->save();
   
  }

}
