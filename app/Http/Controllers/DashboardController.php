<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use App\Models\Institution;
use App\Models\Letter;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $msg = session()->get('error');
        return view('pages.index')->with('error', $msg);
    }
    public function chart(){
        $user = User::all();
        $institution = Institution::all();
        $incoming_mail = IncomingMail::all();
        $letter = Letter::all();
        $data = [
            'UserCount' => $user->count(),
            // 'UserChart' => $user->groupBy('created_at'),
        ];
    }
}
