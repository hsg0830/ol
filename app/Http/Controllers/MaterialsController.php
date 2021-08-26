<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Material;

class MaterialsController extends Controller
{
  protected $categories;
  protected $types;
  protected $path;

  public function __construct()
  {
    $this->categories = config('materials.category');
    $this->types = config('materials.type');
    $this->path = '/public/materials/';
  }

  public function index()
  {
    return view('materials.index', [
      'categories' => $this->categories,
      'types' => $this->types,
    ]);
  }

  public function getList(Request $request)
  {
    $query = Material::query()->where('status', 1);

    if ($request->categoryNo > 0) {
      $query->where('category_key', $request->categoryNo);
    }

    if ($request->searchWord) {
      $query->where('title', 'like', '%' . $request->searchWord . '%');
    }

    $materials = $query->orderBy('released_at', 'desc')
      ->paginate(5);

    return [
      'materials' => $materials,
    ];
  }

  public function show(Material $material)
  {
    return view('materials.show', [
      'material' => $material,
      'categories' => $this->categories,
      'types' => $this->types,
    ]);
  }

  public function list()
  {
    $materials = Material::orderBy('released_at', 'desc')->get();

    return view('materials.list', [
      'materials' => $materials,
      'categories' => $this->categories,
      'types' => $this->types,
    ]);
  }

  public function create()
  {
    return view('materials.create', [
      'categories' => $this->categories,
      'types' => $this->types,
    ]);
  }

  public function store(Request $request)
  {
    $file = $request->file('file');

    $result = null;

    if ($file) {
      $file_name = $file->getClientOriginalName();
      $result = Storage::putFileAs($this->path, $file, $file_name);
    }

    if ($result) {
      $material = new Material();
      $material->category_key = $request->category_key;
      $material->type_key = $request->type_key;
      $material->file_name = $file_name;
      $material->title = $request->title;
      $material->description = $request->description;
      $material->status = $request->status;

      if ($material->status == 1) {
        $material->released_at = now()->format('Y-m-d');
      }

      $material->save();
    }

    return back();
  }

  public function edit(Material $material)
  {
    return view('materials.edit', [
      'material' => $material,
      'categories' => $this->categories,
      'types' => $this->types,
    ]);
  }

  public function update(Material $material, Request $request)
  {
    $material->category_key = $request->category_key;
    $material->type_key = $request->type_key;
    $material->title = $request->title;
    $material->description = $request->description;
    $material->status = $request->status;

    if ($material->status == 1) {
      $material->released_at = now()->format('Y-m-d');
    } else {
      $material->released_at = null;
    }

    $material->save();

    return redirect()->route('materials.list');
  }

  public function destroy(Material $material)
  {
    $file_name = $material->file_name;
    Storage::delete($this->path . $file_name);
    $material->delete();

    return redirect()->route('materials.list');
  }

  public function download(Material $material)
  {
    $file_name = $material->file_name;
    $mime_type = Storage::mimeType($this->path . $file_name);
    $headers = [
      'Content-Type' => $mime_type,
      'Content-Disposition' => 'attachment; filename="' . $file_name . '";'
    ];

    return Response::make(Storage::get($this->path . $file_name), 200, $headers);
  }
}