<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
     public function detail($id)
    {
    	// dd($id);
    	return view('buy',compact('id'));
    }

    public function transfer($id)
    {
    	return view('frontend.event.transaksi', compact('id'));
    }

      public function Confirmation($id)
    {
    	return view('frontend.event.confirmation', compact('id'));
    }
}
