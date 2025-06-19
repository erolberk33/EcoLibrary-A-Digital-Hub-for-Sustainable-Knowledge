<?php

// Veritabanı bağlantısı
$db = new Database($veritabani["host"], $veritabani["user"], $veritabani["password"]);

/**
 * PDO'dan türetilmiş veritabanı sınıfı
 */
class Database extends PDO
{
	public $sql;
	public $veri = array();
	private $adet = null;

	/**
	 * Kurucu metot - PDO üzerinden bağlantı kurar
	 */
	public function __construct($sunucu, $kullanici, $sifre)
	{
		try {
			parent::__construct($sunucu, $kullanici, $sifre);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Hata modunu ayarla
			$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Varsayılan fetch tipi
		} catch (PDOException $hata) {
			die("Bağlantı hatası: " . $hata->getMessage());
		}
	}

	/**
	 * Veritabanına yeni kayıt ekler
	 */
	public function insert()
	{
		try {
			$sorgu = $this->prepare($this->sql);
			return $sorgu->execute($this->veri);
		} catch (PDOException $e) {
			echo "Insert hatası: " . $e->getMessage();
			return false;
		}
	}

	/**
	 * Veritabanından kayıt(lar) getirir
	 * @param string|int $param "1" ise tek kayıt, boş ise çoklu kayıt
	 */
	public function select($param = "", $veri = null)
	{
		if ($veri !== null) {
			$this->veri = $veri;
		}

		try {
			$sorgu = $this->prepare($this->sql);
			$calistir = empty($this->veri) ? $sorgu->execute() : $sorgu->execute($this->veri);

			if (!$calistir) {
				return false;
			}

			if ((string) $param === "1") {
				$sonuc = $sorgu->fetch(PDO::FETCH_OBJ);
				$this->adet = $sonuc ? 1 : 0;
				return $sonuc ?: false;
			} else {
				$sonuclar = $sorgu->fetchAll(PDO::FETCH_OBJ);
				$this->adet = count($sonuclar);
				return $this->adet > 0 ? $sonuclar : false;
			}
		} catch (PDOException $e) {
			echo "Select hatası: " . $e->getMessage();
			return false;
		}
	}

	/**
	 * Veritabanındaki kayıtları günceller
	 */
	public function update()
	{
		try {
			$sorgu = $this->prepare($this->sql);
			return $sorgu->execute($this->veri);
		} catch (PDOException $e) {
			echo "Update hatası: " . $e->getMessage();
			return false;
		}
	}

	/**
	 * Veritabanından kayıt siler
	 */
	public function delete()
	{
		try {
			$sorgu = $this->prepare($this->sql);
			return $sorgu->execute($this->veri);
		} catch (PDOException $e) {
			echo "Delete hatası: " . $e->getMessage();
			return false;
		}
	}

	/**
	 * Son yapılan sorgudan dönen kayıt sayısını verir
	 */
	public function adet()
	{
		return $this->adet;
	}
}
