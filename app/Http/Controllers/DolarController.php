<?php

namespace App\Http\Controllers;

use App\Models\Dolar;
use Illuminate\Http\Request;

class DolarController extends Controller
{
    public function get()
    {
        $dollars = Dolar::get();

        return response($dollars);
    }
}
