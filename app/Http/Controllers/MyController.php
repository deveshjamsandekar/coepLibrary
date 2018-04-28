<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class MyController extends Controller
{
public function send()
{
  $data = array('name'=>"DJ", 'body' => "you have issued a book");
  Mail::send('email',$data, function($message){
  $message->to('deveshj23@gmail.com','Devesh')->subject('Book Issued');
  $message->from('librarycoep@gmail.com','COEP Library');
});  
}
}
