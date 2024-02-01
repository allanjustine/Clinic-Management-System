<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\UserFeedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
        public function redirect(){

            if(Auth::id())
            {
                if(Auth::user()->usertype=='0')
                {
                    $doctor = doctor::all();

                    $doctorName = Doctor::first();

                    return view('user.home',compact('doctor', 'doctorName'));

                }
                    else
                    {
                        $approved = Appointment::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
                        $totalAppointments = Appointment::count();
                        $approvedAppointments = Appointment::where('status', 'Approved')->count();
                        $canceledAppointments = Appointment::where('status', 'Canceled')->count();
                        $pendingAppointments = Appointment::where('status', 'In progress')->count();
                        $totalUsers = User::count();
                        $totalFeedbacks = UserFeedbacks::count();
                        return view('admin.home', compact('approved', 'totalAppointments', 'approvedAppointments', 'canceledAppointments', 'totalUsers', 'pendingAppointments', 'totalFeedbacks'));
                    }


            }   else
            {

                return redirect()->back();
            }


        }

        public function index()
        {
            if(Auth::id())
            {
                return redirect('home');
            }else{

                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
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
            ]);

                $data = new Appointment;
                $data->name=$request->name;
                $data->age=$request->age;
                $data->gender=$request->gender;
                $data->email=$request->email;
                $data->date=$request->date;
                $data->phone=$request->number;
                $data->status='In progress';
                $data->doctor= $request->doctor;
                if(Auth::id())
                {

                    $data->user_id=Auth::user()->id;
                }
                $data->save();
                return redirect()->back()->with('message','Appointment Request Successful. We will contact with you soon.');
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
            $feedback->name=$request->name;
            $feedback->email=$request->email;
            $feedback->subject=$request->type;
            $feedback->message=$request->message;
            $feedback->save();
            return redirect()->back()->with('message','Feedback sent successfully');
        }



        public function myappointment()
        {
            if(Auth::id())
            {

                if(Auth::user()->usertype==0)
                {

                      $userid = Auth::user()->id;
                $appoint=Appointment::where('user_id',$userid)->get();

                return view('user.my_appointment',compact('appoint'));

                }else{
                    return redirect()->back();

                }

           }
            else
            {

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
            return view('user.about');
        }
        public function contact()
        {
            return view('user.contact');
        }
}
