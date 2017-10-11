<?php namespace App\Http\Controllers;


use App\Models\Ward;
use Illuminate\Routing\Controller;

class WardController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /ward
	 *
	 * @return Response
	 */
    public function index()
    {
        $config['title'] = 'Seniūnijos';
        $config['list'] = Ward::get()->toArray();
        $config['new'] = 'app.ward.create';
        $config['edit'] = 'app.ward.edit';
        $config['delete'] = 'app.ward.delete';
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
        $config['form'] = 'Seniūnija';
        $config['route'] = route('app.ward.create');
        $config['back'] = route('app.ward.index');


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
        Ward::create($data);


        return redirect(route('app.ward.index'));
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
        $config['back'] = route('app.ward.index');
        $config['record'] = Ward::find($id)->toArray();
        $config['route'] = route('app.ward.edit', $id);

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
        $config = Ward::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.ward.index'));
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
        $record = Ward::find($id);
        $record->delete();
        return redirect()->route('app.ward.index');
    }

}