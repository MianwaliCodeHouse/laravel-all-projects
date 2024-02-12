<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;

// Include Mail 
use Illuminate\Support\Facades\Mail;
// Client Request Send Mail to Admin 
use App\Mail\RequestClentToAdmin;


// Client Request Model 
use App\Models\ClientRequests;

class ClientsController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function logout()
    {
        session()->flush();
        return redirect(route('client.login.page'));
    }
    public function requestPage()
    {
        return view('createRequest');
    }
    public function request(Request $r)
    {
        $r->validate(
            [
                'request_title' => 'required',
                'request_requirements' => 'required',
                'project_type' => 'required',
            ]
        );

        $createRequest = new ClientRequests;
        $createRequest->request_title = $r['request_title'];
        $createRequest->request_requirements = $r['request_requirements'];
        $createRequest->project_type = $r['project_type'];
        $createRequest->status = 'Pending';
        if (!empty($r['request_deadline'])) {
            $createRequest->project_type = $r['request_dealine'];
            echo "yes<br>";
        }
        if (!empty($r['request_budget'])) {
            $createRequest->project_type = $r['request_budget'];
            echo "yes<br>";
        }


        // upload Attachments 
        if ($r->file('attachments')) {
            $attachments = '';
            foreach ($r->file('attachments') as $key => $file) {
                $filename = $file->getClientOriginalName();
                $newName = time() . $filename;
                $attachments .= $newName . ',,,';
            }
            $createRequest->attachments=$attachments;
            echo "yes<br>";

        }
        
        $createRequest->save();
        echo "yes<br>";
        $RequestClientName=session()->get('ClientName');
        $mailData=[
            'name'=>$RequestClientName,
            'requestTitle'=>$r['request_title'],
            'requestRequirements'=>$r['request_requirements'],
        ];
        Mail::to('qaisar.qk17@gmail.com')->send(new RequestClentToAdmin($mailData));
        session()->flash('ClientRequestSent','Your Request has successfully Send and Also Sent Email to the Admin');
        return redirect(route('client.request.form'));

    }
}
