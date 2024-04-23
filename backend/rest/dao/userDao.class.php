<?php

require_once __DIR__ . '/BaseDao.class.php';

class UserDao extends BaseDao {
    public function __construct() {
        parent::__construct('users');
    }

    // Method to add a new user to the database
    public function add_user($user) {
        return $this->insert('users', $user);
    }

    // Method to retrieve a user by their ID
    public function get_user_by_id($user_id) {
        return $this->query_unique(
            "SELECT * FROM users WHERE id = :id",
            ['id' => $user_id]
        );
    }

    public function get_all_users() {
        return $this->query(
            "SELECT * FROM {$this->table}",
            []
        );
    }
    
    

    // Method to update a user's information
    public function update_user($user_id, $user_data) {
        return $this->execute(
            "UPDATE users SET name = :name, email = :email WHERE id = :id",
            [
                'name' => $user_data['name'],
                'email' => $user_data['email'],
                'id' => $user_id
            ]
        );
    }

    // Method to delete a user from the database
    public function delete_user($user_id) {
        return $this->execute(
            "DELETE FROM users WHERE id = :id",
            ['id' => $user_id]
        );
    }
}

?>
