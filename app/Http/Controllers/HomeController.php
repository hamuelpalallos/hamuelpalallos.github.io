<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Counter;
use Carbon\Traits\Timestamp;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function index()
    {

        $numDays = date('t');
  
        $thisDay = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime('-1 days'));
        $lastWeek = date('Y-m-d',strtotime('-7 days'));
        $lastlastWeek = date('Y-m-d',strtotime('-14 days'));
        $thisMonth = date('Y-m');
        $thisYear = date('Y');

        $counter = Counter::all();
        $g1t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',1);
        $g1ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',1)->where('section','Section A');
        $g1tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',1)->where('section','Section B');
        $g1tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',1)->where('section','Section C');
        $g1td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',1)->where('section','Section D');

        $g2t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',2);
        $g2ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',2)->where('section','Section A');
        $g2tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',2)->where('section','Section B');
        $g2tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',2)->where('section','Section C');
        $g2td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',2)->where('section','Section D');

        $g3t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',3);
        $g3ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',3)->where('section','Section A');
        $g3tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',3)->where('section','Section B');
        $g3tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',3)->where('section','Section C');
        $g3td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',3)->where('section','Section D');

        $g4t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',4);
        $g4ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',4)->where('section','Section A');
        $g4tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',4)->where('section','Section B');
        $g4tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',4)->where('section','Section C');
        $g4td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',4)->where('section','Section D');

        $g5t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',5);
        $g5ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',5)->where('section','Section A');
        $g5tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',5)->where('section','Section B');
        $g5tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',5)->where('section','Section C');
        $g5td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',5)->where('section','Section D');

        $g6t = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',6);
        $g6ta = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',6)->where('section','Section A');
        $g6tb = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',6)->where('section','Section B');
        $g6tc = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',6)->where('section','Section C');
        $g6td = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00'])->where('grade_level',6)->where('section','Section D');

        $g1y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',1);
        $g1ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',1)->where('section','Section A');
        $g1yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',1)->where('section','Section B');
        $g1yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',1)->where('section','Section C');
        $g1yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',1)->where('section','Section D');

        $g2y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',2);
        $g2ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',2)->where('section','Section A');
        $g2yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',2)->where('section','Section B');
        $g2yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',2)->where('section','Section C');
        $g2yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',2)->where('section','Section D');

        $g3y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',3);
        $g3ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',3)->where('section','Section A');
        $g3yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',3)->where('section','Section B');
        $g3yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',3)->where('section','Section C');
        $g3yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',3)->where('section','Section D');

        $g4y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',4);
        $g4ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',4)->where('section','Section A');
        $g4yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',4)->where('section','Section B');
        $g4yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',4)->where('section','Section C');
        $g4yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',4)->where('section','Section D');

        $g5y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',5);
        $g5ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',5)->where('section','Section A');
        $g5yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',5)->where('section','Section B');
        $g5yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',5)->where('section','Section C');
        $g5yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',5)->where('section','Section D');

        $g6y = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00'])->where('grade_level',6);
        $g6ya = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',6)->where('section','Section A');
        $g6yb = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',6)->where('section','Section B');
        $g6yc = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',6)->where('section','Section C');
        $g6yd = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00',$yesterday .' 24:00:00'])->where('grade_level',6)->where('section','Section D');

        $g1lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',1);
        $g1lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',1)->where('section','Section A');
        $g1lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',1)->where('section','Section B');
        $g1lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',1)->where('section','Section C');
        $g1lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',1)->where('section','Section D');

        $g2lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',2);
        $g2lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',2)->where('section','Section A');
        $g2lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',2)->where('section','Section B');
        $g2lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',2)->where('section','Section C');
        $g2lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',2)->where('section','Section D');

        $g3lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',3);
        $g3lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',3)->where('section','Section A');
        $g3lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',3)->where('section','Section B');
        $g3lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',3)->where('section','Section C');
        $g3lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',3)->where('section','Section D');

        $g4lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',4);
        $g4lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',4)->where('section','Section A');
        $g4lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',4)->where('section','Section B');
        $g4lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',4)->where('section','Section C');
        $g4lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',4)->where('section','Section D');

        $g5lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',5);
        $g5lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',5)->where('section','Section A');
        $g5lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',5)->where('section','Section B');
        $g5lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',5)->where('section','Section C');
        $g5lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',5)->where('section','Section D');

        $g6lw = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00'])->where('grade_level',6);
        $g6lwa = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',6)->where('section','Section A');
        $g6lwb = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',6)->where('section','Section B');
        $g6lwc = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',6)->where('section','Section C');
        $g6lwd = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00',$lastWeek .' 24:00:00'])->where('grade_level',6)->where('section','Section D');

        $daily = Counter::all()->whereBetween('created_at', [$thisDay.' 00:00:00', $thisDay.' 24:00:00']);
        $yday = Counter::all()->whereBetween('created_at', [$yesterday.' 00:00:00', $yesterday.' 24:00:00']);
        $weekly = Counter::all()->whereBetween('created_at', [$lastlastWeek.' 00:00:00', $lastWeek.' 24:00:00']);
        $monthly = Counter::all()->whereBetween('created_at', [$thisMonth . '-01 00:00:00', $thisMonth . '-' . $numDays . '24:00:00']);
        $yearly = Counter::all()->whereBetween('created_at', [$thisYear.'-01-01 00:00:00', $thisYear.'-12-31 24:00:00']);

        return view('admin.index',
            ['counter' => $counter],
            [
                'daily' => count($daily),
                'monthly' => count($monthly),
                'weekly' => count($weekly),
                'yearly' => count($yearly),
                'yday' => count($yday),
                'g1t' => count($g1t),
                'g1ta' =>count($g1ta),
                'g1tb' =>count($g1tb),
                'g1tc' =>count($g1tc),
                'g1td' =>count($g1td),
                'g2t' => count($g2t),
                'g2ta' =>count($g2ta),
                'g2tb' =>count($g2tb),
                'g2tc' =>count($g2tc),
                'g2td' =>count($g2td),
                'g3t' => count($g3t),
                'g3ta' =>count($g3ta),
                'g3tb' =>count($g3tb),
                'g3tc' =>count($g3tc),
                'g3td' =>count($g3td),
                'g4t' => count($g4t),
                'g4ta' =>count($g4ta),
                'g4tb' =>count($g4tb),
                'g4tc' =>count($g4tc),
                'g4td' =>count($g4td),
                'g5t' => count($g5t),
                'g5ta' =>count($g5ta),
                'g5tb' =>count($g5tb),
                'g5tc' =>count($g5tc),
                'g5td' =>count($g5td),
                'g6t' => count($g6t),
                'g6ta' =>count($g6ta),
                'g6tb' =>count($g6tb),
                'g6tc' =>count($g6tc),
                'g6td' =>count($g6td),
                'g1y' => count($g1y),
                'g1ya' =>count($g1ya),
                'g1yb' =>count($g1yb),
                'g1yc' =>count($g1yc),
                'g1yd' =>count($g1yd),
                'g2y' => count($g2y),
                'g2ya' =>count($g2ya),
                'g2yb' =>count($g2yb),
                'g2yc' =>count($g2yc),
                'g2yd' =>count($g2yd),
                'g3y' => count($g3y),
                'g3ya' =>count($g3ya),
                'g3yb' =>count($g3yb),
                'g3yc' =>count($g3yc),
                'g3yd' =>count($g3yd),
                'g4y' => count($g4y),
                'g4ya' =>count($g4ya),
                'g4yb' =>count($g4yb),
                'g4yc' =>count($g4yc),
                'g4yd' =>count($g4yd),
                'g5y' => count($g5y),
                'g5ya' =>count($g5ya),
                'g5yb' =>count($g5yb),
                'g5yc' =>count($g5yc),
                'g5yd' =>count($g5yd),
                'g6y' => count($g6y),
                'g6ya' =>count($g6ya),
                'g6yb' =>count($g6yb),
                'g6yc' =>count($g6yc),
                'g6yd' =>count($g6yd),
                'g1lw' => count($g1lw),
                'g1lwa' =>count($g1lwa),
                'g1lwb' =>count($g1lwb),
                'g1lwc' =>count($g1lwc),
                'g1lwd' =>count($g1lwd),
                'g2lw' => count($g2lw),
                'g2lwa' =>count($g2lwa),
                'g2lwb' =>count($g2lwb),
                'g2lwc' =>count($g2lwc),
                'g2lwd' =>count($g2lwd),
                'g3lw' => count($g3lw),
                'g3lwa' =>count($g3lwa),
                'g3lwb' =>count($g3lwb),
                'g3lwc' =>count($g3lwc),
                'g3lwd' =>count($g3lwd),
                'g4lw' => count($g4lw),
                'g4lwa' =>count($g4lwa),
                'g4lwb' =>count($g4lwb),
                'g4lwc' =>count($g4lwc),
                'g4lwd' =>count($g4lwd),
                'g5lw' => count($g5lw),
                'g5lwa' =>count($g5lwa),
                'g5lwb' =>count($g5lwb),
                'g5lwc' =>count($g5lwc),
                'g5lwd' =>count($g5lwd),
                'g6lw' => count($g6lw),
                'g6lwa' =>count($g6lwa),
                'g6lwb' =>count($g6lwb),
                'g6lwc' =>count($g6lwc),
                'g6lwd' =>count($g6lwd)
            ]
        );
    }
}
