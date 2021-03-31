<?php
namespace App;
use App\SymbolCollection;

class View
{
    private SymbolCollection $collection;

    public function __construct(SymbolCollection $collection)
    {
        $this->collection = $collection;
    }

    public function greeting()
    {
        echo "<h1>Welcome to Rock paper scissors...Lizard, Dynamite!</h1>";
    }

    public function createSelection(): void
    {
        echo '<div style="display: flex;">';
        foreach ($this->collection->getCollection() as $symbol) {
            $value = $symbol->getName();
            require 'app/View/template.php';
        }
        echo '</div>';
    }

    public function battleResults(array $battleResult): void
    {
        $userSymbolName = $battleResult[0];
        $computerSymbolName = $battleResult[1];
        $sign = $battleResult[2];
        require('app/View/battle.php');
    }
}


?>