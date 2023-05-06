<?php

namespace App\Http\Controllers;

use App\Models\StoreAffiliation;
use Illuminate\Http\Request;

class StoreAffiliationController extends Controller
{
    public function index()
    {
        $storeAffiliations = StoreAffiliation::all();
        return view('store_affiliations.index', compact('storeAffiliations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        StoreAffiliation::create($data);

        return redirect('/store-affiliations')->with('success', 'Store affiliation added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'employee_id' => 'required|integer|exists:employees,id',
            'store_id' => 'required|integer|exists:stores,id',
        ]);

        $storeAffiliation = StoreAffiliation::findOrFail($id);
        $storeAffiliation->update($data);

        return redirect('/store-affiliations')->with('success', 'Store affiliation updated.');
    }

    public function destroy($id)
    {
        $storeAffiliation = StoreAffiliation::findOrFail($id);
        $storeAffiliation->delete();

        return redirect('/store-affiliations')->with('success', 'Store affiliation deleted.');
    }
}