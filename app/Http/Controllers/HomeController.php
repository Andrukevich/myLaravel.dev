<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function home()
    {
        $lastNews = \DB::table('news')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        return view('home.index', compact('lastNews'));
    }
}
