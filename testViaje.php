<?php
require_once 'ResponsableV.php';
require_once 'Pasajero.php';
require_once 'Viaje.php';

// Crear responsable del viaje
$responsable = new ResponsableV(1234, "ABC123", "Juan", "Perez");

// Crear viaje
$viaje = new Viaje("V001", "Destino", 50, $responsable);

// Menú de opciones
while (true) {
    echo "\nMenú:\n";
    echo "1. Modificar información del viaje\n";
    echo "2. Agregar pasajero\n";
    echo "3. Modificar información de un pasajero\n";
    echo "4. Mostrar información del viaje\n";
    echo "5. Salir\n";
    echo "Seleccione una opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            echo "Ingrese el nuevo código del viaje: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);

            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);

            echo "Ingrese la nueva cantidad máxima de pasajeros del viaje: ";
            $maxPasajeros = intval(trim(fgets(STDIN)));
            $viaje->setMaxPasajeros($maxPasajeros);
            break;
        case '2':
            echo "Ingrese el nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            
            echo "Ingrese el apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            
            echo "Ingrese el número de documento del pasajero: ";
            $documento = trim(fgets(STDIN));
            
            echo "Ingrese el teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));

            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            $viaje->agregarPasajero($pasajero);
            break;
        case '3':
            echo "Ingrese el documento del pasajero a modificar: ";
            $documento = trim(fgets(STDIN));
            
            echo "Ingrese el nuevo nombre del pasajero: ";
            $nombre = trim(fgets(STDIN));
            
            echo "Ingrese el nuevo apellido del pasajero: ";
            $apellido = trim(fgets(STDIN));
            
            echo "Ingrese el nuevo teléfono del pasajero: ";
            $telefono = trim(fgets(STDIN));

            $viaje->modificarPasajero($documento, $nombre, $apellido, $telefono);
            break;
        case '4':
            echo $viaje;
            break;
        case '5':
            echo "Saliendo...\n";
            exit();
        default:
            echo "Opción inválida. Por favor, seleccione nuevamente.\n";
            break;
    }
}
?>
