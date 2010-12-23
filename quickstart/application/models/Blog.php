<?php

class Application_Model_Blog
{
		protected $_title;
    protected $_body;
    protected $_comments;
    protected $_id;
    protected $_created;
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
		public function setTitle($title){
			$this->_title = $title;	
		}
		public function getTitle(){
			return $this->_title;
		}
		
		public function setBody($body){
			$this->_body = $body;	
		}
		public function getBody(){
			return $this->_body;
		}
		
		public function setComments($comments){
			$this->_comments = $comments;	
		}
		public function getComments(){
			return $this->_comments;
		}
		
		public function setId($id){
			$this->_id = $id;	
		}
		public function getId(){
			return $this->_id;
		}
		public function setCreated($created){
			$this->_created = $created;	
		}
		public function getCreated(){
			return $this->_created;
		}
		public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        if(!array_key_exists('created',$options)){
        	$options['created'] = time();
        }
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
		
}

