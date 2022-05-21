<?php
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
				<textarea name =users></textarea>
				<input type=submit name=ok value=senden>
			</form>';
		$this->body .=print_r($_GET['users'],True);
		
	}
	public function con()
	{
	$pwd = explode(';', $_GET['users']);
	$usr = [];
	foreach ($pwd as $p) {
		array_push($usr, explode(',', $p));
	}
	var_dump($usr);
	}
		
}
$new = new Users('user');
$new -> adduser();
$new -> con();
echo $new -> getHtml();
