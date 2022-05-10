<?php
	class User{
		//private adattagok beállítása
		private $host="localhost";
		private $felhasznalonev="root";
		private $jelszo="";
		private $abNev="pizzahot";
		private $kapcsolat;
		//konstruktor
		public function __construct(){
			$this->kapcsolat = new mysqli($this->host, $this->felhasznalonev, $this->jelszo, $this->abNev);

			if ($this->kapcsolat->connect_error) {
				echo "Hibás csatlakozás.";
				exit();
			}
			else echo "Sikeres kapcsolódás.";
		}

		/* regisztráció*/
		/* azonosító automatikus, jogAzon default 2 lesz, csak a többit adja meg a felhasználó */
		public function reg_felhasznalo($vNev, $kNev, $nev, $szulDatum, $jelszo, $email){
			/* titkosítás */
			$jelszo = md5($jelszo);
			/* lekérdezés szövege, létezik-e ilyen nevű vagy e-mail című felhasználó? */
			$sql = "SELECT * FROM felhasználók where nev='$nev' OR email='$email'";
			//lekérdezés végrehajtása, eredménye egy php tömb
			$letezik = $this->kapcsolat->query($sql);
			//sorok száma lekérdezése
			$sorokSzama = $letezik->num_rows;
			//ha 0 az eredmény, akkor ilyen még nincs, felvesszük
			if($sorokSzama == 0){
				$sql1 = "INSERT INTO felhasználók SET
				jogAzon = 2, nev = '$nev',
				jelszo = '$jelszo', email='$email',
				vezetekNev = '$vNev',keresztNev = '$kNev',
				szulDatum = '$szulDatum'";
				//logikai típussal tér vissza
				$eredmeny = mysqli_query($this->kapcsolat, $sql) or die(mysqli_connect_errno()."Nem illeszthető be az adat.");
				return $eredmeny;
			}
			else
			{
				return false;
			}
		}

		/* bejelentkezés */
		public function bejelentkezes($emailVagyNev, $jelszo){
			//titkosítás
			//lekérdezés arra, hogy van-e ilyen név vagy email a táblában
			$sql2 = "SELECT felhAzon FROM felhasználók where nev='$emailVagyNev' OR email='$emailVagyNev' and jelszo='$jelszo'";
			//sql lekérdezés végrehajtása, eredménye php tömb
			$eredmeny = mysqli_query($this->kapcsolat, $sql2);
			//sorok száma lekérdezése
			$sorokSzama = $eredmeny->num_rows;
			//php tömb átkonvertálása
			$fAdat = mysqli_fetch_array($eredmeny);
			// ha a sorok száma 1, akkor van ilyen
			
		}

		/* név megmutatása*/
		public function get_nev($felhAzon){
			//azonosító alapján név lekérdezése
			$eredmeny = mysqli_query($this->kapcsolat, $sql3);
			//php tömb átalakítása
			echo $fAdat['nev'];
		}

		/* session kezdődik*/
		public function get_session(){
			
		}
		/* kijelentkezés */
		public function kijelentkezes() {
		
	}
?>