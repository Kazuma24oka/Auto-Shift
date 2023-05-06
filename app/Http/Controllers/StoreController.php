<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Employee;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        $employees = Employee::all();
        return view('employee_store.index', compact('stores', 'employees'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'min_employees' => 'required|integer',
            'closed_day' => 'nullable|integer',
        ]);

        Store::create($data);

        return redirect('/stores')->with('success', 'Store added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'min_employees' => 'required|integer',
            'closed_day' => 'nullable|integer',
        ]);

        $store = Store::findOrFail($id);
        $store->update($data);

        return redirect('/stores')->with('success', 'Store updated.');
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect('/stores')->with('success', 'Store deleted.');
    }
}