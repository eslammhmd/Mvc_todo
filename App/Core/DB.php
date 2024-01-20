<?php
require_once (LIBS.'DB/MysqliDb.php');   //important for ThirdParty
class DB
{
    protected $db;

    public function connect()
    {
        $this->db = new MysqliDb (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db)
            die("Connection Error : ");
        return $this->db;
    }
}