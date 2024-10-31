<?php

namespace App\Services;

use App\Models\KartuTandaPenduduk;

class KartuTandaPendudukService
{
    const PRIMARY_KEY = "id";
    const DEFAULT_PER_PAGE = 25;
    private $kartuTandaPenduduk;

    public function __construct(KartuTandaPenduduk $kartuTandaPenduduk)
    {
        $this->kartuTandaPenduduk = $kartuTandaPenduduk;
    }

    public function getWith()
    {
        return $this->kartuTandaPenduduk::with("ktp");
    }

    public function getPagenate($per_page, $keyword)
    {
        $container = $this->getWith();
        if ($keyword) {
            $container = $container->where(function ($q) use ($keyword) {
                // $q->where("no_kk", "like", "%" . $keyword . "%");
                $q->where("nama", "like", "%" . $keyword . "%");
            });
        }
        return $container->paginate($per_page ?? self::DEFAULT_PER_PAGE);
    }

    public function get($id)
    {
        // return $this->getWith()->get($id)->first();
        return $this->kartuTandaPenduduk::where("id", $id)->get();
    }



    public function create($data)
    {
        return $this->kartuTandaPenduduk::create($data)->id;
    }

    // public function update($id, $data)
    // {
    //     return $this->kartuKeluarga::where('id', $id)->update($data);
    // }

    public function update(array $data, $id)
    {
        // Debugging: tampilkan data sebelum di-update
        if (!is_array($data)) {
            throw new \Exception("Data yang dikirim ke update harus berupa array. Tipe data saat ini: " . gettype($data));
        }

        return $this->kartuTandaPenduduk::where('id', $id)->update($data);
    }


    public function delete($id)
    {
        return $this->kartuTandaPenduduk::where(self::PRIMARY_KEY, $id)->delete();
    }
}
