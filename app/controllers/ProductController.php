<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function read()
    {
        $data['products'] = $this->ProductModel->read();
        $data['name'] = "LavaLust Framework";
        $data['user_role'] = $this->session->userdata('user_role');
        $data['notification'] = $this->session->flashdata('notification');
        $this->call->view('product/ProductView', $data);
    }

    public function create()
    {
        $this->require_admin();

        if ($this->is_valid_submission()) {
            $this->ProductModel->create(...$this->product_input());
            $this->redirect_with_message('Product added successfully.');
        }

        $this->call->view('product/create', [
            'errors' => $this->form_validation->get_errors()
        ]);
    }

    public function edit($id)
    {
        $this->require_admin();
        $product = $this->ProductModel->find((int) $id);

        if (!$product) {
            show_404();
            return;
        }

        if ($this->is_valid_submission()) {
            $this->ProductModel->update((int) $id, ...$this->product_input());
            $this->redirect_with_message('Product updated successfully.');
        }

        $this->call->view('product/edit', [
            'product' => $product,
            'errors' => $this->form_validation->get_errors()
        ]);
    }

    public function delete($id)
    {
        $this->require_admin();
        $this->ProductModel->delete((int) $id);
        $this->redirect_with_message('Product deleted successfully.');
    }

    private function is_valid_submission()
    {
        if (!$this->form_validation->submitted()) {
            return false;
        }

        $this->validate_product();
        return $this->form_validation->run();
    }

    private function product_input()
    {
        return [
            $this->io->post('product_name'),
            $this->io->post('description'),
            $this->io->post('price'),
            $this->io->post('quantity')
        ];
    }

    private function validate_product()
    {
        $this->form_validation
            ->name('product_name')->required()->alpha_numeric_space()
            ->name('description')->required()->max_length(255)
            ->name('price')->required()->numeric()
            ->name('quantity')->required()->numeric();
    }

    private function redirect_with_message($message)
    {
        $this->session->set_flashdata('notification', $message);
        header('Location: ' . site_url('/product/display'));
        exit;
    }

    private function require_admin()
    {
        if ($this->session->userdata('user_role') !== 'admin') {
            show_error('403 Forbidden', 'Administrator access is required for this action.', 'error_general', 403);
            exit;
        }
    }

}