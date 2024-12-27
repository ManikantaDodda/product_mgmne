<?php
namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function create()
    {
         return view("attributes.create");
    }
    public function index()
    {
        $attributes = Attribute::all();
        return view('attributes.index', compact('attributes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute_type' => 'required|string',
            'attribute_name' => 'required|string',
        ]);

        Attribute::create([
            'type' => $request->attribute_type,
            'name' => $request->attribute_name,
        ]);

        return redirect()->route('attributes.index')->with('success', 'Attribute added successfully.');
    }

    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('attributes.edit', compact('attribute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'attribute_type' => 'required|string',
            'attribute_name' => 'required|string',
        ]);

        $attribute = Attribute::findOrFail($id);
        $attribute->update([
            'type' => $request->attribute_type,
            'name' => $request->attribute_name,
        ]);

        return redirect()->route('attributes.index')->with('success', 'Attribute updated successfully.');
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('attributes.index')->with('success', 'Attribute deleted successfully.');
    }
}

