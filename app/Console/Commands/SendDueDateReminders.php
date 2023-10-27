<?php

namespace App\Console\Commands;

use App\Models\ClientInfo;
use Illuminate\Console\Command;
use Twilio\Rest\Client;

class SendDueDateReminders extends Command
{
    protected $signature = 'send:due-date-reminders';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Kwentahon niya ang adlaw kada kinsenas 
        $fifteenDaysFromToday = now()->addDays(15);

        //sugdon niya ug bilang base sa start_date
        $records = ClientInfo::whereDate('start_date', '=', $fifteenDaysFromToday->toDateString())->get();

        
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));

        foreach ($records as $record) {
            // message content
            $message = "Hello,  {$record->client->firstname}. Your due date
            for your stall {$record->stallNumber->nameforstallnumber} on category {$record->stallType->stall_name} is approaching on {$record->due_date}. Please pay your bill {$record->ownerMonthly} 
            Disregard message if already paid";

            // SMS configuration
            $twilio->messages->create(
                $record->client->clients_number,
                [
                    'from' => env('TWILIO_PHONE_NUMBER'),
                    'body' => $message,
                ]
            );
        }

        $this->info('Due date reminders sent successfully.');
    }
}
