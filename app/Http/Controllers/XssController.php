<?php

namespace Framgia\Xvla\Http\Controllers;

use Framgia\Xvla\News;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Framgia\Xvla\Http\Requests;

class XssController extends Controller
{
    public function index(Request $request)
    {
        $results = News::query()->orderBy('created_at', 'desc')->paginate();
        
        return view('xss.base', [
            'results' => $results,
            'safe' => $request->input('safe', 0),
        ]);
    }
    
    public function store(Guard $guard, Request $request)
    {
        $name = $request->input('name', '');
        $content = $request->input('content', '');
        
        $user = $guard->user();
        
        $news = new News([
            'name' => $name,
            'content' => $content,
        ]);

        if ($user) {
            $news->user()->associate($user);
        }

        $news->save();

        return redirect('/xss/base');
    }
}
