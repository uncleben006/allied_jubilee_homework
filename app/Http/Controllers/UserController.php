<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if (Auth::check()) {
            return view('index');
        }

        return view('user.login');
    }


    /**
     * @param Request $request
     * @return false|string
     */
    public function verify(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)){
            return redirect()->route('user.index');
        } else {
            return redirect()->back()->withErrors(['password' => 'Sorry, the password entered is incorrect.']);
        }
    }


    /**
     * @param Request $request
     * @return false|string
     */
    public function check(Request $request)
    {
        if (User::where('name', $request->user_name)->exists()) {
            $exist = True;
        } else {
            $exist = False;
        }
        return json_encode(array('result'=>$exist));
    }


    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index');
    }


    /**
     * Show the form for registering.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('user.register');
    }


    /**
     * Store a newly created user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
