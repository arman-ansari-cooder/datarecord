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
            'custom_id' => 'required|string|max:255',
            'date' => 'required|date',
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'total_price' => 'required|numeric',
            'room_no' => 'required|string|max:100',
            'status' => 'required|in:active,inactive',
            'food_name'=>'nullable',
        ]);
    $filename = null;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);
    }

        // Save to database
        Insert::create([
            'custom_id' => $request->custom_id,
            'date' => $request->date,
            'fullname' => $request->fullname,
            'address' => $request->address,
            'photo' => $filename,  
            'total_price' => $request->total_price,
            'room_no' => $request->room_no,
            'status' => $request->status,
            'food_name'=>$request->food_name,
        ]);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }
public function index(Request $request)
{
    $search = $request->input('search');

    $data = Insert::where('fullname', 'like', "%$search%")
                ->orWhere('custom_id', 'like', "%$search%")
                ->paginate(10);

    return view('record.display', compact('data', 'search'));
}


public function edit($id)
{
    $data = Insert::findOrFail($id);
    return view('record.edit', compact('data'));
}



public function destroy($id)
{
    $record = Insert::findOrFail($id);
    $record->delete();

    
    return redirect()->route('data.index')->with('success', 'Record deleted.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'custom_id' => 'required|string|max:255',
        'date' => 'required|date',
        'fullname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'total_price' => 'required|numeric',
        'room_no' => 'required|string|max:100',
        'status' => 'required|in:active,inactive',
        'food_name' => 'nullable|string',
    ]);

    $data = Insert::findOrFail($id);
    $filename = $data->photo;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('image'), $filename);
    }

    $data->update([
        'custom_id' => $request->custom_id,
        'date' => $request->date,
        'fullname' => $request->fullname,
        'address' => $request->address,
        'photo' => $filename,
        'total_price' => $request->total_price,
        'room_no' => $request->room_no,
        'status' => $request->status,
        'food_name'=>$request->food_name,
    ]);

    return redirect()->route('data.index')->with('success', 'Data updated successfully!');
}

}
