<?php

    class Dbh{
        private $host = "localhost";
        private $user = "root";
        private $pw = "";
        private $dbName = "Users";

        protected function connect(){
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pw);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }

        public function selectTable(){
            $sql = 'SELECT * FROM users';
            $stmt = $this->connect()->query($sql);
            $table = "<table>
                        <tr>
                            <th>#</th>
                            <th>Ime i prezime</th>
                            <th>JMB</th>
                            <th>Broj dokumenta</th>
                            <th>Godina rodjena</th>
                            <th>Spol</th>
                            <th>Akcije</th>
                        </tr>";

            while($row = $stmt->fetch()){
                $table .= "<tr>".
                "<td>".$row["id"]."</td>".
                "<td>".$row["full_name"]."</td>".
                "<td>".$row["ID_NO"]."</td>".
                "<td>////</td>".
                "<td>".$row["date_of_birth"]."</td>".
                "<td>".$row["GENDER"]."</td>".
                "<td><form method=\"POST\" action=\"pregled.php?2\">
                <button class=\"table-button\" value=\"".$row['id']."\" name=\"" .$row['id'] ."\">Pregled</button></form></td>".
                "</tr>";
            }
            $table .= "</table>";
            return $table;
        }

        public function create($fullname, $id, $dob, $gender){
            $sql = "INSERT INTO users (full_name, ID_NO, date_of_birth, GENDER) VALUES(?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$fullname, $id, $dob, $gender]);
        }
    }