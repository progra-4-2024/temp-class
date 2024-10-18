<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ListDocuments extends Command
{
    // Firma del comando
    protected $signature = 'documents:list {documentNumber? : Número del documento}';

    // Descripción del comando
    protected $description = 'Lista documentos y muestra uno seleccionado por el número de documento';

    public function handle()
    {
        // Obtener todos los archivos de la carpeta 'documents'
        $files = Storage::files('documents');
        $documents = array_map(function ($file) {
            return basename($file);  // Obtener solo el nombre del archivo
        }, $files);

        // Obtener el número de documento pasado como argumento (si existe)
        $documentNumber = $this->argument('documentNumber');

        // Si no se pasa el número de documento, pedir al usuario que lo seleccione
        if (!$documentNumber) {
            $documentTitle = $this->choice('Seleccione un documento', $documents);
            $documentNumber = array_search($documentTitle, $documents);  // Obtener el índice del documento
        }

        // Verificar que el número de documento sea válido
        if (isset($documents[$documentNumber])) {
            $documentPath = $files[$documentNumber];

            // Leer y mostrar el contenido del documento
            $content = Storage::get($documentPath);
            $this->info('Contenido del documento seleccionado:');
            $this->line($content);
        } else {
            $this->error('Número de documento inválido.');
        }
    }
}
