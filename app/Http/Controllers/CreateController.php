<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests\CreateRequest;

class CreateController extends Controller
{
    public function submit(CreateRequest $req)
    {
      $news = new News();
      $news->title = $req->input('title');
      $news->preview = $req->input('preview');
      $news->description = $req->input('description');
      $news->tag_id = $req->input('tag');

      $news->save();

      return redirect()->route('main')->with('success', 'Новость была успешно добавлена');
    }

    // Изменить новость
    public function editNews(Request $req)
    {
        $news = News::where('id', '=', $req->news_id)->first();
        $news->title = $req->input('title');
        $news->preview = $req->input('preview');
        $news->description = $req->input('description');
        $news->tag_id = $req->input('tag');

        $news->save();

        return redirect()->route('main')->with('success', 'Новость была успешно изменена');
    }
}
