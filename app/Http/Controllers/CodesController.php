<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Code;

class CodesController extends Controller
{
    public function index(Request $request)
    {
      $code = Code::latest()->first();
      $code->update($request->only('code'));

      return Code::all();
    }
}
