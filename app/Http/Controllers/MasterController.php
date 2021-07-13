<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LogoRequest;

use App\Models\User;
use App\Models\Logo;
use App\Models\Todo;
use App\Models\Note;
use App\Models\Event;
use App\Models\Setting;

use App\Models\Branches;
use App\Models\Sector;
use App\Models\Patients;
use App\Models\Pledges;
use App\Models\Xrays;

use App\Models\appointmentServices;
use App\Models\Appointment;
use App\Models\Countries;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Image;

class MasterController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


/*
|--------------------------------------------------------------------------
| PAGES
|--------------------------------------------------------------------------
*/

    //-------------- Home Page ---------------\\
    public function index()
    {
        $user = auth()->user();
        if( $user->role == 'Admin')
        {
            $today                = date('Y-m-d');
            return view('admin.home', [
                'branches_count' => Branches::where('disable', 0)->count(),
                'sectors_count' => Sector::where('disable', 0)->count(),
                'staff_count' => User::where('disable', 0)->where('role', 'Staff')->count(),
                'doctors_count' => User::where('disable', 0)->where('role', 'Doctor')->count(),
                'patients_count' => Patients::all()->count(),
                'today_appointments' => Appointment::where('appointment_date', $today)->count(),
                'done_appointments' => Appointment::where('appointment_date', '<', $today)->count(),
                'total_appointments' => Appointment::where('status', 'cancelled')->count(),
            ]);
        }
        else if( $user->role == 'Staff')
        {
            $today                = date('Y-m-d');
            $branch               = Branches::where('id', $user->branch_id)->first();
            return view('staff.home', [
                'sectors_count' => $branch->sectors()->count(),
                'staff_count' => User::where('disable', 0)->where('role', 'Staff')->where('branch_id', $branch->id)->count(),
                'doctors_count' => User::where('disable', 0)->where('role', 'Doctor')->where('branch_id', $branch->id)->count(),
                'patients_count' => Patients::all()->count(),
                'today_appointments' => Appointment::where('appointment_date', $today)->where('branch_id', $branch->id)->count(),
                'done_appointments' => Appointment::where('appointment_date', '<', $today)->where('branch_id', $branch->id)->count(),
                'total_appointments' => Appointment::where('status', 'cancelled')->where('branch_id', $branch->id)->count(),
            ]);

        }
        else if( $user->role == 'Doctor')
        {
            $today                = date('Y-m-d');
            return view('doctor.home', [
                'today_appointments' => Appointment::where('doctor_id', $user->id)->where('appointment_date', $today)->count(),
                'done_appointments' => Appointment::where('doctor_id', $user->id)->where('appointment_date', '<', $today)->count(),
                'total_appointments' => Appointment::where('doctor_id', $user->id)->where('status', 'cancelled')->count(),
            ]);

        }

    }

    //-------------- Profile Page ---------------\\
    public function profile()
    {
        $user = auth()->user();
        if( $user->role == 'Admin')
        {
            return view('admin.profile', [
                'countries'   => Countries::all(),
                ]);
        }
        else if( $user->role == 'Staff')
        {
            return view('staff.profile', [
                'countries'   => Countries::all(),
                ]);
        }
        else if( $user->role == 'Doctor')
        {
            return view('doctor.profile', [
                'countries'   => Countries::all(),
                ]);
        }
        
    }
    
    //-------------- Logo Page ---------------\\
    public function logo()
    {
        $logo     = Logo::first();

        return view('admin.logo', [
            'logo'    => $logo
        ]);
    }
    
    //-------------- Setting Page ---------------\\
    public function setting()
    {
        $setting     = Setting::first();

        return view('admin.setting', [
            'setting'    => $setting
        ]);
    }
    
    //-------------- Patient Profile---------------\\
    public function patientProfile($id)
    {
        $patient            = Patients::where('id', $id)->first();
        $sectors            = Sector::where('disable', 0)->orderBy('id','desc')->get();
        $appointments       = Appointment::where('patient_id', $id)->orderBy('id','desc')->get();
        $pledges            = Pledges::where('patient_id', $id)->orderBy('id','desc')->get();		
        $xrays              = Xrays::with('images')->where('patient_id', $id)->get();

        return view('common.patient_profile', [
            'patient'           => $patient,
            'sectors'           => $sectors,
            'appointments'      => $appointments,
            'pledges'           => $pledges,
            'xrays'             => $xrays,
        ]);
    }
    

