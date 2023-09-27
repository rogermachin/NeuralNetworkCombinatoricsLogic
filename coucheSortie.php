                                                                                              <?php
class CoucheSortie {
    private $neurones;  // Tableau des neurones dans la couche de sortie

    // Constructeur pour initialiser la couche avec un tableau de neurones
    public function __construct($neurones) {
        $this->neurones = $neurones;
    }

    // Fonction pour calculer la sortie de la couche de sortie en fonction des entrées de la couche précédente
    public function calculerSortieCouche($entreesCouchePrecedente) {
        $sorties = [];

        // Calculer la sortie pour chaque neurone dans la couche de sortie
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

// Création des neurones de la couche de sortie pour les caractères ASCII de 32 à 127
$neuronesSortie = [];
for ($caractereASCII = 32; $caractereASCII <= 127; $caractereASCII++) {
    $neuronesSortie[] = new NeuroneSortie($caractereASCII);
}

// Création de la couche de sortie
$coucheSortie = new CoucheSortie($neuronesSortie);

// Exemple d'appel pour calculer la sortie de la couche de sortie (probabilités pour chaque caractère ASCII)
$entreesCouchePrecedente = [/* Les sorties de la couche précédente */];
$probabilitesSortie = $coucheSortie->calculerSortieCouche($entreesCouchePrecedente);

// Afficher les probabilités associées à chaque caractère ASCII
for ($i = 0; $i < count($probabilitesSortie); $i++) {
    echo "Probabilité pour le caractère ASCII " . $neuronesSortie[$i]->caractereASCII . ": " . $probabilitesSortie[$i] . "\n";
}
?>
