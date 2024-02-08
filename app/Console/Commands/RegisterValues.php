<?php

namespace App\Console\Commands;


use App\Models\Dolar;
use Illuminate\Console\Command;

class RegisterValues extends Command
{
    private const URL = "https://mindicador.cl/api";
    protected $signature = 'app:register-values {year=2023}';
    protected $description = 'Register values of dollars';

    public function handle()
    {
        $year = (int) $this->argument('year');

        // Data response
        ['serie' => $series] = $this->querySource($year);

        foreach ($series as $e) {
            Dolar::create(['date' => $e['fecha'], 'value' => $e['valor']]);
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
