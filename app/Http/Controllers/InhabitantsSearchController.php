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

class InhabitantsSearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /inhabitantssearch
	 *
	 * @return Response
	 */
	public function index()
	{



        $config['gimimo_metai'] = YearOfBirth::pluck('name', 'id')->toArray();

        $config['route'] = route('app.search.index');

        $data = request()->all();
//dd($data);
        if($data) {
            $config['inhabitants'] = $this->getInhabitants($data);
//           dd($data);
        }
//


        return view('admin.search', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /inhabitantssearch/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /inhabitantssearch
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /inhabitantssearch/{id}
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
	 * GET /inhabitantssearch/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /inhabitantssearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /inhabitantssearch/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function getInhabitants()
    {



        $data = request()->all();
        if (sizeof($data) == 0) {
//            dd($data);
        } else {
            $metai = $data['gimimo_metai'];



            $config['inhabitants'] = Inhabitants::where('gimimo_metai',  $metai)

                ->get()->toArray();


            return $config['inhabitants'];

        }

    }

}