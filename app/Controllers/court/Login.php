<?php

namespace App\Controllers\court;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Libraries\Hash;

class Login extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        return view('court/login');
    }
    public function login()
    {
                //validation
                $validation = $this->validate([
                    'email'=>[
                        'rules'=>'required|valid_email|is_not_unique[users.email]',
                        'errors'=>[
                            'required'=>'Email is required',
                            'valid_email'=>'Enter a valid email address',
                            'is_not_unique'=>'This email is not registered'
                        ]
                        ],
                    'password'=>[
                        'rules'=>'required|min_length[5]|max_length[12]',
                        'errors'=>[
                            'required'=>'Password is required',
                            'min_length'=>'Password must have atleast 5 characters',
                            'max_length'=>'Password must not exceed 12 characters'
                        ]
                        ],
                        ]);
        
                if(!$validation){
                    return view('court/login',['validation'=>$this->validator]);
                }else{
                    //get user info according to requested email address
                    $email = $this->request->getPost('email');
                    $password = $this->request->getPost('password');
                    $userModel = new \App\Models\userModel();
                    $user_info =$userModel->where('email', $email)->first();
                    // $check_password = Hash::check($password, $user_info['password']);
        
                    if($password!=$user_info['password']){
                        session()->setFlashdata('fail', 'Incorrect password');
                        return redirect()->to('login.php')->withInput();
                    }else{
                        if($user_info['role'] == 2){
                            $username = $user_info['first_name'];
                            session()->set('loggedUser', $username);
                            return redirect()->to('court_home');
        
                        }else{
                            echo "<script>alert('Oooops! Only authorized personell can access this site.')</script>";
                        }
                    }
                }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('court_login');
    }
}