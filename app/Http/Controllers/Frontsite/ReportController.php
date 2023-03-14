<?php

namespace App\Http\Controllers\Frontsite;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ReportCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Report\StoreReportRequest;
use App\Http\Requests\Report\UpdateReportRequest;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkUser']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $report_categories = ReportCategory::all();
        return view('pages.frontsite.report-page.create', compact('report_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('report_image')) {
            // get filename
            $filename = $request->file('report_image')->getFilename();
            // get extension
            $extension = $request->file('report_image')->extension();
            // concat filename and extension with time
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // store to storage
            $path = $request->file('report_image')->storeAs('public/images', $fileNameToStore); 
        } else {
            $fileNameToStore = 'noimage.png';
        }

        $report = Report::create([
            'user_id' => auth()->user()->id,
            'report_category_id' => $request->report_category_id,
            'title_report' => $data['title_report'],
            'body_report' => $data['body_report'],
            'incident_date' => $data['incident_date'],
            'location_incident' => $data['location_incident'],
            'report_image' => $fileNameToStore,
            'status' => 'pending',
        ]);

        toastr()->success('Laporan berhasil dibuat!');

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $lapor)
    {
        $incident_date = Carbon::parse($lapor->incident_date)->format('F j, Y');
        return view('pages.frontsite.report-page.show', compact('lapor', 'incident_date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $lapor)
    {
        $auth_reports = Auth::guard(session('guard'))->user()->reports()->pluck('id');

        if (!$auth_reports->contains($lapor->id)) {
            return back()->with('error', 'Kamu tidak memiliki akses!');
        }

        $report_categories = ReportCategory::all();
        return view('pages.frontsite.report-page.edit', compact('lapor', 'report_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $lapor): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            // get filename
            $filename = $request->file('image')->getFilename();
            // get extension
            $extension = $request->file('image')->extension();
            // concat filename and extension with time
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // store to storage
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore); 
            // store image
            $lapor->image = $fileNameToStore;
        }

        $lapor->update($data);

        toastr()->info('Laporan berhasil diedit!');

        return redirect()->route('laporan_kamu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $lapor): RedirectResponse
    {
        if ($lapor->report_image) {
            // Delete image
            Storage::delete('public/cover_images/' . $lapor->report_image);
        }

        $lapor->delete();

        toastr()->error('Laporan telah dihapus!');

        return redirect()->route('laporan_kamu');
    }

    public function your_report(): View
    {
        // get all reports latest
        $reports = Auth::guard(session('guard'))->user()->reports()->latest()->get();

        // get reports status pending
        $pending_report = Auth::guard(session('guard'))->user()->reports()->where('status', 'pending')->get();

        // get reports status ditolak
        $reject_report = Auth::guard(session('guard'))->user()->reports()->where('status', 'ditolak')->get();
        
        // get reports status proses
        $process_report = Auth::guard(session('guard'))->user()->reports()->where('status', 'proses')->get();
        
        // get reports status selesai
        $success_report = Auth::guard(session('guard'))->user()->reports()->where('status', 'selesai')->get();

        $report_status = [
            'pending' => $pending_report,
            'ditolak' => $reject_report,
            'proses' => $process_report,
            'selesai' => $success_report,
        ];

        return view('pages.frontsite.your-report.index', compact('reports', 'report_status'));
    }
}
