<?php

include 'class.Database.php';
date_default_timezone_set('Asia/Kolkata');
class czDBAccess
{

    //Public RefCall variable Mostly Table Name Property will be used for Certain Type of Class
    public $varTableName;

    //Public Methods------------------------------------------------------------


    public function errorLog($query, $errorMessage)
    {
        $myfile = fopen("includes/errorLog.txt", "a") or die("Unable to open file!");
        $txt = "Error Log Created at " . date("Y-m-d h:i:sa") . "\nDB Name : " . DB_NAME . "\nTableName :" . $this->varTableName . "\nQuery : " . $query . "\n\nMessage : " . $errorMessage . "\n.............................................................................\n\n\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }


    public function selectData($tempSelectFeilds, $tempWhereStatement, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName where $tempWhereStatement $limit;";

        } else {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName $limit;";
        }


        // echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }


    public function selectDataWithoutWhere($tempSelectFeilds, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        // if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName;";

        // } else {
            // $sql = "SELECT $tempSelectFeilds FROM $this->varTableName $limit;";
        // }


        // echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }



    public function selectData_ascOrder_byCustom_field($tempSelectFeilds, $tempWhereStatement, $orderbyfield, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName  where $tempWhereStatement ORDER BY $orderbyfield ASC $limit;";

        } else {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName $limit;";
        }


        // echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }


    public function selectData_ascOrder($tempSelectFeilds, $tempWhereStatement, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName where $tempWhereStatement  ORDER BY tid ASC $limit;";

        } else {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName $limit;";
        }


        // echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }

    public function selectData_descOrder($tempSelectFeilds, $tempWhereStatement, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName  where $tempWhereStatement ORDER BY tid DESC $limit;";

        } else {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName ORDER BY tid DESC $limit;";
        }


        // echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }


    public function selectData_customqry($qry)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();

        // echo $qry;
        // exit;
        $result = $mysqli->query($qry);
        return $result;
    }

    public function selectDataAsJSONViaCustomQuery($tempquery)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = $tempquery;

        $myArray = array();
        // echo $sql;
        if ($result = $mysqli->query($sql)) {

            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;

            }
        }

