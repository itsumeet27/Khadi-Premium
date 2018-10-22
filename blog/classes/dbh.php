<?php 

class Dbh {
    private $dbh;
    private $error;

    public function __construct() {
        $this->dbh = new PDO("mysql:dbname=blog_tut;host=localhost;", 'root', '');
    }

    public function executeQuery($query) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();
        $this->error = $this->dbh->errorInfo();
    }

    public function executeSelect($query) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();

        $this->error = $this->dbh->errorInfo();
        //print_r($this->error);

        $entry = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r($entry);

        return $entry;
    }
}

?>