<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        // return $request->post();
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email, 'password' => $password])->get();
        if (isset($result['0']->id)) {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result['0']->id);
            return redirect('admin.dashboard');


        } else {
            $request->session()->flash('error', 'Please enter valid login credential');
            return redirect('admin');
        }
    }

    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

}