<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class Co2Chart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        //create array with each month and the total co2 for that month
        $co2 = [];
        $transactions = Transaction::whereNotNull('paid_at')->get();

        for ($x = 0; $x < 12; $x++) {
            $co2[$x] = 0;
        }

        foreach ($transactions as $transaction) {
            $month = (int) Carbon::parse($transaction->paid_at)->format('m');
            if (! isset($co2[$month])) {
                $co2[$month] = 0;
            }
            $co2[$month] += $transaction->grams_of_co2;
        }

        foreach ($co2 as $key => $value) {
            $co2[$key] = round($value / 1000, 2);
        }

        return [
            'datasets' => [
                [
                    'label' => 'co2 saved in kg',
                    'data' => $co2,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
