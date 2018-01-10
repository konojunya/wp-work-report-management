<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public $reportRepo;
    public $userRepo;
    public $reportcateRepo;

    public function __construct()
    {
        $this->middleware('auth');
        $this->reportRepo = new \App\Repositories\ReportRepo;
        $this->userRepo = new \App\Repositories\UserRepo;
        $this->reportcateRepo = new \App\Repositories\ReportcateRepo;
    }

    public function index()
    {
        $reports = $this->reportRepo->viewIndex();
        return view('reports.list')->with([
            'reports' => $reports
        ]);
    }

    public function showReport($id)
    {
        $report = $this->reportRepo->show($id);
        if ($report == null) {
            return abort(404);
        }
        return view('reports.detail')->with([
            'report' => $report
        ]);
    }

    public function showCreateReport()
    {
        $reportcates = $this->reportcateRepo->findAll();
        return view('reports.create')->with([
            'reportcates' => $reportcates
        ]);
    }

    public function createReport(ReportRequest $request)
    {
        $data = $request->only(['rp_date', 'rp_time_from', 'rp_time_to', 'reportcate_id', 'rp_content']);
        $user = Auth::user();
        $report = $this->reportRepo->create($data, $user->id);
        return redirect("/")->with("message", __("追加しました。"));
    }

    public function showEditReport($id)
    {
        $report = $this->reportRepo->show($id);
        if ($report == null) {
            return abort(404);
        }
        $reportcates = $this->reportcateRepo->findAll();
        $reportcate = $this->reportcateRepo->getById($report['reportcate_id']);
        $report['reportcate_id'] = $reportcate->id;
        $rpTimeFrom = explode(":", $report->rp_time_from);
        $report->rp_time_from = $rpTimeFrom[0].":".$rpTimeFrom[1];
        $rpTimeTo = explode(":", $report->rp_time_to);
        $report->rp_time_to = $rpTimeTo[0].":".$rpTimeTo[1];
        return view('reports.edit')->with([
            'report' => $report,
            'reportcates' => $reportcates
        ]);
    }

    public function editReport($id, ReportRequest $request)
    {
        $data = $request->only(['rp_date', 'rp_time_from', 'rp_time_to', 'reportcate_id', 'rp_content']);
        $user = Auth::user();
        $report = $this->reportRepo->update($id, $data, $user->id);
        return redirect("/".$id);
    }

    public function showDeleteReport($id)
    {
        $report = $this->reportRepo->show($id);
        if ($report == null) {
            return abort(404);
        }
        return view('reports.delete')->with([
            'report' => $report
        ]);
    }

    public function deleteReport($id)
    {
        if($ok = $this->reportRepo->delete($id)) {
            return redirect("/")->with("message", __("削除しました。"));
        }
        abort(404);
    }
}
