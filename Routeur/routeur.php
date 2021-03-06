<?php

use App\Controller\PokemonController;
use App\Controller\ArticleController;
use App\Model\PokemonModel;
use Core\Controller\DefaultController;

if(!isset($_GET["page"])) {
    $_GET["page"] = "home";
}

switch ($_GET["page"]) {
    case 'home':
        $controller = new DefaultController();
        $controller->home();
        break;
    case 'addPokemon':
        $controller = new PokemonController();
        $controller->addPokemon();
        break;
    case 'blog':
        $controller = new ArticleController();
        $controller->getAll("blogView", "blogs");
        break;
    case 'allPokemons':
        $controller = new PokemonController();
        $controller->getAll("indexViewPokemon", "pokemons");
        break;
    case 'pokemonView':
        $controller = new PokemonController();
        $controller->getEntityById("pokemonView", $_GET["id"], "pokemon");
        break;
    case 'delete':
        $controller = new PokemonController();
        $controller->deletePokemon($_GET["id"]);
        break;
    case 'edit':
        $controller = new PokemonController();
        $controller->getEntityById("editPokemon", $_GET["id"], "pokemon");
        $controller->updatePokemon($_POST);
    break;
    default:
        break;
}
