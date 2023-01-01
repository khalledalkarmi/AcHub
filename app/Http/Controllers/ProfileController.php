<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $userID = $user->id;
        $address = Address::where('user_id', $userID)->get()->first();
        return view('profile', ['user' => $user, 'address' => $address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->about = $request->about;
        $user->job = $request->job;
        $file = $request->file('profile_img');
        if ($file) {
            if ($path = Storage::put('public/images', $file)) {
                $path = str_replace(['public/'], [''], $path);
                $user->profile_img = $path;
            }
        }
        $user->save();
        $address = Address::where('user_id', $userID)->get()->first();
        if ($address == null) {
            $createAddress = new Address();
            $createAddress->user_id = $userID;
            $createAddress->address = $request->address;
            $createAddress->phone = $request->phone;
            $createAddress->fb = $request->fb;
            $createAddress->in = $request->in;
            $createAddress->tw = $request->tw;
            $createAddress->ln = $request->ln;
            $createAddress->save();
        } else {
            $address->user_id = $userID;
            $address->address = $request->address;
            $address->phone = $request->phone;
            $address->fb = $request->fb;
            $address->in = $request->in;
            $address->tw = $request->tw;
            $address->ln = $request->ln;
            $address->save();
        }

        return redirect()->intended('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
