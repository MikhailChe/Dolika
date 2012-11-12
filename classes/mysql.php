<?php
class mysql{
	var $conn_id;
	var $qs = array();
	var $last_id;
	var $debug = false;
	var $verbose = true;
	function mysql($host, $user, $password, $db){

		if(!$this->conn_id = mysql_pconnect($host, $user, $password)){
			die("<html><meta charset='utf-8'>Беда с базой</html>");
		}
		$this->query("SET NAMES 'utf8'");
		mysql_select_db($db, $this->conn_id );
	}
	
	function query($query){
		$result = mysql_query($query, $this->conn_id);
		$this->qs[] = array("query" => $query, "info" => mysql_info($this->conn_id), "error" => mysql_error());
		$this->last_id = mysql_insert_id($this->conn_id);
		if($this->debug){
			if(mysql_error()){
				$error;
				if($this->verbose){
					$error .= $query . " ";
				}
				$trace = debug_backtrace();
				$error .= mysql_errno(). " : " . mysql_error() . " in <b>" . $trace[1]['file'] . "</b> at line <b>" . $trace[1]['line'] . "</b>\r\n<br>\r\n";
				
				echo $error;
			}
		}
		return $result;
	}
	
	function results($sql, $type=MYSQL_ASSOC) {
        $request = $this->query($sql, $this->conn_id);
        if ($request) {
            $numrow = mysql_num_rows($request);
            if ($numrow == 0){
				return false;
			}else{
				$result = array();
                while ($row = mysql_fetch_array($request, $type)){
					$result[] = $row;
                }
                return $result;
            }
        }
        else return false;
    }

    function result($sql, $type=MYSQL_ASSOC) {
        $request = $this->query($sql, $this->conn_id);
        if ($request) {
            $numrow = mysql_num_rows($request);
            if ($numrow == 0){
				return false;
			}else {
                $result = mysql_fetch_array($request, $type);
                return $result;
            }
        }else{
			return false;
		}
    }
	
	function debug(){
		$this->debug = true;
	}
}
?>