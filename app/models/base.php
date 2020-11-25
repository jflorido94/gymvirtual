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
/**
 * Recupera los datos de la base de datos
 *
 * @var Array
 */
    protected $resultado = [];

    function __construct()
    {
      $this->db = Database::getInstance();
    }
  
    public function getAll()
    {
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
    public function getbyId($id)
    {
      try {
        $sql = "SELECT * FROM $this->table where id=:id";
  
        $query = $this->db->getConnection()->prepare($sql);
        $query->execute([
          ':id' => $id
        ]);
  
        $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);
        $resultado["correcto"] = true;
  
      } catch (PDOException $ex) {
        $resultado["datos"] = $ex->getMessage();
        $resultado["correcto"] = false;
  
      } finally {
        return $resultado;
      }
    }

    public function delete($id)
{
  

    try {
      $sql = "DELETE from $this->table where id = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':id' => $id
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