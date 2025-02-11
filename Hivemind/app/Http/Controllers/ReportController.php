<?php

namespace App\Http\Controllers;

use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Arr;


class ReportController extends Controller
{
        public function list(Request $request){
            
        $search = $request->input('search');
        $type = gettype($search);
        $reports = Reports::query();
        $date = date_parse($search);
        //trying to get this working
        
        
        if(is_numeric($search)){
            //search year
            $reports->where('created_at', 'like', '%' . $search . '%');

        }elseif (checkdate($date["month"],$date["day"],$date["year"])) {
            //search by date
            $reports->where('created_at', 'like', '%' . $search . '%');
        }else {
            //search by name
            $reports->where('report_name', 'like', '%' . $search . '%');
        }
            


        $reports = $reports->get();

        return view('reports.reports', compact('reports', 'search'));  
    }

   

   public function show($id)
    {
        $report = Reports::findOrFail($id);
        return view('report.show', ['report' => $report]); 
    }
}
