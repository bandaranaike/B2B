<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $_article;
    private $_method = 'post';

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $this->_article = new Article();
        return $this->_save($request);
    }

    /**
     * @param Request $request
     * @param $article_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $article_id)
    {
        $this->_article = Article::findOrFail($article_id);
        $this->_method = 'put';
        return $this->_save($request);
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function _save($request)
    {
        $r = 0;
        if ($request->has('save-article')) {

            $this->validate($request, [
                'author_id' => 'required|exists:authors,id',
                'title' => 'required|max:255',
                'content' => 'required',
                'url' => $this->_method == 'put' ? "required|unique:articles,url,{$this->_article->id}" : "required|unique:articles,url"
            ]);

            $this->_article->author_id = $request->author_id;
            $this->_article->title = $request->title;
            $this->_article->url = $request->url;
            $this->_article->content = $request->content;
            $r = $this->_article->save();
        }

        return view('article.manage', ['article' => $this->_article, 'method' => $this->_method, 'authors' => Author::all(), 'r' => $r]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList()
    {
        $articles = Article::with('author')->get();
        if (count($articles)) {
            foreach ($articles as $article) {
                $data[] = $this->_makeData($article, true);
            }
            return response()->json($data);
        } else return response()->json('There are no articles yet', 204);
    }

    /**
     * @param $url
     * @return \Illuminate\Http\JsonResponse
     */
    public function getArticle($url)
    {

        $article = Article::where('url', $url)->first();
        if ($article) {
            $data = $this->_makeData($article);
            return response()->json($data);
        }
        return response()->json('No article found. Please check the url', 404);

    }

    /**
     * @param Article $article
     * @param bool $is_short_view
     * @return object
     */
    private function _makeData(Article $article, $is_short_view = false)
    {
        $data = [
            "id" => $article->id,
            "title" => $article->title,
            "author" => $article->author->name,
            "url" => config('constants.article_url') . $article->url,
            "createdAt" => substr($article->created_at, 10)
        ];
        if ($is_short_view) $data["summary"] = str_limit($article->content);
        else  $data["content"] = $article->content;

        return (object)$data;
    }

    public function delete(Request $request)
    {
        $article = Article::find($request->id);
        if ($article)
            return response()->json($article->delete());
        else
            return response()->json('<p>This article was not found</p>', 404);
    }
}
