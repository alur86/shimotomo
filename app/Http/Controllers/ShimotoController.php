<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShimotomoPay;



class ShimotoController extends Controller
{
  


public function makePay(ShimotomoPay $shimopay){


$shimopay->doPayment();


}



}
