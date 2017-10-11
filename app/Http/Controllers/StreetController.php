<?php namespace App\Http\Controllers;



use App\Models\Street;
use Illuminate\Routing\Controller;

class StreetController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /street
	 *
	 * @return Response
	 */
    public function index()
    {
        $config['title'] = 'Gatvės';
        $config['list'] = Street::get()->toArray();
        $config['new'] = 'app.street.create';
        $config['edit'] = 'app.street.edit';
        $config['delete'] = 'app.street.delete';
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
        $config['form'] = 'Gatvė';
        $config['route'] = route('app.street.create');
        $config['back'] = route('app.street.index');


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
        Street::create($data);


        return redirect(route('app.street.index'));
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
        $config['back'] = route('app.street.index');
        $config['record'] = Street::find($id)->toArray();
        $config['route'] = route('app.street.edit', $id);

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
        $config = Street::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.street.index'));
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
        $record = Street::find($id);
        $record->delete();
        return redirect()->route('app.street.index');
    }

}