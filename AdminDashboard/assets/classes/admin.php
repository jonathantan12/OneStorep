<?php

class Admin {
    private $account_id;
    private $email;
    private $password;
    private $user_name;
    private $role;

    public function __construct($account_id, $email, $password, $user_name, $role) {
        $this->account_id = $account_id;
        $this->email = $email;
        $this->password = $password;
        $this->user_name = $user_name;
        $this->role = $role;
    }

    public function getAccountId() {
        return $this->account_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function getRole() {
        return $this->role;
    }
}
?>