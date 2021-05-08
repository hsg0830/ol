<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\SubContent;
use App\Models\ArticleCategory;

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

    $articles = $query->where('status', 1)->with('category')->paginate(12);
    $categories = ArticleCategory::select('id', 'name')->get();

    return [
      'articles' => $articles,
      'categories' => $categories
    ];
  }

  public function show(Article $article)
  {
    if (!Auth::guard('editors')->check()) {
      if ($article->status == 0) {
        return redirect()->route('articles.index');
      }

      $article->viewed_count += 1;
      $article->save();
    }

    $relatedArticles =  Article::where('category_id', $article->category_id)
      ->where('id', '<>', $article->id)
      ->where('status', 1)
      ->orderBy('released_at', 'desc')
      ->take(3)->get();

    return view('articles.show', [
      'article' => $article,
      'relatedArticles' => $relatedArticles,
    ]);
  }

  public function create()
  {
    $categories = $this->categories();

    return view('articles.post', [
      'categories' => $categories,
    ]);
  }

  public function edit(Article $article)
  {
    $article->load('subContents');
    $categories = $this->categories();

    return view('articles.post', [
      'article' => $article,
      'categories' => $categories
    ]);
  }

  public function store(ArticleRequest $request)
  {
    $article = new Article();
    return $this->saveArticle($request, $article);
  }

  public function update(ArticleRequest $request, Article $article)
  {
    return $this->saveArticle($request, $article);
  }

  // 記事管理ページ用
  public function showArticlesList()
  {
    return view('articles.list');
  }

  public function getArticlesList()
  {
    $articles = Article::with('category')->get();

    return ['articles' => $articles];
  }

  public function changeStatus(Article $article)
  {
    $article->status = !($article->status);
    $result = $article->save();

    return [
      'result' => $result,
    ];
  }

  public function destroy(Article $article)
  {
    return [
      'result' => $article->delete()
    ];
  }

  // プライベートファンクション
  private function categories()
  {
    return ArticleCategory::with('sub_categories')->select('id', 'name')->get();
  }

  private function saveArticle(Request $request, Article $article)
  {
    $result = false;

    DB::beginTransaction();

    try {

      if (!$article->exists) {
        $article->editor_id = Auth::id();
      }

      $article->title = $request->title;
      $article->category_id = $request->category_id;
      $article->sub_category_id = $request->sub_category_id;
      $article->introduction = $request->introduction;
      $article->status = $request->status;
      $article->save();

      if (count($request->subContents) > 0) {
        $subContents = $article->subContents;
        foreach ($subContents as $subContent) {
          $subContent->delete();
        }

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
    }

    return [
      'result' => $result,
      'article' => $article,
    ];
  }
}