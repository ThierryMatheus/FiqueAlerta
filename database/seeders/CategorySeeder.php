<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Pavimentação","Segurança pública","Saneamento básico","Limpeza urbana","Internet privada","Fornecimento de energia", "Fornecimento de água","Urbanização: árvores e podas","Manutenção de vias públicas","Sinalização de trânsito","Acidente de trânsito","Incêndio","Desmatamento ilegal","Deslizamento de barreira","Maus tratos aos animais","Perturbação da ordem pública","Correios - Cobertura do serviço","Aplicativos de entrega - Cobertura do serviço"];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
