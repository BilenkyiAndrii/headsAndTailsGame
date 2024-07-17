# Coin Flip Game

This is a simple coin flip game implemented in PHP using only OOP. The game consists of two players, each with a certain number of coins. Players take turns flipping a coin, and the winner of each flip takes a coin from the other player. The game continues until one of the players goes bankrupt (i.e., has zero coins).

## Features

- Two players with initial coin amounts.
- Simulates coin flips (heads or tails).
- Adjusts the coin count for each player based on the result of the coin flip.
- Determines and displays the winner when one player goes bankrupt.
- Calculates and displays the odds of each player winning before the game starts.

## Classes

### Player

The `Player` class represents a player in the game. It has the following properties and methods:

- `name`: The name of the player.
- `coins`: The number of coins the player has.
- `__construct($name, $coins)`: Initializes a new player with the given name and coin amount.
- `point(Player $player)`: Increases the player's coin count by one and decreases the other player's coin count by one.
- `bankrut()`: Checks if the player is bankrupt.
- `bank()`: Returns the player's current coin count.
- `odds(Player $player)`: Calculates the player's odds of winning based on the current coin counts.

### Game

The `Game` class represents the coin flip game. It has the following properties and methods:

- `player1`: The first player.
- `player2`: The second player.
- `flips`: The number of coin flips that have occurred.
- `__construct(Player $player1, Player $player2)`: Initializes a new game with the given players.
- `flip()`: Simulates a coin flip and returns "heads" or "tails".
- `start()`: Starts the game and displays the initial odds for each player.
- `play()`: Runs the game loop, flipping the coin and updating the players' coin counts until one player goes bankrupt.
- `winner()`: Determines and returns the winning player.
- `end()`: Ends the game and displays the winner and the final coin counts.

## Usage

To run the game, create two players with their initial coin amounts and start the game:

```php
$game = new Game(
    new Player("Joe", 10000),
    new Player("Mario", 100)
);

$game->start();
