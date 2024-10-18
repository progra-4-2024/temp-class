<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListaConferencias extends Command
{
    // Definir la firma del comando
    protected $signature = 'conferencia:list {document_number?}';

    // Descripción del comando
    protected $description = 'Lista y muestra los documentos de las conferencias del día Miércoles 21/08/2024';

    // Lista de documentos con títulos y resúmenes
    protected $conferencias = [
        1 => [
            'title' => '7000 años de sostenibilidad',
            'summary' => 'La charla se centró en el reciclaje y el amplio uso que se le puede dar al vidrio en Guatemala, mostrándonos sus increíbles usos desde la antigüedad hasta el día de hoy.',
        ],
        2 => [
            'title' => 'Economía circular',
            'summary' => 'El tema analizado fue el ciclo de la creación de valor (producir - consumir - desechar). La idea principal es crear productos centrados en que puedan ser reciclados en todos los aspectos y tengan durabilidad.',
        ],
        3 => [
            'title' => 'Investigaciones EPS',
            'summary' => 'Charla centrada en el desarrollo agrícola sostenible, con investigaciones sobre cómo ciertos insectos pueden ayudar en la cosecha de vegetales como la cebolla, calabaza y chile pimiento.',
        ],
        4 => [
            'title' => 'Conectividad para el desarrollo e infraestructura para la competitividad',
            'summary' => 'Charla centrada en las diferencias de políticas en Guatemala y cómo ayudan a sostener un plan de reactivación social y económica, incluyendo los esfuerzos del CES.',
        ],
    ];

    public function handle()
    {
        // Obtener el número de documento de la entrada del usuario
        $documentNumber = $this->argument('document_number');

        // Si no se proporciona un número de documento, preguntar al usuario
        if (!$documentNumber) {
            // Crear una lista de opciones con el formato deseado
            $choices = [];
            foreach ($this->conferencias as $number => $document) {
                $choices[$number] = "{$document['title']} ($number)";
            }

            // Preguntar al usuario usando la lista personalizada
            $selectedChoice = $this->choice('Seleccione un documento:', $choices);

            // Extraer el número de documento desde la clave del array
            $documentNumber = array_search($selectedChoice, $choices);
        }

        // Verificar si el número de documento es válido
        if (isset($this->conferencias[$documentNumber])) {
            $conferencia = $this->conferencias[$documentNumber];
            $this->info("Título: " . $conferencia['title']);
            $this->info("Resumen: " . $conferencia['summary']);
        } else {
            $this->error("Número de documento inválido.");
        }
    }
}
