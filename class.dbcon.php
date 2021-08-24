<?php
$app_ver="V.0.4.263";
/*Database Connection using Class*/
class Con extends PDO //MySQL Connection
{
	//Called automatically upon initiation
    public function __construct($file = 'Settings.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
       /* $dns = base64_decode($settings['database']['driver']) .
        ':host=' . base64_decode($settings['database']['host']) .
        ((!empty($settings['database']['port'])) ? (';port=' . base64_decode($settings['database']['port'])) : '') .
        ';dbname=' . base64_decode($settings['database']['schema']).';charset=utf8mb4';*/
		
		/*
		echo base64_decode($settings['database']['driver'])." ".base64_decode($settings['database']['host']);
		echo base64_decode($settings['database']['port'])." ".base64_decode($settings['database']['schema']);
		echo base64_decode($settings['database']['username'])." ". base64_decode($settings['database']['password']); 
		*/		
//		 $dns ='mysql:host=202.88.246.106;port=2320;dbname=utrust;charset=utf8mb4';
		 $dns ='mysql:host=202.88.246.106;port=2320;dbname=automatch_nandi;charset=utf8mb4';

	   	try {
				/*parent::__construct($dns, base64_decode($settings['database']['username']), base64_decode($settings['database']['password']));*/
	parent::__construct($dns, 'root', 'amster@2019');
		
				
/*
				print '<script type="text/javascript">';
				print 'alert("Connected to database")';
				print '</script>'; 
    		 	die();
*/
			
			}
		catch (PDOException $e) 
		{
				//print $e->getCode(). "<br/>";	
			 	print "Error!: " . $e->getMessage() . "<br/>";				
    		 	die();				
				
        	} 
		 
    }
	
	//Called automatically when there are no further references to object
    function __destruct() {
        try {
            $this->Con = null; //Closes connection
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
	
	public function lockrow($table,$criteria,$lockpurpose,$lockby){
		// $Sql='CALL SP_RowLock("'.$table.'","'.$criteria.'","'.$lockpurpose.'",'.$lockby.')';
		$Sql="SELECT * FROM tran_customer_enquiry";
		$Rs= $this->prepare($Sql);
		$Rs->execute();		       	
		$row= $Rs->fetch();												
		echo  $row['MSG'];
}	
}




/*Indian comma separater*/

function moneyFormatIndia($num){

$explrestunits = "" ;
$num=preg_replace('/,+/', '', $num);
$words = explode(".", $num);
$des="00";
if(count($words)<=2){
    $num=$words[0];
    if(count($words)>=2){$des=$words[1];}
    if(strlen($des)<2){$des="$des0";}else{$des=substr($des,0,2);}
}
if(strlen($num)>3){
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for($i=0; $i<sizeof($expunit); $i++){
        // creates each of the 2's group and adds a comma to the end
        if($i==0)
        {
            $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
        }else{
            $explrestunits .= $expunit[$i].",";
        }
    }
    $thecash = $explrestunits.$lastthree;
} else {
    $thecash = $num;
}
return "$thecash.$des"; // writes the final format where $currency is the currency symbol.
}

/*
	$str = 'mysql';
	$strencode =  base64_encode($str);
	echo 'Driver :'. $strencode . "</br>";
	//echo base64_decode($strencode) . "</br>";

	$str = '192.168.0.190';
	$strencode =  base64_encode($str);
	echo 'Server : '. $strencode . "</br>";	
	//echo base64_decode($strencode). "</br>";

	$str = '3306';
	$strencode =  base64_encode($str);
	echo 'Port : '. $strencode . "</br>";
	//echo base64_decode($strencode) . "</br>";
	
	$str = 'popktm';
	$strencode =  base64_encode($str);
	echo 'DB : '. $strencode . "</br>";
	//echo base64_decode($strencode) . "</br>";
	
	$str = 'root';
	$strencode =  base64_encode($str);
	echo 'User : '. $strencode . "</br>";
	//echo base64_decode($strencode) . "</br>";
	
	$str = 'root123';
	$strencode =  base64_encode($str);
	echo 'Pass : '. $strencode . "</br>";
	//echo base64_decode($strencode) . "</br>";
	
*/	
?>