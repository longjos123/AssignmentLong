<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use App\Repositories\Contracts\RepositoryInterface\TransportRepositoryInterface;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * @var TransportRepositoryInterface
     */
    protected $transportRepo;

    /**
     * @param TransportRepositoryInterface $transportRepository
     */
    public function __construct(TransportRepositoryInterface $transportRepository)
    {
        $this->transportRepo = $transportRepository;
    }

    /**
     * show
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $transports = $this->transportRepo->getAll();

        return view('admin.transport.index', compact('transports'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->transportRepo->delete($id);

        return redirect()->back();
    }

    /**
     * view Edit
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formEdit($id)
    {
        $transport = $this->transportRepo->find($id);

        return view('admin.transport.edit', compact('transport'));
    }

    /**
     * Post transport edit
     * @param $id int
     * @param Request $request array
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEdit($id, Request $request)
    {
        $this->transportRepo->update($id, $request->toArray());

        return redirect(route('transport.index'));
    }

    /**
     * @param Request $request array
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $this->transportRepo->create($request->toArray());

        return redirect()->back();
    }
}
