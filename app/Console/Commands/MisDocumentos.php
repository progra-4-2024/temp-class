<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MisDocumentos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mis-documentos {--M|NumeroDoc=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Bienvenido');
        $NumeroDeDocumento = $this->option('NumeroDoc');
        if(empty($NumeroDeDocumento)){
            $this->line('No se ha proporcionado el número de documento');
            $this->line('los documentos disponibles son:');
            $this->line('1. El Cambio Climatico');
            $this->line('2. ENCA (Escuela Nacional Central de Agricultura');
            $NumeroDeDocumento=$this->ask('Numero De Documento:');
        }
        if($NumeroDeDocumento == 1){
            $this->line('Se ha Escogido el Documento 1 (El Cambio Climatico):');
            $this->line('La importancia del reciclaje');
            $this->line('A veces se describe al vidrio como un material que puede reciclarse infinitamente sin afectar su calidad,');
            $this->line('pureza o durabilidad.');
            $this->line('');
            $this->line('El vidrio reciclado se puede triturar en desechos de vidrio, que se pueden derretir y utilizar para producir más vidrio.');
            $this->line('');
            $this->line('Los recipientes de vidrio tienen una alta tasa de reciclaje en comparación con otros materiales.');
            $this->line('');
            $this->line('En Europa, la tasa media de reciclaje del vidrio es del 76%, en comparación con el 41% para los envases de plástico y el 31% para los de madera.');
            $this->line('');
            $this->line('Cuando el vidrio se deja en el entorno natural es menos probable que cause contaminación que el plástico.');
        } if ($NumeroDeDocumento == 2){
            $this->line('Se ha Escogido el Documento 2 (ENCA Guatemala):');
            $this->line('Escuela Nacional Central de Agricultura');
            $this->line('La entidad rectora de la educación media agropecuaria, forestal y agroindustrial de Guatemala. Educamos con los valores institucionales a');
            $this->line('mujeres y hombres para contribuir al desarrollo del agro y alcanzar altos niveles de competitividad y desempeño global e integral,,');
            $this->line('');
            $this->line('Objetivos Estrategicos');
            $this->line('No. 01: Gestionar una escuela de educación agropecuaria, forestal y agroindustrial.');
            $this->line('');
            $this->line('No. 02: Ejercer la funcion rectora de la educacion media agropecuaria, forestal y agroindustrial.');
            $this->line('');
            $this->line('No. 03: Promover una iniciativa y Proyeccion hacia el sector privado y Público agropecuario, forestal y agroindustrial.');
            $this->line('');
            $this->line('No. 04: Integrar procesos y herramientas de Investigacion en innovacion como sustento de formacion profesional');
        } else {
            $this->line('Ese Documento no Existe');
        }
    }
}
