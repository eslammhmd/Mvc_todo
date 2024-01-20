<?php

class TodoController extends Controller
{
    private $conn;

    public function __construct()
    {
        $this->conn = new ToDo();
    }


    public function index()
    {
        $data['todo'] = $this->conn->getAllProducts();
        return $this->view('layout/index',$data);
    }





    public function add()
    {
        return $this->view('layout/add');
    }

    public function store()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['task'];
            $description = $_POST['due_date'];

            $this->conn = new ToDo();
            $dataInsert = Array ( "task" => $name ,
                            "due_date" => $description ,
                            );

            if($this->conn->insertProducts($dataInsert))
            {
                $data['success'] = "Data Added Successfully";
                return $this->view('layout/add',$data);
            }
            else 
            {
                $data['error'] = "Error";
                return $this->view('layout/add',$data);
            }
        }
        return $this->view('layout/add');
    }




    public function edit($id)
    {
        // var_dump($this->conn->getProduct($id));
        $data['row'] = $this->conn->getProduct($id)[0];
        return $this->view('products/edit',$data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['task'];
            $description = $_POST['due_date'];

            $this->conn = new ToDo();
            $dataInsert = Array ( "task" => $name ,
                            "due_date" => $description ,
                            );

            if($this->conn->updateProduct($id,$dataInsert))
            {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->conn->getProduct($id)[0];
                $this->view('layout/edit',$data);
            }
            else 
            {
                $data['error'] = "Error";
                $data['row'] = $this->conn->getProduct($id)[0];
                return $this->view('layout/edit',$data);
            }
        }
        redirect('home/index');
    }



    
    public function delete($id)
    {
        if($this->conn->deleteProduct($id))
        {
            $data['success'] = "Product Have Been Deleted";
            return $this->view('layout/delete',$data);
        }
        else 
        {
            $data['error'] = "Error";
            return $this->view('layout/delete',$data);
        }
    }
}