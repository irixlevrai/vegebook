<?php


    $type_txt = $_GET['type'];  //    Récupération du type végétal (fruit, légume ou plante) par URL

//    $type_txt = $type;


    $nbr_inve = 0;

    $file_handle = fopen("texte/$type_txt.txt", "r");

    while(!feof($file_handle)) {

        fgets($file_handle);
        
        $nbr_inve ++;
        
        
    }
    

    $file_handle = fopen("texte/$type_txt.txt", "r");

    while(!feof($file_handle)) {
        

        $line_of_text = fgets($file_handle);
        
    
        $parts = explode('=', $line_of_text);
        
        

        $elements[] = /*array($parts[1] =>*/
         array(	
         		'id' => $parts[0],
         		'name' => $parts[1],
         		'img' => $parts[2],
         		'name_fr' => $parts[3],
         		'plantation' => $parts[4],
         		'quantite' => $parts[5],
         		'estimation' => $parts[6],
         		'freq_arrosage' => $parts[7],
         		'dernier_arrosage' => $parts[8],
                'notes' => $parts[9]);
                }
  
    fclose($file_handle);






for ($i=0; $i < $nbr_inve ; $i++) { 
	 	echo 
            '<tr><td><a href="delete-confirmation.php?id='.$i.'&name='.$elements[$i]['name'].'&date='.$elements[$i]['plantation'].'&type='.$type_txt.'"> 
    <img src="images/ressources/cancel.png" class="image_delete_input"></a></td>' .
//            '<tr><td><form method="post" action="delete-traitement.php"> 
//    <input  name="id" value="'.$i.'"> 
//    <input class="image_supprimer_input" type="image" src="images/ressources/cancel.png"></form>            </td>' .
            '<td>'  . $elements[$i]['id'] . '</td>' .
            '<td>'  . $elements[$i]['name'] . '</td>' .
             '<td> ' . '<img class="content_img" src="images/' . $elements[$i]['img'] . '"/>' . '</td>' .
             '<td> ' . $elements[$i]['plantation'] . '</td>' .
             '<td> ' . $elements[$i]['quantite'] . '</td>' .
			'<td>  ' . $elements[$i]['estimation'] . '</td>' .
			'<td>  ' . $elements[$i]['freq_arrosage'] . '</td>' .
			'<td>  ' . $elements[$i]['dernier_arrosage'] . '</td>' .
			'<td>  ' . $elements[$i]['notes'] . '</td></tr>'
	;
}




?>