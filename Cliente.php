<?php 
/* En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
*/

class Cliente {
  private $nombre;
  private $apellido;
  private $condicion;
  private $tipoDocumento;
  private $nroDocumento;


  public function __construct($nombre, $apellido, $condicion, $tipoDocumento, $nroDocumento) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->condicion= $condicion;
    $this->tipoDocumento = $tipoDocumento;
    $this->nroDocumento = $nroDocumento;
  }


  public function getName() {
    return $this->nombre;
  }

  public function getApellido(){
    return $this->apellido;
  }

  public function getCondicion(){
    return $this->condicion;
  }
  
  public function getTipoDoc(){
    return $this->tipoDocumento;
  }
  public function getNroDoc(){
    return $this->nroDocumento;
  }


  public function setName($name) {
    $this->nombre = $name;
  }

  public function setApellido($apellido){
    $this->apellido = $apellido;
  }

  public function setCondicion($condicion){
    $this->condicion = $condicion;
  }
  
  public function setTipoDoc($tipoDoc){
    $this->tipoDocumento = $tipoDoc;
  }
  public function setNroDoc($nroDoc){
    $this->nroDocumento = $nroDoc;
  }

  public function __toString()
  {
    $estado = "";
    if ($this->condicion){
      $estado="Activo";
    } else {
      $estado = "Dado de baja";
    } 
    return "Nombre: " . $this->nombre . " " . $this->apellido . "\n" .
           "Condición: " . $estado . "\n" .
           "Documento: " . $this->tipoDocumento . " " . $this->nroDocumento;
  }

}



























?>