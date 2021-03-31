<?php
namespace App;
use App\Game;

class Controller
{
    private Game $game;

    public function __construct()
    {
        $this->game = new Game;
    }

    public function home()
    {
        $this->game->createCollection();
        $this->game->printableSymbols();
    }

    public function play()
    {
        $symbolName = $_POST['symbol'];
        $symbolList = $this->game->getAllActiveSymbolObjects($symbolName);
        $this->game->battle($symbolList[0],$symbolList[1]);
    }
}

?>