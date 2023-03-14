<?php

namespace App\Http\Controllers\Backsite;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ReportCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportCategory\StoreReportCategoryRequest;
use App\Http\Requests\ReportCategory\UpdateReportCategoryRequest;

class ReportCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $report_categories = ReportCategory::orderBy('name', 'asc')->get();
        return view('pages.backsite.master-data.kategori_pengaduan.index', compact('report_categories'));
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
    public function store(StoreReportCategoryRequest $request)
    {
        $data = $request->all();

        $report_category = ReportCategory::create($data);

        return back()->with('success', 'Kategori Pengaduan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReportCategory $kategori_pengaduan): View
    {
        return view('pages.backsite.master-data.kategori_pengaduan.show', compact('kategori_pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReportCategory $kategori_pengaduan): View
    {
        return view('pages.backsite.master-data.kategori_pengaduan.edit', compact('kategori_pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportCategoryRequest $request, ReportCategory $kategori_pengaduan)
    {
        $data = $request->all();

        $kategori_pengaduan->update($data);
        
        return redirect()->route('backsite.kategori_pengaduan.index')->with('success', 'Kategori Pengaduan berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
