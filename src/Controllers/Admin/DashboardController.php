<?php

namespace Black\Asm\Controllers\Admin;

use Black\Asm\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $this->renderViewAdmin('dashboard');
    }
}
