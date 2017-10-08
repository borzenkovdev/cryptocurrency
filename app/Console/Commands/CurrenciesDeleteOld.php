<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\currency;
use App\CurrencyHistory;

class CurrenciesDeleteOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:delete_old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete old records older then 6 months. Recommended execute once per day, better at night';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle ()
    {
        $sixMonths = 6 * 31  * 24 *60 * 60;

        $currenTimeWithInteval = time() - $sixMonths;

        $allCurrencies = CurrencyHistory::all();

        foreach($allCurrencies as $currency) {
            $currencyCreateTime = strtotime($currency->created_at);
            if ($currencyCreateTime < $currenTimeWithInteval) {
                $currency->delete();
            }
        }
    }
}
