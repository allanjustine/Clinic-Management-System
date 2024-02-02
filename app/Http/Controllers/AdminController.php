<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Doctor;
use App\Models\MedicalHistory;
use App\Models\User;
use App\Models\UserFeedbacks;
use App\Models\Appointment;
//use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.add_doctor');
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }
    }

    public function adduserView()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.add_user_view');
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }
    }
    public function addpatientsView()
    {

        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {
                $users = User::where('usertype', '!=', 1)->get();
                return view('admin.add_patients', compact('users'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name'  =>  'required',
            'phone'  =>  'required',
            'file'  =>  'required',
            'speciality'  =>  'required',
        ]);
        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function uploadUser(Request $request)
    {
        $request->validate([
            'email'     =>      'required|email|unique:users,email',
            'name'     =>      'required',
            'age'     =>      'required|min:1|max:99|numeric',
            'suffix'     =>      'required',
            'gender'     =>      'required',
            'file'     =>      'required',
            'phone' => ['required', 'numeric', 'regex:/^9\d{9}$/'],
            'address'     =>      'required',
            'password'     =>      'required|confirmed|min:8',
            'file'     =>      'required',
        ]);
        $user = new User;
        $profile_photo_path = $request->file;
        $imagename = time() . '.' . $profile_photo_path->getClientoriginalExtension();

        $request->file->move('userimage', $imagename);
        $user->profile_photo_path = $imagename;
        $user->name = $request->name;
        $user->suffix = $request->suffix;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = "+63" . $request->phone;
        $user->address = $request->address;
        $user->email_verified_at = now();
        $user->usertype = 0;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->back()->with('message', 'User Added Successfully');
    }

    public function showappointment(Request $request)
    {

        $query = User::whereHas('appointments', function ($query) {
            $query->where('status', '!=', 'Canceled');
        });

        $searchQ = null;

        if ($request->has('search')) {
            $searchQ = $request->input('search');
            $query->whereHas('appointments', function ($query) use ($searchQ) {
                $query->where('name', 'like', '%' . $searchQ . '%')
                    ->orWhere('email', 'like', '%' . $searchQ . '%')
                    ->orWhere('phone', 'like', '%' . $searchQ . '%')
                    ->orWhere('address', 'like', '%' . $searchQ . '%');
            });
        }

        $usersWithAppointments = $query->orderBy('created_at', 'desc')->get();



        /////////////
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.showappointment', compact('usersWithAppointments', 'searchQ'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////



    }

    public function approved(Request $request, $id)
    {
        $request->validate([
            'time'  => ['required', 'after_or_equal:now']
        ]);
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->time = $request->time;
        $data->created_at = now();
        $data->save();
        return redirect()->back();
    }

    public function canceled(Request $request, $id)
    {
        $request->validate([
            'reason'      => ['required'],
        ]);

        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->reason = $request->reason;
        $data->created_at = now();
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {

        $data = Doctor::all();


        /////////////
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.showdoctor', compact('data'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////

    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Deleted successfully');
    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {


            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->save();
        return redirect('/showdoctor')->with('message', 'Doctor Details updated Successfully');
    }

    public function emailview($id)
    {
        $data = Appointment::find($id);

        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request, $id)
    {

        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($data, new SendEmailNotification($details));

        return redirect()->back()->with('message', 'Email Successfully Sent');
    }


    public function allUsers()
    {

        $data = User::where('usertype', '!=', 1)->orWhere('id', '!=', 1)->orderBy('created_at', 'desc')->get();


        /////////////
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.allusers', compact('data'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////

    }

    public function directVerified($id)
    {
        $user = User::find($id);
        $user->email_verified_at = now();

        $user->save();
        return redirect()->back()->with('message', 'User is successfully verified');
    }

    public function updateuser($id)
    {
        $data = User::find($id);

        return view('admin.update_user', compact('data'));
    }

    public function edituser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->suffix = $request->suffix;

        $profile_photo_path = $request->file;

        if ($profile_photo_path) {


            $imagename = time() . '.' . $profile_photo_path->getClientOriginalExtension();

            $request->file->move('userimage', $imagename);
            $user->profile_photo_path = $imagename;
        }
        $user->save();
        return redirect('/users')->with('message', 'User Details updated Successfully');
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Deleted successfully');
    }

    public function feedback()
    {

        $data = UserFeedbacks::all();


        /////////////
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.user_feedbacks', compact('data'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////

    }

    public function addAppointment(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'age' => ['required', 'numeric', 'min:1', 'max:99'],
            'gender' => ['required'],
            'time' => ['required', 'after_or_equal:now'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'user_id' => ['required'],
        ]);

        $data = new Appointment;
        $data->name = $request->name;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->date = now();
        $data->time = now();
        $data->phone = $request->phone;
        $data->status = 'Approved';
        $data->doctor= $request->doctor;
        $data->user_id = $request->user_id;
        $data->time = $request->time;
        // if(Auth::id())
        // {

        //     $data->user_id=Auth::user()->id;
        // }
        $data->save();
        return redirect()->back()->with('message', 'Appointment added successfully');
    }

    public function patientsDetails(Request $request, $id)
    {
        $data = User::with('appointments')->find($id);

        $doctorName = Doctor::first();

        $medicalHistories = collect();

        foreach ($data->appointments as $appointment) {
            $medicalHistory = MedicalHistory::where('appointment_id', $appointment->id)
                ->where('user_id', $data->id)
                ->orderBy('created_at', 'desc')
                ->get();

            $medicalHistories = $medicalHistories->concat($medicalHistory);
        }
        $searchTerm = null;

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $data->appointments = $data->appointments()
                ->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('reason', 'like', '%' . $searchTerm . '%')
                ->orWhere('status', 'like', '%' . $searchTerm . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        }


        return view('admin.patients_details', compact('data', 'searchTerm', 'medicalHistories', 'doctorName'));
    }

    public function addMedical($id)
    {

        $appoint = Appointment::find($id);

        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.add_medical_history', compact('appoint'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////
    }

    public function addedMedical(Request $request)
    {

        $request->validate([
            'sphere' => ['required'],
            'cylinder' => ['required'],
            'axis' => ['required'],
            'va' => ['required'],
            'add_or_va' => ['required'],
            'remarks' => ['required'],
        ]);

        $data = new MedicalHistory;
        $data->sphere = $request->sphere;
        $data->cylinder = $request->cylinder;
        $data->axis = $request->axis;
        $data->va = $request->va;
        $data->add_or_va = $request->add_or_va;
        $data->remarks = $request->remarks;
        $data->user_id = $request->user_id;
        $data->appointment_id = $request->appointment_id;
        $data->save();
        return redirect('/patients-details/'. $data->appointment->user->id)->with('message', 'Medical history was added successfully');
    }

    public function print($id)
    {
        $appoint = Appointment::find($id);

        $history = MedicalHistory::where('appointment_id', $appoint->id)->first();


        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                return view('admin.print_details', compact('appoint', 'history'));
            } else {

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }

        //////////////
    }
}
