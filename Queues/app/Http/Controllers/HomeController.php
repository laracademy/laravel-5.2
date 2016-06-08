<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{

    private function output($string)
    {
        print $string;
        print '<br>';
    }


    public function index()
    {
        $this->output('I am at the start of the index page');

        // OUR LONG PROCESS
        print 'I am starting up the long process job, waiting for 5 seconds';
        sleep(5);
        print 'I am now at the bottom of this job';
        // END LONG PROCESS

        $this->output('I am at the bottom of the index page');
    }












    public function indexWithJob()
    {
        $this->output('I am at the start of the index page');

        $this->dispatch(new \App\Jobs\RunLongProcess());

        $this->output('I am at the bottom of the index page');
    }










    public function show()
    {
        return view('show', [
            'users' => \App\User::all()
        ]);
    }

    public function sendreminder(\App\User $user)
    {

        $user->reminders()->save(\App\EmailReminders::create());

        $this->dispatch(new \App\Jobs\SendEmailReminder($user));

        return redirect()->route('show');

    }
}
