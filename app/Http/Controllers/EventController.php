<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\Photo;
use App\Review;
use App\User;
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

    public function setPhoto(Request $request, $id)
    {
        $photo = new Photo();
        if ($request->hasFile('file')) {
            $photo->photo = $request->file->store('events');
        }
        $photo->event_id = $id;
        $photo->save();
    }

    public function showDetail($id)
    {
        $event = Event::find($id);
        return view('pages.events.details', ['event' => $event]);
    }

    public function setReview(Request $request)
    {
        $result['status'] = 'fail';
        $review = new Review;
        $review->review = $request->review;
        $review->user_id = $request->user;
        $review->event_id = $request->event;
        $review->save();
        if ($review->id) {
            $result['status'] = 'ok';
            $name = User::find($request->user);
            $month = date("M", strtotime($review->created_at));
            $day = date("d", strtotime($review->created_at));
            $newReview = '<li>
                            <img src="/images/user.png" class="avatar" alt="Avatar">
                            <div class="message_date">
                                <h3 class="date text-info">' . $day . '</h3>
                                <p class="month">' . $month . '</p>
                            </div>
                            <div class="message_wrapper">
                                <h4 class="heading\">' . $name->name . '</h4>
                                <blockquote class="message">
                                ' . $review->review . '
                                </blockquote>
                            </div>
                        </li>';

            $result['reviews'] = $newReview;
        }
        return json_encode($result);

    }
}
