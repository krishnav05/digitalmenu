<?php

namespace App\Http\Controllers;
use App\DiningTable;

use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function table()
    {   
    	$total_tables = DiningTable::all();
    	return view('selecttable',['total_tables' => $total_tables]);
    }
}
