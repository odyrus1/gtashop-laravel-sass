<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Menu;
use App\News;
use App\Games;

class HomeController extends Controller
{
	public function index()
    {
			$menus = Menu::where('menu_level', 1)->get();
			$submenus = Menu::where('menu_level', 2)->get();
			$lastNews = News::orderBy('date', 'desc')->first();

			$count = News::count();
			$skip = 1;
			$limit = $count - $skip;
			$news = News::orderBy('date', 'desc')->skip($skip)->take($limit)->get();

			$games = Games::orderBy('sales', 'desc')->get();
			// dd($games);
      return view('Main/home', ['menus' => $menus, 'submenus' => $submenus, 'lastNews' => $lastNews, 'news' => $news, 'games' => $games]);
    }
}
