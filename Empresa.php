<?php 

/*
En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
*/
class Empresa{
  private  $denominacion;
  private  $direccion;
  private  $coleccionClientes;
  private  $coleccionMotos;
  private  $coleccionVentas;


  public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentas)
  {
    $this->denominacion = $denominacion;
    $this->direccion = $direccion;
    $this->coleccionClientes = $coleccionClientes;
    $this->coleccionMotos = $coleccionMotos;
    $this->coleccionVentas = $coleccionVentas;
  }

  public function getDenominacion(){
    return $this->denominacion;
  }

  public function getDireccion(){
    return $this->direccion;

  }

  public function getColeccionClientes(){
    return $this->coleccionClientes;
  }

  public function getColeccionMotos(){
    return $this->coleccionMotos;
  }

  public function getColeccionVentas(){
    return $this->coleccionVentas;
  }

  public function setDenominacion($denominacion){
    $this->denominacion = $denominacion;
  }

  public function setDireccion($direccion){
    $this->direccion = $direccion;
  }

  public function setColeccionClientes($coleccionClientes){
    $this->coleccionClientes = $coleccionClientes;
  }

  public function setColeccionMotos($coleccionMotos){
    $this->coleccionMotos = $coleccionMotos;
  }

  public function setColeccionVentas($coleccionVentas){
    $this->coleccionVentas = $coleccionVentas;
  }
  public function __toString()
  {
    $clientesStr = "";
    foreach ($this->coleccionClientes as $cliente) {
        $clientesStr .= $cliente . "\n";
    }

    $motosStr = "";
    foreach ($this->coleccionMotos as $moto) {
        $motosStr .= $moto . "\n";
    }

    $ventasStr = "";
    foreach ($this->coleccionVentas as $venta) {
        $ventasStr .= $venta . "\n";
    }

    return "Denominación: {$this->denominacion}\n" .
           "Dirección: {$this->direccion}\n" .
           "Colección de Clientes: \n$clientesStr\n" .
           "Colección de Motos: \n$motosStr\n" .
           "Colección de Ventas: \n$ventasStr\n";
  }

  public function retornarMoto($codigoMoto){
    foreach ($this->getColeccionMotos() as $moto) {
      if ($moto->getCodigo() == $codigoMoto) {
        return $moto;
      }
    }
  }

  public function registrarVenta($colCodigosMoto, $objCliente){
    if ($objCliente->getCondicion()) {
      $venta = new Venta(1234,date("Y-m-d"), $objCliente, [], 0);
    
    for($i = 0; $i<count($colCodigosMoto); $i++){
      $codigoBuscado = $colCodigosMoto[$i];
      $coleccionMotos = $this->getColeccionMotos();
      for ($j=0; $j < count($coleccionMotos); $j++) { 
          $objMoto = $coleccionMotos[$j];

          if ($objMoto->getCodigo() == $codigoBuscado && $objMoto->getEstado()) {
           $venta->incorporarMoto($objMoto);

          }
      }
    }
    if ($venta->getPrecioFinal() > 0) {
      $colVentas = $this->getColeccionVentas();
      $colVentas[] = $venta;
      $this->setColeccionVentas($colVentas);
      return $venta->getPrecioFinal();
    } 
    
  } else {
    return 0;
  }
} 

public function retornarVentasXCliente($tipo, $numDoc){
  $ventas = $this->getColeccionVentas();
  $coleccionVentasCliente = [];
  foreach ($ventas as $venta) {
    $cliente = $venta->getCliente();
    if ($cliente->getTipoDoc() == $tipo && $cliente->getNroDoc() == $numDoc) {
      $coleccionVentasCliente[] = $venta;
    }
  }
  return $coleccionVentasCliente;
}
}













?>