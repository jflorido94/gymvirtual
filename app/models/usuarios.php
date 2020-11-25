<?php 

class usuariosModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
    $this->table = "users";
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM $this->table";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute();

      $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);
      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
  }

  public function insert($a)
  {
    $resultado = [];

    try {
      $sql = "INSERT INTO $this->table ( 'nif', 'name', 'surname' , 'image', 'login', 'password' , 'email', 'phone', 'address' , 'rol_id') 
                             VALUES (:nif, :nombre, :apellido, :imagen, :nick, :contrasena, :email , :telefono, :direccion, :rol)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nif' => $a,
        ':nombre' => $a,
        ':apellido' => $a,
        ':imagen' => $a,
        ':nick' => $a,
        ':contrasena' => $a,
        ':email' => $a,
        ':telefono' => $a,
        ':direccion' => $a,
        ':rol' => $a,
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
  }

public function update($a)
{
  $resultado = [];

    try {
      $sql = "UPDATE $this->table SET 'nif' = :nif, 'name' = :nombre, 'surname' = :apellido, 'image' = :imagen, 'login' = :nick, 
                          'password' = :contrasena, 'email' = :email, 'phone' = :telefono, 'address' = :direccion. 'rol_id' = :rol
              WHERE $this->table.'id' = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nif' => $a,
        ':nombre' => $a,
        ':apellido' => $a,
        ':imagen' => $a,
        ':nick' => $a,
        ':contrasena' => $a,
        ':email' => $a,
        ':telefono' => $a,
        ':direccion' => $a,
        ':rol' => $a,
        ':id' => $a,
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
}

public function delete($a)
{
  $resultado = [];

    try {
      $sql = "DELETE from $this->table where id = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':id' => $a
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
}

}


?>