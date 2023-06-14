<?php

namespace App\Containers\Department\UI\Web\Controllers;

use App\Containers\Department\Models\DepartmentResults;
use App\Containers\Procedures\ProcedureController;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\View\View;

class DepartmentsResultController extends PortWebController
{
    public function index(){
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
        }/*
        $check_dt = $pr->check_all_datasets();
        if ($check_dt[0]->check != 1) {
            return back()->with('error','Не всі департаменти мають дані');
        }
*/

        $dataset = DepartmentResults::all();
        return View('result.index', compact('dataset'));
    }
}
