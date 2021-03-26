<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Services\EditMenuViewService;
use App\Models\Menurole;    
use App\Http\Menus\GetSidebarMenu;
use App\Models\Menulist;
use App\Models\Menus;
use Illuminate\Validation\Rule;
use App\Services\RolesService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request){
        return view('dashboard.homepage');
    }

    

}
