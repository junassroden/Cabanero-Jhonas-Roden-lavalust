<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function read()
    {
       $data['products'] = $this->ProductModel->read();
       $data['name'] = "LavaLust Framework";
       $this->call->view('product/ProductView', $data);
    }

    public function create()
    {
        $this->call->view('/product/create'); 
    }

}