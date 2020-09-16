<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Comment;

class NewsController extends Controller
{
    // Получить все новости
    public function getNews()
    {
        $news = News::latest()->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('main', compact('news', 'tags'));
    }

    // Изменить новость
    public function editNews(Request $req)
    {
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('news.edit', compact('req', 'tags'));
    }

    // Удалить новость
    public function deleteNews(Request $req)
    {
        // Сначала удаляем комментарии
        $news = News::find($req->news_id);
        $news->comments()->delete();

        // Затем саму новость
        $news->delete();
        return redirect()->route('main')->with('success', 'Новость успешно удалена');
    }

    // Получить тег новости
    public static function getTagOfNews($news_item)
    {
        return Tag::find($news_item->tag_id)->name;
    }

    // Открыть новость
    public function getItemOfNews($id)
    {
        // Получить пользователей
        $users = User::get();
        // Получить выбранную новость
        $news = News::find($id);
        // Получить тег новости
        $tag = Tag::find($news->tag_id);
        // Получить комментарии к новости
        $comments = Comment::where('news_id', $id)->orderBy('created_at', 'desc')->get();

        return view('news.show', compact('users', 'news', 'tag', 'comments'));
    }

    // Новости по тегу
    public function filter(Request $req)
    {
        // Получить новость по id тега
        $news = News::where('tag_id', '=', $req->tag_id)->get();
        // Получить теги
        $tags = Tag::orderBy('name', 'asc')->get();
        // Получить комментарии к новости
        return view('news.filter', compact('news', 'tags', 'req'));
    }
}
