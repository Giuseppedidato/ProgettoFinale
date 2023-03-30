<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::take(4)->get()->sortByDesc('created_at');

        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        return view('category.categoryshow', compact('category'));
    }

    public function userShow(User $user)
    {
        return view('autore.usershow', compact('user'));
    }
}
