<?php

/**
 * Clase madre sobre la que se construyen los Modelos de la app
 */
abstract class Model
{
  /**
   * Conexion a la base de datos
   *
   * @var Database
   */
  protected $db;
  /**
   * Nombre de la tabla asociada al modelo
   *
   * @var String
   */
  protected $table;


  function __construct()
  {
    $this->db = Database::getInstance();
  }

  /**
   * Devuelve todos los campos de la tabla en la base de datos
   * 
   * @return Array
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   * 
   */
  public function getAll()
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "SELECT * FROM $this->table";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute();

      $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);
      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }
  /**
   * Devuelve el registro correspondiente al Id pasado por parametro
   *
   * @param Array $param
   * @return Array 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   * 
   */
  public function getById($param)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "SELECT * FROM $this->table where id=:id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':id' => $param['0']
      ]);

      $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);
      if ($resultado["datos"]==[]) {
        throw new PDOException("No encontrado");
      }
      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  /**
   * Elimina el registro correspondiente al Id pasado por parametro
   * 
   * Puede dar error segun la consistencia de datos de la base de datos
   *
   * @param String $id
   * @return Array 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   * 
   */
  public function delete($param)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "DELETE from $this->table where id = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':id' => $param['0']
      ]);
      $resultado["mensaje"] = "Registro borrado correctamente";
      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }
}
