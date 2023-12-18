<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'itemname' => 'required|max:200',
            'category' => 'required|max:100',
            'quantity' => 'required|integer',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index');
    }

    public function update(Request $request, $id) {

        $item = Item::find($id);

        $item->update($request->all());

        return redirect()->route('items.index');
    }

    public function edit($id) {

        $item = Item::find($id);

        return view('items.edit', compact('item'));
    }

    public function destroy($id) {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('items.index');
    }

}
