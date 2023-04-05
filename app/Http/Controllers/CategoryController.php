<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->get();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $category = $this->categoryService->create($data);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $updated = $this->categoryService->update($data, $id);

        return response()->json($updated);
    }

    public function show($id)
    {
        $notice = $this->categoryService->get($id);
        return response()->json($notice);
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);

        response()->json(array(
            'success' => true,
        ));
    }

}
