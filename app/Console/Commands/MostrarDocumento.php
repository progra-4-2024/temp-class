<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MostrarDocumento extends Command
{
    
    protected $signature = 'documento:mostrar {documento? : Número del documento}';

    
    protected $description = 'Muestra un documento específico por su número';

    
    protected $documentos = [
        1 => 'Documento 1 - La importancia del vidrio y su reciclaje',
        2 => 'Documento 2 - El uso de hongos en la ingeniería agronómica',
        3 => 'Documento 3 - La relevancia del registro de patentes',
    ];

  
    public function handle()
    {
    
        $numeroDocumento = $this->argument('documento');

        if (!$numeroDocumento) {
            $numeroDocumento = $this->choice(
                'Seleccione un documento:',
                array_keys($this->documentos),
                null
            );
        }

       
        if (isset($this->documentos[$numeroDocumento])) {
            $this->info('Mostrando: ' . $this->documentos[$numeroDocumento]);
        
            $contenido = file_get_contents(storage_path('documentos/documento' . $numeroDocumento . '.txt'));
            $this->line($contenido);
        } else {
            $this->error('El documento seleccionado no existe.');
        }
    }
}
