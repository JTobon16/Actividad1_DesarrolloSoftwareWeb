<?php

declare(strict_types=1);

final class UpdateEntradaCineCommand
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

    public function getId(): string
    {
        return $this->id;
    }
    public function getFechaCompra(): string
    {
        return $this->fechaCompra;
    }
    public function getFechaEntrada(): string
    {
        return $this->fechaEntrada;
    }
    public function getHoraInicio(): string
    {
        return $this->horaInicio;
    }
    public function getHoraFin(): string
    {
        return $this->horaFin;
    }
    public function getValor(): string
    {
        return $this->valor;
    }
    public function getPelicula(): string
    {
        return $this->pelicula;
    }
    public function getPuesto(): string
    {
        return $this->puesto;
    }
    public function getSala(): string
    {
        return $this->sala;
    }
    public function getGenero(): string
    {
        return $this->genero;
    }
    public function getCine(): string
    {
        return $this->cine;
    }
    public function getPais(): string
    {
        return $this->pais;
    }
    public function getDepartamento(): string
    {
        return $this->departamento;
    }
    public function getCiudad(): string
    {
        return $this->ciudad;
    }
    public function getCentroComercial(): string
    {
        return $this->centroComercial;
    }
}
