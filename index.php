<?
session_start();
require 'vendor/autoload.php';
$ns = rhiaro\ERH\ns();

$tz = rhiaro\ERH\get_timezone_from_rdf("https://rhiaro.co.uk/tz");
date_default_timezone_set($tz);

$tags = array(
    "nanowrimo" => "https://rhiaro.co.uk/tags/nanowrimo",
    "quest+for+brothers" => "https://rhiaro.co.uk/tags/quest+for+brothers",
);
$novels = array(
     "https://rhiaro.co.uk/network-affect" => "Network Affect (NaNoWriMo 2022)"
    ,"https://rhiaro.co.uk/quest-for-brothers-3" => "Quest for Brothers (NaNoWriMo 2021)"
    ,"https://rhiaro.co.uk/dumping-sky" => "Dumping Sky (NaNoWriMo 2020)"
    ,"https://rhiaro.co.uk/quest-for-brothers-2" => "Quest for Brothers (NaNoWriMo 2019)"
    ,"https://rhiaro.co.uk/birds" => "Birds (NaNoWriMo 2018)"
    ,"https://rhiaro.co.uk/of-the-moon" => "Of the Moon (NaNoWriMo 2017)"
    ,"https://rhiaro.co.uk/beyond" => "Beyond (NaNoWriMo 2013)"
    ,"https://rhiaro.co.uk/quest-for-brothers" => "Quest for Brothers (NaNoWriMo 2012)"
    ,"https://rhiaro.co.uk/touched" => "Touched (NaNoWriMo 2011)"
    ,"https://rhiaro.co.uk/milos-world" => "Milo's World (NaNoWriMo 2009)"
    ,"https://rhiaro.co.uk/dragon-seekers" => "Dragon Seekers (NaNoWriMo 2008)"
  );

if(isset($_POST['replicated'])){
    if(isset($_POST['endpoint_key'])){
        $_SESSION['key'] = $_POST['endpoint_key'];
    }
    $endpoint = $_POST['endpoint_uri'];
    $_POST['name'] = $novels[$_POST['object']];
    $result = Rhiaro\form_to_endpoint($_POST);

    if(is_array($result)){
        $errors = $result;
        unset($result);
    }else{
        unset($_POST);
    }
}
include('templates/index.php');
?>