<?php

require_once("connectionManager.php");
require_once("admin.php");

class AdminDAO {
    // public function retrieveAll() {
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();

    //     $sql = 'SELECT * FROM user';
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $stmt->execute();

    //     $result = [];
    //     while($row = $stmt->fetch()) {
    //         $result[] = ["firstname" => $row['firstname'], "lastname" => $row['lastname'], "email" => $row['email'], 
    //                     "hashed" => $row['hashed'], "role" => $row['role']];
    //     }

    //     $stmt->closeCursor();
    //     $pdo = null;
    //     return $result;
    // }

    public function retrieveUser($account_id){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $sql = "select * from admin where account_id=:account_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":account_id",$account_id,PDO::PARAM_STR);
        $stmt->execute();
        
        $user = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new Admin($row['account_id'], $row['email'], $row['password'] ,$row['user_name']);
        }
        
        $stmt = null;
        $pdo = null;
        return $result;
    }

    public function retrieve($email){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $sql = "select * from admin where email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
        
        $user = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = [];
        while ($row = $stmt->fetch()){
            $result[] = new Admin($row['account_id'], $row['email'], $row['password'] ,$row['user_name']);
        }
        
        $stmt = null;
        $pdo = null;
        return $result;
    }

    // public function createTable() {
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();
    //     $sql = "CREATE TABLE  if not exists user (firstname varchar(20) NOT NULL,lastname varchar(20) NOT NULL, email varchar(30) NOT NULL, hashed varchar(255) NOT NULL, role varchar(7) NOT NULL)";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $stmt->execute();
    // }

    // public function add($user) {
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();
    //     $sql = "insert into user (firstname, lastname, email, hashed, role) values (:firstname, :lastname, :email, :hashed, :role)";
    //     $stmt = $pdo->prepare($sql);

    //     $firstname = $user->getFirstName();
    //     $lastname = $user->getLastName();
    //     $email = $user->getEmail();
    //     $hashed = $user->getHashedPassword();
    //     $role = $user->getRole();

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(":firstname",$firstname,PDO::PARAM_STR);
    //     $stmt->bindParam(":lastname",$lastname,PDO::PARAM_STR);
    //     $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    //     $stmt->bindParam(":hashed",$hashed,PDO::PARAM_STR);
    //     $stmt->bindParam(":role",$role,PDO::PARAM_STR);

    //     $isAddOK = $stmt->execute();
    //     $stmt = null;
    //     $pdo = null;

    //     if ($isAddOK) {
    //         echo "<script>alert('Account successfully created! Login Now!'); window.location.href = 'login.html'</script>";
    //     } 
    // }
    
    // public function getEachTutor($tutor){
    //     $connMgr = new ConnectionManager();
    //     $conn = $connMgr->getConnection();
    //     $id = $tutor;

    //     // STEP 2
    //     $sql = "SELECT * FROM user where role=2 and userID=:id";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindParam(":id",$id,PDO::PARAM_STR);

    //     // STEP 3
    //     $stmt->execute();
    //     $num = $stmt->rowCount();
    //     // STEP 4
    //     $record = []; // Indexed Array of Post objects
    //     while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    //         extract($row);
    //         $record[] =
    //             new Tutor($row['userID'],$row['firstname'],$row['lastname']
    //             ,$row['email'],"",$row['role']);
    //     }

    //     // STEP 5
    //     $stmt = null;
    //     $conn = null;
    //     // STEP 6
    //     return $record;
    // }

    // public function deleteUser($temp) {
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();
 
    //     $qid = $temp;

    //     // Attempt delete query execution
    //     //$sql = "DELETE FROM question WHERE qid=:qid";
    //     $sql = "Update question set status = 'Solved' where qid=:qid";
    //     $stmt = $pdo->prepare($sql);

    //     $stmt->bindParam(":qid",$qid,PDO::PARAM_STR);

    //     $isDeleteOK = $stmt->execute();
    //     $stmt = null;
    //     $pdo = null;
        
    // }
}
?>