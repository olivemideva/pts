<?php

namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\roleModel;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/admin');
    }
    public function user_reg()
    {
        return view('admin/admin_reg');
    }
    public function change_password()
    {
        return view('admin/change-password');
    }
    public function manage_users()
    {
        $userModel = new \App\Models\userModel();
        $role = new \App\Models\roleModel();

        $data['users'] = json_decode(json_encode($role->join('users', 'users.role=role_id')->paginate(10)),true);

        $data['pagination_link'] = $userModel->pager;

        return view('admin/manage_users', $data);
    }
    // Function to generate password from 
    // given string
    function generate_password($str, $len = 0) {
      
        // Variable $pass to store password
        $pass = "";
       
        // Variable $str_length to store 
        // length of the given string
        $str_length = strlen($str);
    
        // Check if the $len is not provided
        // or $len is greater than $str_length
        // then assign $str_length to $len
        if($len == 0 || $len > $str_length){
            $len = $str_length;
        }
    
        // Iterate $len times so that the 
        // resulting string's length is 
        // equal to $len
        for($i = 0;  $i < $len; $i++){
           
            // Concatenate random character 
            // from $str with $pass
            $pass .=  $str[rand(0, $str_length)];
         }
        return $pass;
     }
    public function add_user()
    {
        $validation = $this->validate([
            'first_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Firstname is required'
                ]
                ],
            'last_name'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Lastname is required'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'Email is required',
                    'valid_email'=>'Enter a valid email address',
                    'is_unique'=>'Email already taken'
                ]
                ],
            'national_id'=>[
                'rules'=>'required|max_length[8]|min_length[6]|is_unique[users.national_id]',
                'errors'=>[
                    'required'=>'National ID is required',
                    'is_unique'=>'National ID is already taken',
                    'min_length'=>'National ID must have atleast 6 digits',
                    'max_length'=>'National ID must not exceed 8 digits'
                ]
            ],
            'mobile'=>[
                'rules'=>'required|min_length[10]|max_length[10]|is_unique[users.mobile]',
                'errors'=>[
                    'required'=>'Mobile number is required',
                    'is_unique'=>'Mobile number is already taken',
                    'min_length'=>'Mobile number must have atleast 10 digits',
                    'max_length'=>'Mobile number must not exceed 10 digits'
                ]
            ],
            'gender'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Please pick your gender'
                ]
                ],
            'role'=>[
                'rules' =>'required',
                'errors'=>[
                    'required'=>'Role is required'
                ]
                ],
                ]);

        if(!$validation){
            return view('user_registration',['validation'=>$this->validator]);
        }else{
            //enter register information to db
            $firstname = $this->request->getPost('first_name');
            $lastname = $this->request->getPost('last_name');
            $othername = $this->request->getPost('other_name');
            $email = $this->request->getPost('email');
            $national_id = $this->request->getPost('national_id');
            $mobile = $this->request->getPost('mobile');
            $gender = $this->request->getPost('gender');
            $role = $this->request->getPost('role');
            // Get password of length 15 from
            // the given string
            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%!^&*";
            $password = $this->generate_password($str, 15);
        
            $values = [
                'first_name_u'=>$firstname,
                'last_name_u'=>$lastname,
                'other_name'=>$othername,
                'email'=>$email,
                'national_id'=>$national_id,
                'mobile'=>$mobile,
                'gender_u'=>$gender,
                'role'=>$role,
                'password'=>$password,
            ];
        
            $userModel = new \App\Models\userModel();
            $query = $userModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong. Please try again.');
            }else{
                return redirect()->to('user_registration')->with('success', 'You have added a new user successfully');
            }
        }          

    }
   
}
