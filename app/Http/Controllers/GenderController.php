<?php namespace App\Http\Controllers;


use App\Models\Gender;
use Illuminate\Routing\Controller;

class GenderController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /gender
	 *
	 * @return Response
	 */
    public function index()
    {
        $config['title'] = 'Lytis';
        $config['list'] = Gender::get()->toArray();
        $config['new'] = 'app.gender.create';
        $config['edit'] = 'app.gender.edit';
        $config['delete'] = 'app.gender.delete';
        $config['search'] = 'app.search.index';
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count', 'seimos_padetis', 'gimimo_metai', 'gimimo_valstybe', 'vaiku_skaicius' ];


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
        $config['form'] = 'Lytis';
        $config['route'] = route('app.gender.create');
        $config['back'] = route('app.gender.index');


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
        Gender::create($data);


        return redirect(route('app.gender.index'));
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
        $config['back'] = route('app.gender.index');
        $config['record'] = Gender::find($id)->toArray();
        $config['route'] = route('app.gender.edit', $id);

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
        $config = Gender::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.gender.index'));
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
        $record = Gender::find($id);
        $record->delete();
        return redirect()->route('app.gender.index');
    }

}