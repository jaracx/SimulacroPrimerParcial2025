<?php 
/*
En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */
class Moto {
   private $codigo;
    private $costo;
    private $añoFabricacion;
    private $descripcion;
    private $porcIncrAnual;
    private $activa; 

    public function __construct($codigo, $costo, $añoFabricacion, $descripcion, $porcIncrAnual, $activa) {
    $this->codigo = $codigo;
    $this->costo = $costo;
    $this->añoFabricacion = $añoFabricacion;
    $this->descripcion = $descripcion;
    $this->porcIncrAnual = $porcIncrAnual;
    $this->activa = $activa;
}

 
    public function getCodigo(){
        return $this-> codigo;
    }
    public function getCosto(){
        return $this-> costo;
    }
    public function getAñoFabricacion(){
        return $this-> añoFabricacion;
    }
    public function getDescripcion(){
        return $this-> descripcion;
    }
    public function getPorcIncrAnual(){
        return $this-> porcIncrAnual;
    }
    public function getActiva(){
        return $this-> activa;
    }

    public function setCodigo($codigo){
        $this-> codigo = $codigo;
    }
    public function setCosto($costo){
        $this-> costo = $costo;
    }
    public function setAñoFabricacion($anioFabricacion){
        $this-> añoFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion){
        $this-> descripcion = $descripcion;
    }
    public function setPorcIncrAnual ($porcIncrAnual){
        $this-> porcIncrAnual = $porcIncrAnual;
    }
    public function setActiva ($activa){
        $this-> activa = $activa;
}

public function __toString()
{
  $estado = ""; 
  if ($this->getActiva()){
    $estado = "Disponible";
  } else {
    $estado = "No Disponible";
  }
  return "Codigo Moto: " . $this->getCodigo() . "\n" . "año fabricacion: " . $this->getAñoFabricacion(). "\n" . 
  "costo: " . $this->getCosto() . "\n" . 
  "Descripcion: " . $this->getDescripcion() . "\n" . 
  "Porcentaje incremento anual: " . $this->getPorcIncrAnual(). "%" . "\n" ."estado: " . $estado . "\n" ;
}


public function darPrecioVenta(){
  $añosTranscurridos = 2025-$this->getAñoFabricacion();
  if ($this->getActiva()){
    $precioVenta = $this->getCosto()+$this->getCosto()*($añosTranscurridos*($this->getPorcIncrAnual()/100));
  } else {
    $precioVenta = -1;
  }
  return $precioVenta;
}

}

?>