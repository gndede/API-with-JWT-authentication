<?php
include_once './config/database.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$company = '';
$last_name= '';
$first_name= '';
$email_address= '';
$job_title= '';
$business_phone= '';
$home_phone= '';
$mobile_phone= '';
$fax_number= '';
$address= '';
$city= '';
$state_province= '';
$zip_postal_code= '';
$country_region= '';
$web_page= '';
$password= '';
$connection = null;

$databaseService = new DatabaseService();
$connection = $databaseService->getConnection();

$data = json_decode(file_get_contents("php://input"));

$company = $data->company ;
$last_name = $data->last_name;
$first_name = $data->first_name;
$email_address = $data->email_address;
$job_title = $data->job_title;
$business_phone = $data->business_phone;
$home_phone = $data->home_phone;
$mobile_phone = $data->mobile_phone;
$fax_number = $data->fax_number;
$address = $data->address;
$city = $data->city;
$state_province = $data->state_province;
$zip_postal_code = $data->zip_postal_code;
$country_region = $data->country_region;
$web_page = $data->web_page;
$password = $data->password;

$table_name = 'employee';

$query = "INSERT INTO " .  $table_name . "
			SET	$company = :company,
				$last_name = :last_name,
				$first_name = :first_name,
				$email_address = :email_address,
				$job_title = :job_title,
				$business_phone = :business_phone,
				$home_phone = :home_phone,
				$mobile_phone = :mobile_phone,
				$fax_number = :fax_number,
				$address = :address,
				$city = :city,
				$state_province = :state_province,
				$zip_postal_code = :zip_postal_code,
				$country_region = :country_region,
				$web_page = :web_page,
				$password = :password";

$stmt = $connection->prepare($query);

$stmt->bindParam(':company' , $company);
$stmt->bindParam(':last_name' , $last_name);
$stmt->bindParam(':first_name' , $first_name);
$stmt->bindParam(':email_address' , $email_address);
$stmt->bindParam(':job_title' , $job_title);
$stmt->bindParam(':business_phone' , $business_phone);
$stmt->bindParam(':home_phone' , $home_phone);
$stmt->bindParam(':mobile_phone' , $mobile_phone);
$stmt->bindParam(':fax_number' , $fax_number);
$stmt->bindParam(':address' , $address);
$stmt->bindParam(':city' , $city);
$stmt->bindParam(':state_province' , $state_province);
$stmt->bindParam(':zip_postal_code' , $zip_postal_code);
$stmt->bindParam(':country_region' , $country_region);
$stmt->bindParam(':web_page' , $web_page);

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$stmt->bindParam(':password', $password_hash);


if($stmt->execute()){

    http_response_code(200);
    echo json_encode(array("message" => "This User was successfully registered."));
}
else{
    http_response_code(400);

    echo json_encode(array("message" => "We were Unable to register this  user."));
}
?>