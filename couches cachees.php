<?php
class CoucheCachee {
    private $neurones;  // Tableau des neurones dans la couche cachée

    // Constructeur pour initialiser la couche avec un tableau de neurones
    public function __construct($neurones) {
        $this->neurones = $neurones;
    }

    // Fonction pour calculer la sortie de la couche cachée en fonction des entrées de la couche précédente
    public function calculerSortieCouche($entreesCouchePrecedente) {
        $sorties = [];

        // Calculer la sortie pour chaque neurone dans la couche cachée
        foreach ($this->neurones as $neurone) {
            $sorties[] = $neurone->calculerSortie($entreesCouchePrecedente);
        }

        return $sorties;
    }
}

// ... Classe Neurone (définie précédemment) ...

// Création des neurones pour une couche cachée (ex. 5 neurones)
$neuronesCachee1 = [];
for ($i = 0; $i < 5; $i++) {
    $neuronesCachee1[] = new Neurone(/* ... Paramètres appropriés ... */);
}

// Création des neurones pour une autre couche cachée (ex. 3 neurones)
$neuronesCachee2 = [];
for ($i = 0; $i < 3; $i++) {
    $neuronesCachee2[] = new Neurone(/* ... Paramètres appropriés ... */);
}

// Création de la couche cachée 1
$coucheCachee1 = new CoucheCachee($neuronesCachee1);

// Création de la couche cachée 2
$coucheCachee2 = new CoucheCachee($neuronesCachee2);

// ... Création de la couche de sortie (définie précédemment) ...

// ... Initialisation du réseau avec les couches d'entrée, cachées et de sortie ...

// Calcul de la sortie du réseau en fonction des entrées
$entrees = [/* Les entrées du réseau */];
$sortieCoucheCachee1 = $coucheCachee1->calculerSortieCouche($entrees);
$sortieCoucheCachee2 = $coucheCachee2->calculerSortieCouche($sortieCouchee1);
$sortieCoucheSortie = $coucheSortie->calculerSortieCouche($sortieCoucheCachee2);
// Afficher la sortie du réseau
print_r($sortieCoucheSortie);
?>
