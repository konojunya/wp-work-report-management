<?php

namespace App\Repositories;

use App\Models\Reportcate;

class ReportcateRepo
{
    public function findAll()
    {
        return $reports = Reportcate::select('id', 'rc_name', 'rc_note')->get()->toArray();
    }

    public function getById($id)
    {
        return $reportcate = Reportcate::where('id', $id)->first();
    }
}