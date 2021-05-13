<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medium;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MediaController extends Controller
{
  function index()
  {
    $media_types = config('media.types');

    return view('editors.media')->with([
      'media_types' => $media_types
    ]);
  }

  function list()
  {
    return Medium::latest()->get();
  }

  function store(Request $request)
  {
    $media_types = config('media.types');

    $request->validate([
      'type' => ['required', Rule::in($media_types)],
      'medium' => ($request->type === 'image')
        ? ['required', 'image', 'max:5000'] // max 5MB
        : ['required', 'mimetypes:video/mp4', 'max:20000000'], // max 20MB
      // 'poster' => ($request->type === 'video')
      //   ? ['required', 'image', 'max:5000'] : '',
    ]);

    $result = false;

    if ($request->hasFile('medium')) {

      $path = $request->medium->store('public/media');
      $filename = basename($path);

      $medium = new Medium;
      $medium->editor_id = Auth::id();
      $medium->type = $request->type;
      $medium->memo = $request->memo;
      $medium->filename = $filename;

      // if ($request->type === 'video') {
      //   $posterPath = $request->poster->store('public/media');
      //   $posterFilename = basename($posterPath);
      //   $medium->poster = $posterFilename;
      // } else {
      //   $medium->poster = $filename;
      // }

      $result = $medium->save();
    }

    return ['result' => $result];
  }
}