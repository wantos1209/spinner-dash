<?php

namespace App\Http\Controllers;

use App\Models\SpinnerJenisvoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;

class SpinnerJenisvoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $jenisvoucher = SpinnerJenisvoucehr::latest()->filter(request(['search']))->paginate(10)->withQueryString();
    //     return view('jenisvoucher.index', [
    //         'title' => 'Spinner - Jenis Voucher',
    //         'menu' =>  'Spinner',
    //         'data' => $jenisvoucher
    //     ])->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function index()
    {

        $data = $this->getData();

        $search = request('search');

        if ($search  != '') {
            $results = [];

            foreach ($data as $d) {
                if (strtoupper($d["nama"]) === strtoupper($search)) {
                    $results[] = $d;
                }
            }
            $data =  $results;
        }

        $perPage = 10;
        $page =  request()->get('page', 1);
        $slicedData = array_slice($data, ($page - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator(
            $slicedData,
            count($data),
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        return view('jenisvoucher.index', [

            'data' => $paginator
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.apk.bo.create', [
            'title' => 'Spinner - Jenis Voucher',
            'menu' =>  'Spinner'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'index' => 'required',
            'saldo_point' => 'required',
        ]);

        $request['bo'] = getDataBo2();
        $data = $request->all();

        $this->action('', $data, "POST");

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan.',
        ]);
    }

    public function show(SpinnerJenisvoucher $bo)
    {
        return view('bo.show', compact('bo'));
    }

    public function data($id)
    {
        $data = $this->getData($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'nama' => 'required',
            'index' => 'required',
            'saldo_point' => 'required',
        ]);
        $request['bo'] = getDataBo2();
        $data = $data = $request->all();;

        $this->action($id, $data, "PUT");

        return response()->json(['success' => 'Item berhasil diupdate!']);
    }

    public function destroy($id)
    {
        $data = $this->getData($id);
        $methode = "DELETE";
        $this->action($id, $data, $methode);
        return redirect("/spinner/jenisvoucher")->with('success', 'Item berhasil dihapus!');
    }

    public function datavoucher()
    {
        $data = SpinnerJenisvoucher::get();
        return response()->json($data);
    }

    public function getData($id = '')
    {
        $url = $this->getUrl();
        $options = [
            'http' => [
                'header' => 'postman-token: 54a06989-9a14-4515-afca-766a0f6f3dd9'
            ]
        ];
        $context = stream_context_create($options);
        $data = file_get_contents($url, false, $context);

        $data = json_decode($data, true);
        $data = $data['data'];

        if ($id != '') {
            foreach ($data as $index => $d) {
                if ($d['id'] == $id) {
                    $data = $data[$index];
                }
            }
        }
        return $data;
    }

    public function getUrl($id = '')
    {
        if ($id != '') {
            $url = "http://127.0.0.1:8006/api/jenisvoucher/" . $id;
            // dd($url);
        } else {
            $url = "http://127.0.0.1:8006/api/jenisvoucher";
        }
        // dd($url);

        return $url;
    }

    public function action($id, $data, $method = "POST")
    {
        $url = $this->getUrl($id);

        $data = [
            "nama" => $data['nama'],
            "index" => $data['index'],
            "saldo_point" => $data['saldo_point'],
            "bo" => $data['bo'],
        ];

        $data_string = json_encode($data);
        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'header' => 'postman-token: 54a06989-9a14-4515-afca-766a0f6f3dd9'
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_error($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        return $result;
    }
}
