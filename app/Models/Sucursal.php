<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
	use HasFactory;

	protected $primaryKey = 'id';
	protected $table = 'sucursals';
	protected $fillable = [
		"title",
		"slug",
		"cover",
		"icon",
		"menu",
		"croquisEs",
		"croquisEn",
		"address",
		"phone",
		"urlDelivery",
		"urlReservation",
		"urlLocation",
		"urlIn",
		"urlFb",
		"titleIn",
		"horarioEs",
		"horarioEn",
		"status",
		'descEs',
		'descEn',
		'icon_movil',
		'urlfacturacion',
		'script_covermanager',
	];
}
