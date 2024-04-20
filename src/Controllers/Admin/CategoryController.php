<?php

namespace Black\Asm\Controllers\Admin;

use Black\Asm\Commons\Controller;
use Black\Asm\Models\Category;

class CategoryController extends Controller
{
    private Category $category;
    private string $folder = 'categories.';
    public function __construct()
    {
        $this->category = new Category;
    }
    public function index()
    {
        $data['categories'] = $this->category->getAll();
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function create()
    {
        if (!empty($_POST)) {
            $this->category->insert($_POST['name']);
            header('Location: /admin/categories');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    public function show($id)
    {
        $data['category'] = $this->category->getByID($id);

        if (empty($data['category'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    public function update($id)
    {
        $data['category'] = $this->category->getById($id);
        if (empty($data['category'])) {
            die(404);
        }
        if (!empty($_POST)) {
            $this->category->updateById($id, $_POST['name']);
            header('Location: /admin/categories');
            exit();
        }
        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }
    public function delete($id)
    {
        $this->category->deleteByID($id);
        header('Location: /admin/categories');
    }
}
