<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Browser;
use App\Models\Gasto;
use App\Models\GastoMes;

class InformeController extends Controller
{
    //
    public function Informe(Request $request)
    {
        $informe = $request['informe'];
        $parametros = [];
        $titulo = "Sin título";
        if(!empty($informe)){
            if($informe == 1){
                $titulo = "Navegadores más utilizados en la empresa";
                $navegadores = Browser::all();
                foreach($navegadores as $navegador){
                    $parametros[]=['name'=>$navegador['navegador'], 'y'=> floatval($navegador['porcentaje'])];
                }
            }else if($informe==2){
                $titulo = "Principales gastos generados en la empresa";
                $gastos = Gasto::all();
                $total = 0;
                foreach($gastos as $gasto){
                    $total = $total + floatval($gasto['importe']);
                }
                foreach($gastos as $gasto){
                    $porcentaje = (100 * floatval($gasto['importe']))/$total;
                    $parametros[]=['name'=>$gasto['concepto'], 'y'=> floatval($gasto['importe'])];
                }
            }else if($informe == 3){
                $titulo = "Gastos por mes";
                $gastosmes = GastoMes::all();
                $total = 0;
                foreach($gastosmes as $gasto){
                    $total = $total + floatval($gasto['importe']);
                }
                foreach($gastosmes as $gasto){
                    $porcentaje = (100 * floatval($gasto['importe']))/$total;
                    $parametros[]=['name'=>$gasto['mes'], 'y'=> floatval($gasto['importe'])];
                }
            }
        }
        
        $pastel = new Pastel();
        $barras = new Barras();
        $data = json_encode($parametros);
        $construccion = "<script>Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'estilo'
            },
            title: {
                text: '$titulo'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: $data
            }]
        });</script>";
        $tipo = [$pastel->createInforme($construccion), $barras->createInforme($construccion)];
    return view('Informe',['data'=>json_encode($parametros),'tipo'=>serialize($tipo), /*'construccion'=>$construccion*/]);
    }
}

abstract class Informes
{
    /**
     * Esta clase devuelve un objeto de tipo InformeConnector
     */
    abstract public function getDatosInforme(): InformeConnector;

    /**
     * Cuando el factory method utiliza la clase creador, otras clases pueden alterar 
     * la lógica de manera indirecta
     */
    public function informe($contenido): void
    {
        // Se llama al factory method para cerar un producto...
        $info = $this->getDatosInforme();
        // ...entonces podrá usarlo.
        $info->createPost($contenido);
    }
}

/**
 * Este creador concreto es compatible con la clase Pastel. 
 */
class InformePastel extends Informes
{
    private $tipo, $contendedor;

    public function __construct(string $tipo, string $datos)
    {
        $this->tipo = $tipo;
        $this->contendedor = $contendedor;
    }

    public function getDatosInforme(): InformeConnector
    {
        $pastel = new Pastel($this->tipo, $this->contendedor);
        return $pastel;
    }
}

/**
 * Este creador concreto soporta la clase Barras.
 */
class InformeBarras extends Informes
{
    private $tipo, $contendedor;

    public function __construct(string $tipo, string $contendedor)
    {
        $this->tipo = $tipo;
        $this->contendedor = $contendedor;
    }

    public function getDatosInforme(): InformeConnector
    {
        return new Barras($this->tipo, $this->contendedor);
    }
}

/**
 * La interfaz del producto declara comportamientos de varios tipos de productos.
 */
interface InformeConnector
{
    public function createInforme($contenido): string;
}

/**
 * Este producto concreto implementa de la API Pastel.
 */
class Pastel implements InformeConnector
{
    private $tipo = "pie", $contenedor="container1";

    public function createInforme($contenido): string
    {
        $contenido = str_replace("estilo", $this->tipo, $contenido);
        $contenido = str_replace("container", $this->contenedor, $contenido);
        return ($contenido);
    }
}

/**
 * Este producto concreto implementa de la API Barras.
 */
class Barras implements InformeConnector
{
    private $tipo = "column", $contenedor="container2";

    public function createInforme($contenido): string
    {
        $contenido = str_replace("estilo", $this->tipo, $contenido);
        $contenido = str_replace("container", $this->contenedor, $contenido);
        return $contenido;
    }
}