<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SucursalController extends Controller
{
	protected $directorio = "public/sucursales";

	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return view('panel.sucursales.index', [
			"title" => "Sucursales",
			"breadcrumb" => [
				[
					'title' => 'Sucursales',
					'active' => true,
				],

			]
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('panel.sucursales.create', [
			"title" => "Nueva sucursal",
			"breadcrumb" => [
				[
					'title' => 'Sucursales',
					'route' => 'panel.sucursal.index',
					'active' => false,
				],
				[
					'title' => 'Nueva',
					'active' => true,
				]
			]
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{

		$request->validate([
			'title' => 'required|unique:sucursals|max:255',
			'cover' => 'required',
		], [
			'title.required' => 'El título es obligatorio.',
			'title.unique' => 'El título ya está en uso.',
			'title.max' => 'El título no puede tener más de :max caracteres.',
			'cover.required' => 'La portada es obligatoria.',
		]);

		$cover = Helpers::addFileStorage($request->file('cover'), $this->directorio);
		$row = Sucursal::create([
			"title" => $request->title,
			"slug" => Str::slug($request->title, '-'),
			"cover" => $cover
		]);

		if ($request->hasFile('icon')) {
			$icon = Helpers::addFileStorage($request->file('icon'), $this->directorio);
			$row->icon = $icon;
			$row->save();
		}

		if ($request->hasFile('icon_movil')) {
			$icon_movil = Helpers::addFileStorage($request->file('icon_movil'), $this->directorio);
			$row->icon_movil = $icon_movil;
			$row->save();
		}

		if ($request->hasFile('croquisEs')) {
			$croquisEs = Helpers::addFileStorage($request->file('croquisEs'), $this->directorio);
			$row->croquisEs = $croquisEs;
			$row->save();
		}

		if ($request->hasFile('croquisEn')) {
			$croquisEn = Helpers::addFileStorage($request->file('croquisEn'), $this->directorio);
			$row->croquisEn = $croquisEn;
			$row->save();
		}
		if ($request->hasFile('menu')) {
			$menu = Helpers::addFileStorage($request->file('menu'), $this->directorio);
			$row->menu = $menu;
			$row->save();
		}


		$row->address = $request->address;
		$row->phone = $request->phone;
		$row->urlDelivery = $request->urlDelivery;
		$row->urlReservation = $request->urlReservation;
		$row->urlLocation = $request->urlLocation;
		$row->urlIn = $request->urlIn;
		$row->urlFb = $request->urlFb;
		$row->titleIn = $request->titleIn;
		$row->horarioEs = $request->horarioEs;
		$row->horarioEn = $request->horarioEn;
		$row->descEs = $request->descEs;
		$row->descEn = $request->descEn;
		$row->urlfacturacion = $request->urlfacturacion;
		$row->script_covermanager = $request->script_covermanager;

		$row->save();

		return redirect()->back()->with('success', 'El registro se ha creado correctamente');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Sucursal $sucursal)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Int $id)
	{

		$sucursal = Sucursal::find($id);
		return view('panel.sucursales.edit', [
			'title' => 'Editar valores',
			'breadcrumb' => [
				[
					'title' => 'Valores',
					'route' => 'panel.sucursal.index',
					'active' => false,
				],
				[
					'title' => 'Editar',
					'route' => 'panel.sucursal.edit',
					'params' => [
						'id' => $sucursal->id
					],
					'active' => true
				]
			],
			'data' => $sucursal
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Int $id, Request $request)
	{
		$row = Sucursal::find($id);

		if ($request->hasFile('cover')) {
			Helpers::deleteFileStorage('sucursals', 'cover', $id);
			$cover = Helpers::addFileStorage($request->file('cover'), $this->directorio);
			$row->cover = $cover;
			$row->save();
		}

		if ($request->hasFile('icon')) {
			Helpers::deleteFileStorage('sucursals', 'icon', $id);
			$icon = Helpers::addFileStorage($request->file('icon'), $this->directorio);
			$row->icon = $icon;
			$row->save();
		}

		if ($request->hasFile('icon_movil')) {
			Helpers::deleteFileStorage('sucursals', 'icon_movil', $id);
			$icon_movil = Helpers::addFileStorage($request->file('icon_movil'), $this->directorio);
			$row->icon_movil = $icon_movil;
			$row->save();
		}

		if ($request->hasFile('croquisEs')) {
			Helpers::deleteFileStorage('sucursals', 'croquisEs', $id);
			$croquisEs = Helpers::addFileStorage($request->file('croquisEs'), $this->directorio);
			$row->croquisEs = $croquisEs;
			$row->save();
		}

		if ($request->hasFile('croquisEn')) {
			Helpers::deleteFileStorage('sucursals', 'croquisEn', $id);
			$croquisEn = Helpers::addFileStorage($request->file('croquisEn'), $this->directorio);
			$row->croquisEn = $croquisEn;
			$row->save();
		}
		if ($request->hasFile('menu')) {
			Helpers::deleteFileStorage('sucursals', 'menu', $id);
			$menu = Helpers::addFileStorage($request->file('menu'), $this->directorio);
			$row->menu = $menu;
			$row->save();
		}


		$row->title = $request->title;
		$row->address = $request->address;
		$row->phone = $request->phone;
		$row->urlDelivery = $request->urlDelivery;
		$row->urlReservation = $request->urlReservation;
		$row->urlLocation = $request->urlLocation;
		$row->urlIn = $request->urlIn;
		$row->urlFb = $request->urlFb;
		$row->titleIn = $request->titleIn;
		$row->horarioEs = $request->horarioEs;
		$row->horarioEn = $request->horarioEn;
		$row->descEs = $request->descEs;
		$row->descEn = $request->descEn;
		$row->urlfacturacion = $request->urlfacturacion;
		$row->script_covermanager = $request->script_covermanager;

		$row->save();

		return redirect()->back()->with('success', 'El registro se ha actualizado correctamente');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Int $id)
	{
		Helpers::deleteFileStorage('sucursals', 'cover', $id);
		Helpers::deleteFileStorage('sucursals', 'icon', $id);
		Helpers::deleteFileStorage('sucursals', 'croquisEs', $id);
		Helpers::deleteFileStorage('sucursals', 'croquisEn', $id);
		Helpers::deleteFileStorage('sucursals', 'menu', $id);
		Sucursal::where('id', $id)->delete();
		return redirect()->back()->with('success', 'El registro se ha eliminado correctamente');
	}
}
