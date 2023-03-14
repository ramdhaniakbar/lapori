<?php

namespace App\Http\Controllers\Backsite;

use App\Models\Report;
use App\Models\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Response\StoreResponseRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {;
        $reports = Report::latest()->get();
        return view('pages.backsite.operational.pengaduan.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResponseRequest $request)
    {
        return Auth::guard(session('guard'))->user()->role;

        $data = $request->all();

        $response = Response::create([
            'employee_id' => Auth::guard(session('guard'))->user()->id,
            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $pengaduan): View
    {
        return view('pages.backsite.operational.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
