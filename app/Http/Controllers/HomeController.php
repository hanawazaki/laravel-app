<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Golds;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        app()->setLocale('id');

        $data = Golds::latest()->paginate(5);

        $data->transform(function ($item) {
            $item->formatted_date = Carbon::parse($item->tanggal)->isoFormat('dddd, D MMMM YYYY');
            return $item;
        });


        return view('pages.dashboard.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('pages.dashboard.create');
    }

    public function store(DataRequest $request)
    {

        $data = $request->all();
        Golds::create($data);

        return redirect(route('dashboard'));
    }

    public function edit($id)
    {
        $data = Golds::findOrfail($id);

        return view('pages.dashboard.edit', [
            'data' => $data
        ]);
    }

    public function update(DataRequest $request, $id)
    {
        // dd($request->all());
        // exit();
        $data = Golds::findOrfail($id);
        $data->update($request->all());

        return redirect(route('dashboard'));
    }

    public function delete($id)
    {
        $data = Golds::findOrfail($id);
        $data->delete();

        return redirect(route('dashboard'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        // dd($request->search);
        // exit();
        if ($search) {
            $data = Golds::where('carat', 'like', '%' . $search . '%')->paginate(5);
        } else {
            $data = Golds::paginate(5);
        }

        return view('pages.dashboard.index', ['data' => $data]);
    }
}
