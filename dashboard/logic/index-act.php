<?php

require('../function.php');

// Total Pemasukan
$pemasukan = query("SELECT
                        ( SELECT SUM( total_harga ) FROM old_barang_laku ) AS old,
                        SUM( quantity * each_price ) AS new
                        FROM
                        orders;")[0];
$totalPemasukan = number_format(intval($pemasukan['old'])+intval($pemasukan['new']));

// Total Laba
$laba = query("SELECT
                    ( SELECT SUM( laba ) FROM old_barang_laku ) AS old,((
                            b.quantity * b.each_price 
                            )-(
                            a.capital_price * b.quantity 
                        )) AS new 
                FROM
                    products a
                    INNER JOIN orders b ON a.id = b.product_id;")[0];
$totalLaba = number_format(intval($laba['old'])+intval($laba['new']));

//Total laba bulan ini
$startMonth = date("Y-m-1");
$endMonth = date("Y-m-31");

$labaBulanIni = query("SELECT
                            ( SELECT SUM( laba ) FROM old_barang_laku WHERE tanggal BETWEEN '$startMonth' AND '$endMonth' ) AS old, SUM((
                                    b.quantity * b.each_price 
                                    )-(
                                    a.capital_price * b.quantity 
                                )) AS new 
                        FROM
                            products a
                            INNER JOIN orders b ON a.id = b.product_id 
                        WHERE
                            b.date BETWEEN '$startMonth' 
                            AND '$endMonth';")[0];
$totalLabaBulanIni = number_format(intval($labaBulanIni['old'])+intval($labaBulanIni['new']));


// Rata rata laba perbulan tahun Ini
$startMonth = date("Y-00-00");
$endMonth = date("Y-12-31");

$rerataLabaBulanIni = query("SELECT
                                AVG( laba ) profit 
                            FROM
                                profit_new 
                            WHERE
                                tahun = 2020;")[0];
$totalRerataLabaBulanIni = number_format($rerataLabaBulanIni['profit']);



// ================================Chart Dashboard===================
// Tahun untuk SELECT tahun profit
$tahunDropdown = query("SELECT DISTINCT
                    ( tahun ) 
                FROM
                    profit_new");

// Tahun ini
$tahun=date("Y");
$dataChart=getDataProfitBulanan($tahun);

//
if (isset($_GET['getChartProfit'])) {
    $tahun = $_GET['getChartProfit'];
    $dataChart = getDataProfitBulanan($tahun);
}

function getDataProfitBulanan($tahun)
{
    $i = 0;
    $namaBulan=[];
    $dataChart = query("SELECT
                            bulan,laba 
                        FROM
                            profit_new 
                        WHERE
                            tahun = $tahun
                        ORDER BY 
                            bulan
                        ");
    foreach ($dataChart as $dc) {
        $dataChart[$i++]['bulan']=date("F", mktime(0, 0, 0, $dc['bulan'], 10));
    }
    return $dataChart;
}
