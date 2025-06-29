# Host: localhost  (Version 8.0.30)
# Date: 2025-06-30 01:42:42
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "antrean"
#

DROP TABLE IF EXISTS `antrean`;
CREATE TABLE `antrean` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `estimasi_pelayanan` tinyint DEFAULT NULL COMMENT 'waktu pelayanan(menit)',
  `keterangan` varchar(50) DEFAULT NULL COMMENT 'Racikan dan Non Racikan',
  `waktu_selesai` datetime DEFAULT NULL COMMENT 'waktu_input + estimasi_waktu',
  `status` tinyint DEFAULT '0' COMMENT '0 masih dalam antrean, 1 selesai, 2 obat sudah diambil',
  `dipanggil` tinyint DEFAULT '0' COMMENT '1 sedang dipanggil',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
