<?php

namespace App\Http\Controllers;
use App\Event;
use App\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showMap()
    {
        $events = Event::all();
        return view('pages.events.map', ['events' => $events]);
    }

    public function showEvents()
    {
        $events = Event::all();
        $datacategories = Category::all('id', 'category');
        $categories = [];
        foreach ($datacategories as $row) {
            $categories[$row['id']] = $row['category'];
        }

        return view('pages.events.list', ['events' => $events, 'categories' => $categories]);
    }


    public function showDetail($id)
    {
        $event = Event::find($id);
        return view('pages.events.details', ['event' => $event]);
    }
}
