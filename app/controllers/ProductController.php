<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductModel');
        $this->call->library('form_validation');
    }

    // Display all products
    public function index()
    {
        $products = $this->ProductModel->all();

        $data['products'] = $products;
        $data['success'] = $this->session->flashdata('success');

        $this->call->view('products/index', $data);
    }

    // Show Add Product form
    public function create()
    {
        $data['errors'] = '';

        $this->call->view('products/create', $data);
    }

    // Save new product
    public function store()
    {
        if ($this->form_validation->validate([
            'product_name|Product Name' => 'required|max_length[150]',
            'description|Description' => 'required',
            'price|Price' => 'required|numeric|greater_than[0]',
            'quantity|Quantity' => 'required|numeric|greater_than_equal_to[0]'
        ])) {

            $data = [
                'product_name' => $_POST['product_name'],
                'description'  => $_POST['description'],
                'price'        => $_POST['price'],
                'quantity'     => $_POST['quantity']
            ];

            $this->ProductModel->insert($data);

            $this->session->set_flashdata(
                'success',
                'Product added successfully.'
            );

            redirect('/products');

        } else {

            $data['errors'] = $this->form_validation->errors();

            $this->call->view('products/create', $data);
        }
    }

    // Show Edit Product form
    public function edit($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('/products');
            return;
        }

        $data['product'] = $product;
        $data['errors'] = '';

        $this->call->view('products/edit', $data);
    }

    // Update product
    public function update($id)
    {
        if ($this->form_validation->validate([
            'product_name|Product Name' => 'required|max_length[150]',
            'description|Description' => 'required',
            'price|Price' => 'required|numeric|greater_than[0]',
            'quantity|Quantity' => 'required|numeric|greater_than_equal_to[0]'
        ])) {

            $data = [
                'product_name' => $_POST['product_name'],
                'description'  => $_POST['description'],
                'price'        => $_POST['price'],
                'quantity'     => $_POST['quantity']
            ];

            $this->ProductModel->update($id, $data);

            $this->session->set_flashdata(
                'success',
                'Product updated successfully.'
            );

            redirect('/products');

        } else {

            $product = $this->ProductModel->find($id);

            $data['product'] = $product;
            $data['errors'] = $this->form_validation->errors();

            $this->call->view('products/edit', $data);
        }
    }

    // Delete product
    public function delete($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('/products');
            return;
        }

        $this->ProductModel->delete($id);

        $this->session->set_flashdata(
            'success',
            'Product deleted successfully.'
        );

        redirect('/products');
    }
}