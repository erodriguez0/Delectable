<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $data = array(
            'title' => "Delectable | Slogan Here"
        );
        return view('pages.index')->with($data);
    }
}
