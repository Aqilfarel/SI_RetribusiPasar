<?php

namespace Master;

use Config\Query_builder;

class Rekapitulasi
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('data_rekapitulasi ')->get()->resultArray();
        $res = '<a href="?target=data_rekapitulasi&act=tambah_data_rekapitulasi" class="btn btn-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 18 18">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg>Tambah Rekapitulasi</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Id_Rekapitulasi</th>
                    <th>Nama_Pedagang</th>
                    <th>Blok</th>
                    <th>Keterangan</th>
                    <th>Tarif_Retribusi</th>
                    <th>Total_Retribusi</th>
                    <th>Terbayar</th>
                    <th>Kurang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="10">' . $no . '</td>
                <td width="11">' . $r['id_rekapitulasi'] . '</td>
                <td width="100">' . $r['nama_pedagang'] . '</td>
                <td width="50">' . $r['blok'] . '</td>
                <td width="30">' . $r['keterangan'] . '</td>
                <td width="100">' . $r['tarif_retribusi'] . '</td>
                <td width="50">' . $r['total_retribusi'] . '</td>
                <td width="20">' . $r['terbayar'] . '</td>
                <td width="20">' . $r['kurang'] . '</td>
                <td width="150">
                    <a href="?target=data_rekapitulasi&act=edit_data_rekapitulasi&id=' . $r['id_rekapitulasi'] . '" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 18 18">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>Ubah</a>
                    <a href="?target=data_rekapitulasi&act=delete_data_rekapitulasi&id=' . $r['id_rekapitulasi'] . '" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 18 18">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                    </svg>Hapus</a>
                </td>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }
    public function tambah()
    {
        $res = '<a href="?target=data_rekapitulasi" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 18 20">
        <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
        <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
        </svg>Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_rekapitulasi&act=simpan_data_rekapitulasi">
            <div class="mb-3">
                <label for="id_rekapitulasi" class="form-label">Id_Rekapitulasi</label>
                <input type="text" class="form-control" id="id_rekapitulasi" name="id_rekapitulasi">
            </div>
            <div class="mb-3">
                <label for="id_pedagang" class="form-label">Id_Pedagang</label>
                <input type="text" class="form-control" id="id_pedagang" name="id_pedagang">
            </div>
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Id_Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas">
            </div>
            <div class="mb-3">
                <label for="nama_pedagang" class="form-label">Nama_Pedagang</label>
                <input type="text" class="form-control" id="nama_pedagang" name="nama_pedagang">
            </div>
            <div class="mb-3">
                <label for="blok" class="form-label">Blok</label>
                <input type="text" class="form-control" id="blok" name="blok">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <select class="form-select" aria-label="Default select example" id="keterangan" name="keterangan">
                    <option value=""></option>
                    <option value="buka">Buka</option>
                    <option value="tutup">Tutup</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="tarif_retribusi" class="form-label">Tarif_Retribusi</label>
                <input type="text" class="form-control" id="tarif_retribusi" name="tarif_retribusi">
            </div>
            <div class="mb-3">
                <label for="total_retribusi" class="form-label">Total_Retribusi</label>
                <input type="text" class="form-control" id="total_retribusi" name="total_retribusi">
            </div>
            <div class="mb-3">
                <label for="terbayar" class="form-label">Terbayar</label>
                <input type="text" class="form-control" id="terbayar" name="terbayar">
            </div>
            <div class="mb-3">
                <label for="kurang" class="form-label">Kurang</label>
                <input type="text" class="form-control" id="kurang" name="kurang">
            </div>
            <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 18 18">
            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
            <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
            </svg>Simpan</button>
        </form>';

        return $res;
    }

    public function simpan()
    {
        $id_rekapitulasi = $_POST['id_rekapitulasi'];
        $id_pedagang = $_POST['id_pedagang'];
        $id_petugas = $_POST['id_petugas'];
        $nama_pedagang = $_POST['nama_pedagang'];
        $blok = $_POST['blok'];
        $keterangan = $_POST['keterangan'];
        $tarif_retribusi = $_POST['tarif_retribusi'];
        $total_retribusi = $_POST['total_retribusi'];
        $terbayar = $_POST['terbayar'];
        $kurang = $_POST['kurang'];

        $data = array(
            'id_rekapitulasi' => $id_rekapitulasi,
            'id_pedagang' => $id_pedagang,
            'id_petugas' => $id_petugas,
            'nama_pedagang' => $nama_pedagang,
            'blok' => $blok,
            'keterangan' => $keterangan,
            'tarif_retribusi' => $tarif_retribusi,
            'total_retribusi' => $total_retribusi,
            'terbayar' => $terbayar,
            'kurang' => $kurang,

        );
        return $this->db->table('data_rekapitulasi')->insert($data);
    }
    public function edit($id)
    {
        // get data data_rekapitulasi
        $r = $this->db->table('data_rekapitulasi')->where("id_rekapitulasi='$id'")->get()->rowArray();

        $res = '<a href="?target=data_rekapitulasi" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 18 20">
        <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
        <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
        </svg>Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_rekapitulasi&act=update_data_rekapitulasi">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_rekapitulasi'] . '">
            
            <div class="mb-3">
                <label for="id_rekapitulasi" class="form-label">Id_Rekapitulasi</label>
                <input type="text" class="form-control" id="id_rekapitulasi" name="id_rekapitulasi" value="' . $r['id_rekapitulasi'] . '">
            </div>
            <div class="mb-3">
                <label for="id_pedagang" class="form-label">Id_Pedagang</label>
                <input type="text" class="form-control" id="id_pedagang" name="id_pedagang" value="' . $r['id_pedagang'] . '">
            </div>
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Id_Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="' . $r['id_petugas'] . '">
            </div>
            <div class="mb-3">
                <label for="nama_pedagang" class="form-label">Nama_Pedagang</label>
                <input type="text" class="form-control" id="nama_pedagang" name="nama_pedagang" value="' . $r['nama_pedagang'] . '">
            </div>
            <div class="mb-3">
                <label for="blok" class="form-label">Blok</label>
                <input type="text" class="form-control" id="blok" name="blok" value="' . $r['blok'] . '">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                 <select class="form-select" aria-label="Default select example" id="keterangan" name="keterangan" value="' . $r['keterangan'] . '">
                    <option value=""></option>
                    <option value="buka">Buka</option>
                    <option value="tutup">Tutup</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tarif_retribusi" class="form-label">Tarif_Retribusi</label>
                <input type="text" class="form-control" id="tarif_retribusi" name="tarif_retribusi" value="' . $r['tarif_retribusi'] . '">
            </div>
            <div class="mb-3">
                <label for="total_retribusi" class="form-label">Total_Retribusi</label>
                <input type="text" class="form-control" id="total_retribusi" name="total_retribusi" value="' . $r['total_retribusi'] . '">
            </div>
            <div class="mb-3">
                <label for="terbayar" class="form-label">Terbayar</label>
                <input type="text" class="form-control" id="terbayar" name="terbayar" value="' . $r['terbayar'] . '">
            </div>
            <div class="mb-3">
                <label for="kurang" class="form-label">Kurang</label>
                <input type="text" class="form-control" id="kurang" name="kurang" value="' . $r['kurang'] . '">
            </div>
            <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 18 18">
            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
            <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
            </svg>Simpan</button>
        </form>';
        return $res;
    }

    public function update()
    {
        $param = $_POST['param'];
        $id_rekapitulasi = $_POST['id_rekapitulasi'];
        $id_pedagang = $_POST['id_pedagang'];
        $id_petugas = $_POST['id_petugas'];
        $nama_pedagang = $_POST['nama_pedagang'];
        $blok = $_POST['blok'];
        $keterangan = $_POST['keterangan'];
        $tarif_retribusi = $_POST['tarif_retribusi'];
        $total_retribusi = $_POST['total_retribusi'];
        $terbayar = $_POST['terbayar'];
        $kurang = $_POST['kurang'];

        $data = array(
            'id_rekapitulasi' => $id_rekapitulasi,
            'id_pedagang' => $id_pedagang,
            'id_petugas' => $id_petugas,
            'nama_pedagang' => $nama_pedagang,
            'blok' => $blok,
            'keterangan' => $keterangan,
            'tarif_retribusi' => $tarif_retribusi,
            'total_retribusi' => $total_retribusi,
            'terbayar' => $terbayar,
            'kurang' => $kurang,
        );
        return $this->db->table('data_rekapitulasi')->where(" id_rekapitulasi='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table(' data_rekapitulasi ')->where(" id_rekapitulasi='$id' ")->delete();
    }
}
