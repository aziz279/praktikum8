<!DOCTYPE html >
< html  lang =" en " >
< kepala >
    < meta  charset =" UTF-8 " >
    < meta  http-equiv =" X-UA-Compatible " content =" IE=edge " >
    < meta  name =" viewport " content =" width=device-width, initial-scale=1.0 " >
    < title > FORM PENDAFTARAN </ title >
    < link  href =" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css " rel =" stylesheet " integrity =" sha384-0evHe/X+R7YkIZDRvuzKMRqM +OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor " crossorigin =" anonim " >
</ kepala >
< tubuh >
    <?php

    include ( "konek.php" );
    $ eNoreg      = "" ;
    $ eTglMasuk   = "" ;
    $ eNIS        = "" ;
    $ eNujian     = "" ;
    $ eSKHUN      = "" ;
    $ eIJAZAH     = "" ;

    $ noreg       = "" ;
    $ jPend       = "" ;
    $ Masuk tgl    = "" ;
    $ NIS         = "" ;
    $ NPU         = "" ;
    $ paud        = "" ;
    $ tk          = "" ;
    $ skhun       = "" ;
    $ ijazah      = "" ;
    $ hobi        = "" ;
    $ cita        = "" ;

    if ( $ _SERVER [ "REQUEST_METHOD" ] == "POST" ) {
        if ( kosong ( $ _POST [ "noreg" ])) {
            $ eNoreg = "Nomor Pendaftaran Tidak Boleh" ;
        }
        lain {
            $ noreg = cek_input ( $ _POST [ "noreg" ]);
        }
        if ( kosong ( $ _POST [ "tgl-masuk" ])) {
            $ eTglMasuk = "Tanggal Masuk Sekolah Tidak Boleh Kosong" ;
        }
        lain {
            $ Masuk tgl = cek_input ( $ _POST [ "tgl-masuk" ]);
        }
        if ( kosong ( $ _POST [ "nis-siswa" ])) {
            $ eNIS = "NIS Tidak Boleh Kosong" ;
        }
        lain {
            $ NIS = cek_input ( $ _POST [ "nis-siswa" ]);
            if (! is_numeric ( $ NIS )) {
                $ eNIS = "Nomor Induk Siswa Hanya Diisi Dengan Angka" ;
            }
        }
        if ( kosong ( $ _POST [ "ujian-siswa" ])) {
            $ eNujian = "Nomor Peserta Ujian Tidak Boleh Kosong" ;
        }
        lain {
            $ NPU = cek_input ( $ _POST [ "ujian-siswa" ]);
            if (! is_numeric ( $ NPU )) {
                $ eNujian = "Nomor Peserta Ujian Hanya Diisi Dengan Angka" ;
            }
        }
        if ( kosong ( $ _POST [ "skhun" ])) {
            $ eSKHUN = "Nomor Seri SKHUN Tidak Boleh Kosong" ;
        }
        lain {
            $ skhun = cek_input ( $ _POST [ "skhun" ]);
        }
        if ( kosong ( $ _POST [ "ijazah" ])) {
            $ eIJAZAH = "Nomor Seri Ijazah Tidak Boleh Kosong" ;
        }
        lain {
            $ ijazah = cek_input ( $ _POST [ "ijazah" ]);
        }
        $ jPend       = cek_input ( $ _POST [ "jenisPD" ]);
        $ paud        = cek_input ( $ _POST [ "pernah-paud" ]);
        $ tk          = cek_input ( $ _POST [ "pernah-tk" ]);
        $ hobi        = cek_input ( $ _POST [ "hobi" ]);
        $ cita        = cek_input ( $ _POST [ "cita" ]);

        //Jika semua variabel error bernilai kosong, maka query insert akan dijalankan
        if ( kosong ( $ eNoreg )) {
            if ( kosong ( $ eTglMasuk )) {
                if ( kosong ( $ eNIS )) {
                    if ( kosong ( $ eSKHUN )) {
                        if ( kosong ( $ eIJAZAH )) {
                            //masukkan kueri
                            $ sql = "MASUKKAN KE regist(noreg,jpend,tglmasuk,nis,npu,paud,tk,skhun,ijazah,hobi,cita) VALUES ('$noreg','$jPend','$tglMasuk','$NIS ','$NPU','$paud','$tk','$skhun','$ijazah','$hobi','$cita')" ;

                            $ query = mysqli_query ( $ sambungan , $ sql );
                        }
                    }
                }
            }
        }
    }
    fungsi  cek_input ( $ data ) {
        $ data = potong ( $ data );
        $ data = stripslash ( $ data );
        $ data = htmlspecialchars ( $ data );
        kembali  $ data ;
    }
    ?>
    < div  class =" wadah " >
        < h1  class =" alert alert-dark text-center mt-4 " > FORMULIR PENDAFTARAN PESERTA DIDIK BARU </ h1 >
        < form  action =" <?php  echo  htmlspecialchars ( $ _SERVER [ "PHP_SELF" ]); ?> " metode =" posting " >
            < div  class =" baris mt-3 " >
                < div  kelas =" col " >
                    < p > Tanggal : < span  id =" tgl-p " > </ span > </ p >
                </ div >
                < div  kelas =" col " >
                    < div  kelas =" baris " >
                        < div  kelas =" col " >
                        < p > Nomor Registrasi : </ p >
                        </ div >
                        < div  kelas =" col " >
                        < input  type =" teks " name =" noreg " id =" noreg " class =" form-control <?php  echo ( $ eNoreg != "" ? "is-invalid" : "" ); ?> " >
                        < span  class =" warning " > <?php  echo  $ eNoreg ; ?> </ span >
                        < small  class =" fst-italic " > *Nomor Regitrasi yang berasal dari petugas </ small >
                        </ div >
                    </ div >
                </ div >
            </ div >

            < p  class =" alert alert-dark text-right mt-3 " > REGISTRASI PESERTA DIDIK </ p >

            < div  class =" form-group " >
                < div  kelas =" baris " >
                    < div  kelas =" col " >
                        < label  for ="" > Jenis Pendaftaran </ label >
                    </ div >
                    < div  kelas =" col " >
                        < div  class =" form-check-inline " >
                        < input  type =" radio " class =" form-check-input " name =" jenisPD " id =" jenisPD " value =" Siswa Baru " dicentang >
                        < label  for =" jenisPD " > Siswa Baru </ label >
                        </ div >
                        < div  class =" form-check-inline " >
                        < input  type =" radio " class =" form-check-input " name =" jenisPD " id =" jenisPD " value =" Pindahan " >
                        < label  for =" jenisPD " > Pindahan </ label >
                        </ div >
                    </ div >
                </ div >
            </ div >
            < div  class =" form-group " >
                < label  for =" tgl-masuk " class =" mt-3 " > Tanggal Masuk Sekolah </ label >
                < input  type =" date " name =" tgl-masuk " id =" tgl-masuk " class =" form-control <?php  echo ( $ eTglMasuk != "" ? "is-invalid" : "" ); ? > " >
                < span  class =" warning-danger " > <?php  echo  $ eTglMasuk ; ?> </ span >
            </ div >
            < div  class =" form-group " >
                < label  for =" nis-siswa " > Nomor Induk Siswa </ label >
                < input  type =" text " name =" nis-siswa " id =" nis-siswa " class =" form-control <?php  echo ( $ eNIS != "" ? "is-invalid" : "" ); ? > " >
                < span  class =" warning-danger " > <?php  echo  $ eNIS ; ?> </ span >
            </ div >
            < div  class =" form-group " >
                < label  for =" ujian-siswa " > Nomor Peserta Ujian </ label >
                < input  type =" text " name =" ujian-siswa " id =" ujian-siswa " class =" form-control <?php  echo ( $ eNujian != "" ? "is-invalid" : "" ); ? > " >
                < span  class =" warning " > <?php  echo  $ eNujian ; ?> </ span >
                < small  class =" fst-italic " > *Jumlah peserta ujian adalah 20 digit yang tertera dalam sertifikat < small  class =" text-danger " > SKHUN SD </ small > , diisi bagi peserta didik jenjang SMP </ small >
            </ div >
            < div  class =" form-group " >
                < div  kelas =" baris " >
                    < div  kelas =" col " >
                        < label  for =" pernah-paud " class =" mt-3 " > Apakah Pernah PAUD </ label >
                    </ div >
                    < div  class =" col mt-3 " >
                        < div  class =" form-check-inline " >
                            < input  type =" radio " class =" form-check-input " name =" pernah-paud " id =" pernah-paud " value =" YA " dicentang >
                            < label  for =" pernah-paud " > YA </ label >
                        </ div >
                        < div  class =" form-check-inline " >
                            < input  type =" radio " class =" form-check-input " name =" pernah-paud " id =" pernah-paud " value =" TIDAK " >
                            < label  for =" pernah-paud " > TIDAK </ label >
                        </ div >
                    </ div >
                </ div >
            </ div >
            < div  class =" form-group " >
                < div  kelas =" baris " >
                    < div  kelas =" col " >
                        < label  for =" pernah-tk " class =" mt-3 " > Apakah Pernah TK </ label >
                    </ div >
                    < div  class =" col mt-3 " >
                        < div  class =" form-check-inline " >
                            < input  type =" radio " class =" form-check-input " name =" pernah-tk " id =" pernah-tk " value =" YA " dicentang >
                            < label  for =" pernah-tk " > YA </ label >
                        </ div >
                        < div  class =" form-check-inline " >
                            < input  type =" radio " class =" form-check-input " name =" pernah-tk " id =" pernah-tk " value =" TIDAK " >
                            < label  for =" pernah-tk " > TIDAK </ label >
                        </ div >
                    </ div >
                </ div >
            </ div >
            < div  class =" form-group mt-3 " >
                < label  for =" skhun-siswa " > No. Seri SKHUN Sebelumnya </ label >
                < input  type =" teks " name =" skhun " id =" skhun-siswa " class =" form-control <?php  echo ( $ eSKHUN != "" ? "is-invalid" : "" ); ?> " >
                < span  class =" peringatan " > <?php  echo  $ eSKHUN ; ?> </ span >
                < small  class =" fst-italic " > *Diisi 16 Digit yang tertera di < small  class =" text-danger " > SKHUN SD </ small > , diisi bagi peserta didik jenjang SMP </ small >
            </ div >
            < div  class =" form-group mt-3 " >
                < label  for =" ijazah-siswa " > No Seri IJAZAH Sebelumnya </ label >
                < input  type =" text " name =" ijazah " id =" ijazah-siswa " class =" form-control <?php  echo ( $ eIJAZAH != "" ? "is-invalid" : "" ); ?> " >
                < span  class =" peringatan " > <?php  echo  $ eIJAZAH ; ?> </ span >
                < small  class =" fst-italic " > *Diisi 16 Digit yang tertera di < small  class =" text-danger " > IJAZAH SD </ small > , diisi bagi peserta didik jenjang SMP </ small >
            </ div >
            < div  class =" form-group mt-3 " >
                < label  untuk =" hobi " > Hobi </ label >
                < pilih  nama =" hobi " id =" hobi " class =" form-select " >
                    < pilihan > Olah Raga </ pilihan >
                    < pilihan > Kesenian </ pilihan >
                    < option > Membaca </ option >
                    < option > Menulis </ option >
                    < opsi > Bepergian </ opsi >
                    < option > Lainnya </ option >
                </ pilih >
            </ div >
            < div  class =" form-group mt-3 " >
                < label  for =" cita " > Cita - Cita </ ​​label >
                < pilih  nama =" cita " id =" cita " class =" form-pilih " >
                    < opsi > PNS </ opsi >
                    < opsi > TNI / POLRI </ opsi >
                    < opsi > Guru / Dosis </ opsi >
                    < pilihan > Dokter </ pilihan >
                    < opsi > Politikus </ opsi >
                    < opsi > Wiraswasta </ ​​opsi >
                    < option > Seni / Lukis / Art / Sejenisnya </ option >
                    < option > Lainnya </ option >
                </ pilih >
            </ div >
            < small  class =" fst-italic text-danger mt-2 " > *Harap Klik Tombol Simpan sebelum Beralih Ke Form Selanjutnya </ small >
            < div  class =" form-group mt-3 " >
                < input  type =" submit " name =" btn-submit " class = " btn btn -success " value =" SIMPAN " >
                < a  href =" form2.php " role =" button " class =" btn btn -secondary " > SELANJUTNYA </ a >
            </ div >
        </ bentuk >
    </ div >
    < naskah >
        var  tanggal  =  Tanggal baru  ( ) ;
        dokumen . getElementById ( "tgl-p" ) . innerHTML  =  tanggal . toLocaleDateString ( ) ;
    </ skrip >
</ tubuh >
</ html >
