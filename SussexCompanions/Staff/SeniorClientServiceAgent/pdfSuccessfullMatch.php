<?php
class CreatePDF{
   function ClientPDF($header, $headerWidth, $data){
	   define('K_PATH_IMAGES','PDF/');
	   $pdf=new TCPDF('L','mm','A4',true);
	   $pdf->SetHeaderData('','20',"Successfully Matched");
	   $pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
	   $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_BOTTOM);
	   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	   $pdf->AddPage();
	   $pdf->Ln();
	   $table='<table cellpadding="5" cellspacing="5" border="0">';
	   $table .='<tr bgcolor="#D8F2D0">';
	   for($i=0; $i<sizeof($header); ++$i){
		   $table .='<td class="heading" width="'.$headerWidth[$i].'">'.$header[$i].'</td>';
	   }
	   $table .="</tr>";
	   
	   $rowCount=0;
	   foreach($data as $row){
		   if($rowCount % 2 == 0){
			   $table .='<tr valign="top" bdcolor="#D8F2D0">';
		   }
		   else{
			   $table .='<tr valign="top">';
		   }
		   $table .="<td>$row[id]</td>";
		   $table .="<td>$row[clientId_1]</td>";
		   $table .="<td>$row[clientId_2]</td>";	
		   $table .="<td>$row[response_1]</td>";	
		   $table .="<td>$row[response_2]</td>";
		   $table .="<td>$row[overall]</td>";
		   $table .="<td>$row[Date]</td>";	  
		   $table .="</tr>";
		   $rowCount++;
	   }
	   $table .="</table>";
	   $pdf->writeHTML($table,false,false,false,true,'L');
	   $saveDir=dirname($_SERVER["SCRIPT_FILENAME"])."/PDF/";
	   
	   if($pdf->Output($saveDir.'staff.pdf','F')){
		   return $table;
	   }
	   exit();
   }
}
?>