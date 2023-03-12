<?php

namespace App\Http\Controllers\Frontsite;

use App\Models\Report;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count_report = Report::count();
        $success_reports = Report::with('user')->where('status', 'selesai')->latest()->take(5)->get();
        $latest_reports = Report::with('user')->latest()->take(5)->get();

        return view('pages.frontsite.lading-page.index', compact('count_report', 'success_reports', 'latest_reports'));
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
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
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
