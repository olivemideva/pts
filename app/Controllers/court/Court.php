<?php

namespace App\Controllers\court;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\prisonerModel;
use App\Models\detaineeModel;
use App\Models\punishmentModel;
use App\Models\reviewModel;

class Court extends BaseController
{
    public function index()
    {
        return view('court/court');
    }
    public function view_defendants()
    {
        $detaineeModel = new \App\Models\detaineeModel();

        $data['detainees'] = $detaineeModel->orderBy('detainee_id', 'DESC')->where('is_guilty', 2)->paginate(15);

        $data['pagination_link'] = $detaineeModel->pager;

        return view('court/view-defendants', $data);
    }
    public function change_password()
    {
        return view('court/change-password');
    }
    public function fetch_detainee($id)
    {
        $defendants = new \App\Models\detaineeModel();

        $data['defendants'] = $defendants->where('detainee_id' , $id)->first();  

        //echo print_r($data);
        return view('court/add_info', $data);
    }
    public function add_info()
    {
        $detaineeModel = new \App\Models\detaineeModel();

        $id = $this->request->getPost('detainee_id');

        $is_guilty = $this->request->getPost('is_guilty');

        $data = [
            'is_guilty'=>$is_guilty,
        ];

        $detaineeModel->update($id, $data);

        $punishment = $this->request->getPost('punishment');
        $sentence = $this->request->getPost('sentence');
        $fine = $this->request->getPost('fine');
        $community_service = $this->request->getPost('community_service');

        $values = [
            'defendant'=>$id,
            'punishment'=>$punishment,
            'sentence'=>$sentence,
            'fine'=>$fine,
            'community_service'=>$community_service,
        ];
        $punishmentModel = new \App\Models\punishmentModel();
        $punishmentModel->insert($values);

        $session = \Config\Services::session();

        if(!$session){
            return redirect()->back()->with('fail', 'Something went wrong');
        }else{
            return redirect()->to('view_defendants')->with('success', 'Information about defendant added successfully');
        }

    }
}
