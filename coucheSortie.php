                                                                                              <?php
class CoucheSortie {
    private $neurones;  // Tableau des neurones dans la couche de sortie

    // Constructeur pour initialiser la couche avec un tableau de neurones
    public function __construct($neurones) {
        $this->neurones = $neurones;
    }

    // Fonction pour calculer la sortie de la couche de sortie en fonction des entr�es de la couche pr�c�dente
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
    private $caractereASCII;  // Caract�re ASCII repr�sent� par ce neurone

    // Constructeur pour initialiser le neurone avec un caract�re ASCII
    public function __construct($caractereASCII) {
        $this->caractereASCII = $caractereASCII;
    }

    // Fonction pour calculer la probabilit� associ�e � la pr�sence du caract�re ASCII correspondant
    public function calculerProbabilite($entreesCouchePrecedente) {
        // Dans cette exemple, nous simulons une probabilit� al�atoire
        // Vous devrez impl�menter votre propre logique pour calculer la probabilit�
        return mt_rand(0, 100) / 100.0;  // Valeur al�atoire entre 0 et 1
    }
}

// Cr�ation des neurones de la couche de sortie pour les caract�res ASCII de 32 � 127
$neuronesSortie = [];
for ($caractereASCII = 32; $caractereASCII <= 127; $caractereASCII++) {
    $neuronesSortie[] = new NeuroneSortie($caractereASCII);
}

// Cr�ation de la couche de sortie
$coucheSortie = new CoucheSortie($neuronesSortie);

// Exemple d'appel pour calculer la sortie de la couche de sortie (probabilit�s pour chaque caract�re ASCII)
$entreesCouchePrecedente = [/* Les sorties de la couche pr�c�dente */];
$probabilitesSortie = $coucheSortie->calculerSortieCouche($entreesCouchePrecedente);

// Afficher les probabilit�s associ�es � chaque caract�re ASCII
for ($i = 0; $i < count($probabilitesSortie); $i++) {
    echo "Probabilit� pour le caract�re ASCII " . $neuronesSortie[$i]->caractereASCII . ": " . $probabilitesSortie[$i] . "\n";
}
?>
