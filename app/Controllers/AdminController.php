<?php

namespace App\Controllers;
use App\Models\FootwearModel;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
  public function index()
  {
      $footwearModel = new FootwearModel();
      $data['products'] = $footwearModel->findAll(); // Retrieve all products from the database
      $data['successMessage'] = session()->getFlashdata('successMessage'); // Get success message from flashdata
      $data['errorMessage'] = session()->getFlashdata('errorMessage'); // Get error message from flashdata

      return view('admins/insert', $data); // Load the "admins/add_product" view and pass the product data and messages
  }

  public function FootwearProduct()
  {
      // Handle the form submission to add a new product to the database
      if ($this->request->getMethod() === 'post') {
          $footwearModel = new FootwearModel();

          // Validate the form data here if needed
          // For simplicity, we assume the data is valid in this example

          // Upload product image

          $data = [
              'name' => $this->request->getPost('name'),
              'price' => $this->request->getPost('price'),
              'quantity' => $this->request->getPost('quantity'),
          ];

          if ($footwearModel->insert($data)) {
              // Product added successfully
              session()->setFlashdata('successMessage', 'Product added successfully');
          } else {
              // Error occurred while adding the product
              session()->setFlashdata('errorMessage', 'Failed to add the product');
          }
      }

      // Redirect back to the admin page
      return redirect()->to('/footwear');
  }


  public function deleteProduct($id)
{
    // Load the ProductModel
    $footwearModel = new \App\Models\FootwearModel();

    // Check if the product exists
    $product = $footwearModel->find($id);
    if (!$product) {
        // Handle the case where the product does not exist (e.g., show an error message)
        session()->setFlashdata('errorMessage', 'Product not found.');
    } else {
        // Perform the deletion
        if ($footwearModel->delete($id)) {
            // Product deleted successfully
            session()->setFlashdata('successMessage', 'Product deleted successfully');
        } else {
            // Error occurred while deleting
            session()->setFlashdata('errorMessage', 'Failed to delete the product');
        }
    }

    // Redirect back to the admin page
    return redirect()->to('/footwear');
}


  public function editfootwear()
  {
      // Get the product ID from the query string
      $id = $this->request->getGet('id');

      // Load the ProductModel
      $footwearModel = new \App\Models\FootwearModel();

      // Fetch the product details by ID
      $product = $footwearModel->find($id);

      if (!$product) {
          // Handle the case where the product does not exist (e.g., show an error message)
          session()->setFlashdata('errorMessage', 'Product not found.');
          return redirect()->to('/add');
      }

      // Pass the product data to the "Edit" view
      $data['product'] = $product;

      return view('admins/editfootwear', $data);
  }

  public function updatefootwearProduct($id)
  {
      // Load the ProductModel
      $footwearModel = new \App\Models\FootwearModel();

      // Fetch the product by ID
      $product = $footwearModel->find($id);

      if (!$product) {
          // Handle the case where the product does not exist (e.g., show an error message)
          session()->setFlashdata('errorMessage', 'Product not found.');
          return redirect()->to('/footwear');
      }

      // Handle the form submission to update the product
      if ($this->request->getMethod() === 'post') {
          // Validate and update the product data here

          // Example update code:
          $data = [
              'name' => $this->request->getPost('name'),
              'price' => $this->request->getPost('price'),
                'quantity' => $this->request->getPost('quantity'),
          ];


          // Check if a new image file is uploaded
  $newPicture = $this->request->getFile('image_url');
  if ($newPicture !== null && $newPicture->isValid()) {
      // Delete the old image file (if necessary)
      // Upload and store the new image file
      $newPicture->move(ROOTPATH . 'public/uploads');
      $data['image_url'] = 'uploads/' . $newPicture->getName();
  }


          if ($footwearModel->update($id, $data)) {
              // Product updated successfully
              session()->setFlashdata('successMessage', 'Product updated successfully');
          } else {
              // Error occurred while updating the product
              session()->setFlashdata('errorMessage', 'Failed to update the product');
          }
      }

      // Redirect back to the edit page
      return redirect()->to("/footwear");
  }

  public function products()
  {
      $footwearModel = new FootwearModel();
      $data['products'] = $footwearModel->findAll(); // Retrieve all products from the database

      return view('admins/FootwearProduct', $data); // Load the "admins/products" view and pass the product data
  }
}
