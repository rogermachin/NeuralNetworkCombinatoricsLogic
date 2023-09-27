<?php
                             
class Neurone {
    private $probabilites;  // Tableau de probabilit�s
    private $seuil;         // Seuil pour valider la sortie (S)

    // Constructeur pour initialiser les probabilit�s et le seuil
    public function __construct($probabilites, $seuil) {
        $this->probabilites = $probabilites;
        $this->seuil = $seuil;
    }

    // Fonction pour calculer la sortie du neurone en fonction des entr�es A, B et C
    public function calculerSortie($A, $B, $C) {
        // Calcul de la probabilit� de la sortie S en utilisant la fonction calculerProbabiliteS
        $probabiliteS = $this->calculerProbabiliteS($A, $B, $C);

        // Si la probabilit� de la sortie S d�passe le seuil, retourner 1, sinon 0
        return ($probabiliteS >= $this->seuil) ? 1 : 0;
    }

    // Fonction pour calculer la probabilit� de la sortie S
    private function calculerProbabiliteS($A, $B, $C) {
        // Si C=0, la probabilit� de la sortie S est la probabilit� associ�e � la cellule (A, B) lorsque C=0
        if ($C === 0) {
            return $this->probabilites[$A][$B];
        } else {  // Si C=1, ajuster la probabilit� en fonction du tableau de Karnaugh
            return $this->probabilites[$A][$B] * 0.3;  // Par exemple, ajuster � 0.3 (la valeur peut �tre ajust�e en fonction de votre logique)
        }
    }
}

// Tableau de probabilit�s (ces valeurs doivent �tre mises � jour avec les probabilit�s r�elles)
$probabilites = [
    [0.2, 1.0],
    [0.3, 0.8]
];
// Seuil pour valider la sortie (peut �tre ajust� selon les besoins)
$S = 0.5;
// Cr�ation d'un neurone
$neurone = new Neurone($probabilites, $S);
// Exemple d'appel pour calculer la sortie du neurone pour A=0, B=1, C=1
$A = 0;
$B = 1;
$C = 1;
$sortieNeurone = $neurone->calculerSortie($A, $B, $C);
echo "Sortie du neurone pour A=$A, B=$B, C=$C: $sortieNeurone\n";
?>


