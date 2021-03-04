<?php


namespace App\Services;
use App\Repositories\PostRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class PostService
{
 protected $postRepository;

    /**
     * PostService constructor.
     * @param $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function getAll()
    {
        return $this->postRepository->getAll();
    }
    public function savePostData($data)
    {
        $validator = Validator::make($data,[
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails())
        {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $this->postRepository->save($data);
    }
    public function getById($id)
{
    return $this->postRepository->getById($id);
}
}
