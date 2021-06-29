<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Posts\ManagePostRequest;
use App\Repositories\Backend\PostsRepository;
use Yajra\DataTables\Facades\DataTables;

class PostsTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PostsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PostsRepository $repository
     */
    public function __construct(PostsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Posts\ManagePostRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePostRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->editColumn('status', function ($post) {
                return $post->status;
            })
            ->addColumn('receiver_id', function ($post) {
                return $post->receiver->name;
            })
            ->editColumn('created_at', function ($post) {
                return $post->created_at->toDateString();
            })
            ->addColumn('actions', function ($post) {
                return $post->action_buttons;
            })
            ->escapeColumns(['id'])
            ->make(true);
    }
}
