<?php namespace App\Http\Controllers;



use App\Models\FamilyStatus;
use Illuminate\Routing\Controller;

class FamilyStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /familystatus
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['title'] = 'Šeiminė padėtis';
        $config['list'] = FamilyStatus::get()->toArray();
        $config['new'] = 'app.family.create';
        $config['edit'] = 'app.family.edit';
        $config['delete'] = 'app.family.delete';
        $config['search'] = 'app.search.index';


        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /familystatus/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['form'] = 'Šeiminė padėtis';
        $config['route'] = route('app.family.create');
        $config['back'] = route('app.family.index');


        return view('admin.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /familystatus
	 *
	 * @return Response
	 */
    public function store()
    {
        $data = request()->all();
        FamilyStatus::create($data);


        return redirect(route('app.family.index'));
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
        $config['back'] = route('app.family.index');
        $config['record'] = FamilyStatus::find($id)->toArray();
        $config['route'] = route('app.family.edit', $id);

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
        $config = FamilyStatus::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.family.index'));
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
        $record = FamilyStatus::find($id);
        $record->delete();
        return redirect()->route('app.family.index');
    }

}