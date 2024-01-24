<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'entretien_pairs';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'code',      'dt' => 0 ),
    array( 'db' => 'statut',    'dt' => 1 ),
    array( 'db' => 'entretien_pair_id.type_activite_id',    'dt' => 2 ),
    array( 'db' => 'entretien_pair_id.type_entretien_id',   'dt' => 3 ),
    array( 'db' => 'condomMasculin',    'dt' => 4 ),
    array( 'db' => 'condomFeminin',     'dt' => 5 ),
    array( 'db' => 'entretien_pair_id.referer',   'dt' => 6 ),
    array( 'db' => 'region_id',   'dt' => 7 )
);

// SQL server connection information
$sql_details = array(
    'user' => 'cp1052399_driguemyster',
    'pass' => 'driguemyster1995',
    'db'   => 'cp1052399_econvivial',
    'host' => '127.0.0.1'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
