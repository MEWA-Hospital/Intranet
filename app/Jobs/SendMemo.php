<?php

namespace App\Jobs;

use App\Mail\Memo;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMemo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $departments;

    public $memo;

    /**
     * Create a new job instance.
     *
     * @param $departments
     * @param $memo
     */
    public function __construct($departments, $memo)
    {
        $this->departments = $departments;
        $this->memo = $memo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = [];

        foreach ($this->departments as $department) {
            foreach ($department->employees as $employee) {

                $users = $employee->user->email;
            }
        }

        $time = Carbon::now()->addMinutes(2);

        Mail::to($users)->later($time, new Memo($this->memo));

    }
}
