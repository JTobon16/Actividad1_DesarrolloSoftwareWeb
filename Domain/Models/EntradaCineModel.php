<?php

declare(strict_types=1);

namespace Domain\Models;

use Domain\ValueObjects\EntradaCineId;
use Domain\ValueObjects\EntradaCineFecha;
use Domain\ValueObjects\EntradaCineHora;
use Domain\ValueObjects\EntradaCineValor;
use Domain\ValueObjects\EntradaCinePelicula;
use Domain\ValueObjects\EntradaCinePuesto;
use Domain\ValueObjects\EntradaCineSala;
use Domain\ValueObjects\EntradaCineCine;
use Domain\ValueObjects\EntradaCinePais;
use Domain\ValueObjects\EntradaCineDepartamento;
use Domain\ValueObjects\EntradaCineCiudad;
use Domain\ValueObjects\EntradaCineCentroComercial;
use Domain\Enums\GeneroEnum;

final class EntradaCineModel
{
    private EntradaCineId              $id;
    private EntradaCineFecha           $fechaCompra;
    private EntradaCineFecha           $fechaEntrada;
    private EntradaCineHora            $horaInicio;
    private EntradaCineHora            $horaFin;
    private EntradaCineValor           $valor;
    private EntradaCinePelicula        $pelicula;
    private EntradaCinePuesto          $puesto;
    private EntradaCineSala            $sala;
    private string                     $genero;
    private EntradaCineCine            $cine;
    private EntradaCinePais            $pais;
    private EntradaCineDepartamento    $departamento;
    private EntradaCineCiudad          $ciudad;
    private EntradaCineCentroComercial $centroComercial;

    public function __construct(
        EntradaCineId              $id,
        EntradaCineFecha           $fechaCompra,
        EntradaCineFecha           $fechaEntrada,
        EntradaCineHora            $horaInicio,
        EntradaCineHora            $horaFin,
        EntradaCineValor           $valor,
        EntradaCinePelicula        $pelicula,
        EntradaCinePuesto          $puesto,
        EntradaCineSala            $sala,
        string                     $genero,
        EntradaCineCine            $cine,
        EntradaCinePais            $pais,
        EntradaCineDepartamento    $departamento,
        EntradaCineCiudad          $ciudad,
        EntradaCineCentroComercial $centroComercial
    ) {
        GeneroEnum::ensureIsValid($genero);

        $this->id              = $id;
        $this->fechaCompra     = $fechaCompra;
        $this->fechaEntrada    = $fechaEntrada;
        $this->horaInicio      = $horaInicio;
        $this->horaFin         = $horaFin;
        $this->valor           = $valor;
        $this->pelicula        = $pelicula;
        $this->puesto          = $puesto;
        $this->sala            = $sala;
        $this->genero          = $genero;
        $this->cine            = $cine;
        $this->pais            = $pais;
        $this->departamento    = $departamento;
        $this->ciudad          = $ciudad;
        $this->centroComercial = $centroComercial;
    }

    public static function create(
        EntradaCineId              $id,
        EntradaCineFecha           $fechaCompra,
        EntradaCineFecha           $fechaEntrada,
        EntradaCineHora            $horaInicio,
        EntradaCineHora            $horaFin,
        EntradaCineValor           $valor,
        EntradaCinePelicula        $pelicula,
        EntradaCinePuesto          $puesto,
        EntradaCineSala            $sala,
        string                     $genero,
        EntradaCineCine            $cine,
        EntradaCinePais            $pais,
        EntradaCineDepartamento    $departamento,
        EntradaCineCiudad          $ciudad,
        EntradaCineCentroComercial $centroComercial
    ): self {
        return new self(
            $id,
            $fechaCompra,
            $fechaEntrada,
            $horaInicio,
            $horaFin,
            $valor,
            $pelicula,
            $puesto,
            $sala,
            $genero,
            $cine,
            $pais,
            $departamento,
            $ciudad,
            $centroComercial
        );
    }

    public function id(): EntradaCineId
    {
        return $this->id;
    }
    public function fechaCompra(): EntradaCineFecha
    {
        return $this->fechaCompra;
    }
    public function fechaEntrada(): EntradaCineFecha
    {
        return $this->fechaEntrada;
    }
    public function horaInicio(): EntradaCineHora
    {
        return $this->horaInicio;
    }
    public function horaFin(): EntradaCineHora
    {
        return $this->horaFin;
    }
    public function valor(): EntradaCineValor
    {
        return $this->valor;
    }
    public function pelicula(): EntradaCinePelicula
    {
        return $this->pelicula;
    }
    public function puesto(): EntradaCinePuesto
    {
        return $this->puesto;
    }
    public function sala(): EntradaCineSala
    {
        return $this->sala;
    }
    public function genero(): string
    {
        return $this->genero;
    }
    public function cine(): EntradaCineCine
    {
        return $this->cine;
    }
    public function pais(): EntradaCinePais
    {
        return $this->pais;
    }
    public function departamento(): EntradaCineDepartamento
    {
        return $this->departamento;
    }
    public function ciudad(): EntradaCineCiudad
    {
        return $this->ciudad;
    }
    public function centroComercial(): EntradaCineCentroComercial
    {
        return $this->centroComercial;
    }

    public function toArray(): array
    {
        return [
            'id'              => $this->id->value(),
            'fechaCompra'     => $this->fechaCompra->value(),
            'fechaEntrada'    => $this->fechaEntrada->value(),
            'horaInicio'      => $this->horaInicio->value(),
            'horaFin'         => $this->horaFin->value(),
            'valor'           => $this->valor->value(),
            'pelicula'        => $this->pelicula->value(),
            'puesto'          => $this->puesto->value(),
            'sala'            => $this->sala->value(),
            'genero'          => $this->genero,
            'cine'            => $this->cine->value(),
            'pais'            => $this->pais->value(),
            'departamento'    => $this->departamento->value(),
            'ciudad'          => $this->ciudad->value(),
            'centroComercial' => $this->centroComercial->value(),
        ];
    }
}
