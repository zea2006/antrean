<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h1 class="card-title">Antrean Farmasi PKM Babakan (<?php echo date('d-m-Y'); ?>)</h1>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" id="jam">
                                        </button>

                                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-1">
                                    <table class="table table-striped table-sm table-bordered orderfarmasi-list">
                                        <thead>
                                            <tr style="background-color: #82b8f2;">
                                                <th style="text-align: center;vertical-align: middle;" rowspan="2">No</th>
                                                <th style="text-align: center;vertical-align: middle" rowspan="2">Nama Pasien</th>
                                                <th style="text-align: center;vertical-align: middle" rowspan="2">Keterangan</th>
                                                <th colspan="3" style="text-align: center;vertical-align: middle">Waktu Pelayanan</th>
                                                <th style="text-align: center;vertical-align: middle" rowspan="2">Status</th>
                                            </tr>
                                            <tr style="background-color: #82b8f2;">
                                                <th style="text-align: center;vertical-align: middle">Mulai</th>
                                                <th style="text-align: center;vertical-align: middle">Estimasi</th>
                                                <th style="text-align: center;vertical-align: middle;">Selesai</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("koneksi.php");
                                            $awal = date('Y-m-d') . " 00:00:01";
                                            $akhir = date('Y-m-d') . " 23:59:01";
                                            $sql = "SELECT *,DATE_FORMAT(waktu_input,'%H:%i') AS mulai,DATE_FORMAT(waktu_selesai,'%H:%i') AS selesai FROM antrean WHERE waktu_input >='$awal' AND waktu_input <='$akhir' AND status !=2 ORDER BY id ASC";
                                            // echo $sql;
                                            $ex = mysqli_query($conn, $sql);
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($ex)) {
                                                echo "<tr> <td align='center' >$no</td> <td>$row[nama]</td> <td>$row[keterangan]</td>";
                                                echo "<td align='center' >$row[mulai]</td>";
                                                echo "<td align='center' >$row[estimasi_pelayanan]" . " mnt</td>";
                                                echo "<td align='center'>$row[selesai]</td>";
                                                //0 diproses, 1 selesai, 2 obat sudah diambil
                                                if ($row['status'] == 0)
                                                    echo "<td align='center' > <span class='badge badge-pill badge-warning'>Diproses</span> </td>";
                                                else if ($row['status'] == 1)
                                                    echo "<td align='center' > <span class='badge badge-pill badge-primary'>Selesai</span> </td>";
                                                else if ($row['status'] == 2)
                                                    echo "<td align='center' > <span class='badge badge-pill badge-success'>Sudah diambil</span> </td>";




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
        window.setTimeout(function() {
            window.location.reload();
        }, 30000);


        setInterval(myTimer, 1000);

        function myTimer() {
            const now = new Date();
            // Format the time (e.g., HH:MM:SS)
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const timeString = `${hours}:${minutes}:${seconds}`;
            document.getElementById("jam").innerHTML = timeString;
        }
    </script>





</body>