<?php 

	include 'conexion.php';

	$noms = array("Badji", "Badiatte", "Badji", "Biagui", "Bassène", "Bodian", "Coly", "Diamacoune", "Diatta", "Diadhiou", "Diédhiou", "Deme", "Diémé", "Djiba", "Ehemba", "Goudiaby", "Himbane", "Mané", "Manga", "Sagna", "Sambou", "Sané", "Sonko", "Tamba", "Tendeng", "Badji", "Gomis", "Mané", "Vieira", "Carvalho", "Mendy", "Mané", "Preira", "Correia", "Basse", "Sylva", "Da_Sylva", "Fernandez", "Da_Costa", "Bakhoum", "Diop", "Diagne", "Gaye", "Gueye", "Ndoye", "Ndiour", "Samb", "Baloucoune", "Bandiacky", "Boissy", "Diompy", "Dupa", "Kabely", "Kaly", "Kantoussan", "Kassoka", "Kayounga", "Keny", "Malack", "Malèle", "Malomar", "Malou", "Mandika", "Mandiouban", "Mancabou", "Mantanne", "Mbampassy", "Médou", "Minkette", "Nabaline", "Nadiack", "Napel", "Ndecky", "Ndeye", "Niouky", "Ntab", "Nzale", "Panduppy", "Samy", "Boubane", "Bonang", "Bianquinch", "Bindian", "Bendian", "Bangonine", "Bapinye", "Bidiar", "Bangar", "Sadio", "Vieira", "Lopez", "Marques", "Preira", "Ndiaye", "Diouf", "Ndong", "Dioh", "Senghor", "Faye", "Dior", "Dione", "Seye", "Diongue", "Sene", "Dieye", "Sarr", "Seck", "Diaher", "Bop", "Kitane", "Kital", "Acc", "Aïdara", "Athie", "Aw", "Ba", "Baby", "Baldé", "Barro", "Barry", "Bathily", "Bousso", "Camara", "Cissé", "Dia", "Diamanka", "Diallo", "Diao", "Diaw", "Fassa", "Fofana", "Gadio", "Galadio", "Kâ", "Kane", "Maal", "Mbow", "Lo", "Ly", "Sall", "Seydi", "Sow", "Sy", "Sylla", "Tall", "Thiam", "Wane", "Wone", "Yock", "Amar", "Babou", "Diagne", "Diakhoumpa", "Goumbala", "Saady", "Sabara", "Sougou", "Sougoufara", "Tandiné", "Tandini", "Touré", "Diandy", "Aïdara", "Bathily", "Camara", "Cissé", "Cissoko", "Coulibaly", "Dabo", "Doumbia", "Doumbouya", "Diabang", "Diakhaté", "Diabira", "Diakité", "Dansokho", "Diakho", "Diarra", "Diawara", "Djimera", "Dramé", "Doucouré", "Fadiga", "Fofana", "Gakou", "Gandega", "Kanté", "Kanouté", "Keïta", "Koïta", "Konaté", "Niangane", "Sadio", "Sakho", "Samassa", "Sawane", "Sidibé", "Sissoko", "Soumaré", "Tandjigora", "Timera", "Traoré", "Touré", "Wagué", "Yatéra", "Boye", "Demba", "Dembelé", "Diack", "Diarra", "Dieng", "Diop", "Fall", "Gningue", "Hanne", "Kane", "Kassé", "Lèye", "Loum", "Marone", "Mbathié", "Mbaye", "Mbengue", "Mbodj", "Mbodji", "Mboup", "Mbow", "Ndao", "Ndaw", "Nder", "Ndiaye", "Ndour", "Niane", "Niang", "Niass", "Niasse", "Pouye", "Seck", "Sock", "Taye", "Thiam", "Thiongane", "Wade");
	$prenoms = array("Abba", "Abdallah", "Abdou", "Abdoulatif", "Abdoulaye", "Abdourahmane", "Ablaye", "Abou", "Adama", "Agouloubene", "Aïnina", "Aladji", "Alassane", "Albouri", "Alfa", "Alfousseyni", "Aliou", "Alioune", "Allé", "Almamy", "Amadou", "Amara", "Amath", "Amidou", "Ansoumane", "Anta", "Arfang", "Arona", "Assane", "Ass", "Aziz", "Baaba", "Babacar", "Babou", "Badara", "Badou", "Bacar", "Baïdi", "Baila", "Bakari", "Ballago", "Balla", "Bamba", "Banta", "Bara", "Bassirou", "Bathie", "Bayo", "Becaye", "Bilal", "Biram", "Birane", "Birima", "Biry", "Bocar", "Bodiel", "Bolikoro", "Boubacar", "Boubou", "Bougouma", "Bouly", "Bouna", "Bourkhane", "Bransan", "Cheikh", "Chérif", "Ciré", "Daly", "Dame", "Daouda", "Daour", "Demba", "Dényanké", "Diakhou", "Dial", "Dialamba", "Dialegueye", "Dianco", "Dicory", "Diégane", "Diène", "Dierry", "Diokel", "Diokine", "Diomaye", "Djibo", "Djibril", "Djiby", "Doudou", "Dramane", "ElHadj", "Elimane", "Facourou", "Fadel", "Falilou", "Fallou", "Famara", "Farba", "Fatel", "Fodé", "Fodey", "Fodié", "Foulah", "Galaye", "Gaoussou", "Gora", "Gorgui", "Goumbo", "Goundo", "Guidado", "Habib", "Hadiya", "Hady", "Hamidou", "Hammel", "Hatab", "Iba", "Ibrahima", "Ibou", "Idrissa", "Insa", "Ismaïl", "Ismaïla", "Issa", "Isshaga", "Jankebay", "Jamuyon", "Kader", "Kainack", "Kalidou", "Kalilou", "Kambia", "Kao", "Kaourou", "Karamo", "Kéba", "Khadim", "Khadir", "Khalifa", "Khamby", "Khary", "Khoudia", "Khoule", "Kor", "Koutoubo", "Lamine", "Lamp", "Landing", "Lat", "Latif", "Latsouck", "Latyr", "Lémou", "Léou", "Leyti", "Libasse", "Limane", "Loumboul", "Maba", "Macky", "Macodou", "Madia", "Madické", "Mady", "Mactar", "Maffal", "Maguette", "Mahécor", "Makan", "Malal", "Malamine", "Malang", "Malaw", "Malick", "Mallé", "Mamadou", "Mamour", "Mansour", "Maodo", "Mapaté", "Mar", "Massamba", "Massar", "Masseck", "Mbagnick", "Mbakhane", "Mbamoussa", "Mbar", "Mbaye", "Mébok", "Médoune", "Meïssa", "Modou", "Moktar", "Momar", "Mor", "Mountaga", "Moussa", "Moustapha", "Namori", "Ndane", "Ndiack", "Ndiaga", "Ndiankou", "Ndiaw", "Ndiawar", "Ndiaya", "Ndiogou", "Ndiouga", "Ndongo", "Ngagne", "Ngor", "Nguénar", "Niakar", "Niankou", "Niokhor", "Nouh", "Nouha", "Npaly", "Ogo", "Omar", "Opa", "Oumar", "Oury", "Ousmane", "Ousseynou", "Papa", "Pape", "Papis", "Pathé", "Racine", "Sadibou", "Sacoura", "Saër", "Sahaba", "Saïdou", "Sakhir", "Salam", "Salif", "Saliou", "Saloum", "Samba", "Samori", "Samsidine", "Sandigui", "Sankoun", "Sanokho", "Sécouba", "Sédar", "Sékou", "Semou", "Senghane", "Serigne", "Seyba", "Seydina", "Seydou", "Sibiloumbaye", "Sidate", "Sidy", "Siéka", "Sihalébé", "Sihounke", "Silly", "Socé", "Sogui", "Soireba", "Solal", "Sonar", "Souleymane", "Soundjata", "Sounkarou", "Souty", "Tafsir", "Talla", "Tamsir", "Tanor", "Tayfor", "Tekheye", "Tété", "Thiawlo", "Thierno", "Thione", "Tijane", "Tidjane", "Toumani", "Vieux", "Wagane", "Waly", "Wandifing", "Wasis", "Woula", "Woury", "Yacouba", "Yafaye", "Yakou", "Yankhoba", "Yerim", "Yero", "Yoro", "Yougo", "Younouss", "Youssou", "Yussu", "Youssoufa", "Abibatou", "Aby", "Absa", "Adama", "Adiouma", "Adji", "Adja", "Aïcha", "Aïda", "Aïssatou", "Akinumelob", "Alima", "Alimatou", "Alinesiitowe", "Aloendisso", "Altine", "Ama", "Aminata", "Aminta", "Amy", "Amina", "Anta", "Arame", "Assa", "Assietou", "Astou", "Ata", "Atia", "Awa", "Awentorébé", "Ayimpen", "Banel", "Batouly", "Bigué", "Billé", "Binta", "Bineta", "Binette", "Binta", "Bintou", "Borika", "Bougouma", "Boury", "Bousso", "Ciramadi", "Codou", "Combé", "Coudouution", "Coumba", "Coumboye", "Coura", "Daba", "Dado", "Daka", "Debbo", "Défa", "Dewel", "Dewene", "Diakher", "Diakhou", "Dialikatou", "Dianké", "Diariatou", "Diarra", "Diary", "Dibor", "Dieourou", "Dior", "Diouma", "Djaly", "Djébou", "Djeynaba", "Dkikel", "Djilane", "Enfadima", "Fabala", "Fabinta", "Fadima", "Fakane", "Fama", "Fanta", "Farmata", "Fatima", "Fatou", "Fatoumatou", "Fily", "Garmi", "Gnagna", "Gnilane", "Gnima", "Gouya", "Guignane", "Guissaly", "Haby", "Hawa", "Heinda", "Holèl", "Issate", "Kankou", "Karimatou", "Kenbougoul", "Kéwé", "Kadiali", "Khadija", "Khadijatou", "Khady", "Khar", "Khary", "Khayfatte", "Khoudia", "Khoudjedji", "Khoumbaré", "Kiné", "Korka", "Laf", "Lama", "Léna", "Lika", "Lissah", "Liwane", "Mada", "Madior", "Madjiguène", "Maguette", "Mahawa", "Mame", "Mamina", "Manthita", "Marème", "Mariama", "Mamassa", "Mane", "Maty", "Mayatta", "Maymouna", "Mbarou", "Mbayeng", "Mbissine", "Mbossé", "Mingue", "Mintou", "Mouskéba", "Nafi", "Nbieumbet", "Ndella", "Ndeye", "Ndiarenioul", "Ndiasse", "Ndiaty", "Ndiémé", "Ndioba", "Ndiolé", "Ndioro", "Ndombo", "Néné", "Neyba", "Ngoné", "Ngosse", "Nguenar", "Nguissaly", "Niakuhufosso", "Niali", "Nialine", "Ningou", "Nini", "Niouma", "Oulèye", "Ouly", "Oulimata", "Oumou", "Oumy", "Oureye", "Penda", "Raby", "Raki", "Rama", "Ramatoulaye", "Ramata", "Rokhaya", "Roubba", "Roughy", "Sadio", "Safiétou", "Safi", "Sagar", "Sahaba", "Salimata", "Salamata", "Sanakha", "Sarratou", "Saoudatou", "Sawdiatou", "Selbé", "Sell", "Seynabou", "Seyni", "Sibett", "Siga", "Sira", "Sirabiry", "Soda", "Sofiatou", "Sofietou", "Sokhna", "Souadou", "Soukeye", "Soukeyna", "Tabara", "Tacko", "Taki", "Tening", "Téwa", "Tiné", "Thiomba", "Thiony", "Thioro", "Thioumbane", "Tocka", "Tokoselle", "Toly", "Walty", "Yadicone", "Yacine", "Yandé", "Yaye");

	mysql_query("DELETE FROM ligne_de_commande");
	mysql_query("DELETE FROM commande");
	mysql_query("DELETE FROM client");
	mysql_query("DELETE FROM materiel");
	mysql_query("DELETE FROM depense");

	for ($i=0; $i < 20; $i++) { 
		
		$date = date("Y-m-d", mktime(0, 0, 0, date("m"), rand(1, 30),  date("Y")));

		$somme = rand(2000, 50000);

		mysql_query("INSERT INTO depense (designation, somme, date_de_depense) VALUES ('Depense $i', $somme, '$date' ) ");
	}

	for ($i=0; $i < 15; $i++) { 
		$prenom = $prenoms[rand(0, count($noms)-1)];
		$nom = $noms[rand(0, count($noms)-1)];
		$adresse = 'adresse';
		$telephone = 'TEL';

		mysql_query("INSERT INTO client (nom, prenom, adresse, telephone) VALUES ('$nom', '$prenom', '$adresse', '$telephone')");
	

		$id_client = mysql_insert_id();
		$nombre_commandes = rand(1, 5);

		for ($j=0; $j < $nombre_commandes; $j++) 
		{ 
			
			$date = date("Y-m-d", mktime(0, 0, 0, date("m"), rand(1, 30),  date("Y")));
			$date_livraison = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+rand(10, 30),  date("Y")));
			$avance = rand(10000, 100000);

			mysql_query("INSERT INTO commande (date_commande, date_livraison, id_client, avance) VALUES ('$date', '$date_livraison', '$id_client', '$avance')");

			echo mysql_error();

			$designations = array('Moquette','Voiture5place','Voiture4*4','Tapis','couhette','moquette5m2');

			// recup last id commande
			$id_commande = mysql_insert_id();
			//$id_materiel = mysql_insert_id();
			//boucler et inserer aussi des lignes de commande
			for ($k=0; $k < 4 ; $k++) 
			{ 
				$designation = $designations[rand(0, count($designations)-1)];
				$prix = rand(5000, 15000);
				mysql_query("INSERT INTO materiel(designation, prix) VALUES ('$designation $i', $prix)");

				echo mysql_error();
			}

			$lignes = array();
			$req_ligne = mysql_query("SELECT id_materiel from materiel");
			echo mysql_error();
			while ($l = mysql_fetch_array($req_ligne)) {
				array_push($lignes, $l[0]);
			}
			var_dump($lignes);
			$id_materiel = $lignes[rand(0, count($lignes)-1)];

			for ($m=0; $m < 5; $m++) { 
				mysql_query("INSERT INTO ligne_de_commande (id_commande, id_materiel, nombre) VALUES ( $id_commande, $id_materiel, rand(10))");
				echo mysql_error();
			}			
			
		}
	}
?>