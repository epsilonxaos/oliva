<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model implements TranslatableContract

{
	use HasFactory;
	use Translatable;

	public $translatedAttributes = [
		'home_s1_title',
		'home_s1_text',
		'home_s5_title',
		'bolsa_s1_title',
		'bolsa_s1_text',
		'events_s1_title',
		'events_s1_text',
		'politicas_privacidad',
		'politicas_reservacion'
	];
	protected $primarykey = 'id';
	protected $table = 'websites';
	protected $fillables = [
		'video',
		'videoM',
		'url_fb',
		'url_in',
		'url_sp',
		'url_ta',
		'email_facturacion',
		'email_bolsa',
		'email_eventos',
		'bolsa_s1_cover',
		'events_s1_cover',
		'img_promo',
		'img_promo_movil',
		'emails_cc',
		'link_covermanager'
	];
}
