<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListarDocumentos extends Command
{
    protected $signature = 'documento:listar {--N|numero= : Número del documento}';

    protected $description = 'Lista documentos y permite seleccionar uno para mostrar su contenido';

    protected $documentos = [
        1 => 'Fonacyt',
        2 => 'ENCA',
        3 => 'Comisión técnica sectorial de Industria'
    ];

    protected $contenidoDocumentos = [
        1 => 'Por medio del Fondo Nacional de Ciencia y Tecnología (Fonacyt), el Estado de Guatemala promueve el desarrollo científico y tecnológico, brindando apoyo económico para fomentar la cantidad y la calidad de la formación académica de sus ciudadanos en áreas científicas y tecnológicas.  Asimismo, apoya las investigaciones, el desarrollo tecnológico y los emprendimientos de base científico-tecnológico que puedan impactar significativamente en la actividad productiva del país.',
        2 => 'La Escuela Nacional Central de Agricultura (ENCA), es una escuela de agricultura y rectora de la educación media agrícola, forestal y agroindustrial en Guatemala que tiene 3 carreras disponibles con el título medio de Perito. Funciona bajo el modelo de Internado y mixto.',
        3 => 'Promover y realizar actividades científico-tecnológicas y de innovación en el sector de Industria que coadyuven al mejoramiento de la calidad y eficiencia en las áreas de investigación científica, formación de recurso humano, generación, divulgación del conocimiento y transferencia de tecnología para la optimización de los procesos industriales, en un contexto de desarrollo sustentable.'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $numero = $this->option('numero');

        if (empty($numero)) {
            // Convertir los títulos en un arreglo para mostrarlos en el choice
            $titulos = array_values($this->documentos);
            // Mostrar la lista de títulos y obtener la selección del usuario
            $seleccion = $this->choice('Selecciona un documento', $titulos);

            // Obtener el índice de selección en base al valor seleccionado + 1
            $numero = array_search($seleccion, $titulos) + 1;
        }

        if (isset($this->contenidoDocumentos[$numero])) {
            $this->info("Mostrando el documento seleccionado:\n");
            $this->line($this->contenidoDocumentos[$numero]);
        } else {
            $this->error('Número de documento inválido.');
        }
    }
}
