<?php

namespace App\Validation;

use App\Models\Movement;

class LocationRules
{
    public function ubicacionConMovimientos($value, $fields = null, $data = null): bool
    {
        // Ajuste cuando CodeIgniter envía solo 2 parámetros
        if (is_array($fields) && $data === null) {
            $data = $fields;
            $fields = null;
        }

        if (!is_array($data)) {
            $data = [];
        }

        $idUbicacion = $data['id'] ?? $value;

        if (empty($idUbicacion)) {
            return false;
        }

        $movementModel = new Movement();

        // CAMBIA el nombre de la columna si es diferente
        $existe = $movementModel
            ->where('id_ubicacion_destino', $idUbicacion)
            ->first();

        // Si existe movimiento ⇒ NO se puede eliminar
        return $existe === null;
    }
}
