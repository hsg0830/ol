<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medium;
use Illuminate\Validation\Rule;

class MediaController extends Controller
{
  function index()
  {
    return view('media');
  }

  function list()
  {
    return Medium::latest()->get();
  }

  function store(Request $request)
  {
    $request->validate([
      'type' => ['required', Rule::in('image', 'video')],
      'medium' => ($request->type === 'image')
        ? ['required', 'image', 'max:5000'] // max 5 MB
        : ['required', 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi', 'max:50000000'], //50MB
      'poster' => ($request->type === 'video')
        ? ['required', 'image', 'max:5000'] : '', // max 5 MB
    ]);

    $result = false;

    if ($request->hasFile('medium')) {

      $path = $request->medium->store('public/media');
      $filename = basename($path);

      $medium = new Medium;
      $medium->editor_id = 1; // 臨時！！！
      $medium->type = $request->type;
      $medium->memo = $request->memo;
      $medium->filename = $filename;

      if ($request->type === 'video') {
        $posterPath = $request->poster->store('public/media');
        $posterFilename = basename($posterPath);
        $medium->poster = $posterFilename;
      } else {
        $medium->poster = $filename;
      }

      $result = $medium->save();
    }

    return ['result' => $result];
  }
}