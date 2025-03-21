<?php
require_once __DIR__ ."/../core/Model.php";

class ProjectDeveloperModel extends Model {
    private $create_project_developer_table = "
        CREATE TABLE IF NOT EXISTS `project_developer`(
            pro_id INT REFERENCES project (id) ON DELETE CASCADE,
            user_id INT REFERENCES user (id) ON DELETE CASCADE,
            PRIMARY KEY (pro_id,user_id)
        );
    ";
    private $new = "INSERT INTO `project_developer` (pro_id,user_id) VALUES (?,?)";
    private $get_developers = "SELECT user_id FROM `project_developer` WHERE pro_id = ?";
    private $get_projects = "SELECT pro_id FROM `project_developer` WHERE user_id = ?";
    private $count = "SELECT COUNT(*) AS count FROM `project_developer` WHERE pro_id=?";
    private $remove = "DELETE FROM `project_developer` WHERE pro_id = ? AND user_id=?";
    
    public function __construct() {
        parent::__construct();
        $this->createProjectDeveloper();
    }

    public function createProjectDeveloper() {
        $this->create( $this->create_project_developer_table);
    }

    public function createNewProjectDeveloper($pro_id,$user_id) {
        $this->insert($this->new,[$pro_id,$user_id],"ii");
    }

    public function getAllDevelopers($pro_id) {
        return $this->fetch($this->get_developers,[$pro_id],"i");
    }

    public function getAllProjects($user_id){
        return $this->fetch($this->get_projects,[$user_id],"i");
    }

    public function getCount($pro_id){
        return $this->fetch($this->count,[$pro_id],"i");
    }

    public function removeDeveloper($pro_id,$user_id){
        $this->delete($this->remove,[$pro_id, $user_id],"ii");
    }
}
