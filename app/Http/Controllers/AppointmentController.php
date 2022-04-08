<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index(){
        $waiting = Appointment::where('status', 'Initialized')->get();
        $completed = Appointment::where('status', 'Completed')->get();
        $AllAppoints = Appointment::all();
        return view('appointment.index',compact('waiting','completed','AllAppoints'));
    }
}
