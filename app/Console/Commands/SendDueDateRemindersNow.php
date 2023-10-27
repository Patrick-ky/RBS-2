<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClientInfo;
use Twilio\Rest\Client;

class SendDueDateRemindersNow extends Command
{
    protected $signature = 'send:due-date-reminders-now';
    protected $description = 'Send due date reminders for clients based on specific criteria';

    public function handle()
    {
        // Modify the query to select records based on specific criteria
    

        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));

$records = ClientInfo::all();

foreach ($records as $record) {
    // Compose the SMS message using information from ClientInfo
    $message = "Hello,  {$record->client->firstname}. Your due date
    for your stall {$record->stallNumber->nameforstallnumber} on category
     {$record->stallType->stall_name}  Please pay your bill with a total of {$record->stallType->price} 
     on this approaching {$record->due_date}.
    Disregard message if already paid";

    $twilio->messages->create(
        $record->client->clients_number, //  model relationships
        [
            'from' => env('TWILIO_PHONE_NUMBER'),
            'body' => $message,
        ]
    );
}

$this->info('Due date reminders sent successfully.');
}
}