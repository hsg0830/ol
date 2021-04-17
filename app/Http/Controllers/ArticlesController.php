<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\SubContent;
use App\Models\ArticleCategory;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;

class ArticlesController extends Controller
{
  public function index()
  {
    return view('articles.index');
  }

  public function paginate(Request $request)
  {
    $category_id = intval($request->categoryNo);

    $query = Article::query();

    if ($category_id > 0) {
      $query->where('category_id', $category_id);
    }

    $articles = $query->with('category')->paginate(12);
    $categories = ArticleCategory::select('id', 'name')->get();

    return [$articles, $categories];
  }

  public function create()
  {
    return view('articles.create');
  }

  public function categories()
  {
    $categories = ArticleCategory::select('id', 'name')->get();
    $subCategories = SubCategory::select('id', 'name')->get();

    return [
      $categories,
      $subCategories,
    ];
  }

  public function store(Request $request)
  {
    // $category_ids = ArticleCategory::select('id')->get()->all();
    // $sub_category_ids = SubCategory::select('id')->get()->toArray();

    // dd($category_ids);

    $request->validate([
      'title' => ['required', 'max:50'],
      // 'category_id' => ['required', Rule::in($category_ids)],
      'category_id' => ['required', Rule::in([100, 200, 300, 400])],
      // 'sub_category_id' => [Rule::in($sub_category_ids)],
      'sub_category_id' => [Rule::in([100, 200, 300, 400])],
      'subContents' => ['required'],
      'subContents.*.order' => ['required', 'integer', 'min:1'],
      'subContents.*.title' => ['required', 'string', 'max:50'],
      'subContents.*.description' => ['required', 'string'],
    ]);

    $result = false;

    DB::beginTransaction();

    try {
      $article = new Article();
      $article->editor_id = 1; //臨時！！
      $article->title = $request->title;
      $article->category_id = $request->category_id;
      if ($request->category_id == 300) {
        $article->sub_category_id = $request->sub_category_id;
      }
      $article->introduction = $request->introduction;
      $article->save();

      if (count($request->subContents) > 0) {
        foreach ($request->subContents as $requestSubContent) {
          $subContent = new SubContent();
          $subContent->order = $requestSubContent['order'];
          $subContent->title = $requestSubContent['title'];
          $subContent->article_id = $article->id;
          $subContent->description = $requestSubContent['description'];
          $subContent->save();
        }
      }

      DB::commit();

      $result = true;
    } catch (\Exception $e) {
      DB::rollBack();
      // dd($e->getMessage()); // 例外の内容
    }

    return ['result' => $result];
  }

  public function show(Article $article)
  {
    $article->viewd_count += 1;
    $article->save();

    return view('articles.show', [
      'article' => $article
    ]);
  }
}