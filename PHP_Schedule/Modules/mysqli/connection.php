<?php


class connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "agenda";

    public function __construct()
    {

    }

    public function connect()
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn) {
            return $conn;
        }
            return false;
    }

    public function listUsers($option, $execute)
    {

        if ($option === 'Personal') {
            $query = "SELECT * FROM personal";

        } else if ($option === 'Profesional') {
            $query = "SELECT * FROM profesional";
        } else {
            $query = "SELECT * FROM profesional";
        }

        return $execute->query($query);

    }

    public function addContact($option, $execute, $name, $surname, $email, $telephone)
    {
        if ($option === 'Personal') {
            $query = "INSERT INTO personal (name, surname, email, telephone) VALUES ('$name', '$surname', '$email', '$telephone')";
        } else {
            $query = "INSERT INTO profesional (name, surname, email, telephone) VALUES ('$name', '$surname', '$email', '$telephone')";
        }

        if ($execute->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($option, $telephone, $execute)
    {
        if ($option === 'Personal') {
            $query = "DELETE FROM personal WHERE telephone = '$telephone'";
        } else {
            $query = "DELETE FROM profesional WHERE telephone = '$telephone'";
        }

        if ($execute->query($query) === TRUE) {
            return true;
        }

        return false;

    }

    public function updateUser($option, $telephone, $execute, $newName, $newSurname, $newEmail, $newTelephone)
    {

        if ($option === 'Personal') {
            $query = "UPDATE personal SET name = '${newName}', surname ='${newSurname}', email = '${newEmail}', telephone = ${newTelephone} WHERE telephone = ${telephone}";

        } else {
            $query = "UPDATE profesional SET name = '${newName}', surname ='${newSurname}', email = '${newEmail}', telephone = ${newTelephone} WHERE telephone = ${telephone}";
        }
        if($execute -> query($query) === TRUE){

            return true;
        }
        echo $execute-> error;
        return false;

    }

}

