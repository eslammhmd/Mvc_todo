<?php
//  view handler class

class View
{

    protected $view_file;
    protected $view_data;

    public function __construct($view,$data=[])
    {
        $this->view_file = $view;
        $this->view_data = $data;
        $this->render();
    }




    public function render()
    {
        $file = VIEWS.$this->view_file.'.php';
        if(file_exists($file))
        {
            ob_start();
            //to respond params from view ===  compact
            extract($this->view_data);
                require_once($file);
            ob_end_flush();
        }else
        {
            echo "this file :   not exist ):";
        }
    }


}
