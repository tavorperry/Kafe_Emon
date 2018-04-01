<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use Auth;
use Alert;

class StationShiftController extends Controller
{
    public function edit(Station $station)
    {
        return view('shifts.update', compact('station'));
    }

    public function update(Request $request)
    {
        $userShifts = $request->user()->shifts();
        $shifts = $request->input('shifts');

        if ($shifts == null) {
            Alert::warning('לא תקבל התראות ולא תוכל לצבור נקודות, לא חבל?', 'אין משמרות')->persistent('Close');
        } else {
            Alert::success('צבור נקודות וזכה בפרסים! :)', 'המשמרות מעודכנות!')->persistent('Close');
        }
        $userShifts->sync($shifts);



        return back();
    }

    public function pickStation()
    {
        return view('shifts.stations');
    }

    public static function isUserCheckThisShiftAlready($shift){
        //This Function checks the checkbox in the view if the user is already listed in the current shift//
        $user_shifts = Auth::user()->shifts;
        foreach( $user_shifts as $user_shift){
            if ($user_shift->id == $shift->id)
                echo 'checked';
        }
    }


}
