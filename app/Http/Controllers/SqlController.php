<?php

namespace Framgia\Xvla\Http\Controllers;

use Framgia\Xvla\News;
use Illuminate\Http\Request;

use Framgia\Xvla\Http\Requests;

class SqlController extends Controller
{
    public function index(Request $request)
    {
        $item = $request->input('item', '');
        $search = $request->input('search', '');
        
        $error = '';
        
        if ($item && $search) {
            $error = 'Error! Can not use both search and itemcode option. Search using either of these options.';
            $results = [];
        } elseif ($item) {
            $results = News::query()
                ->whereRaw('id = '.$item)
                ->get();
        } elseif ($search) {
            $results = News::query()
                ->where('name', 'like', \DB::raw('"%'.$search.'%"'))
                ->orWhere('content', 'like', \DB::raw('"%'.$search.'%"'))
                ->get();
        } else {
            $results = [];
        }

        $items = News::query()->pluck('name', 'id');
        
        return view('sql.base')->with([
            'results' => $results,
            'error' => $error,
            'items' => $items,
            'item' => $item,
            'search' => $search,
        ]);
    }
}
