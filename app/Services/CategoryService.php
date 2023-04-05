<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function get($id = null)
    {
        if ($id) {
            return Category::firstOrFail($id);
        }

        return Category::get();
    }

    public function create($data)
    {
        $category = new Category($data);
        $category->save();
        return $category;
    }

    public function update($data, $id)
    {
        $category = Category::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
