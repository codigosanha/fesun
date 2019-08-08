<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aportes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

		$this->load->model("Aportes_model");
		$this->load->library('excel');
	}

	public function index()
	{
		$contenido_interno = array(
			"aportes" => $this->Aportes_model->getAportes()

		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/aportes/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function importar(){
		$path = $_FILES["file"]["tmp_name"];
		$object = PHPExcel_IOFactory::load($path);

		foreach($object->getWorksheetIterator() as $worksheet)
		{
			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			for($row=2; $row<=$highestRow; $row++)
			{
				$nombre = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
				$area = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$cencos = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$set_fechag = '';

				if ($worksheet->getCellByColumnAndRow(3, $row)->getValue()) {
					$fechag = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(3, $row)->getValue());
					$set_fechag = $fechag->format('Y-m-d H:i:s');
				}
				$cedula = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$set_fechai = '';

				if ($worksheet->getCellByColumnAndRow(5, $row)->getValue()) {
					$fechai = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(5, $row)->getValue());
					$set_fechai = $fechai->format('Y-m-d H:i:s');
				}
				$cuotaf = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
				$ahorro = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				$ahorrv = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$aporte = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				$saldof = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
				$numero = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
				$tipopr = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
				$set_fechae = '';

				if ($worksheet->getCellByColumnAndRow(13, $row)->getValue()) {
					$fechae = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(13, $row)->getValue());
					$set_fechae = $fechae->format('Y-m-d H:i:s');
				}
				$set_fechav = '';

				if ($worksheet->getCellByColumnAndRow(14, $row)->getValue()) {
					$fechav = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(14, $row)->getValue());
					$set_fechav = $fechav->format('Y-m-d H:i:s');
				}
				$valorp = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
				$cuotap = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
				$valorc = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
				$saldom = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
				$saldoc = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
				$saldoi = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
				$saldot = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
				$detar1 = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
				$numer1 = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
				$set_fechr1 = '';

				if ($worksheet->getCellByColumnAndRow(24, $row)->getValue()) {
					$fechr1 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(24, $row)->getValue());
					$set_fechr1 = $fechr1->format('Y-m-d H:i:s');
				}
				$set_fechv1 = '';

				if ($worksheet->getCellByColumnAndRow(25, $row)->getValue()) {
					$fechv1 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(25, $row)->getValue());
					$set_fechv1 = $fechv1->format('Y-m-d H:i:s');
				}
				$ahorr1 = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
				$aporr1 = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
				$detar2 = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
				$numer2 = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
				$set_fechr2 = '';

				if ($worksheet->getCellByColumnAndRow(30, $row)->getValue()) {
					$fechr2 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(30, $row)->getValue());
					$set_fechr2 = $fechr2->format('Y-m-d H:i:s');
				}
				$set_fechv2 = '';

				if ($worksheet->getCellByColumnAndRow(31, $row)->getValue()) {
					$fechv2 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(31, $row)->getValue());
					$set_fechv2 = $fechv2->format('Y-m-d H:i:s');
				}
				$ahorr2 = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
				$aporr2 = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
				$detar3 = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
				$numer3 = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
				$set_fechr3 = '';

				if ($worksheet->getCellByColumnAndRow(36, $row)->getValue()) {
					$fechr3 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(36, $row)->getValue());
					$set_fechr3 = $fechr3->format('Y-m-d H:i:s');
				}
				$set_fechv3 = '';

				if ($worksheet->getCellByColumnAndRow(37, $row)->getValue()) {
					$fechv3 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(37, $row)->getValue());
					$set_fechv3 = $fechv3->format('Y-m-d H:i:s');
				}
				$ahorr3 = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
				$aporr3 = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
				$detar4 = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
				$numer4 = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
				$set_fechr4 = '';

				if ($worksheet->getCellByColumnAndRow(42, $row)->getValue()) {
					$fechr4 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(42, $row)->getValue());
					$set_fechr4 = $fechr4->format('Y-m-d H:i:s');
				}
				$set_fechv4 = '';

				if ($worksheet->getCellByColumnAndRow(43, $row)->getValue()) {
					$fechv4 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(43, $row)->getValue());
					$set_fechv4 = $fechv4->format('Y-m-d H:i:s');
				}
				$ahorr4 = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
				$aporr4 = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
				$detar5 = $worksheet->getCellByColumnAndRow(47, $row)->getValue();
				$numer5 = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
				$set_fechr5 = '';

				if ($worksheet->getCellByColumnAndRow(49, $row)->getValue()) {
					$fechr5 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(49, $row)->getValue());
					$set_fechr5 = $fechr5->format('Y-m-d H:i:s');
				}
				$set_fechv5 = '';

				if ($worksheet->getCellByColumnAndRow(50, $row)->getValue()) {
					$fechv5 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(50, $row)->getValue());
					$set_fechv5 = $fechv5->format('Y-m-d H:i:s');
				}
				$ahorr5 = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
				$aporr5 = $worksheet->getCellByColumnAndRow(52, $row)->getValue();
				$detar6 = $worksheet->getCellByColumnAndRow(53, $row)->getValue();
				$numer6 = $worksheet->getCellByColumnAndRow(54, $row)->getValue();
				$set_fechr6 = '';

				if ($worksheet->getCellByColumnAndRow(55, $row)->getValue()) {
					$fechr6 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(55, $row)->getValue());
					$set_fechr6 = $fechr6->format('Y-m-d H:i:s');
				}
				$set_fechv6 = '';

				if ($worksheet->getCellByColumnAndRow(56, $row)->getValue()) {
					$fechv6 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(56, $row)->getValue());
					$set_fechv6 = $fechv6->format('Y-m-d H:i:s');
				}
				$ahorr6 = $worksheet->getCellByColumnAndRow(57, $row)->getValue();
				$aporr6 = $worksheet->getCellByColumnAndRow(58, $row)->getValue();
				$detar7 = $worksheet->getCellByColumnAndRow(59, $row)->getValue();
				$numer7 = $worksheet->getCellByColumnAndRow(60, $row)->getValue();
				$set_fechr7 = '';

				if ($worksheet->getCellByColumnAndRow(61, $row)->getValue()) {
					$fechr7 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(61, $row)->getValue());
					$set_fechr7 = $fechr7->format('Y-m-d H:i:s');
				}
				$set_fechv7 = '';

				if ($worksheet->getCellByColumnAndRow(62, $row)->getValue()) {
					$fechv7 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(62, $row)->getValue());
					$set_fechv7 = $fechv7->format('Y-m-d H:i:s');
				}
				$ahorr7 = $worksheet->getCellByColumnAndRow(63, $row)->getValue();
				$aporr7 = $worksheet->getCellByColumnAndRow(64, $row)->getValue();
				$detar8 = $worksheet->getCellByColumnAndRow(65, $row)->getValue();
				$numer8 = $worksheet->getCellByColumnAndRow(66, $row)->getValue();
				$set_fechr8 = '';

				if ($worksheet->getCellByColumnAndRow(67, $row)->getValue()) {
					$fechr8 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(67, $row)->getValue());
					$set_fechr8 = $fechr8->format('Y-m-d H:i:s');
				}
				$set_fechv8 = '';

				if ($worksheet->getCellByColumnAndRow(68, $row)->getValue()) {
					$fechv8 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(68, $row)->getValue());
					$set_fechv8 = $fechv8->format('Y-m-d H:i:s');
				}
				$ahorr8 = $worksheet->getCellByColumnAndRow(69, $row)->getValue();
				$aporr8 = $worksheet->getCellByColumnAndRow(70, $row)->getValue();
				$detar9 = $worksheet->getCellByColumnAndRow(71, $row)->getValue();
				$numer9 = $worksheet->getCellByColumnAndRow(72, $row)->getValue();
				$set_fechr9 = '';

				if ($worksheet->getCellByColumnAndRow(73, $row)->getValue()) {
					$fechr9 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(73, $row)->getValue());
					$set_fechr9 = $fechr9->format('Y-m-d H:i:s');
				}
				$set_fechv9 = '';

				if ($worksheet->getCellByColumnAndRow(74, $row)->getValue()) {
					$fechv9 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(74, $row)->getValue());
					$set_fechv9 = $fechv9->format('Y-m-d H:i:s');
				}
				$ahorr9 = $worksheet->getCellByColumnAndRow(75, $row)->getValue();
				$aporr9 = $worksheet->getCellByColumnAndRow(76, $row)->getValue();
				$detar10 = $worksheet->getCellByColumnAndRow(77, $row)->getValue();
				$numer10 = $worksheet->getCellByColumnAndRow(78, $row)->getValue();
				$set_fechr10 = '';

				if ($worksheet->getCellByColumnAndRow(79, $row)->getValue()) {
					$fechr10 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(79, $row)->getValue());
					$set_fechr10 = $fechr10->format('Y-m-d H:i:s');
				}
				$set_fechv10 = '';

				if ($worksheet->getCellByColumnAndRow(80, $row)->getValue()) {
					$fechv10 = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(80, $row)->getValue());
					$set_fechv10 = $fechv10->format('Y-m-d H:i:s');
				}
				$ahorr10 = $worksheet->getCellByColumnAndRow(81, $row)->getValue();
				$aporr10 = $worksheet->getCellByColumnAndRow(82, $row)->getValue();
				$mensa1 = $worksheet->getCellByColumnAndRow(83, $row)->getValue();
				$mensa2 = $worksheet->getCellByColumnAndRow(84, $row)->getValue();
				$mensa3 = $worksheet->getCellByColumnAndRow(85, $row)->getValue();
				$ahorrt = $worksheet->getCellByColumnAndRow(86, $row)->getValue();
				$aporrt = $worksheet->getCellByColumnAndRow(87, $row)->getValue();
				$codnom = $worksheet->getCellByColumnAndRow(88, $row)->getValue();
				$feche1 = $worksheet->getCellByColumnAndRow(89, $row)->getValue();
				$valoe1 = $worksheet->getCellByColumnAndRow(90, $row)->getValue();
				$prest1 = $worksheet->getCellByColumnAndRow(91, $row)->getValue();
				$tipop1 = $worksheet->getCellByColumnAndRow(92, $row)->getValue();
				$feche2 = $worksheet->getCellByColumnAndRow(93, $row)->getValue();
				$valoe2 = $worksheet->getCellByColumnAndRow(94, $row)->getValue();
				$prest2 = $worksheet->getCellByColumnAndRow(95, $row)->getValue();
				$tipop2 = $worksheet->getCellByColumnAndRow(96, $row)->getValue();
				$feche3 = $worksheet->getCellByColumnAndRow(97, $row)->getValue();
				$valoe3 = $worksheet->getCellByColumnAndRow(98, $row)->getValue();
				$prest3 = $worksheet->getCellByColumnAndRow(99, $row)->getValue();
				$tipop3 = $worksheet->getCellByColumnAndRow(100, $row)->getValue();
				$feche4 = $worksheet->getCellByColumnAndRow(101, $row)->getValue();
				$valoe4 = $worksheet->getCellByColumnAndRow(102, $row)->getValue();
				$prest4 = $worksheet->getCellByColumnAndRow(103, $row)->getValue();
				$tipop4 = $worksheet->getCellByColumnAndRow(104, $row)->getValue();
				$feche5 = $worksheet->getCellByColumnAndRow(105, $row)->getValue();
				$valoe5 = $worksheet->getCellByColumnAndRow(106, $row)->getValue();
				$prest5 = $worksheet->getCellByColumnAndRow(107, $row)->getValue();
				$tipop5 = $worksheet->getCellByColumnAndRow(108, $row)->getValue();
				$feche6 = $worksheet->getCellByColumnAndRow(109, $row)->getValue();
				$valoe6 = $worksheet->getCellByColumnAndRow(110, $row)->getValue();
				$prest6 = $worksheet->getCellByColumnAndRow(111, $row)->getValue();
				$tipop6 = $worksheet->getCellByColumnAndRow(112, $row)->getValue();
				$feche7 = $worksheet->getCellByColumnAndRow(113, $row)->getValue();
				$valoe7 = $worksheet->getCellByColumnAndRow(114, $row)->getValue();
				$prest7 = $worksheet->getCellByColumnAndRow(115, $row)->getValue();
				$tipop7 = $worksheet->getCellByColumnAndRow(116, $row)->getValue();
				$feche8 = $worksheet->getCellByColumnAndRow(117, $row)->getValue();
				$valoe8 = $worksheet->getCellByColumnAndRow(118, $row)->getValue();
				$prest8 = $worksheet->getCellByColumnAndRow(119, $row)->getValue();
				$tipop8 = $worksheet->getCellByColumnAndRow(120, $row)->getValue();
				$feche9 = $worksheet->getCellByColumnAndRow(121, $row)->getValue();
				$valoe9 = $worksheet->getCellByColumnAndRow(122, $row)->getValue();
				$prest9 = $worksheet->getCellByColumnAndRow(123, $row)->getValue();
				$tipop9 = $worksheet->getCellByColumnAndRow(124, $row)->getValue();
				$feche10 = $worksheet->getCellByColumnAndRow(125, $row)->getValue();
				$valoe10 = $worksheet->getCellByColumnAndRow(126, $row)->getValue();
				$prest10 = $worksheet->getCellByColumnAndRow(127, $row)->getValue();
				$tipop10 = $worksheet->getCellByColumnAndRow(128, $row)->getValue();
				$feche11 = $worksheet->getCellByColumnAndRow(129, $row)->getValue();
				$valoe11 = $worksheet->getCellByColumnAndRow(130, $row)->getValue();
				$prest11 = $worksheet->getCellByColumnAndRow(131, $row)->getValue();
				$tipop11 = $worksheet->getCellByColumnAndRow(132, $row)->getValue();
				$feche12 = $worksheet->getCellByColumnAndRow(133, $row)->getValue();
				$valoe12 = $worksheet->getCellByColumnAndRow(134, $row)->getValue();
				$prest12 = $worksheet->getCellByColumnAndRow(135, $row)->getValue();
				$tipop12 = $worksheet->getCellByColumnAndRow(136, $row)->getValue();
				$feche13 = $worksheet->getCellByColumnAndRow(137, $row)->getValue();
				$valoe13 = $worksheet->getCellByColumnAndRow(138, $row)->getValue();
				$prest13 = $worksheet->getCellByColumnAndRow(139, $row)->getValue();
				$tipop13 = $worksheet->getCellByColumnAndRow(140, $row)->getValue();
				$feche14 = $worksheet->getCellByColumnAndRow(141, $row)->getValue();
				$valoe14 = $worksheet->getCellByColumnAndRow(142, $row)->getValue();
				$prest14 = $worksheet->getCellByColumnAndRow(143, $row)->getValue();
				$tipop14 = $worksheet->getCellByColumnAndRow(144, $row)->getValue();
				$feche15 = $worksheet->getCellByColumnAndRow(145, $row)->getValue();
				$valoe15 = $worksheet->getCellByColumnAndRow(146, $row)->getValue();
				$prest15 = $worksheet->getCellByColumnAndRow(147, $row)->getValue();
				$tipop15 = $worksheet->getCellByColumnAndRow(148, $row)->getValue();
				$feche16 = $worksheet->getCellByColumnAndRow(149, $row)->getValue();
				$valoe16 = $worksheet->getCellByColumnAndRow(150, $row)->getValue();
				$prest16 = $worksheet->getCellByColumnAndRow(151, $row)->getValue();
				$tipop16 = $worksheet->getCellByColumnAndRow(152, $row)->getValue();
				$abonoi = $worksheet->getCellByColumnAndRow(153, $row)->getValue();
				$set_fecing = '';

				if ($worksheet->getCellByColumnAndRow(154, $row)->getValue()) {
					$fecing = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(154, $row)->getValue());
					$set_fecing = $fecing->format('Y-m-d H:i:s');
				}
				$coment = $worksheet->getCellByColumnAndRow(155, $row)->getValue();
				$morapo = $worksheet->getCellByColumnAndRow(156, $row)->getValue();
				$ahocu1 = $worksheet->getCellByColumnAndRow(157, $row)->getValue();
				$ahocu2 = $worksheet->getCellByColumnAndRow(158, $row)->getValue();
				$ahocu3 = $worksheet->getCellByColumnAndRow(159, $row)->getValue();
				$ahocu4 = $worksheet->getCellByColumnAndRow(160, $row)->getValue();
				$ahocu5 = $worksheet->getCellByColumnAndRow(161, $row)->getValue();
				$ahocu6 = $worksheet->getCellByColumnAndRow(162, $row)->getValue();
				$ahofp1 = $worksheet->getCellByColumnAndRow(163, $row)->getValue();
				$ahofp2 = $worksheet->getCellByColumnAndRow(164, $row)->getValue();
				$ahofp3 = $worksheet->getCellByColumnAndRow(165, $row)->getValue();
				$ahofp4 = $worksheet->getCellByColumnAndRow(166, $row)->getValue();
				$ahofp5 = $worksheet->getCellByColumnAndRow(167, $row)->getValue();
				$ahofp6 = $worksheet->getCellByColumnAndRow(168, $row)->getValue();
				$ahocu7 = $worksheet->getCellByColumnAndRow(169, $row)->getValue();
				$ahofp7 = $worksheet->getCellByColumnAndRow(170, $row)->getValue();
				$nlocal = $worksheet->getCellByColumnAndRow(171, $row)->getValue();
				$mesant = $worksheet->getCellByColumnAndRow(172, $row)->getValue();
				$codnom1 = $worksheet->getCellByColumnAndRow(173, $row)->getValue();
				$codpre1 = $worksheet->getCellByColumnAndRow(174, $row)->getValue();
				$codnom2 = $worksheet->getCellByColumnAndRow(175, $row)->getValue();
				$codpre2 = $worksheet->getCellByColumnAndRow(176, $row)->getValue();
				$codnom3 = $worksheet->getCellByColumnAndRow(177, $row)->getValue();
				$codpre3 = $worksheet->getCellByColumnAndRow(178, $row)->getValue();
				$codnom4 = $worksheet->getCellByColumnAndRow(179, $row)->getValue();
				$codpre4 = $worksheet->getCellByColumnAndRow(180, $row)->getValue();
				$codnom5 = $worksheet->getCellByColumnAndRow(181, $row)->getValue();
				$codpre5 = $worksheet->getCellByColumnAndRow(182, $row)->getValue();
				$codpre6 = $worksheet->getCellByColumnAndRow(183, $row)->getValue();
				$codnom7 = $worksheet->getCellByColumnAndRow(184, $row)->getValue();
				$codpre7 = $worksheet->getCellByColumnAndRow(185, $row)->getValue();
				$codnom8 = $worksheet->getCellByColumnAndRow(186, $row)->getValue();
				$codpre8 = $worksheet->getCellByColumnAndRow(187, $row)->getValue();
				$auxsol = $worksheet->getCellByColumnAndRow(188, $row)->getValue();
				$detse1 = $worksheet->getCellByColumnAndRow(189, $row)->getValue();
				$feese1 = $worksheet->getCellByColumnAndRow(190, $row)->getValue();
				$fevse1 = $worksheet->getCellByColumnAndRow(191, $row)->getValue();
				$valse1 = $worksheet->getCellByColumnAndRow(192, $row)->getValue();
				$detse2 = $worksheet->getCellByColumnAndRow(193, $row)->getValue();
				$feese2 = $worksheet->getCellByColumnAndRow(194, $row)->getValue();
				$fevse2 = $worksheet->getCellByColumnAndRow(195, $row)->getValue();
				$valse2 = $worksheet->getCellByColumnAndRow(196, $row)->getValue();
				$detse3 = $worksheet->getCellByColumnAndRow(197, $row)->getValue();
				$feese3 = $worksheet->getCellByColumnAndRow(198, $row)->getValue();
				$fevse3 = $worksheet->getCellByColumnAndRow(199, $row)->getValue();
				$valse3 = $worksheet->getCellByColumnAndRow(200, $row)->getValue();
				$detse4 = $worksheet->getCellByColumnAndRow(201, $row)->getValue();
				$feese4 = $worksheet->getCellByColumnAndRow(202, $row)->getValue();
				$fevse4 = $worksheet->getCellByColumnAndRow(203, $row)->getValue();
				$valse4 = $worksheet->getCellByColumnAndRow(204, $row)->getValue();
				$detse5 = $worksheet->getCellByColumnAndRow(205, $row)->getValue();
				$feese5 = $worksheet->getCellByColumnAndRow(205, $row)->getValue();
				$fevse5 = $worksheet->getCellByColumnAndRow(206, $row)->getValue();
				$valse5 = $worksheet->getCellByColumnAndRow(207, $row)->getValue();
				$ncode1 = $worksheet->getCellByColumnAndRow(208, $row)->getValue();
				$npres1 = $worksheet->getCellByColumnAndRow(209, $row)->getValue();
				$ncode2 = $worksheet->getCellByColumnAndRow(210, $row)->getValue();
				$npres2 = $worksheet->getCellByColumnAndRow(211, $row)->getValue();
				$ncode3 = $worksheet->getCellByColumnAndRow(212, $row)->getValue();
				$npres3 = $worksheet->getCellByColumnAndRow(213, $row)->getValue();
				$ncode4 = $worksheet->getCellByColumnAndRow(214, $row)->getValue();
				$npres4 = $worksheet->getCellByColumnAndRow(215, $row)->getValue();
				$ncode5 = $worksheet->getCellByColumnAndRow(216, $row)->getValue();
				$npres5 = $worksheet->getCellByColumnAndRow(217, $row)->getValue();
				$ncode6 = $worksheet->getCellByColumnAndRow(218, $row)->getValue();
				$npres6 = $worksheet->getCellByColumnAndRow(219, $row)->getValue();
				$ncode7 = $worksheet->getCellByColumnAndRow(220, $row)->getValue();
				$npres7 = $worksheet->getCellByColumnAndRow(221, $row)->getValue();
				$numco1 = $worksheet->getCellByColumnAndRow(222, $row)->getValue();
				$nomco1 = $worksheet->getCellByColumnAndRow(223, $row)->getValue();
				$linco1 = $worksheet->getCellByColumnAndRow(224, $row)->getValue();
				$feeco1 = $worksheet->getCellByColumnAndRow(225, $row)->getValue();
				$fevco1 = $worksheet->getCellByColumnAndRow(226, $row)->getValue();
				$vapco1 = $worksheet->getCellByColumnAndRow(227, $row)->getValue();
				$vacco1 = $worksheet->getCellByColumnAndRow(228, $row)->getValue();
				$satco1 = $worksheet->getCellByColumnAndRow(229, $row)->getValue();
				$numco2 = $worksheet->getCellByColumnAndRow(230, $row)->getValue();
				$nomco2 = $worksheet->getCellByColumnAndRow(231, $row)->getValue();
				$linco2 = $worksheet->getCellByColumnAndRow(232, $row)->getValue();
				$feeco2 = $worksheet->getCellByColumnAndRow(233, $row)->getValue();
				$fevco2 = $worksheet->getCellByColumnAndRow(234, $row)->getValue();
				$vapco2 = $worksheet->getCellByColumnAndRow(235, $row)->getValue();
				$vacco2 = $worksheet->getCellByColumnAndRow(236, $row)->getValue();
				$satco2 = $worksheet->getCellByColumnAndRow(237, $row)->getValue();
				$numco3 = $worksheet->getCellByColumnAndRow(238, $row)->getValue();
				$nomco3 = $worksheet->getCellByColumnAndRow(239, $row)->getValue();
				$linco3 = $worksheet->getCellByColumnAndRow(240, $row)->getValue();
				$feeco3 = $worksheet->getCellByColumnAndRow(241, $row)->getValue();
				$fevco3 = $worksheet->getCellByColumnAndRow(242, $row)->getValue();
				$vapco3 = $worksheet->getCellByColumnAndRow(243, $row)->getValue();
				$vacco3 = $worksheet->getCellByColumnAndRow(244, $row)->getValue();
				$satco3 = $worksheet->getCellByColumnAndRow(245, $row)->getValue();
				$numco4 = $worksheet->getCellByColumnAndRow(246, $row)->getValue();
				$nomco4 = $worksheet->getCellByColumnAndRow(247, $row)->getValue();
				$linco4 = $worksheet->getCellByColumnAndRow(248, $row)->getValue();
				$feeco4 = $worksheet->getCellByColumnAndRow(249, $row)->getValue();
				$fevco4 = $worksheet->getCellByColumnAndRow(250, $row)->getValue();
				$vapco4 = $worksheet->getCellByColumnAndRow(251, $row)->getValue();
				$vacco4 = $worksheet->getCellByColumnAndRow(252, $row)->getValue();
				$satco4 = $worksheet->getCellByColumnAndRow(253, $row)->getValue();
				$ultnom = $worksheet->getCellByColumnAndRow(254, $row)->getValue();

				$data[] = array(
					"nombre" => $nombre,
					"area" => $area,
					"cencos" => $cencos,
					"fechag" => $set_fechag,
					"cedula" => $cedula,
					"fechai" => $set_fechai,
					"cuotaf" => $cuotaf,
					"ahorro" => $ahorro,
					"ahorrv" => $ahorrv,
					"aporte" => $aporte,
					"saldof" => $saldof,
					"numero" => $numero,
					"tipopr" => $tipopr,
					"fechae" => $set_fechae,
					"fechav" => $set_fechav,
					"valorp" => $valorp,
					"cuotap" => $cuotap,
					"valorc" => $valorc,
					"saldom" => $saldom,
					"saldoc" => $saldoc,
					"saldoi" => $saldoi,
					"saldot" => $saldot,
					"detar1" => $detar1,
					"numer1" => $numer1,
					"fechr1" => $set_fechr1,
					"fechv1" => $set_fechv1,
					"ahorr1" => $ahorr1,
					"aporr1" => $aporr1,
					"detar2" => $detar2,
					"numer2" => $numer2,
					"fechr2" => $set_fechr2,
					"fechv2" => $set_fechv2,
					"ahorr2" => $ahorr2,
					"aporr2" => $aporr2,
					"detar3" => $detar3,
					"numer3" => $numer3,
					"fechr3" => $set_fechr3,
					"fechv3" => $set_fechv3,
					"ahorr3" => $ahorr3,
					"aporr3" => $aporr3,
					"detar4" => $detar4,
					"numer4" => $numer4,
					"fechr4" => $set_fechr4,
					"fechv4" => $set_fechv4,
					"ahorr4" => $ahorr4,
					"aporr4" => $aporr4,
					"detar5" => $detar5,
					"numer5" => $numer5,
					"fechr5" => $set_fechr5,
					"fechv5" => $set_fechv5,
					"ahorr5" => $ahorr5,
					"aporr5" => $aporr5,
					"detar6" => $detar6,
					"numer6" => $numer6,
					"fechr6" => $set_fechr6,
					"fechv6" => $set_fechv6,
					"ahorr6" => $ahorr6,
					"aporr6" => $aporr6,
					"detar7" => $detar7,
					"numer7" => $numer7,
					"fechr7" => $set_fechr7,
					"fechv7" => $set_fechv7,
					"ahorr7" => $ahorr7,
					"aporr7" => $aporr7,
					"detar8" => $detar8,
					"numer8" => $numer8,
					"fechr8" => $set_fechr8,
					"fechv8" => $set_fechv8,
					"ahorr8" => $ahorr8,
					"aporr8" => $aporr8,
					"detar9" => $detar9,
					"numer9" => $numer9,
					"fechr9" => $set_fechr9,
					"fechv9" => $set_fechv9,
					"ahorr9" => $ahorr9,
					"aporr9" => $aporr9,
					"detar10" => $detar10,
					"numer10" => $numer10,
					"fechr10" => $set_fechr10,
					"fechv10" => $set_fechv10,
					"ahorr10" => $ahorr10,
					"aporr10" => $aporr10,
					"mensa1" => $mensa1,
					"mensa2" => $mensa2,
					"mensa3" => $mensa3,
					"ahorrt" => $ahorrt,
					"aporrt" => $aporrt,
					"codnom" => $codnom,
					"feche1" => $feche1,
					"valoe1" => $valoe1,
					"prest1" => $prest1,
					"tipop1" => $tipop1,
					"feche2" => $feche2,
					"valoe2" => $valoe2,
					"prest2" => $prest2,
					"tipop2" => $tipop2,
					"feche3" => $feche3,
					"valoe3" => $valoe3,
					"prest3" => $prest3,
					"tipop3" => $tipop3,
					"feche4" => $feche4,
					"valoe4" => $valoe4,
					"prest4" => $prest4,
					"tipop4" => $tipop4,
					"feche5" => $feche5,
					"valoe5" => $valoe5,
					"prest5" => $prest5,
					"tipop5" => $tipop5,
					"feche6" => $feche6,
					"valoe6" => $valoe6,
					"prest6" => $prest6,
					"tipop6" => $tipop6,
					"feche7" => $feche7,
					"valoe7" => $valoe7,
					"prest7" => $prest7,
					"tipop7" => $tipop7,
					"feche8" => $feche8,
					"valoe8" => $valoe8,
					"prest8" => $prest8,
					"tipop8" => $tipop8,
					"feche9" => $feche9,
					"valoe9" => $valoe9,
					"prest9" => $prest9,
					"tipop9" => $tipop9,
					"feche10" => $feche10,
					"valoe10" => $valoe10,
					"prest10" => $prest10,
					"tipop10" => $tipop10,
					"feche11" => $feche11,
					"valoe11" => $valoe11,
					"prest11" => $prest11,
					"tipop11" => $tipop11,
					"feche12" => $feche12,
					"valoe12" => $valoe12,
					"prest12" => $prest12,
					"tipop12" => $tipop12,
					"feche13" => $feche13,
					"valoe13" => $valoe13,
					"prest13" => $prest13,
					"tipop13" => $tipop13,
					"feche14" => $feche14,
					"valoe14" => $valoe14,
					"prest14" => $prest14,
					"tipop14" => $tipop14,
					"feche15" => $feche15,
					"valoe15" => $valoe15,
					"prest15" => $prest15,
					"tipop15" => $tipop15,
					"feche16" => $feche16,
					"valoe16" => $valoe16,
					"prest16" => $prest16,
					"tipop16" => $tipop16,
					"abonoi" => $abonoi,
					"fecing" => $set_fecing,
					"coment" => $coment,
					"morapo" => $morapo,
					"ahocu1" => $ahocu1,
					"ahocu2" => $ahocu2,
					"ahocu3" => $ahocu3,
					"ahocu4" => $ahocu4,
					"ahocu5" => $ahocu5,
					"ahocu6" => $ahocu6,
					"ahofp1" => $ahofp1,
					"ahofp2" => $ahofp2,
					"ahofp3" => $ahofp3,
					"ahofp4" => $ahofp4,
					"ahofp5" => $ahofp5,
					"ahofp6" => $ahofp6,
					"ahofp7" => $ahofp7,
					"nlocal" => $nlocal,
					"mesant" => $mesant,
					"codnom1" => $codnom1,
					"codpre1" => $codpre1,
					"codnom2" => $codnom2,
					"codpre2" => $codpre2,
					"codnom3" => $codnom3,
					"codpre3" => $codpre3,
					"codnom4" => $codnom4,
					"codpre4" => $codpre4,
					"codnom5" => $codnom5,
					"codpre5" => $codpre5,
					"codpre6" => $codpre6,
					"codnom7" => $codnom7,
					"codpre7" => $codpre7,
					"codnom8" => $codnom8,
					"codpre8" => $codpre8,
					"auxsol" => $auxsol,
					"detse1" => $detse1,
					"feese1" => $feese1,
					"fevse1" => $fevse1,
					"valse1" => $valse1,
					"detse2" => $detse2,
					"feese2" => $feese2,
					"fevse2" => $fevse2,
					"valse2" => $valse2,
					"detse3" => $detse3,
					"feese3" => $feese3,
					"fevse3" => $fevse3,
					"valse3" => $valse3,
					"detse4" => $detse4,
					"feese4" => $feese4,
					"fevse4" => $fevse4,
					"valse4" => $valse4,
					"detse5" => $detse5,
					"feese5" => $feese5,
					"fevse5" => $fevse5,
					"valse5" => $valse5,
					"ncode1" => $ncode1,
					"npres1" => $npres1,
					"ncode2" => $ncode2,
					"npres2" => $npres2,
					"ncode3" => $ncode3,
					"npres3" => $npres3,
					"ncode4" => $ncode4,
					"npres4" => $npres4,
					"ncode5" => $ncode5,
					"npres5" => $npres5,
					"ncode6" => $ncode6,
					"npres6" => $npres6,
					"ncode7" => $ncode7,
					"npres7" => $npres7,
					"numco1" => $numco1,
					"nomco1" => $nomco1,
					"linco1" => $linco1,
					"feeco1" => $feeco1,
					"fevco1" => $fevco1,
					"vapco1" => $vapco1,
					"vacco1" => $vacco1,
					"satco1" => $satco1,
					"numco2" => $numco2,
					"nomco2" => $nomco2,
					"linco2" => $linco2,
					"feeco2" => $feeco2,
					"fevco2" => $fevco2,
					"vapco2" => $vapco2,
					"vacco2" => $vacco2,
					"satco2" => $satco2,
					"numco3" => $numco3,
					"nomco3" => $nomco3,
					"linco3" => $linco3,
					"feeco3" => $feeco3,
					"fevco3" => $fevco3,
					"vapco3" => $vapco3,
					"vacco3" => $vacco3,
					"satco3" => $satco3,
					"numco4" => $numco4,
					"nomco4" => $nomco4,
					"linco4" => $linco4,
					"feeco4" => $feeco4,
					"fevco4" => $fevco4,
					"vapco4" => $vapco4,
					"vacco4" => $vacco4,
					"satco4" => $satco4,
					"ultnom" => $ultnom,
				);
			}
		}

		$this->Aportes_model->insertAportes($data);

		$this->session->set_flashdata("success", "Los datos fueron cargados exitosamente");
		redirect(base_url()."backend/aportes");

	}

	public function view(){
		$this->load->library('pdfgenerator');

        $html = $this->load->view('admin/aportes/formato',"", true);
        $filename = 'Estado de cuenta';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	
	}

}