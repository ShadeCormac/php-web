<?php 
    //PDO database class
    //Connect to the database
    //Create prepare statement
    //Bind params/values
    //Returns rows and results
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $dbName = DB_NAME;

        private $statement;
        private $dbConnection;
        private $error;

        public function __construct(){
            //Setting Data source string
            $dataSource = 'mysql:host='. $this->host . ';dbname=' . $this->name;
            $options =[
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRORMODE => PDO::ERRMODE_EXCEPTION

            ];
            //Create PDO instance
            try {
                $this->dbConnection = new PDO($dataSource, $this->user, $this->password, $options);
            }
            catch(PDOException $exception){
                $this->error = $exception->getMessage();
            }
        }

        //Create a new query
        public function query($query){
            $this->statement = $this->dbConnection->prepare($query);
        }

        //Bind value into param
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;    
                }
            }

            $this->statement->bindValue($param, $value, $type);
        }

        //Execute the statement
        public function execute(){
            return $this->statement->execute();
        }

        //Get results set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        //Get single row as object
        public function getSingle(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }
        //Get row count
        public function rowCount(){
            return $this->statement->rowCount();
        }
    }
?>