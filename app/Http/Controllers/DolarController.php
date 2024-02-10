<?php

namespace App\Http\Controllers;

use App\Models\Dolar;
use App\Http\Requests\GetDollarsRequest;

class DolarController extends Controller
{
    public function get(GetDollarsRequest $req)
    {
        $dollars = Dolar::findByDates($req->get('start_date'), $req->get('end_date'))
            ->orderBy('date')
            ->get();

        return response()->json($dollars);
    }
}
