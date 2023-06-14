<?php

namespace App\Containers\Department\UI\Web\Controllers;

use App\Containers\Department\Models\Department;
use App\Containers\Department\Models\DepartmentCategory;
use App\Containers\Procedures\ProcedureController;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\View\View;

class DepartmentCategoryController extends PortWebController
{

    public function index($id){
        $department = Department::find($id);
        $dep_cat = DepartmentCategory::all()->where('dep_id', $id);
        if (count($dep_cat) == 0) {
            return back()->with('error','В кафедри немає оцінок за категорії політик');
        }
        return View('splitCategories.index', compact('dep_cat', 'department'));
    }

}
