<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //
        $pageHeading = 'Dashboard';

            ->select(
                DB::raw('companycost_name as companycost_name'),
                DB::raw('companycost_yearly as companycost_yearly'),

            )
            ->get();

        $array[] = ['companycost_name', 'companycost_yearly', ];
        foreach ($result as $key => $value) {
            $array[++$key] = [$value->companycost_name, ];
        }


        //

        return view('dashboard',[
            'pageHeading' => $pageHeading,

    }
}
