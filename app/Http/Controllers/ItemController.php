<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::get();
        return $item;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->save();
        return $request;
    }

    public function show($id) {
        
    }
    public function edit($id, Request $request)
    {
        $item = Item::find($id);
        $item->isDone = $request->isDone;
        $item->save();
        return $item;
    }

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    }
}
