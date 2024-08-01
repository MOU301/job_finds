<?php 
class job{
    private $db;
    public function __construct()
    {
     $this->db=new database();   
    }
    public function getState(){
        $q="SELECT * FROM `state`";
        $this->db->query($q);
        return $this->db->ResultSet();
    }
    public function getStateByName($state){
      $q="SELECT * FROM `state` WHERE `name_state`=:state";
        $this->db->query($q);
        $this->db->bind(':state',$state);
        return $this->db->Single();
    }
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        return $this->db->ResultSet();
    }
    public function getCategoryById($id){
        $this->db->query("SELECT * FROM `categories` WHERE `id`=:id");
        $this->db->bind(':id',$id);
       return $this->db->Single();
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
                ON `jobs`.`type_id`=`types`.`id`
                ORDER BY `id` DESC";
           $this->db->query($q);
     return $this->db->ResultSet();
    }
    public function getType(){
      $this->db->query("SELECT * FROM `types`");
      return $this->db->ResultSet();
    }
    public function getJobById($id){
      $q="SELECT `jobs`.*,`state`.`name_state`,`users`.`username`,`types`.`name`,`types`.`color` 
      FROM `jobs` 
      INNER JOIN `users` 
      ON `jobs`.`user_id`=`users`.`id`
      INNER JOIN `state` 
      ON `jobs`.`state_id`=`state`.`id`
      INNER JOIN `types` 
      ON `jobs`.`type_id`=`types`.`id`
      WHERE `jobs`.`id`=:id";
      $this->db->query($q);
      $this->db->bind(':id',$id);
      return $this->db->Single();
    }
    public function getJobsByCategory($id){
      $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
      FROM `jobs` 
      INNER JOIN `users` 
      ON `jobs`.`user_id`=`users`.`id`
      INNER JOIN `types` 
      ON `jobs`.`type_id`=`types`.`id`
      WHERE `jobs`.`category_id`=:category 
      ORDER BY `id` DESC";
     $this->db->query($q);
     $this->db->bind(':category',$id);
     return $this->db->ResultSet();
    }
   public function getJobsByTitle($data){
    // notic must be work 
    //  1-query
    //  2-this->db->query
    //  3-use bind this->db->bind
    //  ....ect
    if(isset($data['state']) && isset($data['category'])){
        $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
        FROM `jobs` 
        INNER JOIN `users` 
        ON `jobs`.`user_id`=`users`.`id`
        INNER JOIN `types` 
        ON `jobs`.`type_id`=`types`.`id`
        WHERE `jobs`.`title`=:title 
        AND `jobs`.`category_id`=:category AND `jobs`.`state_id`=:state
        ORDER BY `id` DESC";
        $this->db->query($q);
      $this->db->bind(':title',$data['title']);
      $this->db->bind(':category',$data['category']); 
      $this->db->bind(':state',$data['state']); 
    }
    elseif(isset($data['state'])){
        $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
        FROM `jobs` 
        INNER JOIN `users` 
        ON `jobs`.`user_id`=`users`.`id`
        INNER JOIN `types` 
        ON `jobs`.`type_id`=`types`.`id`
        WHERE `jobs`.`title`=:title AND `jobs`.`state_id`=:state
        ORDER BY `id` DESC ";
        $this->db->query($q);
      $this->db->bind(':title',$data['title']);
      $this->db->bind(':state',$data['state']);
    }
    elseif(isset($data['category'])){
        $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
        FROM `jobs` 
        INNER JOIN `users` 
        ON `jobs`.`user_id`=`users`.`id`
        INNER JOIN `types` 
        ON `jobs`.`type_id`=`types`.`id`
        WHERE `jobs`.`title`=:title AND `jobs`.`category_id`=:category 
        ORDER BY `id` DESC";
        $this->db->query($q);
      $this->db->bind(':title',$data['title']);
      $this->db->bind(':category',$data['category']);
    }
    else{
        $q="SELECT `jobs`.*,`users`.`username`,`types`.`name`,`types`.`color` 
        FROM `jobs` 
        INNER JOIN `users` 
        ON `jobs`.`user_id`=`users`.`id`
        INNER JOIN `types` 
        ON `jobs`.`type_id`=`types`.`id`
        WHERE `jobs`.`title`=:title ORDER BY `id` DESC";
        $this->db->query($q);
      $this->db->bind(':title',$data['title']);
    }      
     return $this->db->ResultSet();
   }
