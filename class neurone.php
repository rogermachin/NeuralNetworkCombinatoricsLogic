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

// Tableau de probabilités (ces valeurs doivent être mises à jour avec les probabilités réelles)
$probabilites = [
    [0.2, 1.0],
    [0.3, 0.8]
];
// Seuil pour valider la sortie (peut être ajusté selon les besoins)
$S = 0.5;
// Création d'un neurone
$neurone = new Neurone($probabilites, $S);
// Exemple d'appel pour calculer la sortie du neurone pour A=0, B=1, C=1
$A = 0;
$B = 1;
$C = 1;
$sortieNeurone = $neurone->calculerSortie($A, $B, $C);
echo "Sortie du neurone pour A=$A, B=$B, C=$C: $sortieNeurone\n";
?>


