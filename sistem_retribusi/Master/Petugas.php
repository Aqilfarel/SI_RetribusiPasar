<?php

namespace Master;

use Config\Query_builder;

class Petugas
{
    private $db;
    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }
    public function index()
    {
        $data = $this->db->table('data_petugas ')->get()->resultArray();
        $res = '<a href="?target=data_petugas&act=tambah_data_petugas" class="btn btn-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 18 18">
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg>Tambah Petugas</a><br><br>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Id_Petugas</th>
                    <th>Nama_Petugas</th>
                    <th>Jenis_Kelamin</th>
                    <th>Agama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>No_Telpon</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                <td width="10">' . $no . '</td>
                <td width="11">' . $r['id_petugas'] . '</td>
                <td width="100">' . $r['nama_petugas'] . '</td>
                <td width="10">' . $r['jenis_kelamin'] . '</td>
                <td width="50">' . $r['agama'] . '</td>
                <td width="50">' . $r['jabatan'] . '</td>
                <td width="100">' . $r['email'] . '</td>
                <td width="30">' . $r['no_telpon'] . '</td>
                <td width="100">' . $r['alamat'] . '</td>
                <td width="150">
                    <a href="?target=data_petugas&act=edit_data_petugas&id=' . $r['id_petugas'] . '" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 18 18">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>Ubah</a>
                    <a href="?target=data_petugas&act=delete_data_petugas&id=' . $r['id_petugas'] . '" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 18 18">
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
        $res = '<a href="?target=data_petugas" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 18 20">
        <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
        <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
        </svg>Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_petugas&act=simpan_data_petugas">
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Id_Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas">
            </div>
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama_Petugas</label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis_Kelamin</label>
                <select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                    <option value=""></option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                    <option value=""></option>
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="no_telpon" class="form-label">No_Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
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
        $id_petugas = $_POST['id_petugas'];
        $nama_petugas = $_POST['nama_petugas'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email'];
        $no_telpon = $_POST['no_telpon'];
        $alamat = $_POST['alamat'];

        $data = array(
            'id_petugas' => $id_petugas,
            'nama_Petugas' => $nama_petugas,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'jabatan' => $jabatan,
            'email' => $email,
            'no_telpon' => $no_telpon,
            'alamat' => $alamat,
            
        );
        return $this->db->table('data_petugas')->insert($data);
    }
    public function edit($id)
    {
        // get data data_petugas
        $r = $this->db->table('data_petugas')->where("id_petugas='$id'")->get()->rowArray();

        $res = '<a href="?target=data_petugas" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 18 20">
        <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
        <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
        </svg>Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=data_petugas&act=update_data_petugas">
            <input type="hidden" class="form-control" id="param" name="param" value="' . $r['id_petugas'] . '">
            
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Id_Petugas</label>
                <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="' . $r['id_petugas'] . '">
            </div>
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama_Petugas</label>
                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="' . $r['nama_petugas'] . '">
            </div>
            <div class="mb-3">
                <label for="jenis_dagangan" class="form-label">Jenis_Kelamin</label>
                <select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" value="' . $r['jenis_kelamin'] . '">
                    <option value=""></option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                 <select class="form-select" aria-label="Default select example" id="agama" name="agama" value="' . $r['agama'] . '">
                    <option value=""></option>
                    <option value="islam">Islam</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option>
                    <option value="konghucu">Konghucu</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="' . $r['jabatan'] . '">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="' . $r['email'] . '">
            </div>
            <div class="mb-3">
                <label for="no_telpon" class="form-label">No_Telpon</label>
                <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="' . $r['no_telpon'] . '">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="' . $r['alamat'] . '">
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
        $id_petugas = $_POST['id_petugas'];
        $nama_petugas = $_POST['nama_petugas'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email'];
        $no_telpon = $_POST['no_telpon'];
        $alamat = $_POST['alamat'];

        $data = array(
            'id_petugas' => $id_petugas,
            'nama_petugas' => $nama_petugas,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'jabatan' => $jabatan,
            'email' => $email,
            'no_telpon' => $no_telpon,
            'alamat' => $alamat,
        );
        return $this->db->table('data_petugas')->where(" id_petugas='$param'")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table(' data_petugas ')->where(" id_petugas='$id' ")->delete();
    }
}
