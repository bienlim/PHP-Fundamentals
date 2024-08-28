<?php

    Class Client extends CI_model{

        public function get_monthYear_total($startdate,$endate){
            $query = "  SELECT date_format(charged_datetime,'%M') AS month, date_format(charged_datetime,'%Y') AS year, SUM(amount) AS total 
                        FROM `billing` 
                        WHERE date_format(charged_datetime,'%Y-%m-%d') >= ?
                            AND date_format(charged_datetime,'%Y-%m-%d') <= ?
                        GROUP BY date_format(charged_datetime,'%Y-%m')";
       
            $values = array(
                $startdate,
                $endate
            );

            return $this->db->query($query, $values)->result_array();

        }

    }