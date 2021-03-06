<?php
namespace App\Controller;

use App\Entity\Pokemon;
use App\Model\PokemonModel;
use Core\Controller\DefaultController;

class PokemonController extends DefaultController{

    public function __construct()
    {
        $this->manager = new PokemonModel;
    }

    public function deletePokemon($id){
        $this->manager->delete($id);
        header('Location: /php-oop/public/index.php/?page=allPokemons');
    }

    public function addPokemon()
    {
        if (!empty($_POST)) {
            $_POST["hp"] = (int)$_POST["hp"];

            // To convert checkbox into boolean for DB
            ($_POST["hasEvolve"] == "on") ? ($_POST["hasEvolve"] = 1) : ($_POST["hasEvolve"] = 0);
            $pokemon = new Pokemon();
            $pokemon->hydrate($_POST);
            $this->manager->create($pokemon);
            $this->redirectToRoute("allPokemons");
        }
        $this->render("addPokemon");
    }
    public function updatePokemon($pokemon)
        {
            if (!empty($_POST)) {
                $this->manager->update($pokemon);
            }
        }
}
