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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->reportRepo = new \App\Repositories\ReportRepo;
        $this->userRepo = new \App\Repositories\UserRepo;
        $this->reportcateRepo = new \App\Repositories\ReportcateRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = $this->reportRepo->viewIndex();
        // dd($reports);
        $reportTmp = [];
        foreach ($reports as $report) {
            $user = $this->userRepo->getById($report['user_id']);
            $report['name'] = $user->us_name;
            $reportTmp[] = $report;
        }
        return view('reports.list')->with([
            'reports' => $reportTmp
        ]);
    }

    public function showReport($id)
    {
        $report = $this->reportRepo->show($id);
        if ($report == null) {
            return abort(404);
        }
        // $rpTimeFrom = explode(":", $report->rp_time_from);
        // $report->rp_time_from = $rpTimeFrom[0].":".$rpTimeFrom[1];
        // $rpTimeTo = explode(":", $report->rp_time_to);
        // $report->rp_time_to = $rpTimeTo[0].":".$rpTimeTo[1];
        return view('reports.detail')->with([
            'report' => $report
        ]);
    }

    public function showCreateReport()
    {
        $reportcates = $this->reportcateRepo->findAll();
        // dd($reportcates);
        return view('reports.create')->with([
            'reportcates' => $reportcates
        ]);
    }

    public function createReport(ReportRequest $request)
    {
        $data = $request->only(['rp_date', 'rp_time_from', 'rp_time_to', 'reportcate_id', 'rp_content']);
        // dd($data);
        $user = Auth::user();
        $report = $this->reportRepo->create($data, $user->id);
        return view('reports.created'); // createdページを返す
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
        // dd($report);
        return view('reports.edit')->with([
            'report' => $report,
            'reportcates' => $reportcates
        ]);
    }

    public function editReport($id, ReportRequest $request)
    {
        $data = $request->only(['rp_date', 'rp_time_from', 'rp_time_to', 'reportcate_id', 'rp_content']);
        // dd($data);
        $user = Auth::user();
        $report = $this->reportRepo->update($id, $data, $user->id);
        return view('reports.edited'); // createdページを返す
    }

    // public function update(UpdateMovieRequest $request, $id)
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
    //     $data = $request->only(['name', 'category_id', 'contents', 'screening_time', 'age_limit_id', 'release_date', 'release_end_date']);
    //     if ($request->file('image')) {
    //         $filePath = $request->file('image')->store('public/movie');
    //         $data['image_path'] = str_replace('public/', '', $filePath);
    //     }
    //     $movie = $this->movieRepo->update($id, $data, $user->id);
    //     if ($movie) {
    //         return response()->json([
    //             'code' => '200',
    //             'res' => [
    //                 'success update movie'
    //             ]
    //         ]);
    //     } else {
    //         return response()->json(['code' => '400'], 400);
    //     }
    // }

    // public function delete($id)
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
    //     $movie = $this->movieRepo->getById($id);
    //     if ($movie) {
    //         $movie->delete();
    //         return response()->json(['code' => '200',], 200);
    //     }
    //     return response()->json(['code' => '404'], 404);
    // }
}
