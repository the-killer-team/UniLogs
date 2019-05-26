<?php
class Images
{
    public function extensionImage($extUpload, $extOk) 
    {
        if (!in_array($extUpload, $extOk)) 
        {
            return false;
        }
    }

    public function moveImage($extension, $temporaryLocation) 
    {
        // Créer un identifiant difficile à deviner
        $name = uniqid(rand(), true);

        $location = "./upload/".$name.".".$extension;

        $resultat = move_uploaded_file($temporaryLocation, $location);

        if ($resultat) 
        return array($location, $name.".".$extension);
    }

   public function resizeImage($imgSource, $width, $name) 
   {
        $width = (int) $width;

        // Crée une nouvelle image depuis un fichier ou une URL
        $source = imagecreatefromjpeg($imgSource); 

        // Calcule la nouvelle hauteur en fonction de la largeur
        $reduction = (($width * 100)/imagesx($source));
        $height = ((imagesy($source) * $reduction)/100);

        // Crée une nouvelle image en couleurs vraies
        $destinationImage = imagecreatetruecolor($width, $height); 

        // Resize
        imagecopyresampled($destinationImage, $source, 0, 0, 0, 0, imagesx($destinationImage), imagesy($destinationImage), imagesx($source), imagesy($source));

        // imagesx = largeur
        // imagesy = hauteur, 0 => coordonnées du point de redimensionnement du fichier source et destination. Quand tout est à 0 il prend le coin supérieur gauche
        

        // On enregistre l'image de destination sous le nom $largeur-$nom.jpg
        $newImage = imagejpeg($destinationImage, "./upload/".$width."-".$name.".jpg");
   }

}

?>