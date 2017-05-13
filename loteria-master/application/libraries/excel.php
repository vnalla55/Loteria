
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
//$CI->load->helper('url');
 include './resource/PHPExcel.php';
    class excel{

        function create_excel($results){
                // Create new PHPExcel object
             //$CI->load->library('PHPExcel');
            //print_r($results);
            echo base_url();
                $objPHPExcel = new PHPExcel();

                // Set document properties
                $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                             ->setLastModifiedBy("Maarten Balliauw")
                                             ->setTitle("Office 2007 XLSX Test Document")
                                             ->setSubject("Office 2007 XLSX Test Document")
                                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                             ->setKeywords("office 2007 openxml php")
                                             ->setCategory("Test result file");

                //'id,name,contact_name,email,email2,mobile,mobile2,website,country,city,address,postal_code,info'
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A1', 'ID')
                            ->setCellValue('B1', 'Bet No')
                            ->setCellValue('C1', 'Loto Group')
                            ->setCellValue('D1', 'Lottery Game')
                            ->setCellValue('E1', 'User Email')
                            ->setCellValue('F1', 'Game Type')
                        ->setCellValue('G1', 'Bet Amount')
                        ->setCellValue('H1', 'Bet Date')
                         ->setCellValue('I1', 'Drawing Date')
                        ->setCellValue('J1', 'Announcement Status')
                         ->setCellValue('K1', 'Approved Status')
                         ->setCellValue('L1', 'Ticket no')
                        ;
                $i = 2;
               foreach($results->result() as $row){
                   $partner_approved_status='';
                    if($row->pending_status==1)
                   {
                       $partner_approved_status='Pending';
                   }
                   else {
                        if($row->partner_approved_status==0)
                   {
                       $partner_approved_status='Disapproved';
                   }
                   else {
                       $partner_approved_status='Approved';
                   }
                   }
                  
                  $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$i, $row->bet_id_forpartner)
                            ->setCellValue('B'.$i, $row->betno_slot1.' '.$row->betno_slot2.' '.$row->betno_slot3.' '.$row->betno_slot4.' '.$row->betno_slot5)
                            ->setCellValue('C'.$i, $row->lotto_group_name)
                            ->setCellValue('D'.$i, $row->game_name.' '.$row->ampmtype)
                            ->setCellValue('E'.$i, $row->email)
                            ->setCellValue('F'.$i, $row->gametype_name)
                         ->setCellValue('G'.$i, $row->bet_amount)
                           ->setCellValue('H'.$i, $row->bet_date)
                            ->setCellValue('I'.$i, $row->drawing_date)
                       ->setCellValue('J'.$i, $row->announcement_status)
                         ->setCellValue('K'.$i,$partner_approved_status )
                           ->setCellValue('L'.$i,$row->ticket_no)
                        ;
                  $i++;
                }

                // Miscellaneous glyphs, UTF-8
        //      $objPHPExcel->setActiveSheetIndex(0)
        //                  ->setCellValue('A4', 'Miscellaneous glyphs')
        //                  ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Bet History');


                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $objPHPExcel->setActiveSheetIndex(0);


                // Redirect output to a client’s web browser (Excel5)
                //header('Content-Type: application/vnd.ms-excel');
               //header('Content-Disposition: attachment;filename="bethistory.xls"');
              //header('Content-Disposition: attachment; filename="bethistory.xlsx"');
              //header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                //header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header ('Pragma: public'); // HTTP/1.0

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                ob_end_clean();
               $objWriter->save('./tempexcel/bethistory.xls');
    }
    
                }