<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class AnnouncementController extends Controller
{
   public function createAnnouncement()
   {

    return view('announcements.create');
   }

   public function showAnnouncement(Announcement $announcement)
   {

        return view('announcements.show', compact('announcement'));
   }

   public function indexAnnouncement()
   {
    $announcements = Announcement::orderBy('created_at', 'DESC')-> where('is_accepted', true)->Paginate(8);
    return view('announcements.index',compact('announcements'));
   }



}
