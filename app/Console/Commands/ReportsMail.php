<?php

namespace App\Console\Commands;

use App\Models\OrderHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReportsMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reports-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends email for total order history details';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $startOfWeek = $now->startOfWeek()->format('Y-m-d');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d');

        $productBasedSales = OrderHistory::whereBetween('date_added', [$startOfWeek, $endOfWeek])->get();

        foreach ($productBasedSales as $sale){
        }


        try {
            Mail::send(
                'emails.reports',
                [

                ],
                function ($message) {
                    $message->to('');
                    $message->subject('Satış Raporu');
                }
            );
        } catch (\Exception $exception) {
            $this->output->warning($exception->getMessage());
        }
    }
}
