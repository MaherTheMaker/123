<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Session;

class RestoController extends Controller
{
    //

    function index()
    {
        echo "12212";
        return view('Restohome');
    }
    function list($order = 'email')
    {
        $data = Restaurant::orderBy('email')->paginate(5);
        // $links = $data ->appends(['sort' => 'email'])->links(); compact('data', 'links')

        return view('list', ['data' => $data]);
    }
    function add(Request $req)
    {
        // print_r($req->input());
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required'
            ]
        );
        $resto = new Restaurant;
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->address = $req->input('address');
        $resto->save();

        $req->session()->flash('status', 'Restaurant entered Successfully');
        return redirect('list');
    }
    function delete($id)
    {
        Restaurant::find($id)->delete();
        Session::flash('stat', 'Restaurant has been deleted Successfully');
        return redirect('list');
    }
    function searchbyname(Request $req)
    {
        $name=$req->input('name');
        $data =  Restaurant::where('name', 'LIKE', "%{$name}%")->orderBy('email')->paginate(5);

        return view('searchlist', ['data' => $data]);
    }
    function edit($id)
    {
        $data = Restaurant::find($id);
        if (!empty($data))
            return view('edit', ['data' => $data]);
        else
            return redirect('list');
    }
    function updateResto(Request $req, $id)
    {

        $resto = Restaurant::find($id);
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->address = $req->input('address');
        $resto->save();
        $req->session()->flash('stat', 'Restaurant edited Successfully');
        return redirect('list');
    }
}
