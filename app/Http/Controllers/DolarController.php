<?php

namespace App\Http\Controllers;

use App\Models\Dolar;
use App\Http\Requests\GetDollarsRequest;

class DolarController extends Controller
{
    public function get(GetDollarsRequest $req)
    {
        $dollars = Dolar::findByDates($req->date('start_date'), $req->date('end_date'))
            ->orderBy('date')
            ->get();

        return response()->json($dollars);
    }
}
