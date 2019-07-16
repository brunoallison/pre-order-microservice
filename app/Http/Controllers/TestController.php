<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;

class TestController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return $this->successResponse("pong");
    }
}
