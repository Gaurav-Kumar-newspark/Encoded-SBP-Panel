<?php 
namespace App\Controllers;
use App\Models\Advertisementmodel;
use App\Models\Firebasedevicemodel;
class Dashboard extends BaseController{
    public function dashboard()
    {
        $data = array();
        $advertisementmodel = new Advertisementmodel();
        $firebasedevicemodel = new Firebasedevicemodel();
        $data["totalapis"] = $this->apimodel->countAllResults();
        $data["totaladdannouncements"] = $this->addannouncements->countAllResults();
        $data["totalnotifications"] = $this->notificationsmodel->where("save","1")->countAllResults();
        $data["totaldevices"] = $firebasedevicemodel->countAllResults();
        $data["totaladvertisement"] = $advertisementmodel->countAllResults();
        echo view('includes/head',array("thiscontrol" => $this));
        echo view('includes/header',array("thiscontrol" => $this,"menuactive" => "dashboard"));
        echo view('dashboard',$data);
        echo view('includes/footer');
    }
}

?>