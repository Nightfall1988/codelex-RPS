<?php
namespace App;

class SymbolCollection
{
    private array $collection;

    public function __construct(array $symbolList)
    {
        $this->collection = $symbolList;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }

    public function getSymbolByName(string $name): Symbol
    {
        foreach ($this->collection as $symbol) {
            if($symbol->getName() == $name) {
                return $symbol;
            }
        }
    }

    public function addSymbol(string $name): Symbol
    {
        foreach ($this->collection as $symbol) {
            if($symbol->getName() == $name) {
                return $symbol;
            }
        }
    }
}
?>