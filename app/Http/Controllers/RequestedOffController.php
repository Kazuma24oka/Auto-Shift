<?php

namespace App\Http\Controllers;

use App\Models\RequestedOff;
use Illuminate\Http\Request;

class RequestedOffController extends Controller
{
    public function index()
    {
        $requestedOffs = RequestedOff::all();
        return view('requested_offs.index', compact('requestedOffs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'off_date' => 'required|date',
        ]);

        RequestedOff::create($data);

        return redirect('/requested-offs')->with('success', 'Requested off added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'off_date' => 'required|date',
        ]);

        $requestedOff = RequestedOff::findOrFail($id);
        $requestedOff->update($data);

        return redirect('/requested-offs')->with('success', 'Requested off updated.');
    }

    public function destroy($id)
    {
        $requestedOff = RequestedOff::findOrFail($id);
        $requestedOff->delete();

        return redirect('/requested-offs')->with('success', 'Requested off deleted.');
    }
}
