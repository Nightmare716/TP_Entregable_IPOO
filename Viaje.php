<?php

class Viaje {
    // Atributos
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;
    private $responsable;

    // Constructor
    public function __construct($codigo, $destino, $maxPasajeros, $responsable) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajeros = array();
        $this->responsable = $responsable;
    }

    // Métodos de acceso
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }

    public function setMaxPasajeros($maxPasajeros) {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function getPasajeros() {
        return $this->pasajeros;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    // Método para agregar un pasajero al viaje
    public function agregarPasajero($pasajero) {
        // Verificar que el pasajero no esté ya cargado en el viaje
        foreach ($this->pasajeros as $p) {
            if ($p->getDocumento() === $pasajero->getDocumento()) {
                echo "Error: El pasajero ya está cargado en este viaje.\n";
                return;
            }
        }
        // Verificar si hay espacio disponible para más pasajeros
        if (count($this->pasajeros) < $this->maxPasajeros) {
            $this->pasajeros[] = $pasajero;
            echo "Pasajero agregado al viaje.\n";
        } else {
            echo "Error: No hay espacio disponible para más pasajeros en este viaje.\n";
        }
    }

    // Método para modificar los datos de un pasajero
    public function modificarPasajero($documento, $nombre, $apellido, $telefono) {
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() === $documento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                echo "Datos del pasajero actualizados.\n";
                return;
            }
        }
        echo "Error: No se encontró un pasajero con el documento especificado.\n";
    }

    // Método para representar Viaje como una cadena de texto
    public function __toString() {
        $str = "Código del Viaje: {$this->codigo}\n";
        $str .= "Destino: {$this->destino}\n";
        $str .= "Cantidad Máxima de Pasajeros: {$this->maxPasajeros}\n";
        $str .= "Responsable del Viaje: {$this->responsable->getNombre()} {$this->responsable->getApellido()} (Empleado #{$this->responsable->getNumEmpleado()}, Licencia #{$this->responsable->getNumLicencia()})\n";
        $str .= "Pasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $str .= "  Nombre: {$pasajero->getNombre()}, Apellido: {$pasajero->getApellido()}, Documento: {$pasajero->getDocumento()}, Teléfono: {$pasajero->getTelefono()}\n";
        }
        return $str;
    }
}
?>
