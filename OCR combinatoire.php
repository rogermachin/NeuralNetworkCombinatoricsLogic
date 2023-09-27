<?php
class Neurone {
    private $probabilites;  // Tableau de probabilités
    private $seuil;         // Seuil pour valider la sortie (S)

    // Constructeur pour initialiser les probabilités et le seuil
    public function __construct($probabilites, $seuil) {
        $this->probabilites = $probabilites;
        $this->seuil = $seuil;
    }

    // Fonction pour calculer la sortie du neurone en fonction des entrées A, B et C
    public function calculerSortie($A, $B, $C) {
        // Calcul de la probabilité de la sortie S en utilisant la fonction calculerProbabiliteS
        $probabiliteS = $this->calculerProbabiliteS($A, $B, $C);

        // Si la probabilité de la sortie S dépasse le seuil, retourner 1, sinon 0
        return ($probabiliteS >= $this->seuil) ? 1 : 0;
    }

    // Fonction pour calculer la probabilité de la sortie S
    private function calculerProbabiliteS($A, $B, $C) {
        // Si C=0, la probabilité de la sortie S est la probabilité associée à la cellule (A, B) lorsque C=0
        if ($C === 0) {
            return $this->probabilites[$A][$B];
        } else {  // Si C=1, ajuster la probabilité en fonction du tableau de Karnaugh
            return $this->probabilites[$A][$B] * 0.3;  // Par exemple, ajuster à 0.3 (la valeur peut être ajustée en fonction de votre logique)
        }
    }
}

class CoucheNeuronale {
    private $neurones;  // Tableau des neurones de la couche

    // Constructeur pour initialiser la couche avec un tableau de neurones
    public function __construct($neurones) {
        $this->neurones = $neurones;
    }

    // Fonction pour calculer la sortie de la couche en fonction des entrées A, B et C
    public function calculerSortieCouche($A, $B, $C) {
        $sorties = [];

        // Calculer la sortie pour chaque neurone dans la couche
        foreach ($this->neurones as $neurone) {
            $sorties[] = $neurone->calculerSortie($A, $B, $C);
        }

        return $sorties;
    }
}

class CoucheSortie {
    private $neurones;  // Tableau des neurones dans la couche de sortie

    // Constructeur pour initialiser la couche avec un tableau de neurones
    public function __construct($neurones) {
        $this->neurones = $neurones;
    }

    // Fonction pour calculer la sortie de la couche de sortie en fonction des entrées de la couche précédente
    public function calculerSortieCouche($entreesCouchePrecedente) {
        $sorties = [];

        // Calculer la probabilité pour chaque neurone dans la couche de sortie
        foreach ($this->neurones as $neurone) {
            $sorties[] = $neurone->calculerProbabilite($entreesCouchePrecedente);
        }

        return $sorties;
    }
}

class NeuroneSortie {
    private $caractereASCII;  // Caractère ASCII représenté par ce neurone

    // Constructeur pour initialiser le neurone avec un caractère ASCII
    public function __construct($caractereASCII) {
        $this->caractereASCII = $caractereASCII;
    }

    // Fonction pour calculer la probabilité associée à la présence du caractère ASCII correspondant
    public function calculerProbabilite($entreesCouchePrecedente) {
        // Dans cette exemple, nous simulons une probabilité aléatoire
        // Vous devrez implémenter votre propre logique pour calculer la probabilité
        return mt_rand(0, 100) / 100.0;  // Valeur aléatoire entre 0 et 1
    }
}

// Création des neurones de la couche de perception
$probabilites = [
    [0.2, 1.0],
    [0.3, 0.8]
];

$S = 0.5;
$neurone1 = new Neurone($probabilites, $S);
$neurone2 = new Neurone($probabilites, $S);
$couchePerception = new CoucheNeuronale([$neurone1, $neurone2]);

// Création des neurones de la couche de sortie pour les caractères ASCII de 32 à 127
$neuronesSortie = [];
for ($caractereASCII = 32; $caractereASCII <= 127; $caractereASCII++) {
    $neuronesSortie[] = new NeuroneSortie($caractereASCII);
}

// Création de la couche de sortie
$coucheSortie = new CoucheSortie($neuronesSortie);

// ... Ajoutez d'autres couches cachées si nécessaire ...

// Exemple d'appel pour calculer la sortie du réseau pour A=0, B=1, C=1
$A = 0;
$B = 1;
$C = 1;

// Calculer la sortie de la couche de perception
$sortiePerception = $couchePerception->calculerSortieCouche($A, $B, $C);

// Calculer la sortie de la couche de sortie
$probabilitesSortie = $coucheSortie->calculerSortieCouche($sortiePerception);

// Afficher les probabilités associées à chaque caractère ASCII
for ($i = 0; $i < count($probabilitesSortie); $i++) {
    echo "Probabilité pour le caractère ASCII " . $neuronesSortie[$i]->caractereASCII . ": " . $probabilitesSortie[$i] . "\n";
}
?>
