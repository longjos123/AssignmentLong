<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\User;
use App\Models\UserTour;
use Illuminate\Http\Request;

class UserTourController extends Controller
{
    /**
     * show tour booked
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $userTours = UserTour::where('confirm_tour','=','1')->get();
        $hotels = Hotel::all();
        $tours = Tour::all();
        $users = User::all();
        $userTours->load('user','tour', 'hotel');

        return view('admin.user_tour.index', compact('userTours','users','tours','hotels'));
    }

    /**
     * Xóa tour đã đặt
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        UserTour::destroy($id);
        return redirect()->back();
    }

    /**
     * trả ra view edit booked tour
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formEdit($id)
    {
        $userTour = UserTour::find($id);
        $hotels = Hotel::all();
        $userTour->load('hotel','user','tour');

        return view('admin.user_tour.edit', compact('userTour','hotels'));
    }

    /**
     * Lưu dữ liệu edit booked tour
     * @param $id
     * @param Request $request
     */
    public function postEdit($id, Request $request)
    {
        $userTour = UserTour::find($id);
        $userTour ->fill([
            'phone_number' => $request->phone_number,
            'num_people' => $request->num_people,
            'hotel_id' => $request->hotel_id,
            'start_date' => $request->start_date
        ]);
        $userTour->save();

        return redirect(route('tour_user.index'));
    }

    public function bookTour(Request $request)
    {
        //create booking tour
        $tourUser = new UserTour();
        //make price tour
        $idNewTourBooking = $request->tour_id;
        $tour = Tour::find($idNewTourBooking);
        $priceTour = $tour->price;
        $fixedPrice = ($request->num_people) * $priceTour;
        ////make end date tour
        $dayTour = $tour->num_day;
        $end_date = strtotime(date("Y-m-d", strtotime($request->start_date)) . " +$dayTour days");
        //Add db
        $tourUser->fill($request->all());
        $tourUser->fixed_price = $fixedPrice;
        $tourUser->end_date = date("Y-m-d",$end_date);

        $tourUser->save();

        return redirect()->back();
    }
}
