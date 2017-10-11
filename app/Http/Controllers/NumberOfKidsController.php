<?php namespace App\Http\Controllers;



use App\Models\NumberOfKids;
use Illuminate\Routing\Controller;

class NumberOfKidsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /numberofkids
	 *
	 * @return Response
	 */
    public function index()
    {
        $config['title'] = 'Vaikų skaičius';
        $config['list'] = NumberOfKids::get()->toArray();
        $config['new'] = 'app.kids.create';
        $config['edit'] = 'app.kids.edit';
        $config['delete'] = 'app.kids.delete';
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
        $config['form'] = 'Vaikų skaičius';
        $config['route'] = route('app.kids.create');
        $config['back'] = route('app.kids.index');


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
        NumberOfKids::create($data);


        return redirect(route('app.kids.index'));
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
        $config['back'] = route('app.kids.index');
        $config['record'] = NumberOfKids::find($id)->toArray();
        $config['route'] = route('app.kids.edit', $id);

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
        $config = NumberOfKids::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.kids.index'));
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
        $record = NumberOfKids::find($id);
        $record->delete();
        return redirect()->route('app.kids.index');
    }
}