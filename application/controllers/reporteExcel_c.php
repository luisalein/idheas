<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReporteExcel_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			//load our new PHPExcel library
			$this->load->library('excel');
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	
	function index() 
	{	
		$this->generaExcel();	
	}
	
	function generaExcel(){
		//activate worksheet number 1
		/*$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 */
		 
		$this->excel->setActiveSheetIndex(0);
		
		$this->excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->setTitle('Reporte corto');
						
		$this->excel->getActiveSheet()->setCellValue('A1', 'Nombre del caso');
						
		$this->excel->getActiveSheet()->setCellValue('B1', 'Actos');
						
		$this->excel->getActiveSheet()->setCellValue('C1', 'Tipo de perpetrador');
						
		$this->excel->getActiveSheet()->setCellValue('D1', 'Número de Víctimas');
						
		$this->excel->getActiveSheet()->setCellValue('E1', 'Fecha de inicio');
						
		$this->excel->getActiveSheet()->setCellValue('F1', 'Fecha de término'); 
		 
		 
		$catActos = $this->catalogos_m->mTraerDatosCatalogoActos(); 
		$catPerpe = $this->catalogos_m->mTraerDatosCatalogoTipoPerpetrador();
		$catDA = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
		 
		/*$datos = array('actoViolatorioId'=>'1','actoViolatorioNivel'=>'1');
			
		$Data = $this->reportes_m->mReporteCortoActoDerechoAfectado($datos);
		
		$datos = array('nombre'=>'caso1');
			
		$Data = $this->reportes_m->mReporteCortoNombre($datos);
		
		$tipo = 1;*/
		
		$Data = array();
		$tipo = $_POST['tipoFiltro'];
		
		switch ($tipo){

                    case(1):
						$datos = array('nombre'=>$_POST['nombreCaso']);
                       	$Data = $this->reportes_m->mReporteCortoNombre($datos);

                    break;

                    case(2): 
						$datos = array('desdeFecha'=>$_POST['fechaInicial'],'hastaFecha'=>$_POST['fechaTermino']);
                        $Data = $this->reportes_m->mReporteCortoFechas($datos);

                    break;

                    case(3): 
						$datos =array('actoViolatorioId'=>$_POST['derechoId'],'actoViolatorioNivel'=>$_POST['nivelId']);
                        $Data = $this->reportes_m->mReporteCortoActoDerechoAfectado($datos);

                    break;
                
                    default : redirect(base_url().'index.php/reportes_c/generar_reporte');
                        
                    break;

                }
		
		if($tipo == 1){
			
			for($i=1 ; $i <= sizeof($Data['actos']); $i++){
			
				$n = $Data['actos'][$i]['actoViolatorioNivel'];
				
				if($n == 1){
					for($j=1; $j<= sizeof($catActos['actosN'.$n.'Catalogo']); $j++){
					
						if($catActos['actosN'.$n.'Catalogo'][$j]['actoId'] == $Data['actos'][$i]['actoViolatorioId']){
							$Data['actos'][$i]['actoViolatorioId'] = $catActos['actosN'.$n.'Catalogo'][$j]['descripcion'];
						}
						
					}
					
				}else{
					
					for($j=1; $j<= sizeof($catActos['actosN'.$n.'Catalogo']); $j++){
					
						if($catActos['actosN'.$n.'Catalogo'][$j]['actoN'.$n.'Id'] == $Data['actos'][$i]['actoViolatorioId']){
							$Data['actos'][$i]['actoViolatorioId'] = $catActos['actosN'.$n.'Catalogo'][$j]['descripcion'];
						}
						
					}
					
				}
				
				
			}
						
			for($i=1 ; $i <= sizeof($Data['derechoAfectado']); $i++){
				
				$n = $Data['derechoAfectado'][$i]['derechoAfectadoNivel'];
				
					for($j=1; $j<= sizeof($catDA['derechosAfectadosN'.$n.'Catalogos']); $j++){
					
						if($catDA['derechosAfectadosN'.$n.'Catalogos'][$j]['derechoAfectadoN'.$n.'Id'] == $Data['derechoAfectado'][$i]['derechoAfectadoId']){
							$Data['derechoAfectado'][$i]['derechoAfectadoId'] = $catDA['derechosAfectadosN'.$n.'Catalogos'][$j]['descripcion'];
						
					}
					
				}
				
				
			}
			
			$actoslist="";
			
			for($k=1; $k <= sizeof($Data['actos']); $k++){
				
				$actoslist = $actoslist."Derecho Afectado: ".$Data['derechoAfectado'][$k]['derechoAfectadoId']." Acto:".$Data['actos'][$k]['actoViolatorioId'].". "
				."(Fecha inicio: ".$Data['derechoAfectado'][$k]['fechaInicial']."Fecha término: ".$Data['derechoAfectado'][$k]['fechaTermino'].")";
				
			}
			
			
			for($i=1 ; $i <= sizeof($Data['perpetradores']); $i++){
				
				$n = $Data['perpetradores'][$i]['tipoPerpetradorNivel'];
				
					for($j=1; $j<= sizeof($catPerpe['tipoPerpetradorN'.$n.'Catalogo']); $j++){
					
						if($catPerpe['tipoPerpetradorN'.$n.'Catalogo'][$j]['tipoPerpetradorN'.$n.'Id'] == $Data['perpetradores'][$i]['tipoPerpetradorId']){
							$Data['perpetradores'][$i]['tipoPerpetradorId'] = $catPerpe['tipoPerpetradorN'.$n.'Catalogo'][$j]['descripcion'];
						
					}
					
				}
				
				
			}
			
			$perpetradoreslist="";
			
			for($k=1; $k <= sizeof($Data['perpetradores']); $k++){
				
				$perpetradoreslist = $perpetradoreslist.$Data['perpetradores'][$k]['tipoPerpetradorId'].". ";
				
			}
			
			$this->excel->getActiveSheet()->setCellValue('A2', $Data['caso']['nombre']);
			
			$this->excel->getActiveSheet()->setCellValue('B2', $actoslist);
			
			$this->excel->getActiveSheet()->setCellValue('C2', $perpetradoreslist);
			
			$this->excel->getActiveSheet()->setCellValue('D2', sizeof($Data['victimas']));
			
			$this->excel->getActiveSheet()->setCellValue('E2', $Data['caso']['fechaInicial']);
			
			$this->excel->getActiveSheet()->setCellValue('F2', $Data['caso']['fechaTermino']);
		}else{
			
			for($r=1; $r<=sizeof($Data['casos']);$r++){
			
							
				for($i=1 ; $i <= sizeof($Data['casos'][$r]['actos']); $i++){
					
					$n = $Data['casos'][$r]['actos'][$i]['actoViolatorioNivel'];
					
					if($n == 1){
						for($j=1; $j<= sizeof($catActos['actosN'.$n.'Catalogo']); $j++){
						
							if($catActos['actosN'.$n.'Catalogo'][$j]['actoId'] == $Data['casos'][$r]['actos'][$i]['actoViolatorioId']){
								$Data['casos'][$r]['actos'][$i]['actoViolatorioId'] = $catActos['actosN'.$n.'Catalogo'][$j]['descripcion'];
							}
							
						}
						
					}else{
						
						for($j=1; $j<= sizeof($catActos['actosN'.$n.'Catalogo']); $j++){
						
							if($catActos['actosN'.$n.'Catalogo'][$j]['actoN'.$n.'Id'] == $Data['casos'][$r]['actos'][$i]['actoViolatorioId']){
								$Data['casos'][$r]['actos'][$i]['actoViolatorioId'] = $catActos['actosN'.$n.'Catalogo'][$j]['descripcion'];
							}
							
						}
						
					}
					
					
				}
							
				for($i=1 ; $i <= sizeof($Data['casos'][$r]['derechoAfectado']); $i++){
				
					$n = $Data['casos'][$r]['derechoAfectado'][$i]['derechoAfectadoNivel'];
					
						for($j=1; $j<= sizeof($catDA['derechosAfectadosN'.$n.'Catalogos']); $j++){
						
							if($catDA['derechosAfectadosN'.$n.'Catalogos'][$j]['derechoAfectadoN'.$n.'Id'] == $Data['casos'][$r]['derechoAfectado'][$i]['derechoAfectadoId']){
								$Data['casos'][$r]['derechoAfectado'][$i]['derechoAfectadoId'] = $catDA['derechosAfectadosN'.$n.'Catalogos'][$j]['descripcion'];
							
						}
						
					}
					
					
				}
				
				$actoslist="";
				
				
				for($k=1; $k <= sizeof($Data['casos'][$r]['actos']); $k++){
					
					$actoslist = $actoslist."Derecho Afectado: ".$Data['casos'][$r]['derechoAfectado'][$k]['derechoAfectadoId']." Acto:".$Data['casos'][$r]['actos'][$k]['actoViolatorioId'].". "
					."(Fecha inicio: ".$Data['casos'][$r]['derechoAfectado'][$k]['fechaInicial']."Fecha término: ".$Data['casos'][$r]['derechoAfectado'][$k]['fechaTermino'].")";
					
				}
				for($i=1 ; $i <= sizeof($Data['casos'][$r]['perpetradores']); $i++){
					
					$n = $Data['casos'][$r]['perpetradores'][$i]['tipoPerpetradorNivel'];
					
						for($j=1; $j<= sizeof($catPerpe['tipoPerpetradorN'.$n.'Catalogo']); $j++){
						
							if($catPerpe['tipoPerpetradorN'.$n.'Catalogo'][$j]['tipoPerpetradorN'.$n.'Id'] == $Data['casos'][$r]['perpetradores'][$i]['tipoPerpetradorId']){
								$Data['casos'][$r]['perpetradores'][$i]['tipoPerpetradorId'] = $catPerpe['tipoPerpetradorN'.$n.'Catalogo'][$j]['descripcion'];
							
						}
						
					}
					
					
				}
				
				$perpetradoreslist="";
				
				for($k=1; $k <= sizeof($Data['casos'][$r]['perpetradores']); $k++){
					
					$perpetradoreslist = $perpetradoreslist.$Data['casos'][$r]['perpetradores'][$k]['tipoPerpetradorId'].". ";
					
				}
				$r = $r +1;
				
				$this->excel->getActiveSheet()->setCellValue('A'.$r, $Data['casos'][$r-1]['caso']['nombre']);
				
				$this->excel->getActiveSheet()->setCellValue('B'.$r, $actoslist);
				
				$this->excel->getActiveSheet()->setCellValue('C'.$r, $perpetradoreslist);
				
				$this->excel->getActiveSheet()->setCellValue('D'.$r, sizeof($Data['casos'][$r-1]['victimas']));
				
				$this->excel->getActiveSheet()->setCellValue('E'.$r, $Data['casos'][$r-1]['caso']['fechaInicial']);
				
				$this->excel->getActiveSheet()->setCellValue('F'.$r, $Data['casos'][$r-1]['caso']['fechaTermino']);
				
					
				
			}
			
			
		}
		
		
		$filename='reporte_corto.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
					             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	
	}

}

?>