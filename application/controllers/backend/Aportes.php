<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("./vendor/box/spout/src/Spout/Autoloader/autoload.php");

use Box\Spout\Reader\Common\Creator\ReaderFactory;
use Box\Spout\Common\Type;
class Aportes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if (!$this->session->userdata("login")) {
		// 	redirect(base_url());
		// }

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

		public function getAportes()
	{

		$columns = array( 
                            0 =>'cedula', 
                            1=> 'nombre',
                            2=> 'numero',
                            3=> 'saldof',
                            4=> 'saldot',
                            5=> 'fechae',
                            6 => 'estado'

                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->Aportes_model->allaportes_count();
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $aportes = $this->Aportes_model->allaportes($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $aportes =  $this->Aportes_model->aportes_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Aportes_model->aportes_search_count($search);
        }

        $data = array();
        if(!empty($aportes))
        {
            foreach ($aportes as $aporte)
            {

                $nestedData['cedula'] = $aporte->cedula;
                $nestedData['nombre'] = $aporte->nombre;
                $nestedData['numero'] = $aporte->numero;
                $nestedData['saldof'] = $aporte->saldof;
                $nestedData['saldot'] = $aporte->saldot;
                $nestedData['fechae'] = $aporte->fechae;
             
                $nestedData['id'] = $aporte->id;
                
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
	}

	public function view($id){
		$this->load->library('pdfgenerator');
		$aporte = $this->Aportes_model->getAporte($id);
		$data['aporte'] = $aporte;
		$data['aportes'] = $this->Aportes_model->getAportesByCedula($aporte->cedula);
        $html = $this->load->view('admin/aportes/formato',$data, true);
        $filename = 'Estado de cuenta';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	
	}

	public function importar_spout(){
		if (!empty($_FILES['file']['name'])) {
		     #Get File extension eg. 'xlsx' to check file is excel sheet
		    $pathinfo = pathinfo($_FILES["file"]["name"]);
		    #check file has extension xlsx, xls and also check
		    #file is not empty
		   	if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
		           && $_FILES['file']['size'] > 0 ) {
		        #Temporary file name
		        $inputFileName = $_FILES['file']['tmp_name'];
		        #Read excel file by using ReadFactory object.
		        $reader = ReaderFactory::createFromType(Type::XLSX);
		        //$reader=ReaderFactory::create(Type::XLS);
		        //$reader=ReaderFactory::create(Type::CSV);
		        #Open file
		        $reader->open($inputFileName);
		        $count = 1;
		        $rows = array();
		        #Number of sheet in excel file
		        foreach ($reader->getSheetIterator() as $sheet) {
		            #Number of Rows in Excel sheet
		            foreach ($sheet->getRowIterator() as $row) {
		                #reads data after header.
		                if ($count > 1) {
		                	$cells = $row->getCells();
		                	//print_r($row);
		                    #Data of excel sheet and its row number.
		                    $data['nombre'] = $cells[0]->getValue();
							$data['area'] = $cells[1]->getValue();
							$data['cencos'] = $cells[2]->getValue();
							$fechag = NULL;
							if ($cells[3]->getValue()) {
								$fechag = str_replace("-", ".", $cells[3]->getValue());
							}
							$data['fechag'] = $fechag;
							$data['cedula'] = $cells[4]->getValue();
							$fechai = NULL;
							if ($cells[5]->getValue()) {
								$fechai = str_replace("-", ".", $cells[5]->getValue());
							}

							$data['fechai'] = $fechai;
							$data['cuotaf'] = $cells[6]->getValue();
							$data['ahorro'] = $cells[7]->getValue();
							$data['ahorrv'] = $cells[8]->getValue();
							$data['aporte'] = $cells[9]->getValue();
							$data['saldof'] = $cells[10]->getValue();
							$data['numero'] = $cells[11]->getValue();
							$data['tipopr'] = $cells[12]->getValue();
							$fechae = NULL;
							if ($cells[13]->getValue()) {
								$fechae = str_replace("-", ".", $cells[13]->getValue());
							}
							$data['fechae'] = $fechae;
							$fechav = NULL;
							if ($cells[14]->getValue()) {
								$fechav = str_replace("-", ".", $cells[14]->getValue());
							}
							$data['fechav'] = $fechav;
							$data['valorp'] = $cells[15]->getValue();
							$data['cuotap'] = $cells[16]->getValue();
							$data['valorc'] = $cells[17]->getValue();
							$data['saldom'] = $cells[18]->getValue();
							$data['saldoc'] = $cells[19]->getValue();
							$data['saldoi'] = $cells[20]->getValue();
							$data['saldot'] = $cells[21]->getValue();
							$data['detar1'] = $cells[22]->getValue();
							$data['numer1'] = $cells[23]->getValue();
							$fechr1 = NULL;
							if ($cells[24]->getValue()) {
								$fechr1 = str_replace("-", ".", $cells[24]->getValue());
							}
							$data['fechr1'] = $fechr1;
							$fechv1 = NULL;
							if ($cells[25]->getValue()) {
								$fechv1 = str_replace("-", ".", $cells[25]->getValue());
							}
							$data['fechv1'] = $fechv1;
							$data['ahorr1'] = $cells[26]->getValue();
							$data['aporr1'] = $cells[27]->getValue();
							$data['detar2'] = $cells[28]->getValue();
							$data['numer2'] = $cells[29]->getValue();
							$fechr2 = NULL;
							if ($cells[30]->getValue()) {
								$fechr2 = str_replace("-", ".", $cells[30]->getValue());
							}
							$data['fechr2'] = $fechr2;
							$fechv2 = NULL;
							if ($cells[31]->getValue()) {
								$fechv2 = str_replace("-", ".", $cells[31]->getValue());
							}
							$data['fechv2'] = $fechv2;
							$data['ahorr2'] = $cells[32]->getValue();
							$data['aporr2'] = $cells[33]->getValue();
							$data['detar3'] = $cells[34]->getValue();
							$data['numer3'] = $cells[35]->getValue();
							$fechr3 = NULL;
							if ($cells[36]->getValue()) {
								$fechr3 = str_replace("-", ".", $cells[36]->getValue());
							}
							$data['fechr3'] = $fechr3;
							$fechv3 = NULL;
							if ($cells[37]->getValue()) {
								$fechv3 = str_replace("-", ".", $cells[37]->getValue());
							}
							$data['fechv3'] = $fechv3;
							$data['ahorr3'] = $cells[38]->getValue();
							$data['aporr3'] = $cells[39]->getValue();
							$data['detar4'] = $cells[40]->getValue();
							$data['numer4'] = $cells[41]->getValue();
							$fechr4 = NULL;
							if ($cells[42]->getValue()) {
								$fechr4 = str_replace("-", ".", $cells[42]->getValue());
							}
							$data['fechr4'] = $fechr4;
							$fechv4 = NULL;
							if ($cells[43]->getValue()) {
								$fechv4 = str_replace("-", ".", $cells[43]->getValue());
							}
							$data['fechv4'] = $fechv4;
							$data['ahorr4'] = $cells[44]->getValue();
							$data['aporr4'] = $cells[45]->getValue();
							$data['detar5'] = $cells[46]->getValue();
							$data['numer5'] = $cells[47]->getValue();
							$fechr5 = NULL;
							if ($cells[48]->getValue()) {
								$fechr5 = str_replace("-", ".", $cells[48]->getValue());
							}
							$data['fechr5'] = $fechr5;
							$fechv5 = NULL;
							if ($cells[49]->getValue()) {
								$fechv5 = str_replace("-", ".", $cells[49]->getValue());
							}
							$data['fechv5'] = $fechv5;
							$data['ahorr5'] = $cells[50]->getValue();
							$data['aporr5'] = $cells[51]->getValue();
							$data['detar6'] = $cells[52]->getValue();
							$data['numer6'] = $cells[53]->getValue();
							$fechr6 = NULL;
							if ($cells[54]->getValue()) {
								$fechr6 = str_replace("-", ".", $cells[54]->getValue());
							}
							$data['fechr6'] = $fechr6;
							$fechv6 = NULL;
							if ($cells[55]->getValue()) {
								$fechv6 = str_replace("-", ".", $cells[55]->getValue());
							}
							$data['fechv6'] = $fechv6;
							$data['ahorr6'] = $cells[56]->getValue();
							$data['aporr6'] = $cells[57]->getValue();
							$data['detar7'] = $cells[58]->getValue();
							$data['numer7'] = $cells[59]->getValue();
							$fechr7 = NULL;
							if ($cells[60]->getValue()) {
								$fechr7 = str_replace("-", ".", $cells[60]->getValue());
							}
							$data['fechr7'] = $fechr7;
							$fechv7 = NULL;
							if ($cells[61]->getValue()) {
								$fechv7 = str_replace("-", ".", $cells[61]->getValue());
							}
							$data['fechv7'] = $fechv7;
							$data['ahorr7'] = $cells[62]->getValue();
							$data['aporr7'] = $cells[63]->getValue();
							$data['detar8'] = $cells[64]->getValue();
							$data['numer8'] = $cells[65]->getValue();
							$fechr8 = NULL;
							if ($cells[66]->getValue()) {
								$fechr8 = str_replace("-", ".", $cells[66]->getValue());
							}
							$data['fechr8'] = $fechr8;
							$fechv8 = NULL;
							if ($cells[67]->getValue()) {
								$fechv8 = str_replace("-", ".", $cells[67]->getValue());
							}
							$data['fechv8'] = $fechv8;
							$data['ahorr8'] = $cells[68]->getValue();
							$data['aporr8'] = $cells[69]->getValue();
							$data['detar9'] = $cells[70]->getValue();
							$data['numer9'] = $cells[71]->getValue();
							$fechr9 = NULL;
							if ($cells[72]->getValue()) {
								$fechr9 = str_replace("-", ".", $cells[72]->getValue());
							}
							$data['fechr9'] = $fechr9;
							$fechv9 = NULL;
							if ($cells[73]->getValue()) {
								$fechv9 = str_replace("-", ".", $cells[73]->getValue());
							}
							$data['fechv9'] = $fechv9;
							$data['ahorr9'] = $cells[74]->getValue();
							$data['aporr9'] = $cells[75]->getValue();
							$data['detar10'] = $cells[76]->getValue();
							$data['numer10'] = $cells[77]->getValue();
							$fechr10 = NULL;
							if ($cells[78]->getValue()) {
								$fechr10 = str_replace("-", ".", $cells[78]->getValue());
							}
							$data['fechr10'] = $fechr10;
							$fechv10 = NULL;
							if ($cells[79]->getValue()) {
								$fechv10 = str_replace("-", ".", $cells[79]->getValue());
							}
							$data['fechv10'] = $fechv10;
							$data['ahorr10'] = $cells[80]->getValue();
							$data['aporr10'] = $cells[81]->getValue();
							$data['mensa1'] = $cells[82]->getValue();
							$data['mensa2'] = $cells[83]->getValue();
							$data['mensa3'] = $cells[84]->getValue();
							$data['ahorrt'] = $cells[85]->getValue();
							$data['aporrt'] = $cells[86]->getValue();
							$data['codnom'] = $cells[87]->getValue();
							$feche1 = NULL;
							if ($cells[88]->getValue()) {
								$feche1 = str_replace("-", ".", $cells[88]->getValue());
							}
							$data['feche1'] = $feche1;
							$data['valoe1'] = $cells[89]->getValue();
							$data['prest1'] = $cells[90]->getValue();
							$data['tipop1'] = $cells[91]->getValue();
							$feche2 = NULL;
							if ($cells[92]->getValue()) {
								$feche2 = str_replace("-", ".", $cells[92]->getValue());
							}
							$data['feche2'] = $feche2;
							$data['valoe2'] = $cells[93]->getValue();
							$data['prest2'] = $cells[94]->getValue();
							$data['tipop2'] = $cells[95]->getValue();
							$feche3 = NULL;
							if ($cells[96]->getValue()) {
								$feche3 = str_replace("-", ".", $cells[96]->getValue());
							}
							$data['feche3'] = $feche3;
							$data['valoe3'] = $cells[97]->getValue();
							$data['prest3'] = $cells[98]->getValue();
							$data['tipop3'] = $cells[99]->getValue();
							$feche4 = NULL;
							if ($cells[100]->getValue()) {
								$feche4 = str_replace("-", ".", $cells[100]->getValue());
							}
							$data['feche4'] = $feche4;
							$data['valoe4'] = $cells[101]->getValue();
							$data['prest4'] = $cells[102]->getValue();
							$data['tipop4'] = $cells[103]->getValue();
							$feche5 = NULL;
							if ($cells[104]->getValue()) {
								$feche5 = str_replace("-", ".", $cells[104]->getValue());
							}
							$data['feche5'] = $feche5;
							$data['valoe5'] = $cells[105]->getValue();
							$data['prest5'] = $cells[106]->getValue();
							$data['tipop5'] = $cells[107]->getValue();
							$feche6 = NULL;
							if ($cells[108]->getValue()) {
								$feche6 = str_replace("-", ".", $cells[108]->getValue());
							}
							$data['feche6'] = $feche6;
							$data['valoe6'] = $cells[109]->getValue();
							$data['prest6'] = $cells[110]->getValue();
							$data['tipop6'] = $cells[111]->getValue();
							$feche7 = NULL;
							if ($cells[112]->getValue()) {
								$feche7 = str_replace("-", ".", $cells[112]->getValue());
							}
							$data['feche7'] = $feche7;
							$data['valoe7'] = $cells[113]->getValue();
							$data['prest7'] = $cells[114]->getValue();
							$data['tipop7'] = $cells[115]->getValue();
							$feche8 = NULL;
							if ($cells[116]->getValue()) {
								$feche8 = str_replace("-", ".", $cells[116]->getValue());
							}
							$data['feche8'] = $feche8;
							$data['valoe8'] = $cells[117]->getValue();
							$data['prest8'] = $cells[118]->getValue();
							$data['tipop8'] = $cells[119]->getValue();
							$feche9 = NULL;
							if ($cells[120]->getValue()) {
								$feche9 = str_replace("-", ".", $cells[120]->getValue());
							}
							$data['feche9'] = $feche9;
							$data['valoe9'] = $cells[121]->getValue();
							$data['prest9'] = $cells[122]->getValue();
							$data['tipop9'] = $cells[123]->getValue();
							$feche10 = NULL;
							if ($cells[124]->getValue()) {
								$feche10 = str_replace("-", ".", $cells[124]->getValue());
							}
							$data['feche10'] = $feche10;
							$data['valoe10'] = $cells[125]->getValue();
							$data['prest10'] = $cells[126]->getValue();
							$data['tipop10'] = $cells[127]->getValue();
							$feche11 = NULL;
							if ($cells[128]->getValue()) {
								$feche11 = str_replace("-", ".", $cells[128]->getValue());
							}
							$data['feche11'] = $feche11;
							$data['valoe11'] = $cells[129]->getValue();
							$data['prest11'] = $cells[130]->getValue();
							$data['tipop11'] = $cells[131]->getValue();
							$feche12 = NULL;
							if ($cells[132]->getValue()) {
								$feche12 = str_replace("-", ".", $cells[132]->getValue());
							}
							$data['feche12'] = $feche12;
							$data['valoe12'] = $cells[133]->getValue();
							$data['prest12'] = $cells[134]->getValue();
							$data['tipop12'] = $cells[135]->getValue();
							$feche13 = NULL;
							if ($cells[136]->getValue()) {
								$feche13 = str_replace("-", ".", $cells[136]->getValue());
							}
							$data['feche13'] = $feche13;
							$data['valoe13'] = $cells[137]->getValue();
							$data['prest13'] = $cells[138]->getValue();
							$data['tipop13'] = $cells[139]->getValue();
							$feche14 = NULL;
							if ($cells[140]->getValue()) {
								$feche14 = str_replace("-", ".", $cells[140]->getValue());
							}
							$data['feche14'] = $feche14;
							$data['valoe14'] = $cells[141]->getValue();
							$data['prest14'] = $cells[142]->getValue();
							$data['tipop14'] = $cells[143]->getValue();
							$feche15 = NULL;
							if ($cells[144]->getValue()) {
								$feche15 = str_replace("-", ".", $cells[144]->getValue());
							}
							$data['feche15'] = $feche15;
							$data['valoe15'] = $cells[145]->getValue();
							$data['prest15'] = $cells[146]->getValue();
							$data['tipop15'] = $cells[147]->getValue();
							$feche16 = NULL;
							if ($cells[148]->getValue()) {
								$feche16 = str_replace("-", ".", $cells[148]->getValue());
							}
							$data['feche16'] = $feche16;
							$data['valoe16'] = $cells[149]->getValue();
							$data['prest16'] = $cells[150]->getValue();
							$data['tipop16'] = $cells[151]->getValue();
							$data['abonoi'] = $cells[152]->getValue();
							$fecing = NULL;
							if ($cells[153]->getValue()) {
								$fecing = str_replace("-", ".", $cells[153]->getValue());
							}
							$data['fecing'] = $fecing;
							$data['coment'] = $cells[154]->getValue();
							$data['morapo'] = $cells[155]->getValue();
							$data['ahocu1'] = $cells[156]->getValue();
							$data['ahocu2'] = $cells[157]->getValue();
							$data['ahocu3'] = $cells[158]->getValue();
							$data['ahocu4'] = $cells[159]->getValue();
							$data['ahocu5'] = $cells[160]->getValue();
							$data['ahocu6'] = $cells[161]->getValue();
							$data['ahofp1'] = $cells[162]->getValue();
							$data['ahofp2'] = $cells[163]->getValue();
							$data['ahofp3'] = $cells[164]->getValue();
							$data['ahofp4'] = $cells[165]->getValue();
							$data['ahofp5'] = $cells[166]->getValue();
							$data['ahofp6'] = $cells[167]->getValue();
							$data['ahocu7'] = $cells[168]->getValue();
							$data['ahofp7'] = $cells[169]->getValue();
							$data['nlocal'] = $cells[170]->getValue();
							$data['mesant'] = $cells[171]->getValue();
		                    
		                    #Push all data into array to be insert as
		                    #batch into database.
		                    $rows [] = $data;
		                    /*$json_data = json_encode($rows);
		                    file_put_contents('assets/json__files/truck_fueling.json',$json_data);*/
		                }
		                $count++;
		            }
		            #Print All data
		         //echo "successfully uploaded!";
		            #insert all data into database table.
		        }
		        
		        #Close excel file
		        $reader->close();
		        //echo json_encode($rows);

		        $this->Aportes_model->insertAportes($rows);
		        $this->session->set_flashdata("success", "Los datos fueron cargados exitosamente");
				redirect(base_url()."backend/aportes");
		    } else {
		        echo "PLEASE SELECT A VALID EXCEL FILE";
		    }
		} else {
		    echo "UPLOAD AN EXCEL FILE";
		}
	}

}