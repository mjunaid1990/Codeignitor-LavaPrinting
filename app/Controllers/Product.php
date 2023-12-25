<?php

namespace App\Controllers;
use App\Models\ProductsModel;
use App\Models\ProductImagesModel;
use App\Models\FaqsModel;
use App\Models\TestimonialsModel;

class Product extends BaseController
{
	public function index($slug)
	{
            $model = new ProductsModel();
            $testimonialModel = new TestimonialsModel();
            $product = $model->findBySlug($slug);
            $faqModel = new FaqsModel();
            if(!$product) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

            $data['lists'] = $faqModel->get();
            $data['model'] = $product;
            $data['testimonialModel'] = $testimonialModel;
            $data['testimonials'] = $testimonialModel->get();
            $data['pmodel'] = $model;
            $data['products'] = $model->get();
            $data['pimagesmodel'] = new ProductImagesModel();
            $data['similarProducts'] = $product?$model->findByCategoryNotInProductID($product->category_id, $product->id):'';
            return view('product',$data);
	}
}
