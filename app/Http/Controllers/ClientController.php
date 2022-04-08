<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Appointment;
use Auth;
class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $clients = Client::all();
        return view('clients.index')->with('clients',$clients);
    }
    public function AddClient(Request $request){
        $validateData = $request->validate([
            'cname' => 'required|min:4',
            'ctin' => 'required|numeric|unique:clients',
            'cemail'=> 'required',
            'ctel' =>'required|numeric',
            'caddress'=> 'required'
        ]);

        $addclient = new Client;
        $addclient->user_id = Auth::user()->id;
        $addclient->cname = $request->cname;
        $addclient->ctin = $request->ctin;
        $addclient->cemail = $request->cemail;
        $addclient->ctel = $request->ctel;
        $addclient->caddress = $request->caddress;
        $addclient->save();

        return redirect()->back()->with('success', 'Client Added Successfull');

    }
    public function FindAppoints($id){
        $client = Client::findOrFail($id);

        return view('clients.clientAppointment')->with('client',$client);
    }
    public function AddAppoints(Request $request){
        $validateData = $request->validate([
            'up_date' =>'required',
            'appdate' =>'required'
        ]);
    if($this->isOnline()){
        $mail_data = [
            'recipient' => $request->cemail ,
            'fromEmail' => 'info@clientest.com',
            'fromName' =>'Admin_CSDI Ltd',
            'toName' =>$request->cname,
            'subject' => 'Igihe cyo kumenyekanisha imisoro',
            'fromDate' =>$request->up_date,
            'body' => $request->appdate
        ];
        \Mail::send('email-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });
        $addAppoints = new Appointment;
        $addAppoints->user_id = Auth::user()->id;
        $addAppoints->client_id = $request->cid;
        $addAppoints->up_date = $request->up_date;
        $addAppoints->appoint_date = $request->appdate;
        $addAppoints->status = 'Initialized'; 
        $addAppoints->save();
        return redirect()->route('all.client')->with('success','Email Sent!');
    }else{
        return redirect()->back()->withInput()->with('error', 'Check Your Internet Connection');
    }

        
        // return redirect()->back()->with('success','Appointment Created');
        
    }
    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, 'r')){
            return true;
        }else{
            return false;
        }
    }
   
}
