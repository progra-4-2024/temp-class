<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ListDocumentsCommand extends Command
{
    // El nombre del comando
    protected $signature = 'document:list {documentNumber?}';

    // Descripción del comando
    protected $description = 'Lista documentos y permite seleccionar uno.';

    // Un arreglo de documentos de ejemplo
    protected $documents = [
        1 => 'Resumen: Desarrollo de Software Ágil',
        2 => 'Resumen: Introducción a la Inteligencia Artificial',
        3 => 'Resumen: Arquitectura de Microservicios',
        4 => 'Resumen: DevOps y Automatización',
    ];

    // Ejecución del comando
    public function handle()
    {
        // Obtener el argumento opcional documentNumber
        $documentNumber = $this->argument('documentNumber');

        // Si no se pasa el número de documento, mostrar un menú con choice
        if (!$documentNumber) {
            $documentNumber = $this->choice(
                'Por favor, selecciona un documento', // Pregunta
                array_keys($this->documents),         // Opciones
                0                                      // Opción por defecto
            );
        }

        // Mostrar el documento seleccionado
        if (array_key_exists($documentNumber, $this->documents)) {
            $this->info("Documento seleccionado: " . $this->documents[$documentNumber]);
        } else {
            $this->error('Número de documento inválido.');
        }
    }
}
