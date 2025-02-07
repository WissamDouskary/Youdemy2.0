<?php

class User extends Controller {

    private $usermodal;

    public function __construct(){
        $this->usermodal = $this->model('UserModel');
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // handling form
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $status = ($_POST['Roleselect'] == 2) ? 'waiting' : 'active';

            if(empty($nom) || empty($prenom) || empty($email) || empty($password)){
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Please fill all the fields'
                ];
                redirect('User/register');
                exit();
            }

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'role_id' => $_POST['Roleselect'],
                'status' => $status,
            ];
            if($this->usermodal->register($data)){
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Account Created success, go to login :)'
                ];
                redirect('User/login');
                exit();
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Something went wrong. Please try again.'
                ];
            }
            $this->view('User/register', $data);

        }
        else{
            $data = [
                'nom' =>'',
                'prenom' => '',
                'email' => '',
                'password' =>'',
                'role_id' => '',
                'status' => ''
            ];
            $this->view('User/register', $data);
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            if(empty($email) || empty($password)){
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Please fill all the fields'
                ];
                redirect('User/login');
                exit();
            }
            $data = [
                'email' => $email,
                'password' => $password,
            ];

            if(!$this->usermodal->findByEmail($data['email'])){
                // user found
            }else{
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'This email is not registered.'
                ];
                redirect('User/login');
                exit();
            }
            if(isset($data['email']) && isset($data['password'])) {
                $userloggedin = $this->usermodal->login($data['email'], $data['password']);

                if ($userloggedin) {

                    // save user important data in session
                    $_SESSION['user_id'] = $userloggedin->user_id;
                    $_SESSION['nom'] = $userloggedin->nom;
                    $_SESSION['prenom'] = $userloggedin->prenom;
                    $_SESSION['user'] = $userloggedin;
                    $_SESSION['role'] = $userloggedin->role_id;
                    $_SESSION['status'] = $userloggedin->status;
                    $_SESSION['email'] = $userloggedin->email;

                    // redirect after roles
                    if($userloggedin->status == 'active'){
                        if($userloggedin->role_id == 1){
                            $_SESSION['role'] = 'admin';
                            $_SESSION['message'] = [
                                'type' => 'success',
                                'text' => 'Welcome Admin'
                            ];
                            redirect('pages/admindash');
                            exit();
                        }else if ($userloggedin->role_id == 2){
                            $_SESSION['role'] = 'teacher';
                            $_SESSION['message'] = [
                                'type' => 'success',
                                'text' => 'Welcome Teacher'
                            ];
                            redirect('pages/mainprofdash');
                            exit();
                        } else if ($userloggedin->role_id == 3){
                            $_SESSION['role'] = 'student';
                            $_SESSION['message'] = [
                                'type' => 'success',
                                'text' => 'You are now logged in.'
                            ];
                            redirect('pages/index');
                            exit();
                        }
                    } else {
                        $_SESSION['message'] = [
                            'type' => 'error',
                            'text' => 'Your account is not activated. wait for admin approval.'
                        ];
                        redirect('User/login');
                        exit();
                    }
                }else{
                    $_SESSION['message'] = [
                        'type' => 'error',
                        'text' => 'password is wrong!'
                    ];
                    redirect('User/login');
                    exit();
                }
            } else {
                $this->view('User/login', $data);
            }

        }else{
            $data = [
                'email' => '',
                'password' => '',
            ];
        }
        $this->view('User/login');
    }

    public function logout(){
        session_start();
        session_destroy();
        redirect('/User/register');
        exit();
    }
}