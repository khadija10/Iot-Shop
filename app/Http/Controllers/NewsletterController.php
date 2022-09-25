<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\EmailMessages;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use App\Mail\MyMailer;

use App\Models\User;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mails.newletter');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmail(Request $request)
    {

        if(Auth::user()){
            $id = Auth::user()->id;

            $email = Auth::user()->email;

            $user = User::findorfail($id);

                if($user->is_newsletter){

            return redirect()->route('welcome')->with('danger' , 'Vous êtes déjà inscrit à la newsletter' );

            }

            $user->is_newsletter = 1;

            $user->save();

            // $mail_controller = new EmailController;

            // $message = EmailMessages::where('subject', 'Welcome')->first();

            // $mail_controller->sendEmail($message->title, $message->subject, $message->body, $email);


            $details = [
                'subject'=>"Inscrit à la newsletter",
                'body'=>"Bojour cher client, Vous êtes desormais inscrit à notre newsletter vous serez informé de toutes les nouveautés de notre plate-forme! ",
            ];

             Mail::to($email)->send(new MyMailer($details));


            return redirect()->route('welcome')->with('success' , 'Félicitation vous etes inscrit à la newsletter!!!' );

        }

        return redirect()->route('welcome')->with('error' , 'Veillez vous enregistrer' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
