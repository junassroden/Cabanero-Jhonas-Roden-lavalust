<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->model('ProductModel');
        $this->call->library('api');
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

        if ($this->form_validation->submitted()) {
            $this->validate_product();

            if ($this->form_validation->run()) {
                $product_name = $this->io->post('product_name');
                $description = $this->io->post('description');
                $price = $this->io->post('price');
                $quantity = $this->io->post('quantity');

                $this->ProductModel->create(
                    $product_name,
                    $description,
                    $price,
                    $quantity
                );

                $this->session->set_flashdata(
                    'notification',
                    'Product added successfully.'
                );

                header('Location: ' . site_url('/product/display'));
                exit;
            }
        }

        $data['errors'] = $this->form_validation->get_errors();

        $this->call->view('product/create', $data);
    }

    public function edit($id)
    {
        $this->require_admin();

        $product = $this->ProductModel->find((int) $id);

        if (!$product) {
            show_404();
            return;
        }

        if ($this->form_validation->submitted()) {
            $this->validate_product();

            if ($this->form_validation->run()) {
                $this->ProductModel->update(
                    (int) $id,
                    $this->io->post('product_name'),
                    $this->io->post('description'),
                    $this->io->post('price'),
                    $this->io->post('quantity')
                );

                $this->session->set_flashdata(
                    'notification',
                    'Product updated successfully.'
                );

                header('Location: ' . site_url('/product/display'));
                exit;
            }
        }

        $data['product'] = $product;
        $data['errors'] = $this->form_validation->get_errors();

        $this->call->view('product/edit', $data);
    }

    public function delete($id)
    {
        $this->require_admin();

        $this->ProductModel->delete((int) $id);

        $this->session->set_flashdata(
            'notification',
            'Product deleted successfully.'
        );

        header('Location: ' . site_url('/product/display'));
        exit;
    }

    public function api_login()
{
    $this->api->require_method('POST');

    $input = $this->api->body();

    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

    if ($username === '' || $password === '') {
        $this->api->respond_error(
            'Username and password are required.',
            422
        );
    }

    $stmt = $this->db->raw(
        'SELECT * FROM users WHERE username = ?',
        [$username]
    );

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        $this->api->respond_error(
            'Invalid username or password.',
            401
        );
    }

    $tokens = $this->api->issue_tokens([
        'id' => $user['id'],
        'role' => $user['role']
    ]);

    $this->api->respond($tokens);
}

    public function api_logout()
    {
        $this->api->require_method('POST');

        $input = $this->api->body();

        $refresh_token = $input['refresh_token'] ?? '';

        if ($refresh_token === '') {
            $this->api->respond_error(
                'Refresh token is required.',
                422
            );
        }

        $this->api->revoke_refresh_token($refresh_token);

        $this->api->respond([
            'message' => 'Logged out successfully.'
        ]);
    }

    public function api_refresh()
    {
        $this->api->require_method('POST');

        $input = $this->api->body();

        $refresh_token = $input['refresh_token'] ?? '';

        if ($refresh_token === '') {
            $this->api->respond_error(
                'Refresh token is required.',
                422
            );
        }

        $this->api->refresh_access_token($refresh_token);
    }

    public function api_index()
    {
        $this->api->require_method('GET');
        $this->api->require_jwt();

        $products = $this->ProductModel->read();

        $this->api->respond([
            'success' => true,
            'data' => $products
        ]);
    }

    public function api_store()
    {
        $this->api->require_method('POST');
        $this->api->require_jwt();

        $data = $this->api->body();

        if (
            empty($data['product_name']) ||
            !isset($data['price']) ||
            !isset($data['quantity'])
        ) {
            $this->api->respond_error(
                'Product name, price, and quantity are required.',
                422
            );
        }

        $this->ProductModel->create(
            $data['product_name'],
            $data['description'] ?? '',
            $data['price'],
            $data['quantity']
        );

        $this->api->respond([
            'success' => true,
            'message' => 'Product created successfully.'
        ], 201);
    }

    public function api_update($id)
    {
        $this->api->require_method('PUT');
        $this->api->require_jwt();

        $id = (int) $id;

        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $data = $this->api->body();

        if (
            empty($data['product_name']) ||
            !isset($data['price']) ||
            !isset($data['quantity'])
        ) {
            $this->api->respond_error(
                'Product name, price, and quantity are required.',
                422
            );
        }

        $this->ProductModel->update(
            $id,
            $data['product_name'],
            $data['description'] ?? '',
            $data['price'],
            $data['quantity']
        );

        $this->api->respond([
            'success' => true,
            'message' => 'Product updated successfully.'
        ]);
    }

    public function api_delete($id)
    {
        $this->api->require_method('DELETE');
        $this->api->require_jwt();

        $id = (int) $id;

        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $this->ProductModel->delete($id);

        $this->api->respond([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }

    private function validate_product()
    {
        $this->form_validation
            ->name('product_name')
            ->required()
            ->alpha_numeric_space()
            ->name('description')
            ->required()
            ->max_length(255)
            ->name('price')
            ->required()
            ->numeric()
            ->name('quantity')
            ->required()
            ->numeric();
    }

    private function require_admin()
    {
        if ($this->session->userdata('user_role') !== 'admin') {
            show_error(
                '403 Forbidden',
                'Administrator access is required for this action.',
                'error_general',
                403
            );

            exit;
        }
    }
}