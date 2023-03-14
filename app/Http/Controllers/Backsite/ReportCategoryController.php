<?php

namespace App\Http\Controllers\Backsite;

use Illuminate\Http\Request;
use App\Models\ReportCategory;
use App\Http\Controllers\Controller;

class ReportCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report_categories = ReportCategory::all();
        return view('pages.backsite.master-data.kategori_pengaduan.index', compact('report_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
