<?php
require_once __DIR__ ."/../core/Model.php";

class TaskModel extends Model{
    private $create_task_table = "
        CREATE TABLE IF NOT EXISTS `task`(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            deadline DATE,
            status ENUM('pending', 'completed') DEFAULT 'pending',
            created_by INT REFERENCES user(id) ON DELETE CASCADE,
            project_id INT REFERENCES project(id) ON DELETE CASCADE
        );
    ";
    private $new = "INSERT INTO `task` (name,description,deadline,created_by,project_id) VALUES (?,?,?,?,?);";
    private $update_status = "UPDATE `task` SET status = ? WHERE id = ?";
    private $delete_task = "DELETE FROM `task` WHERE id = ?";
    private $get_task = "SELECT * FROM `task` WHERE id = ?";
    private $get_all_task = "SELECT * FROM `task` WHERE project_id = ?";

    public function __construct(){
        parent::__construct();
        $this->createTask();
    }

    public function createTask(){
        $this->create($this->create_task_table);
    }

    public function createNewTask($name,$description,$deadline,$created_by,$project_id){
        $this->insert($this->new,[$name,$description,$deadline,$created_by,$project_id],"sssii");
    }

    public function updateTaskStatus($id,$status){
        $this->update($this->update_status,[$status,$id],"si");
    }

    public function getTask($id){
        return $this->fetch($this->get_task, [$id],"i");
    }

    public function getAllTask($pro_id) {
        return $this->fetch($this->get_all_task, [$pro_id],"i");
    }

    public function deleteTask($id){
        $this->delete($this->delete_task,[$id],"i");
    }
}
