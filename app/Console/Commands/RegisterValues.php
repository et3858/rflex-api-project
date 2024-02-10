<?php

namespace App\Console\Commands;


use App\Models\Dolar;
use App\Externals\Mindicador;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Throwable;

class RegisterValues extends Command
{
    protected $signature = 'app:register-values {year=2023}';
    protected $description = 'Register values of dollars';

    public function handle()
    {
        try {
            $year = (int) $this->argument('year');
            $this->info("Searching for data based on the year {$year}");

            // Data response
            ['serie' => $series] = Mindicador::query($year);

            $this->info("Uploading data");

            $series = array_map(fn($e) => [
                'value' => $e['valor'],
                'date' => Carbon::parse($e['fecha'])
            ], $series);

            Dolar::upsert($series, ['date'], ['value']);

            $count = Dolar::count();
            $this->info("Done");
            $this->info($count);
        } catch (Throwable $th) {
            $this->error($th->getMessage());
        }
    }
}
