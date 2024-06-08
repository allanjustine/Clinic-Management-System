<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Testimony;
use App\Models\UserFeedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function redirect()
    {

        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();


                return view('user.home', compact('doctor'));
            } else {
                $approved = Appointment::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
                $totalAppointments = Appointment::count();
                $approvedAppointments = Appointment::where('status', 'Approved')->count();
                $canceledAppointments = Appointment::where('status', 'Canceled')->count();
                $pendingAppointments = Appointment::where('status', 'In progress')->count();
                $totalUsers = User::count();
                $totalFeedbacks = UserFeedbacks::count();
                $totalTestimonies = Testimony::count();
                return view('admin.home', compact('approved', 'totalAppointments', 'approvedAppointments', 'canceledAppointments', 'totalUsers', 'pendingAppointments', 'totalFeedbacks', 'totalTestimonies'));
            }
        } else {

            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {

            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {

        $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'name' => ['required'],
            'age' => ['required', 'numeric', 'min:1', 'max:99'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'number' => ['required', 'numeric'],
            'appointment_for' => ['required'],
        ]);

        $data = new Appointment;
        $data->name = $request->name;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->appointment_for = $request->appointment_for;
        $data->phone = $request->number;
        $data->status = 'In progress';
        if (Auth::id()) {

            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment Request Successful. We will contact with you soon.');
    }

    public function feedback(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'type' => ['required'],
            'message' => ['required'],
        ]);

        $feedback = new UserFeedbacks;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->type;
        $feedback->message = $request->message;
        $feedback->save();
        return redirect()->back()->with('message', 'Feedback sent successfully');
    }



    public function myappointment()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == 0) {
                $doctorName = Doctor::first();

                $userid = Auth::user()->id;
                $appoint = Appointment::where('user_id', $userid)->get();

                return view('user.my_appointment', compact('appoint', 'doctorName'));
            } else {
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function about()
    {
        $testimonies = Testimony::all();

        return view('user.about', compact('testimonies'));
    }
    public function contact()
    {
        return view('user.contact');
    }

    public function testimony()
    {
        if (Auth::id()) {

            if (Auth::user()->usertype == 1) {

                $testimonies = Testimony::all();

                $patients = User::where('usertype', '!=', 1)->get();

                return view('admin.testimony', compact('testimonies', 'patients'));
            } else {
                return redirect()->back();
            }
        } else {

            return redirect()->back();
        }
    }

    public function addTestimony(Request $request)
    {
        $request->validate([
            'patient'       =>      ['required'],
            'content'       =>      ['required']
        ]);

        $testimony = Testimony::create([
            'user_id'       =>          $request->patient,
            'content'       =>          $request->content
        ]);

        return back()->with('message', $testimony->user->name . ' testimony has been added successfully');
    }

    public function testDelete($id)
    {
        $test = Testimony::find($id);

        if(!$test)
        {
            return back()->with('error', 'No testimony found to delete');
        } else {
            $test->delete();

            return back()->with('message', 'Testimony deleted Successfully');
        }
    }

    public function updateTest(Request $request, $id)
    {
        $test = Testimony::findOrFail($id);

        $request->validate([
            'patient'       =>      ['required'],
            'content'       =>      ['required']
        ]);

        $test->update([
            'user_id'   =>  $request->patient,
            'content'   =>  $request->content
        ]);

        return back()->with('message', $test->user->name . ' testimony has been edited successfully');
    }
}
