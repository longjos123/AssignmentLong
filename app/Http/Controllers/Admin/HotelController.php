<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Repositories\Contracts\RepositoryInterface\HotelRepositoryInterface;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    protected $hotelRepo;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->hotelRepo = $hotelRepository;
    }
    public function index()
    {
        $hotels = $this->hotelRepo->getAll();

        return view('admin.hotel.index', compact('hotels'));
    }
    public function delete($id)
    {
        $this->hotelRepo->delete($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $hotel = $this->hotelRepo->find($id);

        return view('admin.hotel.edit',compact('hotel'));
    }
    public function postEdit($id, Request $request)
    {
        $this->hotelRepo->update($id, $request->toArray());

        return redirect(route('hotel.index'));
    }
    public function add(Request $request)
    {
        $this->hotelRepo->create($request->toArray());

        return redirect(route('hotel.index'));
    }
}
