<?php

	$lesMois = array(
			"01" => "Janvier" ,
			"02" => "Février" ,
			"03" => "Mars" ,
			"04" => "Avril" ,
			"05" => "Mai" ,
			"06" => "Juin" ,
			"07" => "Juillet" ,
			"08" => "Août" ,
			"09" => "Septembre" ,
			"10" => "Octobre" ,
			"11" => "Novembre" ,
			"12" => "Décembre"
		) ;


	function getAujourdhui(){
		
		$date = date( "d/m/Y" ) ;
		
		return $date ;
	}

	function estBissextile( $annee ){
		
		// Exercice 2 : Votre code ici
		
		
		
	}

	function estAvant( $date1 , $date2 ){
		
		$jour1 = getJour( $date1 ) ;
		$mois1 = getMois( $date1 ) ;
		$annee1 = getAnnee( $date1 ) ;
		
		$jour2 = getJour( $date2 ) ;
		$mois2 = getMois( $date2 ) ;
		$annee2 = getAnnee( $date2 ) ;
		
		if( $annee1 < $annee2 || ( $annee1 == $annee2 && $mois1 < $mois2 ) || ( $annee1 == $annee2 && $mois1 == $mois2 && $jour1 < $jour2 ) ){
			return TRUE ;
		}
		else {
			return FALSE ;
		}
	}
	
	function estApres( $date1 , $date2 ){
		
		// Exercice 4 : Votre code ici
		
	}
	
	function estIdentique( $date1 , $date2 ){
		
		if( $date1 == $date2 ){
			return TRUE ;
		}
		else {
			return FALSE ;
		}
	}
	
	function getJour( $date ){
		$jour = substr( $date , 0 , 2 ) ;
		settype( $jour , "integer" ) ;
		return $jour ;
	}
	
	function getMois( $date ){
		
		// Exercice 3 : Votre code ici
	
	}

	function getAnnee( $date ){
		$annee = substr( $date , 6 ) ;
		settype( $annee , "integer" ) ;
		return $annee ;
	}
	
	function getUnAnAvant( $date ){
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		$annee = $annee - 1 ;
		if( $annee == 0 ){
			$annee = -1 ;
		}
		return sprintf( "%02d/%02d/%04d" , $jour , $mois , $annee ) ;
	}
	
	function getUnAnApres( $date ){
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		$annee = $annee + 1 ;
		return sprintf( "%02d/%02d/%04d" , $jour , $mois , $annee ) ;
	}
	
	function getUnMoisAvant( $date ){
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		$mois = $mois - 1 ;
		if( $mois == 0 ){
			$mois = 12 ;
			$annee = $annee - 1 ;
			if( $annee == 0 ){
				$annee = -1 ;
			}
		}
		return sprintf( "%02d/%02d/%04d" , $jour , $mois , $annee ) ;
	}
	
	function getUnMoisApres( $date ){
		
		// Exercice 5 : Votre code ici
		
	}
	
	function getHier( $date ){
		
		// Exercice 8 : Votre code ici
				
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		$jour = $jour - 1 ;
		if( $jour == 0 ){
			$mois = $mois - 1 ;
			
			switch( $mois ){
				
				case 0 :
					$jour = 31 ;
					$mois = 12 ;
					$annee = $annee - 1 ;
					
					if( $annee == 0 ){
						$annee = 1 ;
					}
					
					break ;
					
				case 2 :
				
					if( estBissextile( $annee ) ){
						$jour = 29 ;
					}
					else {
						$jour = 28 ;
					}
				
					break ;
					
				case 4 :
				case 6 :
				case 9 :
				case 11 :
					$jour = 30 ;
					break ;
					
				default :
					$jour = 31 ;
					break ;
			}
		}
		
		return sprintf( "%02d/%02d/%04d" , $jour , $mois , $annee ) ;
	}
	
	function getDemain( $date ){
				
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		
		$jour = $jour + 1 ;
		
		switch( $mois ){
			
			case 2 :
				
				if( ( estBissextile( $annee ) && $jour > 29 ) || ( ! estBissextile( $annee ) && $jour > 28 ) ){
					$jour = 1 ;
					$mois = 3 ;
				}
			
				break ;
				
			case 4 :
			case 6 :
			case 9 :
			case 11 :
				
				if( $jour > 30 ){
					$jour = 1 ;
					$mois = $mois + 1 ;
				}
				
				break ;
				
			case 12 :
				
				if( $jour > 31 ){
					$jour = 1 ;
					$mois = 1 ;
					$annee = $annee + 1 ;
					if( $annee == 10000 ){
						$annee = 9999 ;
					}
				}
				
				break ;
			
			default :
			
				if( $jour > 31 ){
					$jour = 1 ;
					$mois = $mois + 1 ;
				}
			
				break ;
			
		}
		
		return sprintf( "%02d/%02d/%04d" , $jour , $mois , $annee ) ;
	}
	
	function convEnChaine( $date ){
		global $lesMois ;
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		return $jour . " " . $lesMois[ $mois ] . " " . $annee ;
	}
	
	function convAuFormatGB( $date ){
		global $lesMois ;
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		return sprintf( "%04d-%02d-%02d" , $annee , $mois , $mois ) ;
	}
	
	function convEnTableau( $date ){
		
		$jour = getJour( $date ) ;
		$mois = getMois( $date ) ;
		$annee = getAnnee( $date ) ;
		
		settype( $jour , "integer" ) ;
		settype( $mois , "integer" ) ;
		settype( $annee , "integer" ) ;
		
		$tabDate = array (
				"jour" => $jour ,
				"mois" => $mois ,
				"année" => $annee
			) ;
			
		return $tabDate ;
	}
	
	function convEnDate( $tableau ){
		// Exercice 11 : Votre code ici
 	}
	
	function getAnneesBissextiles( $anneeDebut , $anneeFin ){
		
		$lesAnneesBissextiles = array() ;
		
		if( $anneeDebut > $anneeFin ){
			$anneeTmp = $anneeDebut ;
			$anneeDebut = $anneeFin ;
			$anneeFin = $anneeTmp ;
		}
		
		for( $anneeCourante = $anneeDebut ; $anneeCourante <= $anneeFin ; $anneeCourante = $anneeCourante + 1 ){
			
			// Exercice 8 : Votre code ici
			
			
		}
		
		return $lesAnneesBissextiles ;
		
	}
	
	function getPeriode( $dateDebut , $dateFin ){
		
		$lesDates = array() ;
		
		if( estApres( $dateDebut , $dateFin ) ){
			$dateTmp = $dateDebut ;
			$dateDebut = $dateFin ;
			$dateFin = $dateTmp ;
		}
		
		$dateCourante = $dateDebut ;
		
		while( ! estApres( $dateCourante , $dateFin ) ){
			
			// Exercice 10 : Votre code ici
		}
		
		return $lesDates ;
	}
	
	function respectFormat( $date ){
		// Exercice 12 : Votre code ici
		
	}
	
	function main(){

	// Exercice 1 - Date du jour courant ( date d'aujourd'hui )
		echo "---[ Exercice 1 ]---\n\n" ;
		
		// Exercice 1 : Votre code ici
		
		echo "\n" ;
		
	// Exercice 2 - Année bissextile
		echo "---[ Exercice 2 ]---\n\n" ;
		
		if( estBissextile( 2015 ) ){
			echo "2015 est une année bissextile.\n" ;
		}
		else {
			echo "2015 n'est pas une année bissextile.\n" ;
		}
		
		echo "\n" ;
		
		if( estBissextile( 2016 ) ){
			echo "2016 est une année bissextile.\n" ;
		}
		else {
			echo "2016 n'est pas une année bissextile.\n" ;
		}
		
		echo "\n" ;
		
	
	// Exercice 3 - Champ "mois" d'une date
		echo "---[ Exercice 3 ]---\n\n" ;
		
		echo "Numéro du mois de la date 15/04/2017 : " , getMois( "15/04/2017" ) , "\n" ;
		
		echo "\n" ;	
	
		
	// Exercice 4 - Date postérieure ?
		echo "---[ Exercice 4 ]---\n\n" ;
		
		if( estApres( "15/01/2017" , "08/01/2017" ) ){
			echo "15/01/2017 est postérieure à 08/01/2017.\n" ;
		}
		else {
			echo "15/01/2017 n'est pas postérieure à 08/01/2017.\n" ;
		}
		
		echo "\n" ;
		
		if( estApres( "04/01/2017" , "08/01/2017" ) ){
			echo "04/01/2017 est postérieure à 08/01/2017.\n" ;
		}
		else {
			echo "04/01/2017 n'est pas postérieure à 08/01/2017.\n" ;
		}
		
		echo "\n" ;
		
		if( estApres( "15/01/2017" , "15/01/2017" ) ){
			echo "15/01/2017 est postérieure à 15/01/2017.\n" ;
		}
		else {
			echo "15/01/2017 n'est pas postérieure à 15/01/2017.\n" ;
		}
		
		echo "\n" ;
		
	// Exercice 5 - Un mois plus tard 
		echo "---[ Exercice 5 ]---\n\n" ;
		
		echo "15/04/2017... un mois plus tard : " , getUnMoisApres( "15/04/2017" ) , "\n" ;
		
		echo "\n" ;
		
		echo "15/12/2017... un mois plus tard : " , getUnMoisApres( "15/12/2017" ) , "\n" ;
		
		echo "\n" ;
		
		
	// Exercice 6 - Il y'a un mois
	
		
		echo "---[ Exercice 6 ]---\n\n" ;
		
		// Exercice 6 : Votre code ici
		
		echo "\n" ;
		
	// Exercice 7 - Date précédente
	
		echo "---[ Exercice 7 ]---\n\n" ;
		
		echo "15/03/2017... hier : " , getHier( "15/03/2017" ) , "\n" ;
		echo "01/01/2017... hier : " , getHier( "01/01/2017" ) , "\n" ;
		echo "01/02/2017... hier : " , getHier( "01/02/2017" ) , "\n" ;
		
		// Exercice 7 : Votre code ici
		
		
		echo "\n" ;
		
		
	// Exercice 8 - Hier
	
		echo "---[ Exercice 8 ]---\n\n" ;
		
		// Il faut dé-commenter l'instruction ci-dessous pour tester
		// l'implémentation de la méthode getHier().
		//echo getAujourdhui() , " ... hier : " , getHier() , "\n" ;
		
		echo "\n" ;
		
		
	// Exercice 9 - Années bissextiles
	
		echo "---[ Exercice 9 ]---\n\n" ;
		
		$lesAnneesB1 = getAnneesBissextiles( 2000 , 2016 ) ;
		
		echo "Entre 2000 et 2016 :\n" ;
		foreach( $lesAnneesB1 as $uneAnnee ){
			echo "\t- " , $uneAnnee , "\n" ;
		}
		
		echo "\n" ;
		
		$lesAnneesB2 = getAnneesBissextiles( 1980 , 1970 ) ;
		
		echo "Entre 1980 et 1970 :\n" ;
		foreach( $lesAnneesB2 as $uneAnnee ){
			echo "\t- " , $uneAnnee , "\n" ;
		}
		
		echo "\n" ;
		
		
	// Exercice 10 - Période
	
		echo "---[ Exercice 10 ]---\n\n" ;
		
		$periode1 = getPeriode( "20/01/2017" , "03/02/2017" ) ;
		
		echo "Du 20/01/2017 au 03/02/2017 :\n" ;
		foreach( $periode1 as $uneDate ){
			echo "\t- " , $uneDate , "\n" ;
		}
		
		echo "\n" ;
		
		$periode2 = getPeriode( "05/04/2017" , "28/03/2017" ) ;
		
		echo "Du 05/04/2017 au 28/03/2017 :\n" ;
		foreach( $periode2 as $uneDate ){
			echo "\t- " , $uneDate , "\n" ;
		}
		
		echo "\n" ;
		
		
	// Exercice 11 - Création à partir d'un tableau associatif
	
		echo "---[ Exercice 11 ]---\n\n" ;
		
		$tabDate = array(
				"jour" => 14 ,
				"mois" => 8 ,
				"annee" => 2015
			) ;
			
		$uneDate = convEnDate( $tabDate ) ;
		
		echo "Date créée à partir d'un tableau : " , $uneDate , "\n" ;
		
		echo "\n" ;
		
	// Exercice 12 - Création à partir d'un tableau associatif
	
		echo "---[ Exercice 12 ]---\n\n" ;
		
		if( respectFormat( "02/03/2015" ) ){
			echo "La chaîne '02/03/2015' représente une date.\n" ;
		}
		else {
			echo "La chaîne '02/03/2015' ne représente pas une date.\n" ;
		}
		
		if( respectFormat( "-1/03/2015" ) ){
			echo "La chaîne '-1/03/2015' représente une date.\n" ;
		}
		else {
			echo "La chaîne '-1/03/2015' ne représente pas une date.\n" ;
		}
		
	}
	
	// Programme principal
	
	main() ;
	

?>
