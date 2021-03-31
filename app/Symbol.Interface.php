<?php
namespace App;


interface SymbolInterface 
{
    public function getName(): string;

    public function getSuperior(): array;

    public function getInferior(): array;
}