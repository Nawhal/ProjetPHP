<?php

/**
 * Description of UploadImageGestionnaire
 *
 * @author ceparis
 */
class UploadImageGestionnaire {
    
    public static function addImage($imageFile, $dossierImage, $indexAssocie)
    {
	global $rootDirectory;

    	if ($imageFile['error'] > 0)
	{
            Config::ajouterErreur ("Erreur lors du transfert");
            $result['pathImage'] = '';
            return $result;
	}
	if ($imageFile['size'] > Config::getUploadInfos()['fileMaxSize'])
	{
		 Config::ajouterErreur ("Le fichier est trop gros");
                 $result['pathImage'] = '';
                 return $result;
	}
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	//strrchr renvoie l'extension avec le point (« . »).
	//substr(chaine,1) ignore le premier caractère de chaine. -> supprime le point
	//strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($imageFile['name'], '.')  ,1)  );
	if (! in_array($extension_upload,$extensions_valides) )
	{
		 Config::ajouterErreur ("Extension incorrecte");
                 $result['pathImage'] = '';
                 return $result;
	}

	$image_sizes = getimagesize($imageFile['tmp_name']);//adresse vers le fichier uploader dans le repertoire temporaire
	if ($image_sizes[0] > Config::getUploadInfos()['imageMaxWidth'] OR $image_sizes[1] > Config::getUploadInfos()['imageMaxHeight'])
	{
		 Config::ajouterErreur ("Image trop grande");
                 $result['pathImage'] = '';
                 return $result;
	}
	
	$nom = $dossierImage.'/image'.$indexAssocie.'.'.$extension_upload;
	$resultat = move_uploaded_file($imageFile['tmp_name'],$nom);
	if (! $resultat)
	{
		 Config::ajouterErreur ("Echec transfer image");
                 $result['pathImage'] = '';
                 return $result;
	}
	$result['pathImage'] = $nom;
	return $result;
    }
}
