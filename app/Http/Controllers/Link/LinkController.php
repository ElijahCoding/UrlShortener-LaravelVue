<?php

namespace App\Http\Controllers\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\LinkStoreRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {

    }

    public function store(LinkStoreRequest $request)
    {
        return auth()->user()->links()->create($request->validated());
    }
}
