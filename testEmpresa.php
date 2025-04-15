<?php
/*
Implementar un script TestEmpresa en la cual:
1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo.
4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2.
*/
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'Empresa.php';

$objCliente1 = new Cliente("Lautaro", "Martinez", true, "DNI", 12345678);
$objCliente2 = new Cliente("Leandro", "Paredes", false, "DNI", 87654321);

$moto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$moto2 = new Moto(12, 58400, 2021, "Zanella Zr 150 Ohc", 70, true);
$moto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250 ", 55, false);

$empresa = new Empresa("Alta Gama", "Av Argentina 123", [$objCliente1, $objCliente2], [$moto1, $moto2, $moto3], []);
$resultadoVenta1 = $empresa->registrarVenta([11, 12, 13], $objCliente2);
echo "Resultado de la venta 1: " . $resultadoVenta1 . "\n";
$resultadoVenta2 = $empresa->registrarVenta([0], $objCliente2);
echo "Resultado de la venta 2: " . $resultadoVenta2 . "\n";
$resultadoVenta3 = $empresa->registrarVenta([2], $objCliente2);
echo "Resultado de la venta 3: " . $resultadoVenta3 . "\n";

$ventasCliente1 = $empresa->retornarVentasXCliente($objCliente1->getTipoDoc(), $objCliente1->getNroDoc());
echo "Ventas del cliente 1: \n";
foreach ($ventasCliente1 as $venta) {
    echo $venta . "\n";
}
$ventasCliente2 = $empresa->retornarVentasXCliente($objCliente2->getTipoDoc(), $objCliente2->getNroDoc());
echo "Ventas del cliente 2: \n";
foreach ($ventasCliente2 as $venta) {
    echo $venta . "\n";
}

echo $empresa;










?>