<?php namespace App\Http\Controllers;


use App\Models\CountryOfBirth;
use Illuminate\Routing\Controller;

class CountryOfBirthController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /countryofbirth
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['title'] = 'Gimimo valstybės';
        $config['list'] = CountryOfBirth::get()->toArray();
        $config['new'] = 'app.country.create';
        $config['edit'] = 'app.country.edit';
        $config['delete'] = 'app.country.delete';
        $config['search'] = 'app.search.index';


        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /countryofbirth/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['form'] = 'Gimimo valstybė';
        $config['route'] = route('app.country.create');
        $config['back'] = route('app.country.index');


        return view('admin.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /countryofbirth
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        CountryOfBirth::create($data);


        return redirect(route('app.country.index'));
	}

	/**
	 * Display the specified resource.
	 * GET /countryofbirth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /countryofbirth/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['id'] = $id;
        $config['form'] = $id;
        $config['back'] = route('app.country.index');
        $config['record'] = CountryOfBirth::find($id)->toArray();
        $config['route'] = route('app.country.edit', $id);

        return view('admin.create', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /countryofbirth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$config = CountryOfBirth::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.country.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /countryofbirth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $record = CountryOfBirth::find($id);
        $record->delete();
        return redirect()->route('app.country.index');
	}

}