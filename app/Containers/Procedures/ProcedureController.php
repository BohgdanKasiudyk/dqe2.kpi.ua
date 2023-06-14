<?php

namespace App\Containers\Procedures;
use Illuminate\Support\Facades\DB;
class ProcedureController
{
    public function rebuild_results() {
        $sql = "call dqe_count_dep_results()";
        DB::statement($sql);
    }

    public function check_all_datasets() {
        $sql = "call dqe_check_all_datasets()";
        return DB::select($sql);

    }


    public function check_all_categories_coef() {
        $sql = "call dqe_check_categories_coef()";
        return DB::select($sql);

    }

    public function check_all_indicators_coef() {
        $sql = "call dqe_check_indicator_coef()";
        return DB::select($sql);

    }

    public function check_all_datasets_coef(): array
    {
        $sql = "call dqe_check_dataset_coef()";
        return DB::select($sql);

    }

}
