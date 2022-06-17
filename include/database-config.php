<?php
//config13-8-2564;
// Base URL
$base_url_config = 'http://192.168.7.13/rajvithi';

// Socket io URL
$socket_io_url_config = 'http://192.168.7.13:8089';

// LOGIN API
$login_api_config = 'http://192.168.7.13/telecorplogin/api_telecorp_login';

// Printer API
$printer_api_config = 'http://192.168.7.17:5556/api/PrintReport';

// Load RFID จากตู้เย็น URL
$gate_rfid_config = 'http://192.168.7.14:60001/Gate/OpenAutoClose';

// Config URL เครื่องอ่านบัตรประชาชน
$cardreader_config = 'http://localhost:22233/';
// $cardreader_config = 'http://localhost:8888/card3.json';

// RHIS API Config
$rhis_api_apibb_config = '192.168.1.225/apibb/api/bloodbank/';
$rhis_api_apibb_user = 'abs';
$rhis_api_apibb_password = 'w,j[vdot';

$rhis_api_absws_config1 = '192.168.1.49/absWS/api/';  // Load ข้อมูลจริง
$rhis_api_absws_config2 = '192.168.1.49/absWStest/api/';  // Load ข้อมูลจริง หรือ เทส absWS = จริง OR absWStest = เทส


$rhis_api_absws_config3 = 'absWS';

// เปิด-ปิด ใช้งาน API
$env = false; //production = true

// Config Database
$servername_config = '192.168.7.13:3306';
$username_config = 'root';
$password_config = 'P@ssw0rd1168';
$dbname_config = 'bloodbank';

// Jasper Config
$jasper_server_config = 'http://192.168.7.13:8080/jasperserver';
$jasper_server_config_path = '/reports/rajvithi/';
$jasper_username_config = 'jasperadmin';
$jasper_password_config = 'jasperadmin';



////////////////////////////////
?>