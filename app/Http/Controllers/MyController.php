<?php
     
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
    
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));

        $usersImport = new UsersImport;


        /**
         *  looping through import to retrieve phone
         */
        //  foreach($usersImport as $users=>$key){
        //      $key->phone;
        //     dd($users=>phone);
        //  }
             
         

        return back();
    }
}