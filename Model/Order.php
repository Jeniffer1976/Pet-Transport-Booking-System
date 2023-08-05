<?php
namespace Invoice;

use Invoice\DataSource;

class Order
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getPetOwners($owner_id)
    {
        $query = "SELECT * FROM pet_owner WHERE owner_id='" . $owner_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getInvoice($quote_id)
    {
        $query = "SELECT * FROM invoice WHERE quote_id='" . $quote_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getQuote($quote_id)
    {
        $query = "SELECT * FROM quote WHERE quote_id='" . $quote_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }
    
}