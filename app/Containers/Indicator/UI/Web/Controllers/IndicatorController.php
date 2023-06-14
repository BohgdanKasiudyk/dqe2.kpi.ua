<?php
namespace App\Containers\Indicator\UI\Web\Controllers;

use App\Containers\Indicator\Models\Category;
use App\Containers\Indicator\Models\DatasetTypes;
use App\Containers\Indicator\Models\Indicator;
use App\Containers\Indicator\Repositories\CategoryRepository;
use App\Containers\Indicator\Repositories\IndicatorRepository;
use App\Containers\Indicator\UI\Web\Request\IndicatorStoreRequest;
use App\Ship\Http\Controllers\PortWebController;
use Illuminate\Http\Request;


class IndicatorController extends PortWebController
{
    public function index()
    {
        $indicators = Indicator::all();
        return View('indicator.index', compact('indicators'));
    }

    public function create() {
        $categories = Category::all();
        return View('indicator.create', compact('categories'));
    }

    public function store(IndicatorStoreRequest $request) {
        $indicator = $request->input('indicator');
        Indicator::create($indicator);
        return back()->with('success', 'Indicator created successfully.');
    }

    public function edit($id,
                         IndicatorRepository $indicatorRepository,
                         CategoryRepository $categoryRepository)
    {
        $indicator = $indicatorRepository->getIndicator($id);
        $categories = $categoryRepository->getCategories();

        return View('indicator.edit', compact('indicator', 'categories'));
    }


    public function update(Request $request,
                           IndicatorRepository $indicatorRepository, $id): \Illuminate\Http\RedirectResponse
    {
        $indicator = $request->input('indicator');
        $indicatorRepository->update($indicator, $id);

        return back()->with('success','Item created successfully!');
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $cnt = DatasetTypes::where('indicator_id', $id)->count();
        if ($cnt != 0){
            return back()->with('error','Для цього індикатора існують набори даних. Видаліть спочатку їх');
        }
        Indicator::withTrashed()
            ->where('id', $id)
            ->delete();
        return back()->with('success','Видалено');

    }
}
