<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
class Users
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
        }
	public function getHtml()
    {
        return $this->head . $this->body . $this->foot;    
    }  
    public function adduser()
    {
		$this->body .='
			<form>
				<textarea name =users size=1000></textarea>
				<input type=submit name=ok value=senden>
			</form>';
		$this->body .=print_r($_GET['users'],True);
		
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
$new = new Users('user');
$new -> adduser();
$new -> con();
echo $new -> getHtml();
