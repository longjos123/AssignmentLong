<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Countries::all();

        return view('admin.countries.index', compact('countries'));
    }
    public function delete($id)
    {
        Countries::destroy($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $country = Countries::find($id);

        return view('admin.countries.edit',compact('country'));
    }
    public function postEdit($id, Request $request)
    {
        $country = Countries::find($id);
        $country->fill($request->all());

        $country->save();

        return redirect(route('countries.index'));
    }
    public function add(Request $request)
    {
        $country = new Countries();
        $country->fill($request->all());
        $country->save();

        return redirect(route('countries.index'));
    }
}
