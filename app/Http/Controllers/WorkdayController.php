<?php

namespace App\Http\Controllers;

use App\Models\Workday;
use Illuminate\Http\Request;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = Workday::all();
        return view('workdays.index', compact('workdays'));
    }

    // 従業員情報と店舗情報管理画面の表示
    public function showEmployeeStore()
    {
        return view('employee_store.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'min_workdays' => 'required|integer',
            'max_workdays' => 'required|integer',
    ]);

    Workday::create($data);

    return redirect('/workdays')->with('success', 'Workday added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'min_workdays' => 'required|integer',
            'max_workdays' => 'required|integer',
        ]);

        $workday = Workday::findOrFail($id);
        $workday->update($data);

        return redirect('/workdays')->with('success', 'Workday updated.');
    }

    public function destroy($id)
    {
        $workday = Workday::findOrFail($id);
        $workday->delete();

        return redirect('/workdays')->with('success', 'Workday deleted.');
    }
}
