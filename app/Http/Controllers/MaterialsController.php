<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Material;
use App\Models\Notice;

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
      ->paginate(10);

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
    $category_keys = $this->categories->keys()->toArray();
    $type_keys = $this->types->keys()->toArray();

    $request->validate([
      'category_key' => ['required', Rule::in($category_keys)],
      'type_key' => ['required', Rule::in($type_keys)],
      'status' => ['required', Rule::in([0, 1])],
      'file' => ['required', 'max:20000000'],
      'title' => ['required', 'max:150'],
      'description' => ['required']
    ]);

    $file = $request->file('file');

    $result = null;

    if ($file) {
      $origin_file_name = $file->getClientOriginalName();
      $file_name = now()->format('ymd') . '_' . $origin_file_name;
      $file_size = $file->getSize();
      $result = Storage::putFileAs($this->path, $file, $file_name);
    }

    if ($result) {
      $material = new Material();
      $material->category_key = $request->category_key;
      $material->type_key = $request->type_key;
      $material->file_name = $file_name;
      $material->size = $file_size;
      $material->title = $request->title;
      $material->description = $request->description;
      $material->status = $request->status;

      if ($material->status == 1) {
        $material->released_at = now()->format('Y-m-d');
      }

      $material->save();

      if ($material->status == 1) {
        $this->makeNotice($material);
      }
    }

    return redirect()->route('materials.list');
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
    $category_keys = $this->categories->keys()->toArray();
    $type_keys = $this->types->keys()->toArray();

    $request->validate([
      'category_key' => ['required', Rule::in($category_keys)],
      'type_key' => ['required', Rule::in($type_keys)],
      'status' => ['required', Rule::in([0, 1])],
      'title' => ['required', 'max:150'],
      'description' => ['required']
    ]);

    $material->category_key = $request->category_key;
    $material->type_key = $request->type_key;
    $material->title = $request->title;
    $material->description = $request->description;
    $material->status = $request->status;

    if ($material->released_at == null && $material->status == 1) {
      $material->released_at = now()->format('Y-m-d');
      $this->makeNotice($material);
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

    if (Auth::guard('web')->check()) {
      $material->download_count += 1;
      $material->save();
    }

    return Response::make(Storage::get($this->path . $file_name), 200, $headers);
  }

  private function makeNotice($material)
  {
    $notice = new Notice();
    $notice->editor_id = Auth::id();
    $notice->status = 1;
    $notice->category = 3;
    $notice->title = $material->title;
    $notice->url = '/materials/' . $material->id;
    $result = $notice->save();

    return $result;
  }
}