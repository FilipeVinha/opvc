<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function getStats()
    {
        $stats = DB::table('categories')
            ->select(DB::raw('category, count(*) as counter'))
            ->join('occurrences', 'occurrences.category_id', '=', 'categories.id')
            ->join('events', 'events.occurrence_id', '=', 'occurrences.id')
            ->groupBy('categories.category')
            ->get();

        return view('pages.events.statistics', ['stats' => $stats]);
    }
}
