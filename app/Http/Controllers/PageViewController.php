<?php

namespace App\Http\Controllers;

use App\Models\PageView;
use App\Models\PageViewLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PageViewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function increment(Request $request)
    {

        $request->validate([
            'url' => 'required|string',
        ]);


        $url = $request->input('url');

        $pageView = PageView::where('url', $url)->first();

        if ($pageView) {
            $pageView->views_count++;
            $pageView->save();
        } else {

            $pageView = PageView::create([
                'ulid' => Str::ulid(),
                'url' => $url,
                'views_count' => 1,
            ]);
        }
        $pageViewLogs = PageViewLog::create([
            'ulid' => Str::ulid(),
            'user_id' => Auth::check() ? Auth::user()->id : null,
            'url' => $url,
        ]);


        return response()->json([
            'status' => 'success',
            'count' => $pageView->views_count,
            'auth' => Auth::check(),
        ]);
    }
}
