<?php namespace App\Http\Controllers;


use App\Models\CountryOfBirth;
use App\Models\FamilyStatus;
use App\Models\Gender;
use App\Models\Inhabitants;
use App\Models\NumberOfKids;
use App\Models\Street;
use App\Models\Ward;
use App\Models\YearOfBirth;
use Illuminate\Routing\Controller;

class InhabitantsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /inhabitants
	 *
	 * @return Response
	 */
	public function index()
	{

        $config['title'] = 'Gyventojai';
        $config['list'] = Inhabitants::get()->toArray();
        $config['new'] = 'app.inhabitants.create';
        $config['edit'] = 'app.inhabitants.edit';
        $config['delete'] = 'app.inhabitants.delete';
        $config['ignore'] = ['created_at', 'updated_at', 'deleted_at', 'id', 'count', 'seimos_padetis', 'gimimo_metai', 'gimimo_valstybe', 'vaiku_skaicius' ];
//        $config['search'] = 'app.search.index';
//        $config['file'] = 'app.file.index';


        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /inhabitants/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config['form'] = 'Gyventojas';
        $config['route'] = route('app.inhabitants.create');
        $config['back'] = route('app.inhabitants.index');
        $config['gimimo_metai'] = YearOfBirth::pluck('name', 'id')->toArray();
        $config['gimimo_valstybe'] = CountryOfBirth::pluck('name', 'id')->toArray();
        $config['lytis'] = Gender::pluck('name', 'id')->toArray();
        $config['seimos_padetis'] = FamilyStatus::pluck('name', 'id')->toArray();
        $config['vaiku_skaicius'] = NumberOfKids::pluck('name', 'id')->toArray();
        $config['seniunija'] = Ward::pluck('name', 'id')->toArray();
        $config['gatve'] = Street::pluck('name', 'id')->toArray();

        return view('admin.create-inhabitants', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /inhabitants
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        Inhabitants::create([
            'gimimo_metai' => $data['gimimo_metai'],
            'gimimo_valstybe' => $data['gimimo_valstybe'],
            'lytis' => $data['lytis'],
            'seimos_padetis' => $data['seimos_padetis'],
            'vaiku_skaicius' => $data['vaiku_skaicius'],
            'seniunija' => $data['seniunija'],
            'gatve' => $data['gatve']
        ]);

//        $record = Inhabitants::create($data);

        return redirect(route('app.inhabitants.index'));
//        return redirect()->route('app.inhabitants.edit', [$record->id]);
	}

	/**
	 * Display the specified resource.
	 * GET /inhabitants/{id}
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
	 * GET /inhabitants/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config['id'] = $id;
        $config['form'] = $id;
        $config['back'] = route('app.inhabitants.index');
        $config['route'] = route('app.inhabitants.edit', $id);
        $config['record'] = Inhabitants::find($id)->toArray();
        $config['gimimo_metai'] = YearOfBirth::pluck('name', 'id')->toArray();
        $config['gimimo_valstybe'] = CountryOfBirth::pluck('name', 'id')->toArray();
        $config['lytis'] = Gender::pluck('name', 'id')->toArray();
        $config['seimos_padetis'] = FamilyStatus::pluck('name', 'id')->toArray();
        $config['vaiku_skaicius'] = NumberOfKids::pluck('name', 'id')->toArray();
        $config['seniunija'] = Ward::pluck('name', 'id')->toArray();
        $config['gatve'] = Street::pluck('name', 'id')->toArray();

        return view('create-inhabitants', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /inhabitants/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $config = Inhabitants::find($id);
        $data = request()->all();
        $config->update($data);

        return redirect(route('app.inhabitants.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /inhabitants/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $record = Inhabitants::find($id);
        $record->delete();
        return redirect()->route('app.inhabitants.index');
	}



}