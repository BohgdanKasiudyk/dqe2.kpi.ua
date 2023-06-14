<?php

namespace App\Containers\Department\UI\Web\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentsDataSetStoreRequest extends  FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public  function rules(){
        return [];
    }

}
