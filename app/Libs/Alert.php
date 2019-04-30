<?php namespace App\Libs;

class Alert
{
	public function icon($e){
		$icons = array(
			"warning" => "fa fa-warning",
			"info" => "fa fa-info-circle",
			"success" => "fa fa-check-circle",
			"danger" => "fa fa-times-circle",
			"update" => "fa fa-pencil"
		);
		return $icons[$e];
	}

	public function bg($e){
		$bgs = array(
			"warning" => "bg-warning",
			"info" => "bg-info",
			"success" => "bg-success",
			"danger" => "bg-danger",
			"update" => "bg-primary"
		);
		return $bgs[$e];
	}

	public function caption($e){
		$capt = array(
			"warning" => "Warning",
			"info" => "Information",
			"success" => "Success",
			"danger" => "Failed",
			"update" => "Updated"
		);
		return $capt[$e];
	}
}