<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index($id)
    {


        $patient = Appointment::find($id);

        $phoneNumber = $patient->phone;
        $adminNumber = auth()->user()->phone;

        // $sent = Nexmo::message()->send([
        //     'to' => '+63900000000',
        //     'from' => '+63900000000',
        //     'text' => 'Reminders! Your appointment is ready today please be here on time'
        // ]);
        $sent = Nexmo::message()->send([
            'to' => $phoneNumber,
            'from' => $adminNumber,
            'text' => 'Reminders! Hello Mr/Mrs. ' . $patient->name . ' this is from Espina Eye Care Clinic today is the schedule of your appointment ' . \Carbon\Carbon::parse($patient->date)->format('F d, Y') . ' at ' . \Carbon\Carbon::parse($patient->time)->format('h:i A') .  ' Greetings FROM: ' . $patient->doctor
        ]);

        if ($sent['status'] == '0') {

            $patient->sms_status = true;
            $patient->save();

            return back()->with('message', 'Message was sent successfully');
        } else {
            return back()->with('error', 'Failed to send message. Please try again.');
        };
    }
}
