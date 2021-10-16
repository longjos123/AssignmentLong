<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Tour;
use App\Models\Transport;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        $transports = Transport::all();
        $countries = Countries::all();
        $tours->load('tourTransport', 'tourCountries');

        return view('admin.tour.index', compact('tours', 'transports', 'countries'));
    }
    public function delete($id)
    {
        Tour::destroy($id);

        return redirect()->back();
    }
    public function add(Request $request)
    {
        $tour = new Tour();
        $tour->fill($request->all());

        if($request->hasFile('image')){
            $tour->image = $request->file('image')->storeAs('uploads/imgTour', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $tour->save();

        return redirect(route('tour.index'));
    }
    public function viewEdit($id)
    {
        $tour = Tour::find($id);
        $transports = Transport::all();
        $countries = Countries::all();
        $tour->load('tourTransport', 'tourCountries');

        return view('admin.tour.edit', compact('tour', 'transports', 'countries'));
    }
    public function postEdit($id, Request  $request)
    {
        $tour = Tour::find($id);

        $tour->fill($request->all());

        if($request->hasFile('image')){
            $tour->image = $request->file('image')->storeAs('uploads/imgTour', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $tour->save();

        return redirect(route('tour.index'));
    }
    public function viewDetail(Request $request)
    {
        $id = $request->query('id');
        $tour = Tour::find($id);
        return response()->json($tour);
    }
}
