<?php

namespace App\Jobs;

use App\Mail\SendConfirmationEmail;
use App\Mail\SendEmailTest;
use App\Mail\SendRejectedEmail;
use App\Mail\SendReservationNotificationEmail;
use App\Models\Status;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $details;
    public $status;

    /**
     * Create a new job instance.
     */
    public function __construct($details,$status)
    {
        $this->details = $details;
        $this->status = $status;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = null;
        if($this->status == Status::CONFIRMED) $email = new SendConfirmationEmail($this->details);
        if($this->status == Status::REJECTED) $email = new SendRejectedEmail($this->details);
        if($this->status == Status::PENDING) $email = new SendReservationNotificationEmail($this->details);

        //$email = new SendEmailTest($this->details);
        Mail::to($this->details['email'])->send($email);
    }
}
