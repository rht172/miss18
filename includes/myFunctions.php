<?php
/*
 * This File Contains User defined Functions For the CloudZoo Online Process
 */

// Local Functions

function czGet($keyName)
{
    if (isset($_GET[$keyName])) {
        return $_GET[$keyName];
    } else {
        return "";
    }
}

function czGetForSQL($keyName)
{
    if (isset($_GET[$keyName])) {
        return czEscapeString($_GET[$keyName]);
    } else {
        return "";
    }
}

function czPost($keyName)
{
    if (isset($_POST[$keyName])) {
        return $_POST[$keyName];
    } else {
        return "";
    }
}

function czPostForSQL($keyName)
{
    if (isset($_POST[$keyName])) {
        return czEscapeString($_POST[$keyName]);
    } else {
        return "";
    }
}

function czEscapeString($valueName)
{
    return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $valueName);
}

/**
 * Function To Find the Recevied Request is a valid Json Sting part
 * @param object $jsonRequestString
 * @param string $requestFeildName
 * @return string
 */
function valditateJsonRequestInput($jsonRequestString, $requestFeildName)
{

    if (isset($jsonRequestString->$requestFeildName)) {
        return addslashes($jsonRequestString->$requestFeildName);
    } else {
        return "";
    }

}


/**
 * Summary of paginiation
 * @param int $pageNo
 * @return void
 */
function pagination($pageNo) {
    if ($pageNo == 1) {
        echo '
          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
           
            <li class="page-item"><a class="page-link" >' . $pageNo . '</a></li>   
            <li class="page-item">
              <a class="page-link" onclick="loadTableData(' . ($pageNo + 1) . ')">Next</a>
            </li>
          </ul>
        </nav>
          ';
    } else {

        echo '
          <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" onclick="loadTableData(' . ($pageNo - 1) . ')">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">' . $pageNo . '</a></li>   
            <li class="page-item">
              <a class="page-link" onclick="loadTableData(' . ($pageNo + 1) . ')">Next</a>
            </li>
          </ul>
        </nav>
          ';
    }
}

/**
 *
 */
function whereClasueQueryGenerator($feildName, $OperatorNameEqualOrLike, $valueData, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (strlen($valueData) > 0) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {
            if ($OperatorNameEqualOrLike == "=" || $OperatorNameEqualOrLike == "<") {
                $returnString = $ExistingWhereQuery . " AND " . $feildName . " " . $OperatorNameEqualOrLike . "'" . $valueData . "'";

            } else {

                $returnString = $ExistingWhereQuery . " AND " . $feildName . " " . $OperatorNameEqualOrLike . " " . "'%" . $valueData . "%'";
            }

        } else {
            if ($OperatorNameEqualOrLike == "=" || $OperatorNameEqualOrLike == "<") {

                $returnString = $feildName . " " . $OperatorNameEqualOrLike . "'" . $valueData . "'";
            } else {
                $returnString = $feildName . " " . $OperatorNameEqualOrLike . " " . "'%" . $valueData . "%'";
            }

        }
    } else {
        $returnString = $ExistingWhereQuery;
    }

    return $returnString;
}



function whereClasueQueryGeneratorLike($feildName, $valueData, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (strlen($valueData) > 0) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {
            $returnString = $ExistingWhereQuery . " AND " . $feildName . " " . " Like " . "'%" . $valueData . "%'";
        } else {
            $returnString = $feildName . " " . " Like " . "'%" . $valueData . "%'";
        }
    } else {
        $returnString = $ExistingWhereQuery;
    }
    return $returnString;
}



function isValidDate($date)
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function whereClasueQueryGeneratorForDate($feildName, $fromDate, $toDate, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (isValidDate($fromDate) == true) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {

            $returnString = $ExistingWhereQuery . " AND (" . $feildName . " between '" . $fromDate . "' and   '" . $toDate . "')";



        } else {

            $returnString = $feildName . " between '" . $fromDate . "' and   '" . $toDate . "'";


        }
    } else {
        $returnString = $ExistingWhereQuery;
    }

    return $returnString;
}

//query generator for OR operator
function whereClasueQueryGeneratorOR($feildName, $OperatorNameEqualOrLike, $valueData, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (strlen($valueData) > 0) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {
            if ($OperatorNameEqualOrLike == "=" || $OperatorNameEqualOrLike == "<") {
                $returnString = $ExistingWhereQuery . " OR " . $feildName . " " . $OperatorNameEqualOrLike . "'" . $valueData . "'";

            } else {

                $returnString = $ExistingWhereQuery . " OR " . $feildName . " " . $OperatorNameEqualOrLike . " " . "'%" . $valueData . "%'";
            }

        } else {
            if ($OperatorNameEqualOrLike == "=" || $OperatorNameEqualOrLike == "<") {

                $returnString = $feildName . " " . $OperatorNameEqualOrLike . "'" . $valueData . "'";
            } else {
                $returnString = $feildName . " " . $OperatorNameEqualOrLike . " " . "'%" . $valueData . "%'";
            }

        }
    } else {
        $returnString = $ExistingWhereQuery;
    }

    return $returnString;
}

function whereClasueQueryGenerator2($feildName, $OperatorNameEqualOrLike, $valueData1, $valueData2, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (strlen($valueData1) > 0 && strlen($valueData2) > 0) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {
            $returnString = $ExistingWhereQuery . " AND " . $feildName . " " . $OperatorNameEqualOrLike . " '" . $valueData1 . "' AND  '" . $valueData2 . "'";
        } else {
            $returnString = $feildName . " " . $OperatorNameEqualOrLike . "'" . $valueData1 . "' AND  '" . $valueData2 . "'";
        }
    } else {
        $returnString = $ExistingWhereQuery;
    }

    return $returnString;
}

