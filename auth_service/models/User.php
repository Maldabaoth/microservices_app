<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        $query = $this->db->prepare("SELECT * FROM Profesor WHERE Username_pro = :username AND Contrasena_pro = :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return [
                'id' => $result['ID_Profesor'],
                'role' => 'profesor',
                'nombre' => $result['Nom_ape_pro']
            ];
        }

        $query = $this->db->prepare("SELECT * FROM Estudiante WHERE Username_estu = :username AND Contrasena_estu = :password");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return [
                'id' => $result['ID_Estudiante'],
                'role' => 'estudiante',
                'nombre' => $result['Nom_ape_estu']
            ];
        }

        return false;
    }
}

?>
