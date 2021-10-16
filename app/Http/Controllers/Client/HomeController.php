<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\News;
use App\Models\Tour;
use App\Models\UserTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Lấy dữ liệu tour và news show ra homepage client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tours = Tour::limit(6)->get();
        $tours->load('tourCountries');
        $news = News::limit(3)->get();

        return view('client.home.main_page', compact('tours', 'news'))  ;
    }
    public function tour(Request $request)
    {
        $pagesize = 6;
        $searchData = $request->except('page');

        if(count($request->all()) == 0){
            $tours = Tour::paginate($pagesize);
        }else{
            $tourUser = Tour::where('name','like','%'.$request->name_tour.'%');
            if($request->has('countries_id') && $request->countries_id != ""){
                $tourUser = $tourUser->where('countries_id','=',$request->countries_id);
            }
            if($request->has('price_min') && $request->price_min != ""){
                $tourUser = $tourUser->where('price','>',$request->price_min);
            }
            if($request->has('price_max') && $request->price_max != ""){
                $tourUser = $tourUser->where('price','<',$request->price_max);
            }
            if($request->has('price_max') && $request->price_max != ""
                && $request->has('price_min') && $request->price_min != "")
            {
                $tourUser = $tourUser->where('price','<',$request->price_max)
                    ->andWhere('price','>',$request->price_min);
            }
            $tours = $tourUser->paginate($pagesize)->appends($searchData);
        }
        $tours->load('tourCountries');
        $countries = Countries::all();

        return view('client.tour.main', [
            'tours' => $tours,
            'countries' => $countries,
            'searchData' => $searchData
        ]);
    }
    public function tourDetail($id)
    {
        $tour = Tour::find($id);
        $tour->load('tourCountries');
        $tourLimits = Tour::with('tourCountries')->limit(3)->get();
        return view('client.tour_detail.main',compact('tour','tourLimits'));
    }
    public function blog(Request $request)
    {

        $pagesize = 3;
        $searchData = $request->except('page');
        if(count($request->all()) == 0){
            $blogs = News::paginate($pagesize);
        }else{
            $blogsQuery = News::where('title','like','%'.$request->title.'%');
            $blogs = $blogsQuery->paginate($pagesize)->appends($searchData);
        }
//        dd($blogs);
        $blogLimits = News::limit(4)->get();
        return view('client.blog.main', [
            'blogs' => $blogs,
            'blogLimits' => $blogLimits,
            'searchData' => $searchData
        ]);
    }
    public function blogDetail($id)
    {
        $blog = News::find($id);
        $blogLimits = News::limit(4)->get();

        return view('client.blog_detail.main', compact('blog', 'blogLimits'));
    }
    public function submitTour(Request $request)
    {
        $id = $request->query('id');
        $tour = Tour::find($id);
        return response()->json($tour);
    }

    public function bookingTour($id, Request $request)
    {
        $user_id = Auth::id();
        $tour = Tour::find($id);
        $end_date = strtotime(date("Y-m-d", strtotime($request->start_date)) . " +$tour->num_day days");

        $tourUser = new UserTour();
        $tourUser->fill([
            'user_id' => $user_id,
            'tour_id' => $id,
            'name' => $request->name,
            'num_people' => $request->num_people,
            'phone_number' => $request->phone_number,
            'start_date' => $request->start_date,
        ]);
        $tourUser->status = 0;
        $tourUser->end_date = date('Y-m-d', $end_date);
        $tourUser->save();

        return redirect()->back();
    }

    public function bookingTourUser()
    {
        $userTours = UserTour::where('user_id','=',Auth::id())->get();
        $userTours->load('user','tour','hotel');
//        dd($userTours->toArray());

        return view('client.booking_tour.main',compact('userTours'));
    }

    public function confirmTour($id)
    {
        $tour = UserTour::find($id);

        $tour->confirm_tour = 1;
        $tour->save();

        return redirect()->back();
    }

    public function findKey(Request $request)
    {
        $searchData = $request;
        $dataTours = Tour::where('name','like','%'.$request->key."%")->get();
//        dd($dataTours->toArray());
        $dataTours->load('tourCountries');

        return view('client.search.main', [
            'dataTours' =>$dataTours,
            'searchData'=>$searchData
        ]);

    }
}
