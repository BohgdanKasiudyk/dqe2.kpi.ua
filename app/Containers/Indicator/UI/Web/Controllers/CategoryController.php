<?php

namespace App\Containers\Indicator\UI\Web\Controllers;

use App\Containers\Indicator\Models\Category;
use App\Containers\Indicator\Models\Indicator;
use App\Containers\Indicator\Repositories\CategoryRepository;
use App\Containers\Indicator\Repositories\IndicatorRepository;
use App\Containers\Indicator\UI\Web\Request\CategoryStoreRequest;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends PortWebController
{
    public function index(CategoryRepository $categoryRepository)
    {
        $categories =$categoryRepository->getCategories();

        return View('category.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return View('category.edit', compact('category'));
        #return View('category.edit', compact('indicator'));
    }

    public function update(CategoryStoreRequest $request, $id) {
        $category = $request->input('category');
        Category::where('id', $id)->update($category);
        return back()->with('success','Категорія успішно відредагована!');
    }

    public function create() {
        return View('category.create');
    }

    public function store(CategoryStoreRequest $request) {
        $category = $request->input('category');
        Category::create($category);
        return back()->with('success','Категорія успішно створена!');
    }
    public function delete ($id) {
        $cnt = Indicator::where('category_id', $id)->count();
        if ($cnt != 0){
            return back()->with('error','Для цієї категорії існують індикатори. Видаліть спочатку їх');
        }
        Category::withTrashed()
            ->where('id', $id)
            ->delete();
        return back()->with('success','Видалено');
    }
}
