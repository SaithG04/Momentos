<?php
// Incluye la definición de la clase ConexionBD
require_once 'ConexionBD.php';

class QuinoModel extends ConexionBD
{
    // Método para obtener información del quino por id de formato
    public function obtenerQuinoPor($idFormato)
    {
        // Consulta SQL para obtener la información del quino
        $query = "SELECT * FROM paquetes WHERE id_formato_quino = :idFormato";

        // Prepara la consulta utilizando la conexión establecida en la clase padre (ConexionBD)
        $stmt = $this->conexion->prepare($query);

        // Asocia el parámetro :idFormato con el valor proporcionado
        $stmt->bindParam(':idFormato', $idFormato, PDO::PARAM_STR);

        // Ejecuta la consulta preparada
        if (!$stmt->execute()) {
            // Error en la ejecución de la consulta
            $errorInfo = $stmt->errorInfo();
            die("Error en la consulta: " . $errorInfo[2]);
        }

        // Obtiene el resultado de la consulta como un array asociativo
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Retorna el resultado de la consulta
        return $result;
    }
    public function obtenerQuinoPorID($id)
    {
        // Consulta SQL para obtener la información de la boda
        $query = "SELECT * FROM tipo_quino WHERE id = :id";

        // Prepara la consulta utilizando la conexión establecida en la clase padre (ConexionBD)
        $stmt = $this->conexion->prepare($query);

        // Asocia el parámetro :idFormato con el valor proporcionado
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        // Ejecuta la consulta preparada
        if (!$stmt->execute()) {
            // Error en la ejecución de la consulta
            $errorInfo = $stmt->errorInfo();
            die("Error en la consulta: " . $errorInfo[2]);
        }

        // Obtiene el resultado de la consulta como un array asociativo
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retorna el resultado de la consulta
        return $result;
    }
}
?>