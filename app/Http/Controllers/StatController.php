<?php

namespace App\Http\Controllers;

use App\Event;

class StatController extends Controller
{
    public function getEvents()
    {
        $events = Event::all();
        return view('pages.events.statistics', ['events' => $events]);
    }
}
