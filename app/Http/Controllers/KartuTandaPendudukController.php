<?php

namespace App\Http\Controllers;

use App\Services\KartuTandaPendudukService;
use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class KartuTandaPendudukController extends Controller
{
    private $kartuTandaPendudukService;
    public function __construct(KartuTandaPendudukService $kartuTandaPendudukService)
    {
        $this->kartuTandaPendudukService = $kartuTandaPendudukService;
    }

    public function get($id)
    {
        $result = $this->kartuTandaPendudukService->get($id);
        return $result;
    }

    public function getPagenate(Request $request)
    {
        $per_page = @$request->per_page;
        $keyword = @$request->keyword;
        $result = $this->kartuTandaPendudukService->getPagenate($per_page, $keyword);
        return $result;
    }

    public function create(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $data = $request->only(Schema::getColumnListing("kartu_tanda_penduduks"));

            $queryResult = $this->kartuTandaPendudukService->create($data);

            if ($queryResult) {
                // return $queryResult;
                return response()->json($queryResult);
            }
        });
    }

    // public function update($id, Request $request)
    // {
    //     return DB::transaction(function () use ($id, $request) {
    //         $data = $request->only(Schema::getColumnListing("kartu_keluargas"));

    //         $queryResult = $this->kartuKeluarService->update($data, $id);

    //         return $queryResult;
    //     });
    // }

    public function update($id, Request $request)
    {
        return DB::transaction(function () use ($id, $request) {
            $data = $request->only(Schema::getColumnListing("kartu_tanda_penduduks"));

            if (isset($data['created_at'])) {
                $data['created_at'] = \Carbon\Carbon::parse($data['created_at'])->format('Y-m-d H:i:s');
            }

            if (isset($data['updated_at'])) {
                $data['updated_at'] = \Carbon\Carbon::parse($data['updated_at'])->format('Y-m-d H:i:s');
            }

            // Debugging: periksa tipe data
            if (!is_array($data)) {
                throw new \Exception("Data harus berupa array. Tipe data saat ini: " . gettype($data));
            }

            $queryResult = $this->kartuTandaPendudukService->update($data, $id);
            return $queryResult;
        });
    }


    public function delete($id)
    {
        return $this->kartuTandaPendudukService->delete($id);
    }
}
