<?php
use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($name, $number, $email)
    {
        require_once 'vendor/Behat-Transliterator/Transliterator.php';
        require_once 'vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
        $vcardObj->addName($name);
        $vcardObj->addBirthday("test");
        $vcardObj->addEmail($email);
        $vcardObj->addPhoneNumber($number);
        $vcardObj->addAddress("test");
        
        return $vcardObj->download();
    }
}

if(isset($_GET["name"])) {
    $name = $_GET["name"];
    $number = $_GET["num"];
    $email = $_GET["email"];
    $vcardExport = new VcardExport();
    $vcardExport->contactVcardExportService($name, $number, $email);
    exit;
}

?>