<?php

class Empleado {
    public function calcularSueldo() {
        return 0;
    }
}

class EmpleadoFijo extends Empleado {
    public function calcularSueldo() {
        return 50000;
    }
}

class EmpleadoPorHora extends Empleado {
    public $horas;
    public $precioHora;

    public function __construct($horas, $precioHora) {
        $this->horas = $horas;
        $this->precioHora = $precioHora;
    }

    public function calcularSueldo() {
        return $this->horas * $this->precioHora;
    }
}

class Vendedor extends Empleado {
    public $sueldoBase;
    public $ventas;
    public $comision;

    public function __construct($sueldoBase, $ventas, $comision) {
        $this->sueldoBase = $sueldoBase;
        $this->ventas = $ventas;
        $this->comision = $comision;
    }

    public function calcularSueldo() {
        return $this->sueldoBase + ($this->ventas * $this->comision / 100);
    }
}

$empleados = [
    new EmpleadoFijo(),
    new EmpleadoPorHora(160, 300),
    new Vendedor(30000, 200000, 5)
];

foreach ($empleados as $empleado) {
    echo "Sueldo: $" . $empleado->calcularSueldo() . "<br>";
}
