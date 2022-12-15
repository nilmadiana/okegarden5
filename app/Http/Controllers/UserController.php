<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'User';
        $data['q'] = $request->get('q');
        $data['user'] = Users::where('nama_project', 'like', '%' . $data['q'] . '%')->get();
        return view('user.index', $data);
    }

}