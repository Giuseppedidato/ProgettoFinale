<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');

        return view('welcome', compact('announcements')  );
    }



    public function userShow(User $user)
    {
        return view('autore.usershow', compact('user'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(8);

        return view('announcements.index', compact('announcements'));
    }

    public function categoryShow(Category $category )
    {

        return view('category.categoryshow', compact('category'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

}
