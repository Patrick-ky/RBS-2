<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Twilio\Rest\Client;


//para ma test if naga send ba jud sya 
class SendSMS extends Command
{
    protected $signature = 'sms:send {to} {message}';
    protected $description = 'Send an SMS';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $to = $this->argument('to');
        $message = $this->argument('message');

        // Initialize Twilio client
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));


        // Send SMS
        $twilio->messages->create(
            $to, // Recipient's phone number
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $message,
            ]
        );

        $this->info('SMS sent successfully.');
    }
}
