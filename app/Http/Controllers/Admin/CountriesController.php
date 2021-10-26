<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Repositories\Contracts\RepositoryInterface\CountriesRepositoryInterface;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    protected $countriesRepo;

    public function __construct(CountriesRepositoryInterface $countriesRepository)
    {
        $this->countriesRepo = $countriesRepository;
    }
    public function index()
    {
        $countries = $this->countriesRepo->getAll();

        return view('admin.countries.index', compact('countries'));
    }
    public function delete($id)
    {
        $this->countriesRepo->delete($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $country = $this->countriesRepo->find($id);

        return view('admin.countries.edit',compact('country'));
    }
    public function postEdit($id, Request $request)
    {
        $this->countriesRepo->update($id, $request->toArray());

        return redirect(route('countries.index'));
    }
    public function add(Request $request)
    {
        $this->countriesRepo->create($request->toArray());

        return redirect(route('countries.index'));
    }
}
