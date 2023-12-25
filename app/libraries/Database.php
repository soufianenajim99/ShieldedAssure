<?php 
 
    class Database {
      
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $dbh;
        private $stmt;
        private $error;
        public function __construct()
        {   
            $this->connectDatabase();
        }

        
        public function connectDatabase() {
          
            $dsn = 'mysql:dbname=' . $this->dbname . ';host=' . $this->host;
            try {
                $this->dbh = new PDO($dsn , $this->user , $this->pass );
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                return $this->dbh;
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        public function query($sql) {
            $this->stmt = $this->dbh->prepare($sql);
        }
        public function bind($param , $value , $type = null) {

            if (is_null($type)) {
                switch (true) {
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
                        break;
                }
            }
            $this->stmt->bindValue($param , $value , $type);
        }
        public function execute() {
            return $this->stmt->execute();
        }

        public function fetchOneRow() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        public function fetchMultipleRow() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function countRow() {
            $this->stmt->rowCount();
        }

    }









?>