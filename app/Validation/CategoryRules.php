<?php

namespace App\Validation;
use App\Models\Product;

class CategoryRules
{
    public function categoriaEnUso($value, $fields = null, $data = null): bool
    {
        // Ajuste cuando CI envía solo 2 parámetros
        if (is_array($fields) && $data === null) {
            $data = $fields;
            $fields = null;
        }

        if (!is_array($data)) {
            $data = [];
        }

        $idCategoria = $data['id'] ?? $value;

        if (empty($idCategoria)) {
            return false;
        }

        $productModel = new Product();

        $existe = $productModel
            ->where('id_categoria', $idCategoria)
            ->first();

        // Si existe → está en uso → NO permitir eliminar
        return $existe === null;
    }

}
