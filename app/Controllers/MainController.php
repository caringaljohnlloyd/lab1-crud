<?php

namespace App\Controllers;
use App\Models\MainModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    
    public function index()
    {
        $CategoryModel = new CategoryModel();
        $data['productcategories'] = $CategoryModel->findAll();
    
        $productModel = new MainModel();
        $data['product'] = $productModel->findAll();
    
        return view('main', $data);
    }
    
    public function edit($id)
    {
        $CategoryModel = new CategoryModel();
        $data['productcategories'] = $CategoryModel->findAll();
        $main = new MainModel();
        $data['product'] = $main->find($id);
    
        if (empty($data['product'])) {
            echo 'Product not found.';
        } else {
            return view('edit', $data); 
        }
    }   
    public function save()
    {
        $id = $this->request->getVar('ID');
        $data = [
            'ID' => $id,
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription' => $this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity' => $this->request->getVar('ProductQuantity'),
            'ProductPrice' => $this->request->getVar('ProductPrice'),

        ];
        $CategoryModel = new CategoryModel();
        $main = new MainModel();
    
        if ($id != null) {
           
            $main->set($data)->where('ID', $id)->update();
        } else {
           
            $main->insert($data);
        }
        $main = new MainModel();
        $CategoryModel = new CategoryModel();
        $data['productcategories'] = $CategoryModel->findAll();
        $data['product'] = $main->findAll();
        return view('main', $data);   
    }
    public function delete($id){
        $main= new MainModel();
        $CategoryModel = new CategoryModel();
        $data['productcategories'] = $CategoryModel->findAll();
        $main->where('ID', $id)->delete();      
        $data['product'] = $main->findAll();
        return view('main', $data); 
    }

public function add()
{
    $CategoryModel = new CategoryModel();

    if ($this->request->getMethod() === 'post') {
        $data = [
            'ProductCategory' => $this->request->getPost('ProductCategory')
        ];
        $CategoryModel->insert($data);
    }
    $data['productcategories'] = $CategoryModel->findAll();
    return view('add', $data);
}
public function deletecateg($id)
    {
        $CategoryModel = new CategoryModel();
        $category = $CategoryModel->find($id);
        if (!$category) {
            return redirect()->to('add')->with('error', 'Category not found.');
        }
        
        $CategoryModel->delete($id);
        return redirect()->to('add')->with('success', 'Category deleted successfully.');
    }
    public function back(){
        $CategoryModel = new CategoryModel();
        $data['productcategories'] = $CategoryModel->findAll();
    
        $productModel = new MainModel();
        $data['product'] = $productModel->findAll();
    
        return view('main', $data);

    }
}
