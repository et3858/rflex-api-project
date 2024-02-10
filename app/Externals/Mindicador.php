<?php

namespace App\Externals;

class Mindicador
{
    private const API_URL = "https://mindicador.cl/api";

    public static function query(int $year): array
    {
        $ch = curl_init();
        $url = self::API_URL . "/dolar/" . $year;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curlOutput = curl_exec($ch);
        $jsonOutput = json_decode($curlOutput, true);
        curl_close ($ch);

        return $jsonOutput;
    }
}
