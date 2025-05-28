<?php

namespace App\Http\Controllers;
use App\Models\Insert;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function insertPage()
    {
        return view('record.create');
    }
 
    public function insertValidate(Request $request)
 {
    $request->validate([
            'id' => 'required|string|max:255',
            'date' => 'required|date',
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'total_price' => 'required|numeric',
            'room_no' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
        ]);

        // Store original image
        $image = $request->file('photo');
        $imageName = $image->getClientOriginalName(); 
        $image->move(public_path('images'), $imageName);

        // Save to database
        Insert::create([
            'custom_id' => $request->id,
            'date' => $request->date,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'photo' => $imageName,  
            'total_price' => $request->total_price,
            'room_no' => $request->room_no,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }
public function index(Request $request)
{
    $search = $request->input('search');
    $data = Insert::where('fullname', 'like', "%$search%")->paginate(10);
    return view('record.display', compact('data', 'search'));
}

public function edit($id)
{
    $record = Insert::findOrFail($id);
    return view('data.edit', compact('record'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'fullname' => 'required',
        // Add other validations here
    ]);

    $record = Insert::findOrFail($id);
    $record->update($request->all());

    return redirect()->route('data.index')->with('success', 'Record updated.');
}

public function destroy($id)
{
    $record = Insert::findOrFail($id);
    $record->delete();

    return redirect()->route('data.index')->with('success', 'Record deleted.');
}
}
