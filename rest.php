<?php
include('koneksi.php');

$response = array("code" => 300, "message" => "Error", "response" => "");
$cmd = trim($_REQUEST['cmd']);




if ($cmd == "input") {
	$nama = $_REQUEST['nama'];
	$ket = $_REQUEST['keterangan'];
	$estimasi = $_REQUEST['estimasi'];
	$added = "INTERVAL " . $estimasi . " MINUTE";
	$sql = "INSERT INTO antrean(nama,keterangan,estimasi_pelayanan,waktu_input,waktu_selesai) VALUES('$nama','$ket','$estimasi',NOW(),DATE_ADD(NOW(),$added) )";
	// echo $sql;
	$ex = mysqli_query($conn, $sql);
	if ($ex) {
		$response["code"] = 200;
		$response["message"] = "Input Pasien Sukses";
	} else {

		$response["message"] = mysqli_error($conn);
	}
}

if ($cmd == "delete") {
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM antrean WHERE id=$id";
	$ex = mysqli_query($conn, $sql);
	if ($ex) {
		$response["code"] = 200;
		$response["message"] = "Hapus Pasien Sukses";
	} else {

		$response["message"] = mysqli_error($conn);
	}
}

if ($cmd == "update") {
	$nama = $_REQUEST['nama'];
	$ket = $_REQUEST['keterangan'];
	$estimasi = $_REQUEST['estimasi'];
	$id = $_REQUEST['id'];
	$added = "INTERVAL " . $estimasi . " MINUTE";
	$sql = "UPDATE antrean SET nama='$nama',keterangan='$ket',estimasi_pelayanan='$estimasi',waktu_selesai=DATE_ADD(waktu_input,$added) WHERE id=$id";
	// echo $sql;
	$ex = mysqli_query($conn, $sql);
	if ($ex) {
		$response["code"] = 200;
		$response["message"] = "Update Pasien Sukses";
	} else {

		$response["message"] = mysqli_error($conn);
	}
}

if ($cmd == "set_selesai") {

	$id = $_REQUEST['id'];
	$sql = "UPDATE antrean SET status=1 WHERE id=$id";
	// echo $sql;
	$ex = mysqli_query($conn, $sql);
	if ($ex) {
		$response["code"] = 200;
		$response["message"] = "Update Pelayanan Selesai Sukses";
	} else {

		$response["message"] = mysqli_error($conn);
	}
}

if ($cmd == "set_diambil") {

	$id = $_REQUEST['id'];
	$sql = "UPDATE antrean SET status=2 WHERE id=$id";
	// echo $sql;
	$ex = mysqli_query($conn, $sql);
	if ($ex) {
		$response["code"] = 200;
		$response["message"] = "Update Obat sudah diambil Sukses";
	} else {

		$response["message"] = mysqli_error($conn);
	}
}

echo json_encode($response);
