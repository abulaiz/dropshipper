<?php namespace App\Libs;

class Strings
{
	private $bulan = [
		'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
		'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	private function removePrefixZero($digit){
		if(strlen($digit) == 1)
			return $digit;
		return $digit[0] == '0' ? $digit[1] : $digit;
	}

	// Contoh : 2 April 2015
	public function tanggalFormal($date){
		$date = substr($date, 0, 10);
		$_tmp = explode('-', $date);
		return $this->removePrefixZero($_tmp[2]).' '.$this->bulan[ $this->removePrefixZero($_tmp[1]) - 1 ].' '.$_tmp[0];
	}
}