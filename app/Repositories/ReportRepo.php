<?php

namespace App\Repositories;

use App\Models\Report;
use Carbon\Carbon;

class ReportRepo
{
    public function viewIndex()
    {
        return $reports = Report::select('id', 'rp_date', 'rp_time_from',  'rp_time_to', 'rp_content', 'rp_created_at', 'reportcate_id', 'user_id')->get()->toArray();
    }

    public function show($id)
    {
        return $report = Report::where('id', $id)->first();
    }

    public function create($data, $updater)
    {
        $report = new report;
        
        $report->rp_date = $data['rp_date'];
        $report->rp_time_from = $data['rp_time_from'];
        $report->rp_time_to = $data['rp_time_to'];
        $report->rp_content = $data['rp_content'];
        $report->rp_created_at = Carbon::now();
        $report->reportcate_id = $data['reportcate_id'];
        $report->user_id = $updater;

        $report->save();

        return $report;
    }

    public function update($id, $data, $updater)
    {
        $report = $this->getById($id);

        $report->rp_date = $data['rp_date'];
        $report->rp_time_from = $data['rp_time_from'];
        $report->rp_time_to = $data['rp_time_to'];
        $report->rp_content = $data['rp_content'];
        $report->rp_created_at = Carbon::now();
        $report->reportcate_id = $data['reportcate_id'];
        $report->user_id = $updater;

        $report->save();

        return $report;
    }

    public function getById($id)
    {
        return $report = Report::where('id', $id)->first();
    }
}