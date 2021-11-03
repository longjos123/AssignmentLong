<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Tour;
use App\Repositories\Contracts\RepositoryInterface\NewsRepositoryInterface;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsRepo;

    protected $newsService;

    /**
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(
        NewsRepositoryInterface $newsRepository,
        NewsService $newsService
    )
    {
        $this->newsRepo = $newsRepository;
        $this->newsService = $newsService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = $this->newsRepo->getAll();

        return view('admin.news.index', compact('news'));
    }

    /**
     * @param $id int
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->newsRepo->delete($id);

        return redirect()->back();
    }

    /**
     * view edit
     * @param $id int
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formEdit($id)
    {
        $news = $this->newsRepo->find($id);

        return view('admin.news.edit',compact('news'));
    }

    /**
     * post news edit
     * @param $id int
     * @param Request $request array
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEdit($id, Request $request)
    {
        $this->newsService->update($id, $request);

        return redirect(route('news.index'));
    }
    public function add(Request $request)
    {
        $this->newsService->add($request);

        return redirect(route('news.index'));
    }
    public function viewDetail(Request $request)
    {
        $id = $request->query('id');
        $news = $this->newsRepo->find($id);
        return response()->json($news);
    }
}
