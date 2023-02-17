<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    private $_data;
    private $_category;
    private $_validator;
    private $_request;
    private $_messages;
    private $_rules;

    public function __construct(Category $category, Request $request)
    {
        $this->_category = $category;
        $this->_request = $request;

        $this->_data['categories'] = $this->_category->with('children')->where('parent_id', 0)->get();
    }

    protected function _validation() {
        $this->_validator = Validator::make($this->_request->all(), $this->_rules, $this->_messages = []);
        if ($this->_validator->fails()) {
            return redirect()->back()->withInput($this->_request->all())->withErrors($this->_validator->errors());
        }


    }
    public function index() {


        //$this->_data['category'] =
        //dd($this->_data);
        return view('admin-dashboard', $this->_data);
    }

    public function addCategory(Request $request) {
        try {
            if($this->_request->isMethod('post')) {
                $this->_rules = [
                    "name"  => "required|string|max:191",
                ];
                $this->_validation();
                $this->_category->create([
                    'name' => $this->_request->name,
                    'parent_id' => ($this->_request->parent_id != null) ? $this->_request->parent_id : (int) 0,
                ]);
                return redirect(route('add-category'))->with('message', 'Category added successfully');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
           // dd();
            return redirect(route('add-category'))->with('message', $ex->getMessage());
        }


        return view('category.add', $this->_data);
    }

    public function editCategory($id) {
        $category = $this->_category->find($id);
        if(!$category) {
            return redirect(route('add-category'))->with('warning', 'Category not found');
        }
        $this->_data['category'] = $category;
        if($this->_request->isMethod('post')) {
            $this->_rules = [
                "name"  => "required|string|max:191",
            ];
            $this->_validation();
            $this->_category->update([
                'name' => $this->_request->name,
                'parent_id' => ($this->_request->parent_id != null) ? $this->_request->parent_id : (int) 0,
            ], ['id' => $id]);
            return redirect(route('edit-category', ['id' => $category->id]))->with('message', 'Category updated successfully');
        }
        return view('category.edit', $this->_data);
    }

    public function deleteCategory($id) {
        $this->_category = $this->_category->find($id);
        if(!$this->_category) {
            throw new Exception('Category not found');
        }

        $this->_category->delete($id);
        return redirect(route('admin-dashboard'))->with('message', 'Category removed successfully');
    }
}
