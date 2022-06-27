<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class ManageController extends Controller
{
    public function index(){


        $incomes = Income::where('user_id' , Auth::user()->id)->get();
        $wishs = WishList::where('user_id' , Auth::user()->id)->get();

        //$user = Auth::user()->wishs->first();

        foreach ($wishs as $wish) {
            if($wish->item != ''){
                return view('manage' , compact('incomes' , 'wishs' ));
            }
            
        }
        return redirect()->route('home')->with(['fail' => 'Income and Wish list must not empty !!!']);
    }

   
}
