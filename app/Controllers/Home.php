<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Ark/index');
    }
    public function shop()
    {
      return view('include/shop');
    }
}
