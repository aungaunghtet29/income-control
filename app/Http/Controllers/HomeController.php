<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\TotalExtra;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $incomes = Income::where('user_id' , Auth::user()->id)->paginate(10);

        return view('home' , compact('incomes'));
    }

    public function incomeStore(Request $request){
        $request->validate([
            'income' => 'required|numeric|gt:0',
        ]);

        $incomes = Income::where('user_id' , Auth::user()->id)->get();
        $income = new Income();

        $income->income = $request->income;
        
        
        $income->user_id = Auth::user()->id;
        $income->month = $request->month;
        $income->save = $request->income * 0.1;
        $income->tax = $request->income * 0.1;
        $income->general = $request->income * 0.6;
        $income->extra =$request->income * 0.2;
        $income->total_extra = $income->extra;
        
        if($income->extra != 0){
            foreach($incomes as $value){
                $income->total_extra += $value->extra;
            }
        }
        
        $income->save();

        return redirect()->back()->with(['success' , 'successfully created income !!!']);


    }
}
