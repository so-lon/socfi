<?php

namespace App\Http\Controllers;

use News;
use NewsRequest;
use SearchRequest;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $model)
    {
        return view('news.index', ['news' => $model->orderByDesc('updated_at')->paginate(6)]);
    }

    /**
     * Display a listing of the resource with search keywords
     *
     * @param  \App\Http\Requests\SearchRequest  $request
     * @param  \App\Models\News  $model
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request, News $model)
    {
        $terms = $request->get('terms');

        return view('news.index', [
            'news' => $model->whereLike(['title', 'userCreated.username', 'userUpdated.username'], $terms)->orderByDesc('updated_at')->paginate(5),
            'terms' => $terms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\News  $model
     * @param  \Illuminate\Http\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request, News $model)
    {
        $model->create(
            $request->merge([
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ])->all()
        );

        return redirect()->route('news.index')->withStatus(__('news.message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\NewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $news->update(
            $request->merge([
                'updated_by' => Auth::user()->id,
            ])->all()
        );

        return redirect()->route('news.index')->withStatus(__('news.message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->withStatus(__('news.message.success.delete'));
    }
}
