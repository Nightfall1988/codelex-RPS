<?php
namespace App;
use App\SymbolCollection;
use App\View;

class Game 
{
    private SymbolCollection $collection;

    public function createCollection(): SymbolCollection
    {
        $this->collection = new SymbolCollection([
            new Symbol('Rock',['Paper'],['Scissors']),
            new Symbol('Paper',['Scissors'],['Rock']),
            new Symbol('Scissors',['Rock'],['Paper']),
            new Symbol('Dynamite',['Paper'],['Rock','Lizard','Scissors']),
            new Symbol('Lizard',['Rock'],['Scissors','Paper'])
        ]);

        return $this->collection;
    }

    public function printableSymbols()
    {
        $view = new View($this->collection);
        $view->greeting();
        return $view->createSelection();
    }

    public function getAllActiveSymbolObjects(string $userSymbolName): array
    {
        $this->createCollection();
        $userSymbol = $this->collection->getSymbolByName($userSymbolName);
        $collectionLength = count($this->collection->getCollection());
        $computerSymbol = $this->collection->getCollection()[rand(0,$collectionLength-1)];
        return [$userSymbol, $computerSymbol];

    }

    public function battle(Symbol $userSymbol, Symbol $computerSymbol): void
    {
        $result ='';
        $userSymbolName = $userSymbol->getName();
        $computerSymbolName = $computerSymbol->getName();
        if (in_array($userSymbolName, $computerSymbol->getSuperior()) 
        ||  in_array($computerSymbolName, $userSymbol->getInferior()))
        {
            $result = "You have $userSymbolName and computer has $computerSymbolName," . "\n" . "Congrats $userSymbolName has Won!";
        } 
        elseif (in_array($userSymbolName, $computerSymbol->getInferior()) 
        ||  in_array($computerSymbolName, $userSymbol->getSuperior())) {
            $result = "You have $userSymbolName and computer has $computerSymbolName," . "\n" . "Sorry, computer has won with $computerSymbolName!";
        } else {
            $result = "You have $userSymbolName and computer has $computerSymbolName, so it's a Tie!";
        }

        $view = new View($this->collection);

        $view->battleResults([$userSymbolName, $computerSymbolName, $result]);
    }
}

?>