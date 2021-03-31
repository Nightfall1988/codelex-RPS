<?php
namespace App;

class Symbol //implements SymbolInterface
{
    private string $name;

    private array $superior;

    private array $inferior;

    public function __construct(string $name, array $superior, array $inferior)
    {
        $this->name = $name;

        $this->superior = $superior;

        $this->inferior = $inferior;
    }
    
    public function getName(): string {
        return $this->name;
    }

    public function getSuperior(): array {
        return $this->superior;
    }

    public function getInferior(): array {
        return $this->inferior;
    }
}
?>