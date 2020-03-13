<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
    	echo 'halo admin';
    }
    public function sendMail()
    {
    	
		Mail::to("vandyahmad@malasngoding.com")->send(new SendEmail());
 
		return "Email telah dikirim";
    }
}
