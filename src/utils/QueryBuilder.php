<?php

class QueryBuilder{

    public $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }
  
    public function Select($query){

        try {
            mysqli_set_charset($this->db, 'utf8');
            $result    = mysqli_query($this->db, $query);

			if (is_object($result)) {

				$numResult = $result->num_rows;
				$info      = array();
				if ($numResult > 0) {
					while ($infoQuery = mysqli_fetch_assoc($result)) {
						$info[] = $infoQuery;
					}
					mysqli_close($this->db);

					return $info;
				} else {
					return $this->db->error;
					mysqli_close($this->db);
				}
			} else {
				return $this->db->error;
				mysqli_close($this->db);
			}

        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }

    }

}