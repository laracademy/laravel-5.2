<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailReminder extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        print 'I am going to sleep for 10 seconds';
        sleep(10);

        $this->user->reminders()
            ->where('sent', false)->get()->each(function($item, $key) {
                print 'Updating reminder to sent';

                // email the user

                $item->sent = true;
                $item->update();
        });

        print 'The job has been completed';
    }
}