        return json_encode($myArray);
    }

    public function selectDataForAutoComplete($tempquery, $feildName)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = $tempquery;

        $myArray = array();
        // echo $sql;
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($arrayValue = mysqli_fetch_array($result)) {
                $res[] = $arrayValue[$feildName];
            }
        } else {
            $res = array();
        }

        return json_encode($res);
    }

    /**
     * Select Data From DB in the JSON Data.
     * @param string $tempSelectFeilds
     * @param string $tempWhereStatement
     */
    public function selectDataAsJSON($tempSelectFeilds, $tempWhereStatement)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        $sql = "SELECT $tempSelectFeilds FROM $this->varTableName where $tempWhereStatement;";
        //echo $sql;
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }
        return json_encode($myArray);
    }

    /**
     *
     * @param string $tempSelectFeilds
     * @param string $Limit
     */
    public function selectAllDataAsJSON($tempSelectFeilds, $Limit)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        $sql = "SELECT $tempSelectFeilds FROM $this->varTableName $Limit;";
        // $sql;
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }

        return json_encode($myArray);
    }

    public function selectallDataAsJSONNewQuery($query)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        $sql = $query;
        // echo $sql;
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $myArray[] = $row;
        }

        return json_encode($myArray);
    }


    public function selectDataOrderBy($tempSelectFeilds, $tempWhereStatement, $limit = "")
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $myArray = array();
        if (strlen($tempWhereStatement) > 0) {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName where $tempWhereStatement order by tid DESC $limit;";

        } else {
            $sql = "SELECT $tempSelectFeilds FROM $this->varTableName order by tid DESC $limit;";
        }


        //echo $sql;
        // exit;
        $result = $mysqli->query($sql);

        return $result;
    }

    /**
     * This function will insert data to DB, Will return Success when got success and Failed when Got Failed.
     * @param string $tempFeilds
     * @param string $tempValues
     */
    public function insertData($tempFeilds, $tempValues)
    {

        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = "INSERT INTO $this->varTableName ($tempFeilds)VALUES($tempValues);";
        echo $sql;
        if ($mysqli->query($sql) === true) {
            //$mysqli->close();
            return "Success";

        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            return "Failed";
        }
    }
    public function insertDatawithCustomQuery($query)
    {

        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = $query;
        if ($mysqli->query($sql) === true) {
            //$mysqli->close();
            return "Success";
        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            return "Failed";
        }
    }

    public function updateDatawithCustomQuery($query)
    {

        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = $query;
        if ($mysqli->query($sql) === true) {
            //$mysqli->close();
            //echo "Success";
        } else {

            $this->errorLog($sql, mysqli_error($mysqli));
            echo "Failed";
        }
    }
    public function insertDataWithReturnValue($tempFeilds, $tempValues)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $returnValue = "";
        $sql = "INSERT INTO $this->varTableName ($tempFeilds)VALUES($tempValues);";
        echo $sql;
        if ($mysqli->query($sql) === true) {
            $returnValue = $mysqli->insert_id;
            //$mysqli->close();

        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            $returnValue = "Failed";
        }
        return $returnValue;
    }

    public function insertDataWithReturnValueWithoutEcho($tempFeilds, $tempValues)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $returnValue = "";
        $sql = "INSERT INTO $this->varTableName ($tempFeilds)VALUES($tempValues);";
        // echo $sql;
        if ($mysqli->query($sql) === true) {
            $returnValue = $mysqli->insert_id;
            //$mysqli->close();
            // echo $returnValue;
        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            echo "Failed";
        }
        return $returnValue;
    }

    /**
     * This Function will update the Data in DB, Will return Success when got success and Failed when Got Failed.
     * @param string $tempFeildsAndValues
     * @param string $tempWhereClause
     */
    public function updateData($tempFeildsAndValues, $tempWhereClause)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql = "UPDATE $this->varTableName SET $tempFeildsAndValues WHERE $tempWhereClause;";
// echo $sql;
        if ($mysqli->query($sql) === true) {
            return "Success";
        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            return "Failed";
        }
        //$mysqli->close();
    }
    public function updatefeedback($tempFeilds, $newValues, $tempWhereClause)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql = "UPDATE $this->varTableName SET $tempFeilds = CONCAT($tempFeilds,'$newValues' ) WHERE $tempWhereClause;";

        if ($mysqli->query($sql) === true) {

        } else {
            $this->errorLog($sql, mysqli_error($mysqli));

        }
        //$mysqli->close();
    }

    public function updateDataWithoutEcho($tempFeildsAndValues, $tempWhereClause)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql = "UPDATE $this->varTableName SET $tempFeildsAndValues WHERE $tempWhereClause;";

        if ($mysqli->query($sql) === true) {
            // echo "Success";
        } else {

            echo "Failed";
            $this->errorLog($sql, mysqli_error($mysqli));
        }
        //$mysqli->close();
    }

    /**
     * This Function will Delete the Data From data based on Where Clause.
     * @param string $tempWhereClause
     */
    public function deleteData($tempWhereClause)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = "DELETE FROM $this->varTableName WHERE $tempWhereClause;";
        //echo $sql;
        // exit;
        if ($mysqli->query($sql) === true) {

            return "Success";
        } else {
            echo mysqli_error($mysqli);
            ;
            $this->errorLog($sql, mysqli_error($mysqli));
            return "Failed";
        }
        //$mysqli->close();
    }



    public function deleteDataWithoutEcho($tempWhereClause)
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $sql = "DELETE FROM $this->varTableName WHERE $tempWhereClause;";
        //echo $sql;
        if ($mysqli->query($sql) === true) {

            // echo "Success";
        } else {
            $this->errorLog($sql, mysqli_error($mysqli));
            echo "Failed";
        }
        //$mysqli->close();
    }

}