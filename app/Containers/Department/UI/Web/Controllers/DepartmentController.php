<?php
namespace App\Containers\Department\UI\Web\Controllers;

use App\Containers\Department\Models\Department;
use App\Containers\Department\Models\DepartmentsDatasets;
use App\Containers\Department\Models\Faculty;
use App\Containers\Department\Repositories\DepartmentRepository;
use App\Containers\Department\Repositories\IndicatorRepository;
use App\Containers\Department\UI\Web\Requests\DepartmentsDataSetStoreRequest;
use App\Containers\Department\UI\Web\Requests\DepartmentStoreRequest;
use App\Containers\Indicator\Models\Category;
use App\Containers\Indicator\Models\DatasetTypes;
use App\Containers\Indicator\Models\Indicator;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\Request;
use App\Containers\Procedures\ProcedureController;
use Illuminate\Support\Facades\View;
use function GuzzleHttp\Promise\rejection_for;

class DepartmentController extends PortWebController
{


    public function index(DepartmentRepository $departmentRepository)
    {

        $data = $departmentRepository->getDepartments();
        return View('department.index', compact('data'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $faculties = Faculty::all()->where('visible', 1);
        return View('department.edit', compact('department', 'faculties'));
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $department = Department::withTrashed()
            ->where('id', $id)
            ->delete();
        return redirect()->back()->with('success', 'Кафедру видалено');
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $department = $request->input('department');
        Department::where('id', $id)->update($department);
        return back()->with('success','Кафедру оновлено успішно!');
    }

    public function create()
    {
        $faculties = Faculty::all()->where('visible', 1);
        return View('department.create', compact( 'faculties'));
    }

    public function store(DepartmentStoreRequest $request): \Illuminate\Http\RedirectResponse
    {

        $department = $request->input('department');
        Department::create($department);
        return back()->with('success', 'Кафедру успішно створено!');

    }

    public function  dataset($id) {
        $department = Department::find($id);
        $dataset = $department->dataset;
        return View('department.dataset', compact('dataset', 'department'));
    }

    public function dataset_create($id) {
        $department = Department::find($id);
        $dep_dt_ids = DepartmentsDatasets::all()->
                        where('department_id',$department->id)->
                        pluck('dataset_id')->all();
        $cat_ids = Category::all()->where('graduating', $department->vupusk)->pluck('id')->all();
        $ind_ids = Indicator::all()->whereIn('category_id', $cat_ids)->pluck('id')->all();
        $datasets = DatasetTypes::all()->whereIn('indicator_id', $ind_ids)->whereNotIn('id', $dep_dt_ids);

        $redirect_link = '/department/' . $id . '/dataset';
        if(count($datasets->all()) == 0){
            return redirect($redirect_link)->with('info', 'У кафедри заповнені всі набори даних');
        }
        #$datasets = DatasetTypes::all();
        return View('department.dataset_create', compact('datasets', 'department'));


    }

    public function dataset_store(DepartmentsDataSetStoreRequest $request )
    {
        $DepartmentDataset = $request->input('departmentDataSet');

        $dataSetId = $DepartmentDataset['dataset_id'];
        $max_value = DatasetTypes::find($dataSetId)->max_value;
        if ($max_value < $DepartmentDataset['value'] or $DepartmentDataset['value'] < 0  ) {
            return back()->with('error', 'Значення не в ренджі від 0 до максимального');
        }


        DepartmentsDatasets::create($DepartmentDataset);
        return back()->with('success', 'Набір даних для кафедри успішно створено!');
    }

    public function dataset_edit($id, $id_ds){


        $dataset = DepartmentsDatasets::find($id_ds);
        return View('department.dataset_edit', compact('dataset'));
    }

    public function dataset_update(DepartmentsDataSetStoreRequest $request, $id, $id_ds): \Illuminate\Http\RedirectResponse
    {

        $dt = $request->input('departmentDataSet');
        /*
        $f = fopen('C:\KPI\text_logs\text.txt','w+');
        fwrite($f, json_encode($dt));
        fclose($f);
        */
        $dataSetId = $dt['dataset_id'];
        $max_value = DatasetTypes::find($dataSetId)->max_value;
        if ($max_value < $dt['value'] or $dt['value'] < 0  ) {
            return back()->with('error', 'Значення не в діапазоні від 0 до максимального');
        }
        DepartmentsDatasets::where('id', $id_ds)->update($dt);
        return back()->with('success','Набір даних для кафедри успішно оновлено!');
    }

    public function dataset_delete($id, $id_ds){
        DepartmentsDatasets::withTrashed()
            ->where('id', $id_ds)
            ->delete();
        return back()->with('success','Видалено');
    }

    public function reset_values (){
        $pr = new ProcedureController();
        $check_coef_cat = $pr->check_all_categories_coef();
        if ($check_coef_cat[0]->check != 1) {
            return back()->with('error','Коефіцієнти категорій політик не узгоджені');
        }
        $check_coef_ind = $pr->check_all_indicators_coef();
        if ($check_coef_ind[0]->check != 1) {
            return back()->with('error','Коефіцієнти індкаторів не узгоджені');
        }
        $check_coef_dt = $pr->check_all_datasets_coef();
        if ($check_coef_dt[0]->check != 1) {
            return back()->with('error','Коефіцієнти наборів даних не узгоджені');
        }

        $pr->rebuild_results();
        return back()->with('success', 'Перебудовано');
    }
}
