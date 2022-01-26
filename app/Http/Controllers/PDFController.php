<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Hospital;
use App\Models\MedHistory;
use App\Models\User;
use App\Models\Message;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    //HOSPITAL PDF
    public function getAllHospitals()
    {
        $hospitals = Hospital::all();
        return view('PDF.hospitals', compact('hospitals'));
    }

    public function downloadHospitals()
    {
        $hospitals =  Hospital::all();
        $pdf = PDF::loadView('PDF.hospitals', compact('hospitals'));
        return $pdf->download('hospitals.pdf');
    }

    //USER APPOINTMENT PDF
    public function getUserAppointments()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $appointments = Appointment::where('user_id', 'LIKE', $logged_in_user)->get();
        return view('PDF.appointments', compact('appointments'));
    }

    public function downloadUserAppointments()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $appointments = Appointment::where('user_id', 'LIKE', $logged_in_user)->get();
        $pdf = PDF::loadView('PDF.appointments', compact('appointments'));
        return $pdf->download('my-appointments.pdf');
    }

    //HOSPITAL STAFF APPOINTMENT PDF
    public function getHospStaffAppointments()
    {
        $User = Auth::user();
        $logged_in_user = $User->hospital_id;

        $appointments = Appointment::where('hospital_id', 'LIKE', $logged_in_user)->get();
        return view('PDF.appointments', compact('appointments'));
    }

    public function downloadHospStaffAppointments()
    {
        $User = Auth::user();
        $logged_in_user = $User->hospital_id;

        $appointments = Appointment::where('hospital_id', 'LIKE', $logged_in_user)->get();
        $pdf = PDF::loadView('PDF.appointments', compact('appointments'));
        return $pdf->download('appointments.pdf');
    }

    //ADMIN APPOINTMENT PDF
    public function getAllAppointments()
    {
        $appointments = Appointment::all();
        return view('PDF.appointments', compact('appointments'));
    }

    public function downloadAppointments()
    {
        $appointments =  Appointment::all();
        $pdf = PDF::loadView('PDF.appointments', compact('appointments'));
        return $pdf->download('all-user-appointments.pdf');
    }

    //USER PDF
    public function getAllUsers()
    {
        $users = User::all();
        return view('PDF.users', compact('users'));
    }

    public function downloadUsers()
    {
        $users =  User::all();
        $pdf = PDF::loadView('PDF.users', compact('users'));
        return $pdf->download('users.pdf');
    }

    //USER PDF
    public function getAllFeedback()
    {
        $messages = Message::all();
        return view('PDF.messages', compact('messages'));
    }

    public function downloadFeedback()
    {
        $messages =  Message::all();
        $pdf = PDF::loadView('PDF.messages', compact('messages'));
        return $pdf->download('feedback.pdf');
    }

    //USER MEDICAL HISTORY PDF
    public function getUserMedHistory()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $med_histories = MedHistory::where('user_id', 'LIKE', $logged_in_user)->get();
        return view('PDF.med-histories', compact('med_histories'));
    }

    public function downloadUserMedHistory()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $med_histories = MedHistory::where('user_id', 'LIKE', $logged_in_user)->get();
        $pdf = PDF::loadView('PDF.med-histories', compact('med_histories'));
        return $pdf->download('my-medical-history.pdf');
    }

    //HOSPITAL STAFF GET USER MEDICAL HISTORY PDF
    public function getUserMedHistoryHS()
    {
        $med_histories = MedHistory::all();
        return view('PDF.med-histories', compact('med_histories'));
    }

    public function downloadUserMedHistoryHS()
    {
        $med_histories =  MedHistory::all();
        $pdf = PDF::loadView('PDF.med-histories', compact('med_histories'));
        return $pdf->download('medical-history.pdf');
    }


    //USER PERSONAL INFO PDF
    public function getUserInfo()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $personal_infos = PersonalInfo::where('user_id', 'LIKE', $logged_in_user)->get();
        return view('PDF.personal-infos', compact('personal_infos'));
    }

    public function downloadUserInfo()
    {
        $User = Auth::user();
        $logged_in_user = $User->id;

        $personal_infos = PersonalInfo::where('user_id', 'LIKE', $logged_in_user)->get();
        $pdf = PDF::loadView('PDF.personal-infos', compact('personal_infos'));
        return $pdf->download('personal-information.pdf');
    }

    //ADMIN GET USER PERSONAL INFO
    public function downloadAllUserInfo()
    {

        $personal_infos = PersonalInfo::all();
        $pdf = PDF::loadView('PDF.personal-infos', compact('personal_infos'));
        return $pdf->download('personal-information.pdf');
    }
}
