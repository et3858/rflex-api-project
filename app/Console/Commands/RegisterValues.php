<?php

namespace App\Console\Commands;


use App\Models\Dolar;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Throwable;

class RegisterValues extends Command
{
    private const URL = "https://mindicador.cl/api";
    protected $signature = 'app:register-values {year=2023}';
    protected $description = 'Register values of dollars';

    public function handle()
    {
        try {
            $year = (int) $this->argument('year');
            $this->info("Searching for data based on the year {$year}");

            // Data response
            ['serie' => $series] = $this->querySource($year);

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

    public function querySource(int $year): array
    {
        $ch = curl_init();
        $url = self::URL . "/dolar/" . $year;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curlOutput = curl_exec($ch);
        $jsonOutput = json_decode($curlOutput, true);
        curl_close ($ch);

        return $jsonOutput;
    }
}