public function InsertUser($data){
 $q="INSERT INTO `users` 
 (`first_name`, `last_name`, `email`, `username`, `password`, `role`) 
 VALUES 
 (:first_name, :last_name, :email, :username, :password, :role)";
$this->db->query($q);
$this->db->bind(':first_name',$data['first_name']);
$this->db->bind(':last_name',$data['last_name']);
$this->db->bind(":email",$data['email']);
$this->db->bind(":username",$data['username']);
$this->db->bind(":password",$data['password']);
$this->db->bind(":role",$data['role']);
if($this->db->execute()){
  return true; 
}else{
  return false; 
}
}
public function InsertState($state){
  $q="INSERT INTO `state` 
  (`name_state`) VALUES (:name)";{}
  $this->db->query($q);
$this->db->bind(':name',$state);
if($this->db->execute()){
  return true; 
}
else{
  return false ;}
}

public function TestState($state){
  $q="SELECT * FROM `state` WHERE `name_state`=:state";
  $this->db->query($q);
  $this->db->bind(':state',$state);
  $row=$this->db->Single();
  if($this->db->CountRow()>0){
    return true;
  }
  else {
    return false ; 
  }
}
public function setUser($row){
$_SESSION['is_login']=true;
$_SESSION['user_id']=$row->id;
$_SESSION['username']=$row->username;
$_SESSION['first_name']=$row->first_name;
}
public function LogOut(){
unset($_SESSION['is_login']);
unset($_SESSION['username']);
unset($_SESSION['first_name']);
unset($_SESSION['user_id']);
}
public function login($username,$password){
 $q='SELECT * FROM `users` WHERE `username`=:username AND `password`=:password';
 $this->db->query($q);
 $this->db->bind(':username',$username);
 $this->db->bind(':password',$password);
 $row=$this->db->Single();
 if($this->db->CountRow()>0){
   $this->setUser($row);
   return true;
   }
   else{
    return false;
   }
}


public function InserJob($data){
  $q="INSERT INTO `jobs` 
  (`category_id`, `user_id`,`type_id`, 
  `company_name`,`title`, `description`,
  `city`, `state_id`,`email_contact`)
    VALUES 
    (:category, :user_id, :type_id, :company,
     :title, :description, :city, :state, :email_contact)";
     $this->db->query($q);
     $this->db->bind(":category",$data['category']);
     $this->db->bind(':user_id',$data["user_id"]);
     $this->db->bind(":type_id",$data['type']);
     $this->db->bind(':company',$data['company']);
     $this->db->bind(":title",$data['title']);
     $this->db->bind(':description',$data['description']);
     $this->db->bind(":city",$data['city']);
     $this->db->bind(':state',$data['state']);
     $this->db->bind(":email_contact",$data['email_contact']);
     if($this->db->execute()){
      return true ; 
     }
     else{
      return false;
     }

}
public function UpdateJob($data,$id){
  $q="UPDATE `jobs` SET 
  `category_id` = :category_id,
   `type_id` = :type_id, 
   `company_name` = :company_name,
    `title`= :title,
     `description` = :description,
      `city` = :city,
       `state_id` = :state,
   `email_contact` = :email_contact 
    WHERE `jobs`.`id` = :id";
        $this->db->query($q);
        $this->db->bind(":category_id",$data['category_id']);
        $this->db->bind(":type_id",$data['type_id']);
        $this->db->bind(':company_name',$data['company_name']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(":city",$data['city']);
        $this->db->bind(':state',$data['state']);
        $this->db->bind(":email_contact",$data['email_contact']);
        $this->db->bind(":id",$id);
        if($this->db->execute()){
         return true ; 
        }
        else{
         return false;
        }
}

public function Delelt($id){
  $q="DELETE FROM `jobs` WHERE `jobs`.`id` = :id";
  $this->db->query($q);
  $this->db->bind(":id",$id);
   if($this->db->execute()){
    return true; 
   }else {
    return false;
  }
}
}