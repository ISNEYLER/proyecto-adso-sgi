<?php

namespace App\Validation;
use App\Models\Location;

class WareHouseRules
{
    public function almacenConUbicaciones($value, $fields = null, $data = null): bool
    {
        // Ajuste para cuando CI envía solo 2 parámetros
        if (is_array($fields) && $data === null) {
            $data = $fields;
            $fields = null;
        }

        if (!is_array($data)) {
            $data = [];
        }

        // ID del almacén
        $idAlmacen = $data['id'] ?? $value;

        if (empty($idAlmacen)) {
            return false;
        }

        $locationModel = new Location();

        // Verificar si existen ubicaciones relacionadas
        $existe = $locationModel
            ->where('id_almacen', $idAlmacen)
            ->first();

        // Si existe al menos una ubicación ⇒ NO se puede eliminar
        return $existe === null;
    }
}
