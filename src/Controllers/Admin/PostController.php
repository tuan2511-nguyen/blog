<?php

namespace Black\Asm\Controllers\Admin;

use Black\Asm\Commons\Controller;
use Black\Asm\Models\Post;

class PostController extends Controller
{
    private Post $post;
    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new Post;
    }
    public function index()
    {
        $data['posts'] = $this->post->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function create()
    {
        $data['categories'] = $this->post->getAllCategories();
        if (!empty($_POST)) {
            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if (!empty($image)) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }
            $this->post->insert($_POST['category_id'], $_POST['title'],$_POST['content'], $_POST['excerpt'], $imagePath);
            header('Location: /admin/posts');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    public function show($id)
    {
        $post = $this->post->getByID($id);

        if (empty($post)) {
            e404();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['post' => $post]);
    }

    public function update($id)
    {
        $post = $this->post->getByID($id);
        $categories = $this->post->getAllCategories();
        $move = false;
        if (empty($post)) {
            e404();
        }

        if (!empty($_POST)) {
            $image = $_FILES['image'] ?? null;
            $imagePath = $post['image'];
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $post['image'];
                } else {
                    $move = true;
                }
            }
            
            $this->post->updateById($id, $_POST['category_id'], $_POST['title'], $_POST['excerpt'], $_POST['content'], $imagePath);
            if (
                $move
                && $post['image']
                && file_exists(PATH_ROOT . $post['image'])
            ) {
                unlink(PATH_ROOT . $post['image']);
            }

            $_SESSION['success'] = 'Thao tác thành công!';

            header("Location: /admin/posts/$id/update");
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['post' => $post, 'categories' => $categories]);
    }

    public function delete($id)
    {
        $post = $this->post->getByID($id);

        if (empty($post)) {
            e404();
        }

        $this->post->deleteByID($id);

        if (!empty($post['image']) && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']);
        }
        header('Location: /admin/posts');
        exit();
    }
}
