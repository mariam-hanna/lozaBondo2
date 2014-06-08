
<?php

class Application_Model_Story extends Zend_Db_Table_Abstract{

    protected $_name = 'stories';
    
    function liststories($cat_id) {
        $select=$this->select()->setIntegrityCheck(false)->from('stories')->where("cat_id=$cat_id");
        return $this->fetchAll($select)->toArray(); 
    }
    
    
    function getStoryLevel(){
        $storyLevel = null;
        $select = $this->select()->where("path ='".$_SESSION['story']."'");
        $stories = $this->fetchAll($select)->toArray();
            foreach ($stories as $story){
               $storyLevel = $story['level']; 
            }
            
        return $storyLevel;
    }
    
    function getStaticStory(){
        $select = $this->select()->where("path ='".$_SESSION['story']."'");
        $stories = $this->fetchAll($select)->toArray();
        return $stories;
    }

}