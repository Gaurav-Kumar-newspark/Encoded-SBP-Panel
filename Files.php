<?php 
namespace App\Controllers;
class Files extends BaseController{

    public function deletefiledata(){

        //here should be condition to check admin logged in 
        $session = Session();
        $currentadminid = $session->get("adminid");
        if(isset($currentadminid) && !empty($currentadminid))
        {
            $fileid = $this->request->getPost("fileid");
            $deletecodesfirst = $this->codemodel->deletefilescodes($fileid);
            $deletefilesdata = $this->filedatamodel->deletefilesdata($fileid);
            echo json_encode($deletefilesdata);
            die();
        }

    }
    public function editfiledataprocessing(){

        //here should be condition to check admin logged in 
        $session = Session();
        $currentadminid = $session->get("adminid");
        if(isset($currentadminid) && !empty($currentadminid))
        {


            $returnData = array();
            $validationRule = array();
            $errorsdata = array();
            $filetype = "0";
            $filecondition = array("jpg","gif","png","webp");
            $uploadUrgent = "";
            $removecurrentfile = "";


            $filedataid = (!empty($this->request->getPost("filedataid")))?$this->request->getPost("filedataid"):"";


            //CurrentData From DB
             $getdata = $this->filedatamodel->where("id", $filedataid)->get()->getResult();
             $currentFileType = (isset($getdata[0]->filetype) && !empty($getdata[0]->filetype))?$getdata[0]->filetype:"0";
             $currentfilepath = (isset($getdata[0]->filepath) && !empty($getdata[0]->filepath))?$getdata[0]->filepath:"";



            $title = (!empty($this->request->getPost("title")))?$this->request->getPost("title"):"";
            $group = (!empty($this->request->getPost("group"))) ? $this->request->getPost("group") : "";
            $status = (!empty($this->request->getPost("status"))) ? $this->request->getPost("status") : "";
            $expiredate = (!empty($this->request->getPost("expiredate"))) ? $this->request->getPost("expiredate") : "";

              if($expiredate != "")
                {
                    $expiredate = str_replace('/', '-', $expiredate);
                    $expiredate = date("Y-m-d",strtotime($expiredate));
                }
            
            $uploadfileradio = (!empty($this->request->getPost("uploadfileradio")))?$this->request->getPost("uploadfileradio"):"";
            $filepath = (!empty($this->request->getPost("filepath")))?$this->request->getPost("filepath"):"";
          
            
            if($uploadfileradio == "externallink")
            {
                $filetype = "1";
                $validationRule["filepath"] = array('label' => 'External file path', 'rules' => 'required');
                if($currentFileType == "0")
                {
                    $removecurrentfile = "yes";
                }
            }
            else
            {
                if($currentFileType == "1")
                {
                    $validationRule["filename"] = array('label' => 'M3U file','rules' => 'uploaded[filename]');
                    $uploadUrgent = "yes";
                }
                else
                {
                    $filetype = "0";
                    if (empty($_FILES['filename']['name'])) {
                        $filepath = (isset($getdata[0]->filepath) && !empty($getdata[0]->filepath))?$getdata[0]->filepath:"";
                    }
                    else
                    {
                        $uploadUrgent = "yes";
                        $removecurrentfile = "yes";
                    }
                }
            }

             //Till here default validation rules will work 
            if (!$this->validate($validationRule)) {
                $errorsdata = $this->validator->getErrors();
            }


            if($uploadUrgent == "yes")
            {
                $filetoupload = $this->request->getFile('filename');
                $filetoupload->getClientExtension();
                if(!in_array($filetoupload->getClientExtension(), $filecondition))
                {
                    if(!isset($errorsdata["filename"]))
                    {
                       $errorsdata["filename"] = "Only M3U file is allowed to upload!"; 
                    }
                }
            }

            if(!empty($errorsdata))
            {
                $returnData["result"] = "error";
                $returnData["data"] = $errorsdata;
               echo json_encode($returnData);die();   
            }
            else
            {
                $updatedata = array();
                if($uploadUrgent == "yes")
                {
                   $filename = $filetoupload->getRandomName();
                    $path = getcwd();
                    $uploadpath = $path . "/uploads/M3U";
                    $filetoupload->move($uploadpath, $filename);
                    if ($filetoupload->hasMoved()) {
                        $filepath = $filename;
                    }
                    else
                    {
                        $errorsdata["filename"] = "Unable to upload file"; 
                        $returnData["result"] = "error";
                        $returnData["data"] = $errorsdata;
                        echo json_encode($returnData);die(); 
                    }
                }


                if($removecurrentfile == "yes" && $currentfilepath != "")
                {   
                    $path = getcwd();
                    $fullfilepath = $path . "/uploads/M3U/".$currentfilepath;
                    if(file_exists($fullfilepath))
                    {
                        unlink($fullfilepath);
                    }
                }       

                
                $updatedata["title"] = $title;
                $updatedata["group_id"] = $group;
                $updatedata["filepath"] = $filepath;
                $updatedata["filetype"] = $filetype;
                $updatedata["status"] = $status;
                $updatedata["status"] = $status;
                $updatedata["expiry_date"] = $expiredate;
                $updatedata["created_by"] = $currentadminid;
                $updatedata["updated_on"] = date("Y-m-d");
                $customupdate = $this->filedatamodel->updatecustom($updatedata,$filedataid);
                echo json_encode($customupdate);die();
            }   
            die();



        /*
            $returnData = array();
            $validationRule = array();
            $errorsdata = array();
            $filetype = "";
            $filecondition = array("m3u","M3U");


            $title = (!empty($this->request->getPost("title")))?$this->request->getPost("title"):"";
            $group = (!empty($this->request->getPost("group"))) ? $this->request->getPost("group") : "";
            $status = (!empty($this->request->getPost("status"))) ? $this->request->getPost("status") : "";
            $expiredate = (!empty($this->request->getPost("expiredate"))) ? $this->request->getPost("expiredate") : "";
            $no_of_codes = (!empty($this->request->getPost("no_of_codes")))?$this->request->getPost("no_of_codes"):"";
            $uploadfileradio = (!empty($this->request->getPost("uploadfileradio")))?$this->request->getPost("uploadfileradio"):"";
            $filepath = (!empty($this->request->getPost("filepath")))?$this->request->getPost("filepath"):"";
            $codesformat = (!empty($this->request->getPost("codesformat")))?$this->request->getPost("codesformat"):"d";
            $codes_length = (!empty($this->request->getPost("codes_length")))?$this->request->getPost("codes_length"):"10";




            if($uploadfileradio == "uploadfile")
            {
                $filetype = "0";
                $validationRule["filename"] = array('label' => 'M3U file','rules' => 'uploaded[filename]');
            }
            elseif($uploadfileradio == "externallink")
            {
                $filetype = "1";
                $validationRule["filepath"] = array('label' => 'External file path', 'rules' => 'required');
            }

            $validationRule["no_of_codes"] = array('label' => 'Number of codes', 'rules' => 'required');

            //Till here default validation rules will work 
            if (!$this->validate($validationRule)) {
                $errorsdata = $this->validator->getErrors();
            }

            //custom validation for the file extension here
            if($uploadfileradio == "uploadfile")
            {
                $filetoupload = $this->request->getFile('filename');
                $filetoupload->getClientExtension();
                if(!in_array($filetoupload->getClientExtension(), $filecondition))
                {
                    if(!isset($errorsdata["filename"]))
                    {
                       $errorsdata["filename"] = "Only M3U file is allowed to upload!"; 
                    }
                }
            }

            if(!empty($errorsdata))
            {
                $returnData["result"] = "error";
                $returnData["data"] = $errorsdata;
               echo json_encode($returnData);die();   
            }
            else
            {
                $insertcommondata = array();
                $insertcommondata["title"] = $title;
                $insertcommondata["group_id"] = $group;
                $insertcommondata["status"] = $status;
                $insertcommondata["expiry_date"] = $expiredate;
                $insertcommondata["created_by"] = $currentadminid;
                $insertcommondata["created_at"] = date("Y-m-d");
                $insertcommondata["filetype"] = $filetype;

                if($uploadfileradio == "uploadfile")
                {
                   $filename = $filetoupload->getRandomName();
                    $path = getcwd();
                    $uploadpath = $path . "/uploads/M3U";
                    $filetoupload->move($uploadpath, $filename);
                    if ($filetoupload->hasMoved()) {
                        $insertcommondata["filepath"] = $filename;
                    }
                    else
                    {
                        $errorsdata["filename"] = "Unable to upload file"; 
                        $returnData["result"] = "error";
                        $returnData["data"] = $errorsdata;
                        echo json_encode($returnData);die(); 
                    }
                }
                elseif($uploadfileradio == "externallink")
                {
                   $insertcommondata["filepath"] = $filepath;
                }
                
                $this->filedatamodel->insert($insertcommondata);
                $lastinsertidfiledata = $this->filedatamodel->getInsertID();


                if($no_of_codes <= 500)
                {
                    $insertdata = array();
                    for($i = 1; $i <= $no_of_codes; $i++)
                    {
                        $code = $this->generate_random_codes($codes_length, "", $codesformat);
                        $nnarr["file_id"] = $lastinsertidfiledata;
                        $nnarr["status"] = "inactive";
                        $nnarr["activationcode"] = $code;
                        $nnarr["mac_address"] = null;
                        $nnarr["created_by"] = $currentadminid;
                        $nnarr["created_at"] = date("Y-m-d");
                        $nnarr["updated_at"] = "";
                        $insertdata[] = $nnarr;
                        
                    }

                    $insertquery = $this->codemodel->insertBatch($insertdata);
                    if ($insertquery) {
                        $returnData["result"] = "success";
                        $returnData["data"] = "Codes Created Successfully";
                        $returnData["loop"] = "no";
                        $returnData["field_id"] = $lastinsertidfiledata;
                        echo json_encode($returnData);
                        die();
                    }
                    else {
                        $errorsdata["extra"] = "Unable to add codes";
                        $returnData["result"] = "error";
                        $returnData["data"] = $errorsdata;
                        echo json_encode($returnData);
                        die();
                    }

                   
                }
                else
                {
                    $pendingcodes = $no_of_codes - 500;
                    $insertdata = array();
                    for($i = 1; $i <= 500; $i++)
                    {

                        $code = $this->generate_random_codes($codes_length, "", $codesformat);
                        $nnarr["file_id"] = $lastinsertidfiledata;
                        $nnarr["status"] = "inactive";
                        $nnarr["activationcode"] = $code;
                        $nnarr["mac_address"] = null;
                        $nnarr["created_by"] = $currentadminid;
                        $nnarr["created_at"] = date("Y-m-d");
                        $nnarr["updated_at"] = "";
                        $insertdata[] = $nnarr;
                        
                    
                    }

                
                        $insertquery = $this->codemodel->insertBatch($insertdata);
                        if ($insertquery) {
                            $returnData["result"] = "success";
                            $returnData["data"] = "Codes Created Successfully";
                            $returnData["loop"] = "yes";
                            $returnData["field_id"] = $lastinsertidfiledata;
                            $returnData["pendingcodes"] = $pendingcodes;
                            echo json_encode($returnData);
                            die();
                        }
                        else {
                            $errorsdata["extra"] = "Unable to add codes";
                            $returnData["result"] = "error";
                            $returnData["data"] = $errorsdata;
                            echo json_encode($returnData);
                            die();
                        }

                    }

                
            }
        */}
        else
        {
            echo "Invalid Request";die();
        }
    }
}
?>