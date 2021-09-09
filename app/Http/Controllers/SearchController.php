<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $accounts =  Search::all();
        return view('search')->with([
            'accounts' => $accounts
        ]); 
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            //-- fetching results based on the "search_selection" and value "$request->search" with where clause
            $accounts=DB::table('re_accounts')->where($request->search_selection,'LIKE','%'.$request->search."%")->get();
            
            if($accounts)
            {
                foreach ($accounts as $account) 
                {
                    $output.='<tr>'.
                                '<td>'.$account->id.'</td>'.
                                '<td>'.$account->username.'</td>'.
                                '<td>'.$account->first_name.'</td>'.
                                '<td>'.$account->last_name.'</td>'.
                                '<td>'.$account->email.'</td>'.
                                '<td>'.$account->phone.'</td>'.
                                '<td>'.$account->gender.'</td>'.
                                '<td>'.$account->dob.'</td>'.
                                '<td>'.$account->credits.'</td>'.
                                '<td>'.$account->description.'</td>'.
                                '<td>'.$account->created_at.'</td>'.
                    '</tr>';

                                
                }
                return Response($output); //return response to ajax call
            }
        }
    }
}