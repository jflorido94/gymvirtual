<?php

class usuariosModel extends Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = "users";
  }

  /**
   * Registro de nuevo usuario
   *
   * @param Array $a
   * @return Array
   *
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function insert($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "INSERT INTO `users`(`id`, `nif`, `name`, `surnames`, `image`, `login`, `password`, `email`, `phone`, `address`, `rol_id`,`accepted`)
                         VALUES (NULL,:nif,:name,:surnames,NULL,:login,:password,:email,:phone,:address,:rol_id, :accepted)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nif' => $a["dni"],
        ':name' => $a["nombre"],
        ':surnames' => $a["apellidos"],
        ':login' => $a["usuario"],
        ':password' => $a["password"],
        ':email' => $a["email"],
        ':phone' => $a["telefono"],
        ':address' => $a["direccion"],
        ':rol_id' => 0,
        ':accepted' => 0,
      ]);

      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  /**
   * Editar un usuario
   *
   * @param Array $a
   * @return Array
   * 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function update($a)
  {
    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      if (UserSession::checkPassword($a['password'])) {

        if ($a['pass'] != $a['passConfirm']) {
          throw new PDOException("Contraseñas nuevas no coincidentes");
        }
        $sql = "UPDATE $this->table SET `name` = :nombre, `surnames` = :apellido, `password` = :contrasena, `email` = :email, `phone` = :telefono, `address` = :direccion
              WHERE `id` = :id";

        $query = $this->db->getConnection()->prepare($sql);
        $query->execute([
          ':nombre' => $a['nombre'],
          ':apellido' => $a['apellidos'],
          ':contrasena' => $a['pass'],
          ':email' => $a['email'],
          ':telefono' => $a['telefono'],
          ':direccion' => $a['direccion'],
          ':id' => $a['id'],
        ]);

        $resultado["correcto"] = true;
      } else {
        throw new PDOException("Contraseña actual no correcta");
      }
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  /**
   * Realiza cambios en el perfil del usuario sin cambiar su contraseña
   *
   * @param Array $a
   * @return Array
   * 
   *  ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function updateSinPass($a)
  {
    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      if (UserSession::checkPassword($a['password'])) {

        $sql = "UPDATE $this->table SET `name` = :nombre, `surnames` = :apellido, `email` = :email, `phone` = :telefono, `address` = :direccion
              WHERE `id` = :id";

        $query = $this->db->getConnection()->prepare($sql);
        $query->execute([
          ':nombre' => $a['nombre'],
          ':apellido' => $a['apellidos'],
          ':email' => $a['email'],
          ':telefono' => $a['telefono'],
          ':direccion' => $a['direccion'],
          ':id' => $a['id'],
        ]);

        $resultado["correcto"] = true;
      } else {
        throw new PDOException("Contraseña actual no correcta");
      }
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  /**
   * Devuelve el usuario que coincida en usuario y contraseña
   *
   * @param String $usuario
   * @param String $contraseña
   * @return Array 
   * 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function iniciar($usuario, $contraseña)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {

      $sql = "SELECT * from $this->table where `login`=:usuario and `password`=:pass";
      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        'usuario' => $usuario,
        'pass' => $contraseña
      ]);
      if ($query->rowCount() == 1) {

        $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($resultado["datos"]['0']["accepted"] == 1) {
          $resultado["correcto"] = true;
        } else {
          throw new PDOException("Usuario no activo, contacte con el Administrador");
        }
      } else {
        throw new PDOException("Usuario o contraseña incorrectos");
      }
      return $resultado;
    } catch (PDOException $ex) {
      $resultado["correcto"] = false;
      $resultado["mensaje"] = $ex->getMessage();
      return $resultado;
    }
  }
}
