<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;

class Category extends BaseController
{
	public function index($slug)
	{
            $model = new CategoriesModel();
            $productModel = new ProductsModel();
            $category = $model->findBySlug($slug);
            if(!$category) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            
            $data['products'] = $productModel->findByCategory($category->id);
            $data['model'] = $category;
            $data['pmodel'] = $productModel;
            $data['categories'] = $model->findCategorieswithParentID();
            return view('category',$data);
	}
}
