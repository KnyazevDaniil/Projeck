<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getTag()
    {
       $tags = Tag::orderBy('name', 'asc')->get();
        return view('news.create', compact('tags'));
    }
}
