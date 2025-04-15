<?php 
/*
En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
*/
class Venta {
private $numero;
private $fecha;
private $cliente;
private $coleccionMotos;
private $precioFinal;

public function __construct($num, $fecha, $cliente, $colMotos, $precioFinal)
{
  $this->numero = $num;
  $this->fecha = $fecha;
  $this->cliente = $cliente;
  $this->coleccionMotos=$colMotos ;
  $this->precioFinal = $precioFinal;
}


public function getNumero(){
  return $this->numero;
}

public function getFecha(){
return $this->fecha;
}

public function getCliente(){
  return $this->cliente;
}

public function getColeccionMotos(){
  return $this->coleccionMotos;
}

public function getPrecioFinal(){
  return $this->precioFinal;
}

public function setNumero($numero){
$this->numero = $numero;
}

public function setFecha($fecha){
  $this->fecha=$fecha;
}

public function setColeccionMoto($colMotos){
  $this->coleccionMotos = $colMotos;
}

public function setPrecioFinal($precioFinal){
  $this->precioFinal = $precioFinal;
}

public function __toString()
{
  $informacion = "";
  $coleccion = $this->coleccionMotos;
  for ($i=0; $i < count($coleccion); $i++) { 
    $informacion .= $coleccion[$i] . "\n";
  }

  return "Número: " . $this->getNumero() . "\n" .
         "Fecha: " . $this->getFecha() . "\n" .
         "Cliente: " . $this->getCliente() . "\n" .
         "Motos:\n" . $informacion .
         "Precio Final: $" . $this->getPrecioFinal() . "\n";

}

function incorporarMoto($objetoMoto){
  if($objetoMoto->getActiva()){
    $coleccion=$this->getColeccionMotos();
    $coleccion[] = $objetoMoto;
    $this->setColeccionMoto($coleccion);

    $precio = $this->getPrecioFinal();
    $precioFinal = $precio + $objetoMoto->darPrecioVenta();
    $this->setPrecioFinal($precioFinal);
    return true;
  } else {
    return false;
  }

}

}


















?>