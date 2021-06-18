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

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


/*
=========================================================
  *  PAGES 
=========================================================
*/ 

    //======== Home Page ======== 
    public function index()
    {
        $user = auth()->user();
        
        //$user->assignRole('staff');

        return view('admin.home', [
            'members_count' => User::all()->count(),
        ]);
    }

    //======== Members Page ======== 
    public function members()
    {
        $users          = User::orderBy('id','asc')->paginate(10);

        return view('admin.members', [
            'users'    => $users,
        ]);
    }
    

    //======== Logo Page ======== 
    public function logo()
    {
        $logo     = Logo::first();

        return view('admin.logo', [
            'logo'    => $logo
        ]);
    }

    //======== Setting Page ======== 
    public function setting()
    {
        return view('admin.setting', []);
    }



/*
=========================================================
  *  ACTIONS 
=========================================================
*/ 

    //======== Change Logo ======== 
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

    //======== Edit User Info ======== 
    public function editinfo(UpdateUserRequest $request)
    {
            $user            = User::where('id', $request->id)->first();

            $data = $request->only(['name', 'email', 'gender', 'phone']);

            if($request->gender == 'Male')
            {
                $avatar = 'admin_assets/img/theme/avatar.png';
            }
            else
            {
                $avatar = 'admin_assets/img/theme/avatar2.png';
            }

            $data['avatar'] = $avatar;

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

    //======== Change Password ======== 
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

    //======== Enable User ======== 
    public function enableuser(Request $request)
    {
        $user     = User::where('id', $request->id)->first();

        if($user->enable == 1)
        {
            $enable = 0;
        }
        elseif($user->enable == 0)
        {
            $enable = 1;
        }

        $user->enable = $enable;
        $user->save();
    }



    //======== Add Todo ======== 
    public function addtodo(Request $request)
    {
            $todo = Todo::create([
                'task' => $request->task,
                'user_id' => $request->user_id,
            ]);

            $todos   = Todo::where('user_id', $request->user_id)->get();

            return view('admin.modals.todo', [
                'todos'    => $todos,
            ]);
    }

    //======== Get Todo ======== 
    public function gettodo(Request $request)
    {
            $todos   = Todo::where('user_id', $request->id)->get();

            return view('admin.modals.todo', [
                'todos'    => $todos,
            ]);
    }

    //======== Edit Todo ======== 
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

    //======== Remove Todo ======== 
    public function removetodo(Request $request)
    {
        $todo   = Todo::where('id', $request->id)->first();

        $todo->delete();
    }



    //======== Create Note ======== 
    public function createnote()
    {
        return view('admin.modals.show_note', []);
    }

    //======== Add Note ======== 
    public function addnote(Request $request)
    {
            $note = Note::create([
                'title' => $request->title,
                'text' => $request->text,
                'user_id' => $request->user_id,
            ]);

            $notes   = Note::where('user_id', $request->user_id)->get();

            return view('admin.modals.note', [
                'notes'    => $notes,
            ]);
    }

    //======== Get Note ======== 
    public function getnote(Request $request)
    {
            $notes   = Note::where('user_id', $request->id)->get();

            return view('admin.modals.note', [
                'notes'    => $notes,
            ]);
    }

    //======== Show Note ======== 
    public function shownote(Request $request)
    {
            $note   = Note::where('id', $request->id)->first();

            return view('admin.modals.show_note', [
                'note'    => $note,
            ]);
    }

    //======== Edit Note ======== 
    public function editnote(Request $request)
    {
            $note   = Note::where('id', $request->note_id)->first();

            $note->title = $request->title;
            $note->text = $request->text;
            $note->save();

            $notes   = Note::where('user_id', $note->user_id)->get();

            return view('admin.modals.note', [
                'notes'    => $notes,
            ]);
    }

    //======== Remove Note ======== 
    public function removenote(Request $request)
    {
        $note   = Note::where('id', $request->id)->first();

        $note->delete();
    }

    //======== Calendar ======== 
    public function calendar(Request $request)
    {
            return view('admin.calendar', [ ]);
    }

    //======== Get Events ======== 
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

    //======== Add Event ======== 
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

    //======== Remove Event ======== 
    public function removeevent(Request $request)
    {
        $event   = Event::where('id', $request->id)->first();

        $event->delete();
    }

    //======== Edit Event ======== 
    public function editevent(Request $request)
    {
            $event   = Event::where('id', $request->event_id)->first();

            $event->title           = $request->title;
            $event->description     = $request->description;
            $event->class_name      = $request->class_name;
            $event->save();
    }

    //======== Update Event ======== 
    public function updateevent(Request $request)
    {
            $event   = Event::where('id', $request->event_id)->first();

            $event->start_date     = $request->start_date;
            $event->end_date       = $request->end_date;
            $event->save();
    }

}
