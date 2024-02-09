<?php

namespace App\Http\Controllers;

use App\Models\Dolar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DolarController extends Controller
{
    public function get(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dollars = Dolar::findByDates($req->get('start_date'), $req->get('end_date'))
            ->orderBy('date')
            ->get();

        return response()->json($dollars);
    }
}
