<?php

namespace Black\Asm\Controllers\Client;

use Black\Asm\Commons\Controller;

use Black\Asm\Models\Post;


class PostController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function show($id)
    {
        $post = $this->post->getByID($id);
        $postTrending = $this->post->getTrending();
        $postPopular = $this->post->getAll();
        $this->post->incrementViewCount($id);
        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
                'postTrending' => $postTrending,
                'postPopular' => $postPopular
            ]
        );
    }
}
