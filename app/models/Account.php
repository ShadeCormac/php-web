<?php
    class Account {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function checkPassword($username, $password){
            $this->db->query('SELECT * FROM account WHERE UserName = :username');
            $this->db->bind(':username', $username);
            $user =  $this->db->getSingle();
            if(password_verify($password, $user->Pass)){
                return true;
            }else return false;
        }

        public function UpdateShippingDetail($username, $detail){
            $this->db->query('
                            UPDATE account
                            SET Address = :address, Phone = :phone
                            WHERE UserName = :username
                            ');
            $this->db->bind(':address', $detail['Address']);
            $this->db->bind(':phone', $detail['Phone']);
            $this->db->bind(':username', $username);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getUserDetail($username){
            $this->db->query('SELECT * FROM account WHERE UserName = :username');
            $this->db->bind(':username', $username);
            $user =  $this->db->getSingle();
            return $user;
            
        }

        public function findAccountByUsername($username){
            $this->db->query('SELECT * FROM account WHERE username = :username');
            $this->db->bind(':username', $username);
            //SELECT statement -> use getSingleI()/resultSet()
            $this->db->getSingle();
            if($this->db->rowCount() > 0){
                return true;
            }
            return false;
        }
        public function register($username, $password){
            $this->db->query('INSERT INTO account(username, pass)
                            VALUES(:username, :pass);
                            ');
            $this->db->bind(':username', $username);
            $this->db->bind(':pass', $password);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function changePassword($accountId, $password){
            $this->db->query('UPDATE account
                            SET Pass = :pass
                            WHERE AccountId = :accountId
                            ');
            $this->db->bind(':pass', $password);
            $this->db->bind(':accountId', $accountId);
            $this->db->execute();
            
        }

        public function accountUpdate($accountId,$type)
        {
            $sql = 'UPDATE account
                    SET Type = :type
                    WHERE AccountId = :id';
            $this->db->query($sql);
            $this->db->bind(':id',$accountId);
            $this->db->bind(':type',$type);
            $this->db->execute();
        }

        public function getAccount($id){
            $sql = 'SELECT*
                    FROM account as ac
                    where ac.AccountId = :id';
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            $account = $this->db->getsingle();
            return $account;
        }

        public function getAllAccount(){
            $sql = 'SELECT*
                    FROM account';
            $this->db->query($sql);
            $data = $this->db->resultSet();
            return $data;
        }
    }
?>