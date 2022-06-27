<?php

namespace App\Http\Controllers\wish;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;

class WishController extends Controller
{
    public function index(){
        $wishs = WishList::where('user_id' , Auth::user()->id)->paginate(5);
        $incomes = Income::where('user_id' , Auth::user()->id)->get();
        

        foreach($incomes as $income ){
            if($income->income != 0){
                return view('wish-list' , compact('wishs'));
            }
        }

        return redirect()->route('home')->with(['fail' => 'Income must not zero !!!']);

    }

    public function store(Request $request){

            $request->validate([
                'item' => 'required|max:40',
                'price' => 'required|numeric|not_in:0'
            ], 
            [
                'price.not_in' => 'price must be greater than zero',
            ]);

            $wish = new WishList();

            $wish->user_id = Auth::user()->id;
            $wish->item  = $request->item;
            $wish->price = $request->price;
            
            $save = WishList::where('user_id' , Auth::user()->id)->get();

            if($save){
                $wish->save();
            }

            return redirect()->back()->with(['success' => 'progress success']);

    }

    public function update($id){
        $wish = WishList::where('user_id', Auth::user()->id)->find($id);
        return view('wish-update' , compact('wish'));
    }

    public function updateStore(Request $request , $id){

        $request->validate([
            'item' => 'required|max:50',
            'price' => 'required|numeric|not_in:0'
        ]);

        $wish = WishList::find($id);


        $wish->item = $request->item;
        $wish->price = $request->price;

        $update  = WishList::where('user_id', Auth::user()->id)->get();

        if($update){
            $wish->update();
        }


        return redirect()->back()->with(['success' => 'update successfully']);

    }

    public function delete($id){
        $wish = WishList::where('user_id', Auth::user()->id)->find($id);
        $wish->delete();

        return redirect()->back()->with(['success' => 'delete successfully']);
    }


}
