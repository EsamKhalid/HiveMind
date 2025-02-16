<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reports;
use phpDocumentor\Reflection\Types\Null_;

class ReportController extends Controller
{
        public function list(Request $request){
            
        $search = $request->input('search');
        $date = $request->input('date');
        $type = gettype($search);
        $reports = Reports::query();
        
        
        
        

        
        
        if(!empty($date)){
            //search by date
                      
            $reports->where('date_created', 'like', '%' . $date . '%');
           

        }
        if(!empty($search)){
            
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
