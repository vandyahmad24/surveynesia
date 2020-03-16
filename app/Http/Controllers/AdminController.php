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
}
