<?php

namespace App\Controllers;
use App\Models\MainModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    protected $CategoryModel;
    protected $main;

    public function __construct()
    {
        $this->CategoryModel = new CategoryModel();
        $this->main = new MainModel();
    }
    
    public function index()
    {
        $data['productcategories'] = $this->CategoryModel->findAll();
        $data['product'] = $this->main->findAll();
    
        return view('main', $data);
    }
    
    public function edit($id)
    {
        $data['productcategories'] = $this->CategoryModel->findAll();
        $data['product'] = $this->main->find($id);
    
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
    
        if ($id != null) {
            $this->main->set($data)->where('ID', $id)->update();
        } else {
            $this->main->insert($data);
        }

        $data['productcategories'] = $this->CategoryModel->findAll();
        $data['product'] = $this->main->findAll();
        return view('main', $data);   
    }
    
    public function delete($id){
        $this->main->where('ID', $id)->delete();      
        $data['productcategories'] = $this->CategoryModel->findAll();
        $data['product'] = $this->main->findAll();
        return view('main', $data); 
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'ProductCategory' => $this->request->getPost('ProductCategory')
            ];
            $this->CategoryModel->insert($data);
        }
        $data['productcategories'] = $this->CategoryModel->findAll();
        return view('add', $data);
    }

    public function deletecateg($id)
    {
        $category = $this->CategoryModel->find($id);
        if (!$category) {
            return redirect()->to('add')->with('error', 'Category not found.');
        }
        
        $this->CategoryModel->delete($id);
        return redirect()->to('add')->with('success', 'Category deleted successfully.');
    }
    
    public function back(){
        $data['productcategories'] = $this->CategoryModel->findAll();
        $data['product'] = $this->main->findAll();
        return view('main', $data);
    }
}
