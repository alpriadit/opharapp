<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class OracleModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public Function readCursor($storedProcedure, $binds) {

        //
        // This function needs two parameters:
        //
        // $storedProcedure - the name of the stored procedure to call a chamar. Ex:
        //  my_schema.my_package.my_proc(:param)
        //  
        // $binds - receives an array of associative arrays with: parameter names,
        // values and sizes
        //
        // WARNING: The first parameter must be consistent with the second one

        $conn = oci_connect('SECMAN', 'SECMAN', '(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =192.168.10.24)(PORT = 1521))(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = cisqa)))');

        if ($conn) {
            
                // Create the statement and bind the variables (parameter, value, size)
            $stid = oci_parse($conn, 'begin :cursor := ' . $storedProcedure . '; end;');
            foreach ($binds as $variable)
                oci_bind_by_name($stid, $variable["parameter"], $variable["value"], $variable["size"]);

                // Create the cursor and bind it
            $p_cursor = oci_new_cursor($conn);
            oci_bind_by_name($stid, ':cursor', $p_cursor, -1, OCI_B_CURSOR);

                // Execute the Statement and fetch the data
            oci_execute($stid);
            oci_execute($p_cursor, OCI_DEFAULT);
            oci_fetch_all($p_cursor, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                // Return the data
            return $data;
        }
    }
}