/*
|--------------------------------------------------------------------------
| ACTIONS
|--------------------------------------------------------------------------
*/

    //-------------- Change Logo ---------------\\
    public function changelogo(LogoRequest $request)
    {

        $old_logo     = Logo::first();

        if($old_logo)
        {
            Storage::disk('public')->delete($old_logo->logo);
        }

        Logo::truncate();

        $create =  Logo::create([
            'logo' => $request->logo->store('images/logo', 'public')
        ]);

        return redirect(route('admin-logo'));
    }

    //-------------- Edit User Info ---------------\\
    public function editinfo(UpdateUserRequest $request)
    {
            $user            = User::where('id', $request->id)->first();

            $data = $request->only(['name', 'email', 'gender', 'phone', 'birthdate', 'nationality']);

            $user->update($data);

            if($user)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }

    //-------------- Change Profile Picture ---------------\\
    public function changeProfilePicture(Request $request)
    {
            $user            = User::where('id', $request->id)->first();
            $image_path      = public_path().'/'.$user->avatar;

            $image = $request->file('avatar');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path('/images/avatars');
            ini_set('memory_limit', '256M');
            $img = Image::make($image->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $avatar = 'images/avatars/'.$input['imagename'];

            $user->avatar     = $avatar;
            $user->save();

            unlink($image_path);

            if($user)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }

    //-------------- Change Password ---------------\\
    public function changepassword(Request $request)
    {
            $user            = User::where('id', $request->id)->first();
            $old_password    = Hash::make($request->oldpassword);
            $new_password    = Hash::make($request->newpassword);

            $check  = Hash::check($request->oldpassword, $user->password);


            if($request->oldpassword == '')
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'Current Password Required'
                ]) ;
            }
            elseif($request->newpassword == '')
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'New Password Required'
                ]) ;
            }
            elseif(strlen($request->newpassword)  < 8)
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'The password must be at least 8 characters.'
                ]) ;
            }
            elseif(!$check)
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'Current password is wrong'
                ]) ;
            }

            $data['password'] = $new_password;
            $user->update($data);

            if($user)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }

    //-------------- Add Todo ---------------\\
    public function addtodo(Request $request)
    {
            $todo = Todo::create([
                'task' => $request->task,
                'user_id' => $request->user_id,
            ]);

            $todos   = Todo::where('user_id', $request->user_id)->get();

            return view('apps.todo', [
                'todos'    => $todos,
            ]);
    }

    //-------------- Get Todo ---------------\\
    public function gettodo(Request $request)
    {
            $todos   = Todo::where('user_id', $request->id)->get();

            return view('apps.todo', [
                'todos'    => $todos,
            ]);
    }

    //-------------- Edit Todo ---------------\\
    public function edittodo(Request $request)
    {
            $todo   = Todo::where('id', $request->id)->first();

            if($todo->done == 1)
            {
                $done = 0;
            }
            elseif($todo->done == 0)
            {
                $done = 1;
            }

            $todo->done = $done;
            $todo->save();
    }

    //-------------- Remove Todo ---------------\\
    public function removetodo(Request $request)
    {
        $todo   = Todo::where('id', $request->id)->first();

        $todo->delete();
    }

    //-------------- Create Note ---------------\\
    public function createnote()
    {
        return view('apps.show_note', []);
    }

    //-------------- Add Note ---------------\\
    public function addnote(Request $request)
    {
            $note = Note::create([
                'title' => $request->title,
                'text' => $request->text,
                'user_id' => $request->user_id,
            ]);

            $notes   = Note::where('user_id', $request->user_id)->get();

            return view('apps.note', [
                'notes'    => $notes,
            ]);
    }

    //-------------- Get Note ---------------\\
    public function getnote(Request $request)
    {
            $notes   = Note::where('user_id', $request->id)->get();

            return view('apps.note', [
                'notes'    => $notes,
            ]);
    }

    //-------------- Show Note ---------------\\
    public function shownote(Request $request)
    {
            $note   = Note::where('id', $request->id)->first();

            return view('apps.show_note', [
                'note'    => $note,
            ]);
    }

    //-------------- Edit Note ---------------\\
    public function editnote(Request $request)
    {
            $note   = Note::where('id', $request->note_id)->first();

            $note->title = $request->title;
            $note->text = $request->text;
            $note->save();

            $notes   = Note::where('user_id', $note->user_id)->get();

            return view('apps.note', [
                'notes'    => $notes,
            ]);
    }

    //-------------- Remove Note ---------------\\
    public function removenote(Request $request)
    {
        $note   = Note::where('id', $request->id)->first();

        $note->delete();
    }

    //-------------- View Calendar ---------------\\
    public function calendar(Request $request)
    {
            return view('calendar', [ ]);
    }

    //-------------- Get Events ---------------\\
    public function getevent($user_id)
    {
        $events   = Event::where('user_id', $user_id)->get();
            
        foreach($events as $event)
        {
            $data[] = array(
            'id'   	        => $event["id"],
            'title'         => html_entity_decode($event["title"],ENT_QUOTES | ENT_XML1,'UTF-8'),
            'description'   => $event["description"],
            'start'         => $event["start_date"],
            'end'   	    => $event["end_date"],
            'className'     => $event["class_name"],
            'allDay'        => '!0'

            );
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    //-------------- Add Event ---------------\\
    public function addevent(Request $request)
    {
            $event = Event::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'class_name' => $request->class_name,
            ]);
    }

    //-------------- Remove Event ---------------\\
    public function removeevent(Request $request)
    {
        $event   = Event::where('id', $request->id)->first();

        $event->delete();
    }

    //-------------- Edit Event ---------------\\
    public function editevent(Request $request)
    {
            $event   = Event::where('id', $request->event_id)->first();

            $event->title           = $request->title;
            $event->description     = $request->description;
            $event->class_name      = $request->class_name;
            $event->save();
    }

    //-------------- Update Event  ---------------\\
    public function updateevent(Request $request)
    {
            $event   = Event::where('id', $request->event_id)->first();

            $event->start_date     = $request->start_date;
            $event->end_date       = $request->end_date;
            $event->save();
    }

}
