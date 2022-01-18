<?php

class User {
    private $account_id;
    private $email;
    private $password;
    private $company_name;
    private $contact_number;

    public function __construct($account_id, $email, $password, $company_name, $contact_number) {
        $this->account_id = $account_id;
        $this->email = $email;
        $this->password = $password;
        $this->company_name = $company_name;
        $this->contact_number = $contact_number;
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

    public function getCompanyName() {
        return $this->company_name;
    }

    public function getContactNumber() {
        return $this->contact_number;
    }
}
?>