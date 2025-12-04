<?php

namespace App\Validation;

use App\Models\Stock;

class ProductRules
{
    /**
     * Regla: sinExistencias
     * Retorna TRUE si el producto NO tiene stock (permite eliminar).
     *
     * Esta función acepta llamadas con 2 o 3 argumentos que CodeIgniter puede pasar:
     *  - ($value, $data)  // en algunas versiones / contextos
     *  - ($value, $fields, $data) // en otros casos
     *
     * Por eso usamos parámetros flexibles y detectamos el tipo.
     */
    public function sinExistencias($value, $fields = null, $data = null): bool
    {
        // Si $fields fue pasado como array, en realidad es $data
        if (is_array($fields) && $data === null) {
            $data = $fields;
            $fields = null;
        }

        // Si $data no es array, forzamos a array vacío para evitar warnings
        if (!is_array($data)) {
            $data = [];
        }

        // Intentamos obtener el id del producto desde $data['id'] o usar $value
        $idProducto = $data['id'] ?? $value;

        // Si no hay id, no permitimos (seguridad)
        if (empty($idProducto)) {
            return false;
        }

        $stockModel = new Stock();

        $total = $stockModel
            ->selectSum('cantidad')
            ->where('id_producto', $idProducto)
            ->first();

        $cantidad = $total->cantidad ?? 0;

        // Permitir eliminar solo si la cantidad es 0 o nula
        return ((int)$cantidad <= 0);
    }
}
