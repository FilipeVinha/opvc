<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use App\Occurrence;
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
        $categories = Category::all();
        $occurrences = Occurrence::all();
        return view('pages.events.list', ['events' => $events, 'categories' => $categories, 'occurrences' => $occurrences]);
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
        date_default_timezone_set('UTC');
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
            $newReview = '<div class="box-comment">
                                                        <img class="img-circle img-sm"
                                                             src="' . asset("storage/" . $review->user->profile->photo) . '"
                                                             alt="User Image">
                                                        <div class="comment-text">
                                                          <span class="username">
                                                           ' . $review->user->name . '
                                                              <span class="text-muted pull-right">' . date("d-m-Y H:i", strtotime($review->created_at)) . '</span>
                                                          </span>
                                                            ' . $review->review . '
                                                        </div>
                                                    </div>';

            $result['reviews'] = $newReview;
        }
        return json_encode($result);

    }
}