function FileUploadJPG($FileUploaderName, $imageName, $target_dir)
{
    if (array_key_exists($FileUploaderName, $_FILES)) {
        if (is_uploaded_file($_FILES[$FileUploaderName]['tmp_name'])) {
            $target_file = $target_dir . $imageName . ".jpg";

            // Check if file already exists, If So Delete It
            if (file_exists($target_file)) {
                unlink($target_file);
            }

            if (move_uploaded_file($_FILES[$FileUploaderName]["tmp_name"], $target_file)) {

                return "Success";
            } else {
                return "Failed";
            }

        } else {
            return "Failed";
        }
    } else {
        return "Failed";
    }

}


function FileUpload($FileUploaderName, $imageName, $target_dir, $extension)
{
    if (array_key_exists($FileUploaderName, $_FILES)) {
        if (is_uploaded_file($_FILES[$FileUploaderName]['tmp_name'])) {
            $target_file = $target_dir . $imageName . "." . $extension;

            // Check if file already exists, If So Delete It
            if (file_exists($target_file)) {
                unlink($target_file);
            }

            if (move_uploaded_file($_FILES[$FileUploaderName]["tmp_name"], $target_file)) {

                return "Success";
            } else {
                return "Failed";
            }

        } else {
            return "Failed";
        }
    } else {
        return "Failed";
    }

}


function uploadImageJpg($imageName, $target_dir)
{
    $target_file = $target_dir . $imageName . ".jpg";
    $uploadOk = 1;
    //$imageFileType = pathinfo($_FILES["file"]["tmp_name"], PATHINFO_EXTENSION);

    $imageFileType = $_FILES["file"]["name"];

    $ext = pathinfo($imageFileType, PATHINFO_EXTENSION);
    $imageFileType = $ext;
    //echo $imageFileType;
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists, If So Delete It
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats

    if ($imageFileType != "jpg" && $imageFileType != "JPG") {

        echo "Sorry, only jpg files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "success";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

//This is a Direct Function,This Function will update the Data in DB, Will return Success when got success and Failed when Got Failed.

/**function updateData($tempFeildsAndValues, $tempWhereClause,$varTableName) {
$db = Database::getInstance();
$mysqli = $db->getConnection();

$sql = "UPDATE $varTableName SET $tempFeildsAndValues WHERE $tempWhereClause;";

if ($mysqli->query($sql) === TRUE) {
echo "Success";
} else {
echo $sql;
echo mysqli_error($mysqli);
echo mysqli_connect_error();
echo "Failed";
}
$mysqli->close();
}*/

function consoleLog($log)
{
    echo "$log";
}
function validateTokenID($tempTokenID)
{

    $obj_class_main = new czDBAccess();
    $obj_class_main->varTableName = 'user_session_table';
    try {
        $result = json_decode($obj_class_main->selectDataAsJSON("user_name,session_id", "session_id='" . $tempTokenID . "'"), true);
        if (count($result) > 0) {
            $return = "validToken";
        } else {
            $return = "Invalid Token";
        }
    } catch (Exception $e) {
        $return = 'Invalid Token';
    }
    $return = "validToken";
    return $return;

}
function validateCustomerTokenID($tempTokenID)
{

    $obj_class_main = new czDBAccess();
    $obj_class_main->varTableName = 'customer_login_table';
    try {
        $result = json_decode($obj_class_main->selectDataAsJSON("customer_mail,session_id", "session_id='" . $tempTokenID . "'"), true);
        if (count($result) > 0) {
            $return = "validToken";
        } else {
            $return = "Invalid Token";
        }
    } catch (Exception $e) {
        $return = 'Invalid Token';
    }
    $return = "validToken";
    return $return;

}

function valditateJsonRequestInputUpdate($jsonRequestString, $requestFeildName, $ObjectClassRef)
{

    if (isset($jsonRequestString->$requestFeildName)) {

        return addslashes($jsonRequestString->$requestFeildName);
    } else {

        return $ObjectClassRef->$requestFeildName;
    }

}

/**
 * Converts the Data Formate to get inseterd into mysql Database i.e yyyy-MM-dd
 * @param string $dateValueAsString
 * @return string
 */
function processStingToDate($dateValueAsString)
{
    if (strlen($dateValueAsString) > 0) {
        $parts = explode('/', $dateValueAsString);
        $dateValueAsString = "$parts[2]-$parts[0]-$parts[1]";
        return $dateValueAsString;
    }
    return '';
}

// Query Generation For On condition with and opereartor//

function whereClasueQueryGenerator_on($feildName, $OperatorNameEqualOrLike, $valueData, $ExistingWhereQuery)
{

    $returnString = "";
    //Verfiy That Value is Empty or Not
    if (strlen($valueData) > 0) {
        //Verify That The Query Already Has any Value
        if (strlen($ExistingWhereQuery) > 0) {
            if ($OperatorNameEqualOrLike == "in") {
                $returnString = $ExistingWhereQuery . " AND " . $feildName . " " . $OperatorNameEqualOrLike . "(" . $valueData . ")";

            }

        } else {
            if ($OperatorNameEqualOrLike == "in") {

                $returnString = $feildName . " " . $OperatorNameEqualOrLike . "(" . $valueData . ")";
            }

        }
    } else {
        $returnString = $ExistingWhereQuery;
    }

    return $returnString;
}



function encryptValue($value, $key) {
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    
    // Encrypt the value
    $encrypted = openssl_encrypt($value, 'aes-256-cbc', $key, 0, $iv);
    
    // Encode the encrypted value and IV in base64
    $encoded = base64_encode($encrypted . '::' . $iv);
    
    return $encoded;
}