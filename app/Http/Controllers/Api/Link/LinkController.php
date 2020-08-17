<?php

namespace App\Http\Controllers\Api\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Link\LinkStoreRequest;
use App\Http\Resources\LinkResource;

class LinkController extends Controller
{
    public function index()
    {
        $links = auth()->user()->links;

        return LinkResource::collection($links);
    }

    public function store(LinkStoreRequest $request)
    {
        $link = auth()->user()->links()->create($request->validated());

        return new LinkResource($link);
    }
}
