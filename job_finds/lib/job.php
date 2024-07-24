<?php 
class job{
    private $db;
    public function __construct()
    {
     $this->db=new database();   
    }
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        return $this->db->ResultSet();
    }
    public function getCountJob(){
       $this->db->query("SELECT * FROM `jobs`");
       return $this->db->CountRow(); 
    }
    public function getJobs(){
        $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
                FROM `jobs` 
                INNER JOIN `users` 
                ON `jobs`.`user_id`=`users`.`id`
                INNER JOIN `types` 
                ON `jobs`.`type_id`=`types`.`id`";
           $this->db->query($q);
     return $this->db->ResultSet();
    }
    //query to inster the job to database 
    //INSERT INTO `jobs` (`id`, `category_id`, `user_id`,
    //  `type_id`, `company_name`, `title`, `description`,
    //  `city`, `state`, `contant_email`, `created_at`) 
    // VALUES (NULL, '2', '1', '1', 'Rammo Company', 'web development', 'the work in the Germany \r\nand you most learn the deutsch language to \r\nwork', 'Enger', 'Maller', 'Mooramandan93@gmail.com', '2024-07-24 20:54:54.000000');
}