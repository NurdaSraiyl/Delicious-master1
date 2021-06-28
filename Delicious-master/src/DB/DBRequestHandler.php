<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBRequestHandler
 *
 * @author Andrei Golovkin
 */
class DBRequestHandler {

    private $connection;

    function DBRequestHandler() {
        $this->connection = new mysqli("localhost", "root", "0123", "projectdb"); // Get the connection

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function execute($command){ // This function executes any piece of SQL code
        return $this->connection->query($command);
    }

    function close(){ // This function simply close the database connection
        $this->connection->close();
    }

    function generateSession(){ // This function randomly generate the 45 symbols code
      $session = "";
      
      for ($n = 0; $n < 45; $n++) {
        $i = rand(48, 122);
        if($i > 57 && $i < 65) { // Symbols in this range are forbidden (/,.% and so on)
          $i += 7;
        }
        if ($i > 90 && $i < 97) { // Symbols in this range are forbidden (/,.% and so on)
          $i += 6;
        }
        $session .= chr($i);
      }


      return $session;
    }
}

?>
