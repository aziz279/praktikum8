<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PENDAFTARAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php

    include("koneksi.php");
    $eNoreg     = "";
    $eTglMasuk  = "";
    $eNIS       = "";
    $eNujian    = "";
    $eSKHUN     = "";
    $eIJAZAH    = "";

    $noreg      = "";
    $jPend      = "";
    $tglMasuk   = "";
    $NIS        = "";
    $NPU        = "";
    $paud       = "";
    $tk         = "";
    $skhun      = "";
    $ijazah     = "";
    $hobi       = "";
    $cita       = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["noreg"])) {
            $eNoreg = "Nomor Registrasi Tidak Boleh Kosong";
        }
        else {
            $noreg = cek_input($_POST["noreg"]);
        }
        if (empty($_POST["tgl-masuk"])) {
            $eTglMasuk = "Tanggal Masuk Sekolah Tidak Boleh Kosong";
        }
        else {
            $tglMasuk = cek_input($_POST["tgl-masuk"]);
        }
        if (empty($_POST["nis-siswa"])) {
            $eNIS = "NIS Tidak Boleh Kosong";
        }
        else {
            $NIS = cek_input($_POST["nis-siswa"]);
            if (!is_numeric($NIS)) {
                $eNIS = "Nomor Induk Siswa Hanya Diisi Dengan Angka";
            }
        }
        if (empty($_POST["ujian-siswa"])) {
            $eNujian = "Nomor Peserta Ujian Tidak Boleh Kosong";
        }
        else {
            $NPU = cek_input($_POST["ujian-siswa"]);
            if (!is_numeric($NPU)) {
                $eNujian = "Nomor Peserta Ujian Hanya Diisi Dengan Angka";
            }
        }
        if (empty($_POST["skhun"])) {
            $eSKHUN = "Nomor Seri SKHUN Tidak Boleh Kosong";
        }
        else {
            $skhun = cek_input($_POST["skhun"]);
        }
        if (empty($_POST["ijazah"])) {
            $eIJAZAH = "Nomor Seri Ijazah Tidak Boleh Kosong";
        }
        else {
            $ijazah = cek_input($_POST["ijazah"]);
        }
        $jPend      = cek_input($_POST["jenisPD"]);
        $paud       = cek_input($_POST["pernah-paud"]);
        $tk         = cek_input($_POST["pernah-tk"]);
        $hobi       = cek_input($_POST["hobi"]);
        $cita       = cek_input($_POST["cita"]);

        //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
        if (empty($eNoreg)) {
            if (empty($eTglMasuk)) {
                if (empty($eNIS)) {
                    if (empty($eSKHUN)) {
                        if (empty($eIJAZAH)) {
                            //query insert
                            $sql = "INSERT INTO regist(noreg,jpend,tglmasuk,nis,npu,paud,tk,skhun,ijazah,hobi,cita) VALUES ('$noreg','$jPend','$tglMasuk','$NIS','$NPU','$paud','$tk','$skhun','$ijazah','$hobi','$cita')";

                            $query = mysqli_query($conn,$sql);
                        }
                    }
                }
            }
        }
    }
    function cek_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="container">
        <h1 class="alert alert-dark text-center mt-4">PENDAFTARAN SISWA BARU</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="row mt-3">
                <div class="col">
                    <p>Tanggal : <span id="tgl-p"></span></p>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                        <p>Nomor Registrasi : </p>
                        </div>
                        <div class="col">
                        <input type="text" name="noreg" id="noreg" class="form-control <?php echo($eNoreg !="" ? "is-invalid" : ""); ?>">
                        <span class="warning"><?php echo $eNoreg; ?></span>
                        <small class="fst-italic">*Nomor Regitrasi berasal dari petugas</small>
                        </div>
                    </div>
                </div>
            </div>

            <p class="alert alert-dark text-right mt-3"> REGISTRASI PESERTA DIDIK</p>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="">Jenis Pendaftaran</label>
                    </div>
                    <div class="col">
                        <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="jenisPD" id="jenisPD" value="Siswa Baru" checked>
                        <label for="jenisPD">Siswa Baru</label>
                        </div>
                        <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="jenisPD" id="jenisPD" value="Pindahan">
                        <label for="jenisPD">Pindahan</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tgl-masuk" class="mt-3">Tanggal Masuk Sekolah</label>
                <input type="date" name="tgl-masuk" id="tgl-masuk" class="form-control <?php echo($eTglMasuk !="" ? "is-invalid" : ""); ?>">
                <span class="warning-danger"><?php echo $eTglMasuk; ?></span>
            </div>
            <div class="form-group">
                <label for="nis-siswa">Nomor Induk Siswa</label>
                <input type="text" name="nis-siswa" id="nis-siswa" class="form-control <?php echo($eNIS !="" ? "is-invalid" : ""); ?>">
                <span class="warning-danger"><?php echo $eNIS; ?></span>
            </div>
            <div class="form-group">
                <label for="ujian-siswa">Nomor Peserta Ujian</label>
                <input type="text" name="ujian-siswa" id="ujian-siswa" class="form-control <?php echo($eNujian !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $eNujian; ?></span>
                <small class="fst-italic">*Nomor peserta ujian adalah 20 digit yang tertera dalam sertifikat <small class="text-danger">SKHUN SD</small>, diisi bagi peserta didik jenjang SMP</small>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="pernah-paud" class="mt-3">Apakah Pernah PAUD</label>
                    </div>
                    <div class="col mt-3">
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="pernah-paud" id="pernah-paud" value="YA" checked>
                            <label for="pernah-paud">YA</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="pernah-paud" id="pernah-paud" value="TIDAK">
                            <label for="pernah-paud">TIDAK</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="pernah-tk" class="mt-3">Apakah Pernah TK</label>
                    </div>
                    <div class="col mt-3">
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="pernah-tk" id="pernah-tk" value="YA" checked>
                            <label for="pernah-tk">YA</label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="pernah-tk" id="pernah-tk" value="TIDAK">
                            <label for="pernah-tk">TIDAK</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="skhun-siswa">No. Seri SKHUN Sebelumnya</label>
                <input type="text" name="skhun" id="skhun-siswa" class="form-control <?php echo($eSKHUN !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $eSKHUN; ?></span>
                <small class="fst-italic">*Diisi 16 Digit yang tertera di <small class="text-danger">SKHUN SD</small>, diisi bagi peserta didik jenjang SMP</small>
            </div>
            <div class="form-group mt-3">
                <label for="ijazah-siswa">No. Seri IJAZAH Sebelumnya</label>
                <input type="text" name="ijazah" id="ijazah-siswa" class="form-control <?php echo($eIJAZAH !="" ? "is-invalid" : ""); ?>">
                <span class="warning"><?php echo $eIJAZAH; ?></span>
                <small class="fst-italic">*Diisi 16 Digit yang tertera di <small class="text-danger">IJAZAH SD</small>, diisi bagi peserta didik jenjang SMP</small>
            </div>
            <div class="form-group mt-3">
                <label for="hobi">Hobi</label>
                <select name="hobi" id="hobi" class="form-select">
                    <option>Olah Raga</option>
                    <option>Kesenian</option>
                    <option>Membaca</option>
                    <option>Menulis</option>
                    <option>Travelling</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="cita">Cita - Cita</label>
                <select name="cita" id="cita" class="form-select">
                    <option>PNS</option>
                    <option>DISHUB</option>
                    <option>Guru / Dosen</option>
                    <option>Dokter</option>
                    <option>TNI / POLRI</option>
                    <option>PENGUSAHA</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <small class="fst-italic text-danger mt-2">*Klik Tombol Simpan </small>
            <div class="form-group mt-3">
                <input type="submit" name="btn-submit" class="btn btn-success" value="SIMPAN">
            </div>
        </form>
    </div>
    <script>
        var date = new Date();
        document.getElementById("tgl-p").innerHTML = date.toLocaleDateString();
    </script>
</body>
</html>
