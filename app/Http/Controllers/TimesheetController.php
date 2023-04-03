<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use App\Models\Timesheet;
use App\Models\Mission_application;
use Illuminate\Support\Facades\Auth;
 
class TimesheetController extends Controller
{
    public function index()
    {
        $missions = Mission_application::where('mission_application.user_id',Auth::user()->user_id)->where('mission_application.approval_status','APPROVE')->leftJoin('mission', 'mission.mission_id', '=', 'mission_application.mission_id')->get();
        $timesheets = Timesheet::where('timesheet.user_id',Auth::user()->user_id)->where('timesheet.deleted_at',null)->leftJoin('mission', 'mission.mission_id', '=', 'timesheet.mission_id')->get();
        return view('timesheet',compact('missions','timesheets'));
    }

    public function store(Request $request)
    {
        if (isset($_POST['add_hours'])){
            $request->validate([
                'mission_id' => 'required',
                'date_volunteered' => 'required',
            ]);
            Timesheet::insert([
                "mission_id" => $request->mission_id,
                "user_id" => Auth::user()->user_id,
                "time" => ($request->h ? $request->h : '00').':'.($request->m ? $request->m : '00').':00',
                "date_volunteered" => $request->date_volunteered,
                "notes" => $request->notes,
                "status" => 'APPROVED',
                "created_at" => Carbon::now()->toDateTimeString()
            ]);
        }
        else{
            $request->validate([
                'missionid' => 'required',
                'datevolunteered' => 'required',
            ]);
            Timesheet::insert([
                "mission_id" => $request->missionid,
                "user_id" => Auth::user()->user_id,
                "action" => $request->action,
                "date_volunteered" => $request->datevolunteered,
                "notes" => $request->notes,
                "status" => 'APPROVED',
                "created_at" => Carbon::now()->toDateTimeString()
            ]);
        }
        return back()->with('message', 'inserted sucessfully');
    }

    public function update(Request $request, $timesheet_id)
    {
        if (isset($_POST['edit_hours'])){
            $request->validate([
                'date_volunteered' => 'required',
            ]);
            Timesheet::where('timesheet_id', $timesheet_id)->update([
                "mission_id" => $request->mission_id,
                "time" => ($request->h ? $request->h : '00').':'.($request->m ? $request->m : '00').':00',
                "date_volunteered" => $request->date_volunteered,
                "notes" => $request->notes,
            ]);
        }
        else{
            $request->validate([
                'datevolunteered' => 'required',
            ]);
            Timesheet::where('timesheet_id', $timesheet_id)->update([
                "mission_id" => $request->mission_id,
                "action" => $request->action,
                "date_volunteered" => $request->datevolunteered,
                "notes" => $request->notes,
            ]);
        }
        return back()->with('message', 'updated sucessfully');;
    }

    public function destroy($timesheet_id)
    {
        Timesheet::where('timesheet_id', $timesheet_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return back()->with('message', 'deleted sucessfully');
    }
}