<?php

class Player
{
    public $name;
    public $coins;

    public function __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }

    public function point(Player $player)
    {
        $this->coins++;
        $player->coins--;
    }

    public function bankrut()
    {
        return $this->coins == 0;
    }

    public function bank()
    {
        return $this->coins;
    }

    public function odds(Player $player)
    {
        return round($this->bank() / ($this->bank() + $player->bank()), 2) * 100 . "%";
    }
}

class Game
{
    protected $player1;
    protected $player2;

    protected $flips = 1;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function flip()
    {
        return rand(0, 1) ? "heads" : "tails";
    }

    public function start()
    {
        echo "Start game!<br>";
        echo "Odds " . $this->player1->name . ": " . $this->player1->odds($this->player2) . "<br>";
        echo "Odds " . $this->player2->name . ": " . $this->player2->odds($this->player1) . "<br>";
        $this->play();
    }

    public function play()
    {
        while (true) {
            if ($this->flip() === "heads") {
                $this->player1->point($this->player2);
            } else {
                $this->player2->point($this->player1);
            }

            if ($this->player1->bankrut() || $this->player2->bankrut()) {
                return $this->end();
            }

            $this->flips++;
        }
    }

    public function winner(): Player
    {
        return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
    }

    public function end()
    {
        echo "Game over! Winner " . $this->winner()->name . " wins with " . $this->winner()->bank() . " coins.<br>";
        echo "The number of tosses: " . $this->flips . "<br>";
    }
}

$game = new Game(
    new Player("Joe", 10000),
    new Player("Mario", 100)
);

$game->start();
