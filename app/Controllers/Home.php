<?php

namespace App\Controllers;
use App\Models\QuotesModel;
use App\Models\ProductsModel;
use App\Models\BannersModel;
use App\Models\SettingsModel;
use App\Models\TestimonialsModel;
use App\Models\CategoriesModel;
use App\Models\PagesModel;
use App\Models\FaqsModel;

class Home extends BaseController
{
	public function index()
	{
            
            $bannerModel = new BannersModel();
            $settingModel = new SettingsModel();
            $testimonialModel = new TestimonialsModel();
            $productModel = new ProductsModel();
            $catModel = new CategoriesModel();
            
            $pids = $settingModel->findValueByKey('front_page_product_ids');
            $cids = $settingModel->findValueByKey('front_page_category_ids');
            $boxids = $settingModel->findValueByKey('front_page_box_style_category_ids');
            
            
            $data['bannerModel'] = $bannerModel;
            $data['testimonialModel'] = $testimonialModel;
            $data['productModel'] = $productModel;
            $data['catModel'] = $catModel;
            
            $data['banners'] = $bannerModel->get();
            $data['testimonials'] = $testimonialModel->get();
            $data['products'] = $pids?$productModel->findByIds(explode(',', $pids)):false;
            $data['categories'] = $cids?$catModel->findByIds(explode(',', $cids)):false;
            $data['boxes_categories'] = $boxids?$catModel->findByIds(explode(',', $boxids)):false;

            $data['title'] = 'Lava Printing';
            return view('index',$data);
	}
        
        public function faq() {
            $model = new FaqsModel();
            $data['lists'] = $model->get();
            $data['title'] = 'Lava Printing - Faq';
            return view('pages/faq',$data);
        }
        
        public function about_us() {
            $pageModel = new PagesModel();
            $data['pageModel'] = $pageModel;
            
            $data['model'] = $pageModel->findBySlug('about-us');
            $data['title'] = 'Lava Printing - About Us';
            return view('pages/about-us',$data);
        }
        
        public function contact_us() {
            $data['title'] = 'Lava Printing - Contact Us';
            return view('pages/contact-us',$data);
        }
        
        public function privacy_policy() {
            $pageModel = new PagesModel();
            $data['pageModel'] = $pageModel;
            
            $data['model'] = $pageModel->findBySlug('privacy-policy');
            $data['title'] = 'Lava Printing - Privacy Policy';
            return view('pages/privacy-policy',$data);
        }
        
        public function terms_and_conditions() {
            $pageModel = new PagesModel();
            $data['pageModel'] = $pageModel;
            
            $data['model'] = $pageModel->findBySlug('terms-and-conditions');
            $data['title'] = 'Lava Printing - Terms & Conditions';
            return view('pages/terms-and-conditions',$data);
        }
        
        public function contact_message() {
            $data = [];
            if ($this->request->isAJAX() && $this->request->getPost()) {
                $inset_data = $this->request->getPost();
                
                $template = view("email-contact", ['data'=>$inset_data]);
                
                contact_email_template_customer($inset_data['email'], 'Welcome to Lavaprinting', $template);
                
                $template2 = view("email-contact-admin", ['data'=>$inset_data]);
                
                contact_email_template_admin('support@lavaprinting.com', 'Contact Us - '.$inset_data['subject'], $template2);
                contact_email_template_admin('mohammadjunaid538@gmail.com', 'Contact Us - '.$inset_data['subject'], $template2);
                
                $data['success'] = true;
                $data['message'] = 'Thank you for connecting with us. Your inquiry is sent successfully.';
            }
            echo json_encode($data);
        }


