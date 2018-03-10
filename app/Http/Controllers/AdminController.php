<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function index() {
        if (!$this->isAdmin()) return redirect(route('index'));
        return view('admin');
    }

    private function isAdmin() {
        return Auth::check() && Auth::user()->user_type == 'ADMIN';
    }
}
