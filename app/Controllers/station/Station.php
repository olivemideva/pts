<?php

namespace App\Controllers\station;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\prisonerModel;
use App\Models\detaineeModel;
use App\Models\punishmentModel;
use App\Models\reviewModel;

class Station extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function index()
    {
        return view('station/station');
    }
    public function view_detainees()
    {
        $detaineeModel = new \App\Models\detaineeModel();

        $data['detainees'] = $detaineeModel->orderBy('detainee_id', 'DESC')->paginate(15);

        $data['pagination_link'] = $detaineeModel->pager;

        return view('station/view-detainees', $data);
    }
    public function change_password()
    {
        return view('station/change-password');
    }
    public function add_detainee()
    {
        return view('station/add_detainee');
    }
    public function new_detainee()
    {
        //enter new information to db
        $firstname = $this->request->getPost('first_name');
        $lastname = $this->request->getPost('last_name');
        $age = $this->request->getPost('age');
        $arrested_on = $this->request->getPost('arrested_on');
        $gender = $this->request->getPost('gender');
        $arrested_by = $this->request->getPost('arrested_by');
        $arrested_for = $this->request->getPost('arrested_for');
        $arrested_time = $this->request->getPost('arrested_time');
        $posessions = $this->request->getPost('posessions');
        
        $values = [
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'age'=>$age,
            'arrested_on'=>$arrested_on,
            'gender'=>$gender,
            'arrested_by'=>$arrested_by,
            'arrested_for'=>$arrested_for,
            'arrested_time'=>$arrested_time,
            'posessions'=>$posessions,
        ];
        
        $detaineeModel = new \App\Models\detaineeModel();
        $query = $detaineeModel->insert($values);
        if(!$query){
            return redirect()->back()->with('fail', 'Something went wrong');
        }else{
            return redirect()->to('add_detainees')->with('success', 'New detainee added successfully');
        }
        
    }
    
}
