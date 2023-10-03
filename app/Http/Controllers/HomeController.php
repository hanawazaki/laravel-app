<?php

namespace App\Http\Controllers;

use App\Models\Golds;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Golds::latest()->paginate(5);

        return view('pages.dashboard.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);
        // exit();
        Golds::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function search()
    {
        return view('pages.dashboard.index');
    }
}