        public function Quote()
	{
            $model = new QuotesModel();
            $pModel = new ProductsModel();
            $session = \Config\Services::session();
            if ($this->request->getPost()) {
                $inset_data = $this->request->getPost();
                if($model->save($inset_data) === false) {
                    return view('quotes', ['errors'=>$model->errors(), 'model'=>$this->request->getPost(), 'products'=>$pModel->get()]);
                }
                $insert_id = $model->getInsertID();
                if($insert_id) {
                    handle_image_upload($insert_id, 'file', 'quotes', '/uploads/quotes/');
                }
                
                $template = view("email-quote", ['data'=>$inset_data]);
                
                quote_email_template_customer($inset_data['email'], 'Quote Confirmation', $template);
                
                $template2 = view("email-quote-admin", ['data'=>$inset_data]);
                
                quote_email_template_admin('support@lavaprinting.com', 'Quote Received', $template2);
                quote_email_template_admin('mohammadjunaid538@gmail.com', 'Quote Received', $template2);
                
                $_SESSION['success'] = 'Thank you for connecting with us. Your inquiry is sent successfully.';
                $session->markAsFlashdata('success');
                
                return redirect()->to(base_url().'/quote');
            }
            $data['products'] = $pModel->get();
            return view('quotes', $data);
	}
        
        public function quote_ajax() {
            $model = new QuotesModel();
            $data = [];
            if ($this->request->isAJAX() && $this->request->getPost()) {
                $inset_data = $this->request->getPost();
                if($model->save($inset_data) === false) {
                    $data['errors'] = $model->errors();
                }else {
                    $insert_id = $model->getInsertID();
                    if($insert_id) {
                        handle_image_upload($insert_id, 'file', 'quotes', '/uploads/quotes/');
                    }
                    $template = view("email-quote", ['data'=>$inset_data]);
                
                    quote_email_template_customer($inset_data['email'], 'Quote Confirmation', $template);

                    $template2 = view("email-quote-admin", ['data'=>$inset_data]);

                    quote_email_template_admin('support@lavaprinting.com', 'Quote Received', $template2);
                    quote_email_template_admin('mohammadjunaid538@gmail.com', 'Quote Received', $template2);
                    
                    $data['success'] = true;
                    $data['message'] = 'Thank you for connecting with us. Your inquiry is sent successfully.';
                }
            }
            
            echo json_encode($data);
        }
        
        public function create_sitemap() {
            $categoriesModel = new CategoriesModel();
            $productModel = new ProductsModel();
            
            $categories = $categoriesModel->get();
            $products = $productModel->get();
            
            // Begin assembling the sitemap starting with the header
            $sitemap = "<\x3Fxml version=\"1.0\" encoding=\"UTF-8\"\x3F>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
            
            // Add static pages not in database to sitemap
            // Home page
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url() . "</loc>\n\t</url>\n\n";
            // About page
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url('about-us') . "</loc>\n\t</url>\n\n";
            
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url('contact-us') . "</loc>\n\t</url>\n\n";
            
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url('privacy-policy') . "</loc>\n\t</url>\n\n";
            
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url('terms-and-conditions') . "</loc>\n\t</url>\n\n";
            
            $sitemap .= "\t<url>\n\t\t<loc>" . site_url('quote') . "</loc>\n\t</url>\n\n";

            if($categories) {
                foreach ($categories as $category) {
                    if($category->slug && $category->status == 1 ) {
                        $sitemap .= "\t<url>\n\t\t<loc>" . site_url('category/'.$category->slug) . "</loc>\n";
                        $sitemap .= "\t\t<priority>0.5</priority>\n ";
                        $sitemap .= "\t\t<changefreq>daily</changefreq>\n ";
                        $sitemap .= "\t\t<lastmod>".date('Y-m-d')."</lastmod>\n ";
                        $sitemap .= "\t</url>\n\n";
                    }
                }
            }
            if($products) {
                foreach ($products as $product) {
                    $sitemap .= "\t<url>\n\t\t<loc>" . site_url('product/'.$product->slug) . "</loc>\n";
                    $sitemap .= "\t\t<priority>0.5</priority>\n ";
                    $sitemap .= "\t\t<changefreq>daily</changefreq>\n ";
                    $sitemap .= "\t\t<lastmod>".date('Y-m-d')."</lastmod>\n ";
                    $sitemap .= "\t</url>\n\n";
                }
            }
            
            // Close with the footer
            $sitemap .= "</urlset>\n";
            
            
            // Write the sitemap string to file. Make sure you have permissions to write to this file.
            $file = fopen('sitemap.xml', 'w');
            fwrite($file, $sitemap);
            fclose($file);
        }
}
