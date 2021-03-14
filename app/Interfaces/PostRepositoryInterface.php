<?php

namespace App\Interfaces;

use App\Http\Requests\PostRequest;

interface PostRepositoryInterface
{
    public function destroy(int $id);
    public function edit($id, PostRequest $request);
    public function store(PostRequest $request);
}
