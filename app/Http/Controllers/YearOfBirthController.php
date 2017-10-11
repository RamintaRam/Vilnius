<?php namespace App\Http\Controllers;



use App\Models\YearOfBirth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class YearOfBirthController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /yearofbirth
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['title'] = 'Gimimo metai';
        $config['list'] = YearOfBirth::get()->toArray();

        $config['new'] = 'app.year.create';
        $config['edit'] = 'app.year.edit';
        $config['delete'] = 'app.year.delete';
        $config['search'] = 'app.search.index';


        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /yearofbirth/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['form'] = 'Gimimo metai';
        $config['route'] = route('app.year.create');
        $config['back'] = route('app.year.index');


        return view('admin.create', $config);

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /yearofbirth
	 *
	 * @return Response
	 */
	public function store()
	{

        $data = request()->all();
        YearOfBirth::create($data);


        return redirect(route('app.year.index'));

	}

	/**
	 * Display the specified resource.
	 * GET /yearofbirth/{id}
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
	 * GET /yearofbirth/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['id'] = $id;
        $config['form'] = $id;
        $config['back'] = route('app.year.index');
        $config['record'] = YearOfBirth::find($id)->toArray();
        $config['route'] = route('app.year.edit', $id);

        return view('admin.create', $config);
    }

	/**
	 * Update the specified resource in storage.
	 * PUT /yearofbirth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config = YearOfBirth::find($id);
        $data = request()->all();
        $config->update([
            'name' => $data['name']
        ]);

        return redirect(route('app.year.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /yearofbirth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $record = YearOfBirth::find($id);
        $record->delete();
        return redirect()->route('app.year.index');
	}

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        YearOfBirth::table("gimimo_metai")->whereIn('id',explode(",",$ids))->delete();
        return redirect()->route('app.year.index');
    }


}