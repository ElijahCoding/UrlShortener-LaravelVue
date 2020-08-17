<?php

namespace App\Http\Controllers\Api\Link;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Link\LinkStoreRequest;
use App\Http\Resources\LinkResource;
use App\Mail\Api\Link\LinkCreated;
use Illuminate\Support\Facades\Mail;

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

        Mail::to(auth()->user())
            ->queue(new LinkCreated($link));

        return new LinkResource($link);
    }
}
