<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DashboardController extends Controller
{

    use UserAdmin;
    
    public function __construct(Request $request)
    {

        $this->setUser();

        view()->composer('partials.nav', function($view) use($request) {

            $currentPath = $request->path();
            $view->with('currentPath',$currentPath);
            $categories = DB::table('categories')->select('id', 'title')->get();
            $view->with('categories',$categories);
        });
    }

    public function index() {

        return view('back.dashboard');
    }


}

