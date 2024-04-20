<?php

namespace Black\Asm\Controllers\Client;

use Black\Asm\Commons\Controller;
use Black\Asm\Models\Post;

class CategoryController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function showPosts($id)
    {
        $postByCategory = $this->post->getPostByCategoryID($id);
        $postTrending = $this->post->getTrending();
        $postPopular = $this->post->getAll();

        return $this->renderViewClient(
            'category',
            [
                'postByCategory' => $postByCategory,
                'postTrending' => $postTrending,
                'postPopular' => $postPopular
            ]
        );
    }
}
