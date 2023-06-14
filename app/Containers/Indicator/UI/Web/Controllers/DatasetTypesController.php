<?php

namespace App\Containers\Indicator\UI\Web\Controllers;

use App\Containers\Department\Models\DepartmentsDatasets;
use App\Containers\Indicator\Models\DatasetTypes;
use App\Containers\Indicator\Models\Indicator;
use App\Containers\Indicator\UI\Web\Request\DatasetTypeStoreRequest;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DatasetTypesController extends  PortWebController
{
    public function index()
    {
        $datasetstypes = DatasetTypes::all();
        return View('datasettypes.index', compact('datasetstypes'));
    }

    public function create() {
        $indicators = Indicator::all();
        return View('datasettypes.create', compact('indicators'));
    }

    public function store(DatasetTypeStoreRequest $request) {
        $dataset = $request->input('DataSet');
        DatasetTypes::create($dataset);
        return back()->with('success', 'Dataset created successfully.');
    }

    public function edit ($id){
        $dataset = DatasetTypes::find($id);
        $indicator = $dataset->indicator;
        return View('datasettypes.edit', compact('dataset', 'indicator'));

    }

    public function update(DatasetTypeStoreRequest $request, $id) : \Illuminate\Http\RedirectResponse {
        $dataset = $request->input('DataSet');
        DatasetTypes::where('id', $id)->update($dataset);
        return back()->with('success','Dataset updates successfully!');
    }

    public function delete($id) {
         DatasetTypes::withTrashed()
            ->where('id', $id)
            ->delete();
        DepartmentsDatasets::withTrashed()
            ->where('dataset_id', $id)
            ->delete();
        return redirect()->back()->with('success', 'Deleted.');
    }


}
