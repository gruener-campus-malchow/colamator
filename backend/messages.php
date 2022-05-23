<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
class Messages
{

	private $head;
    private $body;
    private $foot;
    
    public function __construct($title)
    {

        $this->head = '
        <!DOCTYPE html>
            <html lang="de">
                <head>
                <meta charset="utf-8">
                <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
  </head><body>';

        $this->foot = "</body></html>";

        $this->body = "";
        if (!isset($_GET ["action"])) $_GET ["action"]='';
        switch ($_GET ["action"]){
			case "login":
				echo "login";
				$this->login();
				
				$this->createMessage();
			break;
			case "speichern":
				echo "speichern";
			break;
			case "senden":
				
				$this->sendMessage();
				$this->createMessage();
			break;
			case "sparen":
				echo "sparen";
			break;
			case "foo":
			break;
			default:
				echo "default";
				
				$this->welcome();
				
			break;
			}
        
    }
	public function getHtml()
    {
        return $this->head . $this->body . $this->foot;    
    } 
    
    private function postdata($data, $entrypoint) {
		$data_string = json_encode($data);
		$result = file_get_contents('https://schwarzbrotrock.org/api/'.$entrypoint, null, stream_context_create(array(
		'http' => array(
		'method' => 'POST',
		'header' => array('Content-Type: application/json'."\r\n"
		//. 'Authorization: username:key'."\r\n"
		. 'Content-Length: ' . strlen($data_string) . "\r\n"),
		'content' => $data_string)
		)
		));
		return $result;
	}
	
	
	private function getdata($entrypoint) {
		return file_get_contents('https://schwarzbrotrock.org/api/'.$entrypoint);
	}
	
	
	private function getsender(){
		$alotofsenders = json_decode($this->getdata('users/'));
		$html='';
		foreach ($alotofsenders as $sender){
			$html .= '<option>'.$sender.'</option>';
		}
		return $html;
	}
	private function getdatatyp($data){
		$alotofsenders = json_decode($this->postdata($data, 'users/datatypes'));
		$html='';
		foreach ($alotofsenders as $sender){
			$html .= '<option>'.$sender->label.'</option>';
		}
		return $html;
	}
	private function login()
	{
		echo "don't forget to make authentification";
				$_SESSION['username']=$_GET['me'];
	}
    private function welcome()
    {
		$this->body .='
		<h1>Hello boys and girls!</h1h1>
			<form>
			<label>me:
				<select name=me>';
		$this->body .= $this->getsender();
				
		$this->body .='
				
				</select></label>
				<input type=password name=passphrase>
				<input type=submit name=action value=login>

				
			</form>';
		
		
	}
	private function sendMessage(){
		$message['datatype'] = $_GET['datatyp'];
		$message['content'] = $_GET['message'];
		$html = json_decode($this->postdata($message, 'users/message'));
		
		return $html;
		}
	private function createMessage()
    {
		$this->body .='
		
			<form>
				<label>datatyps:
				<select name=datatyp>';
		$this->body .= $this->getdatatyp(['username' => $_SESSION['username']]);
				
		$this->body .='
				
				</select></label>
				<textarea name =message size=1000></textarea>
				<input type=submit name=action value=senden>
				<input type=submit name=action value=speichern>
				<input type=submit name=action value=sparen>

				
			</form>';
		
		
	}
	
	public function con()
	{
	$pwd = array_filter(explode(';', $_GET['users']));
	$usr = [];
	foreach ($pwd as $p) {
		//array_push($usr, explode(',', $p));
		$tupel = explode(',', $p);
		$data = [];
		$data['username']=$tupel[0];
		$data['password']=$tupel[1];
		$data_string = json_encode($data);
		print_r($data_string);
		$result = file_get_contents('https://schwarzbrotrock.org/api/users/', null, stream_context_create(array(
		'http' => array(
		'method' => 'POST',
		'header' => array('Content-Type: application/json'."\r\n"
		//. 'Authorization: username:key'."\r\n"
		. 'Content-Length: ' . strlen($data_string) . "\r\n"),
		'content' => $data_string)
		)
		));

		echo $result;
	}
	//var_dump($usr);
	}
	
	//$feld = fgetcsv($_GET['users'], 1000, ";");
	//print_r($feld);
		
}
$new = new Messages('Messages');
//$new -> adduser();
//$new -> con();
echo $new -> getHtml();
