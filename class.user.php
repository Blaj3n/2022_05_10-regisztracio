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
		}

		/* regisztráció*/
		/* azonosító automatikus, jogAzon default 2 lesz, csak a többit adja meg a felhasználó */
		public function reg_felhasznalo($nev, $email, $jelszo){
			/* titkosítás */
			/* lekérdezés szövege, létezik-e ilyen nevű vagy e-mail című felhasználó? */
			//lekérdezés végrehajtása
			//sorok száma lekérdezése
			//ha 0 az eredmény, akkor ilyen még nincs, felvesszük
			
		}

		/* bejelentkezés */
		public function bejelentkezes($emailVagyNev, $jelszo){
			//titkosítás
			//lekérdezés arra, hogy van-e ilyen név vagy email a táblában
			//sql lekérdezés végrehajtása, eredménye php tömb
			$eredmeny = mysqli_query($this->kapcsolat, $sql2);
			//sorok száma lekérdezése
			//php tömb átkonvertálása
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