<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::all();

        return view('admin.transport.index', compact('transports'));
    }
    public function delete($id)
    {
        Transport::destroy($id);

        return redirect()->back();
    }
    public function formEdit($id)
    {
        $transport = Transport::find($id);

        return view('admin.transport.edit', compact('transport'));
    }
    public function postEdit($id, Request $request)
    {
        $transport = Transport::find($id);
        $transport->fill($request->all());

        $transport->save();

        return redirect(route('transport.index'));
    }
    public function add(Request $request)
    {
        $transport = new Transport();
        $transport->fill($request->all());

        $transport->save();

        return redirect()->back();
    }
}
