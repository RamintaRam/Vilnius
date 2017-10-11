<?php namespace App\Http\Controllers;


use App\Models\Inhabitants;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;


class MaatwebsiteController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /maatwbsite
     *
     * @return Response
     */
    public function importExport()
    {
        $config['back'] = route('app.inhabitants.index');
        return view('importExport', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /maatwbsite/create
     *
     * @return Response
     */
    public function downloadExcel($type)
    {
        $data = Inhabitants::get()->toArray();
        return Excel::create('gyventojai', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Store a newly created resource in storage.
     * POST /maatwbsite
     *
     * @return Response
     */
    public function importExcel(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = [
                        'id' => Uuid::uuid4(),
                        'gimimo_metai' => $value->$gimimo_metai,
                        'gimimo_valstybe' => $value->$gimimo_valstybe,
                        'lytis' => $value->$lytis,
                        'seimos_padetis' => $value->$seimos_padetis,
                        'vaiku_skaicius' => $value->$vaiku_skaicius,
                        'seniunija' => $value->$seniunija,
                        'gatve' => $value->$gatve ];
                }
                if (!empty($insert)) {
                    DB::table('gyventojai')->insert($insert);

                }
            }

        }
        return 'great success';
    }


	/**
	 * Display the specified resource.
	 * GET /maatwbsite/{id}
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
	 * GET /maatwbsite/{id}/edit
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
	 * PUT /maatwbsite/{id}
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
	 * DELETE /maatwbsite/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}