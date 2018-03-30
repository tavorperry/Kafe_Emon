<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PointsController;
use Auth;
use Alert;
use Validator;


class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // GET /reports/create
    public function create()
    {
        return view('reports.create');
    }

    // POST /reports
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'message' => 'required|max:50'
        ]);

        if($validator->fails())
        {
            Alert::error('אנא ספק פרטים נוספים לטיפול מהיר', 'אין פרטים!')->persistent("Close");
            return redirect()->back()->withInput();
        }

        $report = new Report();
        $report->user_id = auth()->id();
        $report->station_id = $request->get('station');
        $report->type = $request->get('type');
        $report->desc = $request->get('message');

        $isReported = $report->save();

        if ($isReported) {
            $user = Auth::user();
            $prevLevel = $user->getLevel();
            $user->addPoints(20);
            Alert::success('הרווחת 20 נקודות', 'הדיווח נשלח!')->persistent("Close");

            if($user->isLevelUp($prevLevel))
            {
                Alert::success('מזל טוב עלית רמה!','תותח/ית')->persistent("Close");
            }
            //$request->session()->flash('message', 'Created Successfully');
        }

        return redirect()->route('reports.create');
    }
}
