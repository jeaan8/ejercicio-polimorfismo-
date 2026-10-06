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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sueldos de empleados</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf2fb;
            font-family: Arial, sans-serif;
            color: #243b53;
        }

        table {
            width: 600px;
            max-width: 94%;
            border-collapse: collapse;
            background: white;
            font-size: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px #243b5320;
        }

        th, td {
            padding: 22px 16px;
            text-align: center;
        }

        th {
            background: #3568ad;
            color: white;
        }

        tr:nth-child(odd) {
            background: #f1f6fc;
        }
    </style>
</head>
<body>
<?php
echo '<table>';
echo '<tr><th>Tipo de empleado</th><th>Sueldo</th></tr>';

foreach ($empleados as $empleado) {
    echo '<tr>';
    echo '<td>' . get_class($empleado) . '</td>';
    echo '<td>$' . $empleado->calcularSueldo() . '</td>';
    echo '</tr>';
}

echo '</table>';
?>
</body>
</html>
