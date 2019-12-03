<?php

namespace App\Http\Helper;

Class ResponseBuilder{

	public static function result($status="",$info="",$data=""){
		return[
			"success" => $status,
			"information"=>$info,
			"data"=>$data,
		];
	}
}
?>