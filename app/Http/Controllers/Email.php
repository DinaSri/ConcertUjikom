<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; //Jangan lupa import Mail di paling atas
class Email extends Controller{

public function sendEmail(Request $request)
{
    try {
    	Mail::send('Auth::user()', ['nama'=> $request->nama, 'pesan' => $request->pesan], function ($message ) use ($request)
    	{
    		$message->subject($request->judul);
    		$message->from('dinahartini01@gmail.com', 'dina srihartini');
    		$message->to($request->Auth::user());
    	});
    	return back()->with('alert-success', 'Berhasil Kirim Email');
    }
    catch (Exception $e){
    	return response (['status' => false,'errors' =>])
    }
}

}

