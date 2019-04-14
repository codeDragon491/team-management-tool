<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    public function index() {
        return view('app');
    }
    public function display() {
        return view('teamDisplay');
    }
    public function createProjectTeam(){
        try {

        } catch(\Exception $e){
            return ['success' => false, 'message' => 'project team creation failed'];
        }

    }
}
