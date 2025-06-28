<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="kehidupan" content="kami butuh tidur dan tenang, TOLONG :(">
    <title>
        PKM Babakan | Antrean
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- SummerNote css -->

    <!-- JqueryUI -->

    <!-- Select2 -->


    <style>

    </style>



</head>

<body class="layout-top-nav " style="min-height: 332.8px;" cz-shortcut-listen="true">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Antrean Farmasi (<?php echo date('d-m-Y'); ?>)</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool">
                                            <i class="fas fa-plus"></i> Tambah Pasien
                                        </button>

                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-setting">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="table table-condensed table-sm table-bordered orderfarmasi-list">
                                        <thead>
                                            <tr style="background-color:#cff2f7;">
                                                <th colspan="3"></th>
                                                <th colspan="3" style="text-align: center;vertical-align: middle">Waktu Pelayanan</th>
                                                <th colspan="2"></th>
                                            </tr>
                                            <tr style="background-color:#cff2f7;">
                                                <th style="text-align: center;vertical-align: middle; width: 20px;">No</th>
                                                <th style="text-align: center;vertical-align: middle">Nama Pasien</th>
                                                <th style="text-align: center;vertical-align: middle">Keterangan</th>
                                                <th style="text-align: center;vertical-align: middle">Mulai</th>
                                                <th style="text-align: center;vertical-align: middle">Estimasi</th>

                                                <th style="text-align: center;vertical-align: middle;">Selesai</th>
                                                <th style="text-align: center;vertical-align: middle">Status</th>
                                                <th style="text-align: center;vertical-align: middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("koneksi.php");
                                            $awal = date('Y-m-d') . " 00:00:01";
                                            $akhir = date('Y-m-d') . " 23:59:01";
                                            $sql = "SELECT *,DATE_FORMAT(waktu_input,'%H:%i') AS mulai,DATE_FORMAT(waktu_selesai,'%H:%i') AS selesai FROM antrean WHERE waktu_input >='$awal' AND waktu_input <='$akhir' ORDER BY id ASC";
                                            // echo $sql;
                                            $ex = mysqli_query($conn, $sql);
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($ex)) {
                                                echo "<tr> <td align='center' >$no</td> <td>$row[nama]</td> <td>$row[keterangan]</td>";
                                                echo "<td align='center' >$row[mulai]</td>";
                                                echo "<td align='center' >$row[estimasi_pelayanan]" . " mnt</td>";
                                                echo "<td align='center'>$row[selesai]</td>";
                                                //0 diproses, 1 selesai, 2 obat sudah diambil
                                                if ($row['status'] == 0) {
                                                    echo "<td align='center' >Diproses</td>";
                                                    echo "<td align='center' ><button onclick='javascript:showWindow(this)' class='btn btn-info btn-xs' \
                                                    data-nama='$row[nama]'><i class='fas fa-volume-up'></i> Panggil</button></td>";
                                                } else {
                                                    echo "<td align='center' >Selesai</td>";
                                                    echo "<td></td>";
                                                }
                                                $no += 1;
                                                echo "</tr>";
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- card -->
                        </div> <!--col-12 -->
                    </div> <!--row -->
                </div> <!-- container fluid -->
            </section>
        </div> <!-- content wrapper-->
    </div> <!--  /wrapper-->




    <div class="modal fade" id="modal-setting">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> <i class="fas fa-cog"></i> Setting</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <small class="text-muted">Rate (From 0.1 to 10) </small>
                                <input type="Text" class="form-control form-control-sm" value="0.9"
                                    id="rate">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <small class="text-muted">Pitch (From 0 to 2)</small>
                                <input type="Text" class="form-control form-control-sm" value="0.1"
                                    id="pitch">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <small class="text-muted">Voice</small>
                                <select id="voice" class="form-control form-control-sm"></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <small class="text-muted">Text To Speech</small>
                                <input type="Text" class="form-control form-control-sm"
                                    value="Pasien atas nama bapak, wahyu kuncoro, Harap ke loket farmasi" id="sampel">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <small class="text-muted">&nbsp;</small>
                                <button class="btn btn-info btn-sm btn-block " id="btn-tes" onclick="testSpeak()"><i
                                        class="fas fa-volume-up"></i>
                                    Tes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modal-panggil" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-volume-up"></i> Pemanggilan Pasien</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style=" border-top: 0;">Nama</td>
                                        <td style=" border-top: 0;">:</td>
                                        <td style=" border-top: 0;"><span id="namaPasien">Wahyu Kuncoro</span></td>
                                    </tr>
                                    <tr>
                                        <td>Norm</td>
                                        <td>:</td>
                                        <td><span id="normPasien">525252</span></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Ruangan</td>
                                        <td>:</td>
                                        <td><span id="asalPasien">Poli Syaraf</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Lahir / Kelamin /Umur</td>
                                        <td>:</td>
                                        <td> <span id="lahirPasien">2024-10-20</span> / <span
                                                id="kelaminPasien">Laki-Laki</span>
                                            / <span id="umurPasien">30</span> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-block " data-dismiss="modal"
                                id="btn-modal-close">Tutup</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-warning" id="btn-skip"
                                title="Sudah dipanggil tapi tidak datang"><i class="fas fa-forward"></i>
                                Lewati Panggilan</button>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success btn-block" id="btn-set"><i
                                    class="fas fa-check"></i>
                                Set sudah dipanggil</button>
                        </div>

                        <div class="col-md-3">
                            <button type="button" class="btn btn-info btn-block" id="btn-panggil"><i
                                    class="fas fa-volume-up"></i>
                                Panggil Pasien</button>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->





    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js "></script>
    <script src="plugins/popper/umd/popper.js "></script>


    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.js "></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.all.min.js "></script>
    <script src="plugins/blockui/blockui.js"></script>
    <!-- Summernote -->

    <!-- JquueryUI -->

    <!-- select2 -->

    <script>
        var setDipanggil = false;

        var msg = new SpeechSynthesisUtterance();
        var voices = window.speechSynthesis.getVoices();


        msg.voice = voices[3];
        msg.volume = 1; // From 0 to 1



        msg.rate = 0.9; // From 0.1 to 10
        msg.pitch = 0.1; // From 0 to 2

        for (let i = 0; i < voices.length; i++) {
            console.log(voices[i].name);

            let sel = i == 3 ? "selected" : "";
            $("#voice").append(`<option value="${i}"  ${sel} > ${voices[i].name}</option`);
        }

        $("#voice").change(function() {
            // alert( $(this).val()) ;
            msg.voice = voices[$(this).val()];
        });

        msg.lang = 'id-ID';

        msg.addEventListener("end", (event) => {
            console.log("Selesai ngomong setelah " + event.elapsedTime);
            $("#btn-panggil").prop("disabled", false);
            $("#btn-tes").prop("disabled", false);
        });


        function testSpeak() {
            // Create a SpeechSynthesisUtterance
            $("#btn-tes").prop("disabled", true);
            msg.text = $("#sampel").val();
            msg.rate = $("#rate").val();
            msg.pitch = $("#pitch").val();
            speechSynthesis.speak(msg);
        }

        function panggilAntrean() {
            // Create a SpeechSynthesisUtterance
            // msg.text = $("#sampel").val();
            //let norm = $("#normPasien").text().split('').join(' ');
            let nama = $("#namaPasien").text();
            let gelar = '';
            //let gelar = $("#kelaminPasien").text() == "Perempuan" ? "Ibu" : "Bapak";
            //if (parseInt($("#umurPasien").text()) <= 18)
            //gelar = "Ananda";

            msg.text = "Pasien atas nama " + gelar + ", " + nama + ", Harap ke loket farmasi";
            msg.rate = $("#rate").val();
            msg.pitch = $("#pitch").val();
            speechSynthesis.speak(msg);
        }

        $("#btn-panggil").click(function() {

            //lewati ajax, jika setdipanggil true
            //run ajax di sini jika set dipanggil false lalu set true jika berhasil update ke database

            if (setDipanggil == false) {

            }
            setDipanggil = true;

            $(this).prop("disabled", true);
            $data = {
                "cmd": "update_antrean",
                "status": 1,
                "id": 223
            };
            postData($data);
            panggilAntrean();
        });

        function showWindow(elem) {

            // alert('dd ' + elem.getAttribute('data-nama'));
            setDipanggil = false;
            $("#namaPasien").text(elem.getAttribute('data-nama'));
            $("#normPasien").text(elem.getAttribute('data-norm'));
            $("#asalPasien").text(elem.getAttribute('data-ruanganasal'));
            $("#kelaminPasien").text(elem.getAttribute('data-kelamin'));
            $("#lahirPasien").text(elem.getAttribute('data-tgllahir'));
            $("#umurPasien").text(elem.getAttribute('data-umur'));
            $('#modal-panggil').modal();

        }


        var postData = function(dataLoad, flag = 'update') {
            return $.ajax({
                async: true,
                url: "rest.php?cmd=" + flag,
                type: 'POST',
                dataType: 'JSON',
                data: dataLoad,
                beforeSend: function() {
                    // $('.content').block({
                    //     message: 'Cek Jadwal Dokter',
                    // });
                },
                complete: function() {
                    // $('.content').unblock();
                },
                success: function(data) {},
                error: function(data) {}
            });
        }




        /*end here */


        $("#kodebooking").focus();
        $("#i-kode").keypress(function(event) {
            if (event.which == 13) {
                $("#btn-cek").trigger("click");
            }
        });

        $("#i-kode").focus();

        $("#btn-cek").click(function() {
            let kode = $.trim($("#i-kode").val());
            let url = "http://127.0.0.1:8000/anjungan/cekappointment/:kb";
            url = url.replace(':kb', kode);

            //<i class="fa fa-spinner fa-spin"></i>


            $.blockUI({
                message: null
            });
            $.ajax({
                async: true,
                url: url,
                dataType: 'JSON',
                success: function(data) {
                    $.unblockUI();
                    if (data.code == 200) {
                        let resp = data.response;
                        let redir = "http://127.0.0.1:8000/anjungan/jkn/:nk";
                        redir = redir.replace(':nk', resp.no_kartu);
                        window.location.href = redir;

                    } else {

                        Swal.fire('',
                            'Data Pendaftaran Pasien Mobile JKN Hari ini Dengan Kode booking/No Kartu <b>' +
                            kode + '</b> Tidak Ditemukan', 'error');
                    }
                },
                error: function(xhr) {
                    $.unblockUI();
                    alert("Error Cek Pasien!");
                }

            });
        });
    </script>





</body>