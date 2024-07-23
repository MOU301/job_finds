<?php 
class template{
    protected $template;
    protected $vars=[];

    public function __construct($template)
    {
      $this->template=$template;  
    }
     
    public function __set($name, $value)
    {
        $this->vars[$name]=$value;
    }
     
    public function __get($name)
    {
        return $this->vars[$name];
    }
     
    public function __toString()
    {
     extract($this->vars);
     chdir(dirname($this->template));
     ob_start();
     include basename($this->template);
     return ob_get_clean();  
    }
}