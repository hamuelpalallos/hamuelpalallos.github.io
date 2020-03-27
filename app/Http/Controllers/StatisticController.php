<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Counter;

class StatisticController extends Controller
{
    public function daily() {
        $counter = Counter::all();
        // $counter = DB::table('counter');
        return view('statistics.dailystat', ['counter' => $counter]);
        // return view('statistic', compact('g1c'));

        //return view('statistic');
    }

    public function weekly() {
        $counter = Counter::all();
        // $counter = DB::table('counter');
        return view('statistics.weeklystat', ['counter' => $counter]);
        // return view('statistic', compact('g1c'));

        //return view('statistic');
    }

    public function monthly() {
        $counter = Counter::all();
        // $counter = DB::table('counter');
        return view('statistics.monthlystat', ['counter' => $counter]);
        // return view('statistic', compact('g1c'));

        //return view('statistic');
    }

    public function yearly() {
        $counter = Counter::all();
        // $counter = DB::table('counter');
        return view('statistics.yearlystat', ['counter' => $counter]);
        // return view('statistic', compact('g1c'));

        //return view('statistic');
    }

    public function custom() {
        $counter = Counter::all();
        // $counter = DB::table('counter');
        return view('statistics.customstat', ['counter' => $counter]);
        // return view('statistic', compact('g1c'));

        //return view('statistic');
    }
}
