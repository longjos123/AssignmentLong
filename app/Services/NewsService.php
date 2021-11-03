<?php

namespace App\Services;

use App\Repositories\Contracts\RepositoryInterface\NewsRepositoryInterface;

class NewsService
{
    /**
     * @var NewsRepositoryInterface
     */
    protected $newsRepo;

    /**
     * @param NewsRepositoryInterface $newsRepository
     */
    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepo = $newsRepository;
    }

    /**
     * @param $request array
     */
    public function add($request)
    {
        $news = [
            'title' => $request->title,
            'content' => $request->content
        ];
        if($request->hasFile('image')){
            $news['image'] = $this->imageProcessing($request);
        }
        $this->newsRepo->create($news);
    }

    /**
     * @param $id int
     * @param $request array
     */
    public function update($id, $request)
    {
        $news = [
            'title' => $request->title,
            'content' => $request->content
        ];
        if($request->hasFile('image')){
            $news['image'] = $this->imageProcessing($request);
        }

        $this->newsRepo->update($id, $news);
    }

    /**
     * @param $request array
     * @return mixed
     */
    public function imageProcessing($request)
    {
        $image = $request->file('image')->storeAs('uploads/imgNews', uniqid() . '-' . $request->image->getClientOriginalName());

        return $image;
    }
}
