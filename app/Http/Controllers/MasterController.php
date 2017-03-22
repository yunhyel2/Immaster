<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( request()->segment(1) == 'master-join' ){
            return view('form.masterForm');
        }else{
            return view('form.lessonForm');
        }
    }

    public function create()
    {
        if( request()->segment(1) == 'master-join2' ){
            return view('form.masterForm2');
        }else if( request()->segment(1) == 'lesson-join2' ){
            return view('form.lessonForm2');
        }else{
            return view('form.playForm2');
        }
    }

    public function complete()
    {
        return view('form.masterForm3');
    }
}