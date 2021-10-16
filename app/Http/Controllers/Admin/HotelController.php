<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return view('admin.hotel.index', compact('hotels'));
    }
    public function delete($id)
    {
        Hotel::destroy($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $hotel = Hotel::find($id);

        return view('admin.hotel.edit',compact('hotel'));
    }
    public function postEdit($id, Request $request)
    {
        $hotel = Hotel::find($id);
        $hotel->fill($request->all());

        $hotel->save();

        return redirect(route('hotel.index'));
    }
    public function add(Request $request)
    {
        $hotel = new Hotel();
        $hotel->fill($request->all());
        $hotel->save();

        return redirect(route('hotel.index'));
    }
}
