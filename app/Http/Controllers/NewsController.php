<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Exceptions\MediaCannotBeUpdated;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact(['news']));
    }

    public function create()
    {
        $news = new News();
        return view('news.create', compact(['news']));
    }

    public function store(StoreNews $request)
    {
        $data = $request->validated();
        if (!isset($data['alias'])) {
            $data['alias'] = Str::slug($data['title']);
        }
        $news = News::create(Arr::except($data, ['image']));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $news->addMediaFromRequest('image')->toMediaCollection('news-image', 'news');
        }

        return redirect(route('news.index'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews       $request
     * @param \App\Models\News $news
//     * //     * @return \Illuminate\Http\Response
     *
     * @throws \Spatie\MediaLibrary\Exceptions\MediaCannotBeUpdated
     */
    public function update(UpdateNews $request, News $news)
    {
        $data = $request->validated();
//        dd($data);
        if (!isset($data['alias'])) {
            $data['alias'] = Str::slug($data['title']);
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $news->addMediaFromRequest('image')->toMediaCollection('news-image', 'news');
        }

        // Обновляем News
        $news->update(Arr::except($data, ['image']));
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
//     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect(route('news.index'));
    }

    protected function validateRequest(): array
    {
        return \request()->validate([
            'title' => 'required',
            'announcement' => '',
            'body' => 'required',
            'image' => '',
            'meta_title' => 'required|unique:news',
            'meta_description' => 'required',
            'alias' => 'required|unique:news',
            'published' => 'required',
        ]);
    }

}
