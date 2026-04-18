<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Dto;

final class EntradaCinePersistenceDto
{
    private string $id;
    private string $fechaCompra;
    private string $fechaEntrada;
    private string $horaInicio;
    private string $horaFin;
    private string $valor;
    private string $pelicula;
    private string $puesto;
    private string $sala;
    private string $genero;
    private string $cine;
    private string $pais;
    private string $departamento;
    private string $ciudad;
    private string $centroComercial;

    public function __construct(
        string $id,
        string $fechaCompra,
        string $fechaEntrada,
        string $horaInicio,
        string $horaFin,
        string $valor,
        string $pelicula,
        string $puesto,
        string $sala,
        string $genero,
        string $cine,
        string $pais,
        string $departamento,
        string $ciudad,
        string $centroComercial
    ) {
        $this->id              = trim($id);
        $this->fechaCompra     = trim($fechaCompra);
        $this->fechaEntrada    = trim($fechaEntrada);
        $this->horaInicio      = trim($horaInicio);
        $this->horaFin         = trim($horaFin);
        $this->valor           = trim($valor);
        $this->pelicula        = trim($pelicula);
        $this->puesto          = trim($puesto);
        $this->sala            = trim($sala);
        $this->genero          = trim($genero);
        $this->cine            = trim($cine);
        $this->pais            = trim($pais);
        $this->departamento    = trim($departamento);
        $this->ciudad          = trim($ciudad);
        $this->centroComercial = trim($centroComercial);
    }

    public function id(): string
    {
        return $this->id;
    }
    public function fechaCompra(): string
    {
        return $this->fechaCompra;
    }
    public function fechaEntrada(): string
    {
        return $this->fechaEntrada;
    }
    public function horaInicio(): string
    {
        return $this->horaInicio;
    }
    public function horaFin(): string
    {
        return $this->horaFin;
    }
    public function valor(): string
    {
        return $this->valor;
    }
    public function pelicula(): string
    {
        return $this->pelicula;
    }
    public function puesto(): string
    {
        return $this->puesto;
    }
    public function sala(): string
    {
        return $this->sala;
    }
    public function genero(): string
    {
        return $this->genero;
    }
    public function cine(): string
    {
        return $this->cine;
    }
    public function pais(): string
    {
        return $this->pais;
    }
    public function departamento(): string
    {
        return $this->departamento;
    }
    public function ciudad(): string
    {
        return $this->ciudad;
    }
    public function centroComercial(): string
    {
        return $this->centroComercial;
    }
}
