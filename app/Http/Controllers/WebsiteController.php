<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Gallery;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

	protected $directorio = "public/website";
	protected $locales = ['es', 'en'];


	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(String $seccion)
	{
		$params = [
			'title' => ucfirst($seccion) . " - Actualizar sección",
			'breadcrumb' => [
				[
					'title' => ucfirst($seccion),
					'route' => 'panel.website.edit',
					'params' => [
						'seccion' => $seccion
					],
					'active' => true,
				]
			],
			'data' => Website::find(1),
			'galeria' => Gallery::all()
		];

		$view = 'panel.website.' . $seccion;
		return view($view, $params);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(String $seccion, Request $request)
	{
		$id = 1;
		$upd = Website::find(1);

		if ($request->hasFile('video')) {
			Helpers::deleteFileStorage('websites', 'video', $id);
			$video = Helpers::addFileStorage($request->file('video'), $this->directorio);
			$upd->video = $video;
			$upd->save();
		}
		if ($request->hasFile('videoM')) {
			Helpers::deleteFileStorage('websites', 'videoM', $id);
			$videoM = Helpers::addFileStorage($request->file('videoM'), $this->directorio);
			$upd->videoM = $videoM;
			$upd->save();
		}
		if ($request->hasFile('bolsa_s1_cover')) {
			Helpers::deleteFileStorage('websites', 'bolsa_s1_cover', $id);
			$bolsa_s1_cover = Helpers::addFileStorage($request->file('bolsa_s1_cover'), $this->directorio);
			$upd->bolsa_s1_cover = $bolsa_s1_cover;
			$upd->save();
		}
		if ($request->hasFile('events_s1_cover')) {
			Helpers::deleteFileStorage('websites', 'events_s1_cover', $id);
			$events_s1_cover = Helpers::addFileStorage($request->file('events_s1_cover'), $this->directorio);
			$upd->events_s1_cover = $events_s1_cover;
			$upd->save();
		}
		if ($request->hasFile('img_promo')) {
			Helpers::deleteFileStorage('websites', 'img_promo', $id);
			$img_promo = Helpers::addFileStorage($request->file('img_promo'), $this->directorio);
			$upd->img_promo = $img_promo;
			$upd->save();
		}
		if ($request->hasFile('img_promo_movil')) {
			Helpers::deleteFileStorage('websites', 'img_promo_movil', $id);
			$img_promo_movil = Helpers::addFileStorage($request->file('img_promo_movil'), $this->directorio);
			$upd->img_promo_movil = $img_promo_movil;
			$upd->save();
		}

		if ($request->has('url_fb')) $upd->url_fb = $request->url_fb;
		if ($request->has('url_in')) $upd->url_in = $request->url_in;
		if ($request->has('url_sp')) $upd->url_sp = $request->url_sp;
		if ($request->has('url_ta')) $upd->url_ta = $request->url_ta;
		if ($request->has('email_facturacion')) $upd->email_facturacion = $request->email_facturacion;
		if ($request->has('email_bolsa')) $upd->email_bolsa = $request->email_bolsa;
		if ($request->has('email_eventos')) $upd->email_eventos = $request->email_eventos;
		if ($request->has('emails_cc')) $upd->emails_cc = $request->emails_cc;
		if ($request->has('link_covermanager')) $upd->link_covermanager = $request->link_covermanager;

		foreach ($this->locales as $locale) {
			if ($request->has('home_s1_title')) $upd->translateOrNew($locale)->home_s1_title = $request->home_s1_title[$locale];
			if ($request->has('home_s1_text')) $upd->translateOrNew($locale)->home_s1_text = $request->home_s1_text[$locale];
			if ($request->has('home_s5_title')) $upd->translateOrNew($locale)->home_s5_title = $request->home_s5_title[$locale];
			if ($request->has('bolsa_s1_title')) $upd->translateOrNew($locale)->bolsa_s1_title = $request->bolsa_s1_title[$locale];
			if ($request->has('bolsa_s1_text')) $upd->translateOrNew($locale)->bolsa_s1_text = $request->bolsa_s1_text[$locale];
			if ($request->has('events_s1_title')) $upd->translateOrNew($locale)->events_s1_title = $request->events_s1_title[$locale];
			if ($request->has('events_s1_text')) $upd->translateOrNew($locale)->events_s1_text = $request->events_s1_text[$locale];
			if ($request->has('politicas_privacidad')) $upd->translateOrNew($locale)->politicas_privacidad = $request->politicas_privacidad[$locale];
			if ($request->has('politicas_reservacion')) $upd->translateOrNew($locale)->politicas_reservacion = $request->politicas_reservacion[$locale];
		}

		$upd->save();
		return redirect()->back()->with('success', 'El registro se ha actualizado correctamente');
	}
}
