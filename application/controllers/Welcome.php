<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function show_temp()
	{
		//$temp=$this->get_weather();
		$city=$_POST['city'];
		$temp=$this->get_weather($city);
		echo "Temperature of ".$city.":".$temp;
	}

	function get_weather($city='')
{

    if(isset($_GET['city']))
    {
    	$city=$_GET['city'];
    }
	
	//$country=$_GET['country'];

	$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=ab6c2ece09416fe6b9d892ccf04c4f82";
	//echo $jsonurl;
	//die;
$json = file_get_contents($jsonurl);


$weather = json_decode($json,true);
//print_r($weather);

$kel_now=$weather['main']['temp'];
$kel_feels=$weather['main']['feels_like'];
$kel_min=$weather['main']['temp_min'];
$kel_max=$weather['main']['temp_max'];
$celcius_now = $kel_now - 273.15;
$celcius_min = $kel_min - 273.15;
$celcius_max = $kel_max - 273.15;
$celcius_feels = $kel_feels - 273.15;

if(isset($_GET['city']))
    {
    	echo 'Temperature:'.round($celcius_now);
    }

    return ''.round($celcius_now).'';


//echo 'Feels Like:'.$celcius_feels."*C<br>";
/*echo 'Minmum Temperature:'.$celcius_min."*C<br>";
echo 'Maximum Temperature:'.$celcius_max."*C<br>";*/
//echo 'Humidity:'.$weather['main']['humidity']."<br>";
//echo 'Pressure:'.$weather['main']['pressure']."<br>";
//die;
}


function get_weather_all()
{

	$city=$_GET['city'];
	//$country=$_GET['country'];

	$jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=ab6c2ece09416fe6b9d892ccf04c4f82";
	//echo $jsonurl;
	//die;
$json = file_get_contents($jsonurl);


$weather = json_decode($json,true);
print_r($weather);


}

public function testcase()
{
	$this->load->library('unit_test');

	$city=$_GET['city'];
	$result_expected=$_GET['expected_result'];

	$test=$this->get_weather($city);

	

//$result_expected='13.29';

$test_name = 'Waether check for '.$city.'';

echo $this->unit->run($test, $result_expected, $test_name);

//echo $this->unit->report();
}

}
