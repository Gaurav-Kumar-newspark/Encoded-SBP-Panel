<?php 
namespace App\Controllers;
class Login extends BaseController
{
    // public function index()
    // {
    //     return view("login");
    // }
    public function login()
    {
        $ipaddress =  $this->request->getIPAddress();
        $currenttime = strtotime(date("Y-m-d H:i:s"));
      
        /************************* Unbanned Ipaddress after 24 hours ***************************/
        $query = $this->ipbannedmodel->where('ip', $ipaddress)->countAllResults();
        if($query > 0)
        {
            $query = $this->ipbannedmodel->where('ip', $ipaddress)->get()->getResult();
            $blockedon = (isset($query[0]->created_at) && $query[0]->created_at != "")?$query[0]->created_at:"";
            $lastblockedtime = strtotime($blockedon);
            $hoursdiff = ceil(round($currenttime - $lastblockedtime)/3600); 
            if($hoursdiff >= 24)
            {
                $this->loginattemptsmodel->where('ip', $ipaddress)->delete();
                $this->ipbannedmodel->where('ip', $ipaddress)->delete();
            }
        }    
        /************************* Unbanned Ipaddress after 24 hours ******************/



        /********************* Check Ip Banned Or Not ***************************/
        $count = $this->ipbannedmodel->where('ip', $ipaddress)->countAllResults();
        if($count > 0)
        {
            /*$emaildata = array(
                            "subject" => $ipaddress." IP Address is blocked",
                            "message" => $ipaddress." IP address is blocked due to maximum numbers of wrong attempts on ".date("Y-m-d h:i:s")
            );
            $this->sendmail($emaildata);*/
            return $this->response->redirect(site_url('/banned'));
        } 
        /******************* End Here *****************************************/
        
        
        if(isset($_POST['loginbtn']))
        {                 
            $input = $this->validate([               
                    'email' => 'required|valid_email',
                    'password' => 'required',
                ]
                
            );
           
            if (!$input) 
            {
                $error_msg["error"] = $this->validator->getErrors();  
                if($error_msg["error"]["g-recaptcha-response"]){
                    $error_msg["error"]["g-recaptcha-response"] = "Please Confirm You Are Human Or Robot";
                }
                $error_msg["thiscontrol"] = $this;          
                return view('login', $error_msg);
            } 
            else 
            {       
                    
        
                $email = $this->request->getPost('email');
                $password  = $this->request->getPost('password');
                $loginmodel = $this->loginmodel;
                $count = $loginmodel->where("email",$email)->countAllResults();
                if($count > 0)
                {
                    $query = $loginmodel->where("email",$email)->get()->getResultArray();
                    $org_password = $this->encrypter->decrypt(base64_decode($query[0]['password']));
                    if($password == $org_password)
                    {
                        $this->session->set('firstname',$query[0]['firstname']);
                        $this->session->set('adminid',$query[0]['id']);
                        if(!empty($_POST["Remember"])) 
                        {
                            setcookie ("email",$email,time()+ 2592000);
                            setcookie ("password",$query[0]['password'],time()+ 2592000);
                        }
                        else
                        {
                            setcookie ("email","");
                            setcookie ("password","");
                        }
                        $this->loginattemptsmodel->where('ip', $ipaddress)->delete();
                        $this->ipbannedmodel->where('ip', $ipaddress)->delete();
                        return redirect()->to('/dashboard');
                    }
                    else{
                        $data['Error'] = "Login Failed!.. Invalid  Login Details"; 
                    }
                }
                else
                {
                  $data['Error'] = "Login Failed!.. Invalid  Login Details";
                
                }

                if(!empty($data['Error']))
                {

                    $TotalAttempts = 0;
                    $checkattemptsexits = $this->loginattemptsmodel->where('ip', $ipaddress)->countAllResults();
                    if($checkattemptsexits > 0)
                    {
                        $query = $this->loginattemptsmodel->where('ip', $ipaddress)->get()->getResult();                       
                        if(isset($query[0]->attempts) && $query[0]->attempts != "")
                        {
                            $TotalAttempts =  $query[0]->attempts;                             
                        }
                    }


                    $NextAttempts = $TotalAttempts+1;
                    if($TotalAttempts == 0)
                    {       
                        $data = array('ip' => $ipaddress,'attempts' => $NextAttempts);
                        $this->loginattemptsmodel->insert($data);


                        $message  = "Username".": ".$email."\r\n";
                        $message .= "Password".": ".$password."\r\n"; 
                        $message .= "IP".": ".$ipaddress."\r\n"; 
                        $emaildata = array(
                            
                            "subject" => "Wrong attempt from this IP address ".$ipaddress,
                            "message" => $message,
                        );
                        $this->sendmail($emaildata);
                        $data["Error"] = "invalid login details";       
                    }
                    else
                    {
                        $this->loginattemptsmodel->where('ip', $ipaddress)->set('attempts',$NextAttempts)->update();
                        $data["Error"] = "Be carefull one more wrong attempt will block you";
                        $message  = "Username".": ".$email."\r\n";
                        $message .= "Password".": ".$password."\r\n"; 
                        $message .= "IP".": ".$ipaddress."\r\n";
                        $emaildata = array(
                            
                            "subject" => "Wrong attempt from this IP address " . $ipaddress,
                            "message" => $message,
                        );
                        $this->sendmail($emaildata);
                    }

                    //total attempts are greater then 3
                    if($NextAttempts > 2)
                    {
                   
                        $data = array('ip' => $ipaddress,'created_at' => date("Y-m-d H:i:s"));                        
                        $this->ipbannedmodel->set($data)->insert(); 
                        $query = $this->ipbannedmodel->where('ip', $ipaddress)->get()->getResult();
                        if(!empty($query))
                        {
                            return redirect()->to(base_url());
                        } 
                    }
                }
            
            }

            //echo "<pre>";print_r($data);die();
            $data["thiscontrol"] = $this;
            echo view("login",$data);
            exit();

        }else{
            
            $session = session();
            if($session->get('adminid'))
            {
                return redirect()->to('/dashboard');
            }
            else{
                
                $data["thiscontrol"] = $this;
                echo view("login",$data);
                exit();
            }
        }
    } 
}
?>