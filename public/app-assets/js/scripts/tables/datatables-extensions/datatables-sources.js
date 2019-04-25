/*=========================================================================================
    File Name: datatables-sources.js
    Description: Sources Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Template
    Version: 2.1
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

/***************************************
*       HTML (DOM) sourced data        *
****************************************/

    $('.sourced-data').DataTable();

/*********************************
*       Ajax sourced data        *
**********************************/

    $('.ajax-sourced').DataTable( {
        "ajax": "../../../app-assets/data/datatables/ajax-sourced.json"
    } );

/***************************************
*       Javascript sourced data        *
***************************************/

    var dataSet = [
    [ "1","Tiger Nixon", "System Architect", "Edinburgh",  "$320,800" ],
    [ "2","Garrett Winters", "Accountant", "Tokyo",   "$170,750" ],
    [ "3","Ashton Cox", "Junior Technical Author", "San Francisco", "$86,000" ],
    [ "4","Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "$433,060" ],
    [ "5","Airi Satou", "Accountant", "Tokyo",  "$162,700" ],
    [ "6","Brielle Williamson", "Integration Specialist", "New York",  "$372,000" ],
    [ "7","Herrod Chandler", "Sales Assistant", "San Francisco", "$137,500" ],
    [ "8","Rhona Davidson", "Integration Specialist", "Tokyo",  "$327,900" ],
    [ "9","Colleen Hurst", "Javascript Developer", "San Francisco",  "$205,500" ],
    [ "10","Sonya Frost", "Software Engineer", "Edinburgh",  "$103,600" ],
    [ "11","Jena Gaines", "Office Manager", "London",  "$90,560" ],
    [ "12","Quinn Flynn", "Support Lead", "Edinburgh",  "$342,000" ],
    [ "13","Charde Marshall", "Regional Director", "San Francisco",  "$470,600" ],
    [ "14","Haley Kennedy", "Senior Marketing Designer", "London",  "$313,500" ],
    [ "15","Tatyana Fitzpatrick", "Regional Director", "London",  "$385,750" ],
    [ "16","Michael Silva", "Marketing Designer", "London",  "$198,500" ],
    [ "17","Paul Byrd", "Chief Financial Officer (CFO)", "New York",  "$725,000" ],
    [ "18","Gloria Little", "Systems Administrator", "New York",  "$237,500" ],
    [ "19","Bradley Greer", "Software Engineer", "London",  "$132,000" ],
    [ "20","Dai Rios", "Personnel Lead", "Edinburgh",  "$217,500" ],
    [ "21","Jenette Caldwell", "Development Lead", "New York",  "$345,000" ],
    [ "22","Yuri Berry", "Chief Marketing Officer (CMO)", "New York",  "$675,000" ],
    [ "23","Caesar Vance", "Pre-Sales Support", "New York",  "$106,450" ],
    [ "24","Doris Wilder", "Sales Assistant", "Sidney",  "$85,600" ],
    [ "25","Angelica Ramos", "Chief Executive Officer (CEO)", "London",  "$1,200,000" ],
    [ "26","Gavin Joyce", "Developer", "Edinburgh",  "$92,575" ],
    [ "27","Jennifer Chang", "Regional Director", "Singapore",  "$357,650" ],
    [ "28","Brenden Wagner", "Software Engineer", "San Francisco",  "$206,850" ],
    [ "29","Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "$850,000" ],
    [ "30","Shou Itou", "Regional Marketing", "Tokyo", "8899",  "$163,000" ],
    [ "31","Michelle House", "Integration Specialist", "Sidney", "$95,400" ],
    [ "32","Suki Burks", "Developer", "London", "$114,500" ],
    [ "33","Prescott Bartlett", "Technical Author", "London", "2011/05/07", "$145,000" ],
    [ "34","Gavin Cortez", "Team Leader", "San Francisco", "2008/10/26", "$235,500" ],
    [ "35","Martena Mccray", "Post-Sales support", "Edinburgh", "2011/03/09", "$324,050" ],
    [ "36","Unity Butler", "Marketing Designer", "San Francisco", "2009/12/09", "$85,675" ]
];

    $('.javascript-sourced').DataTable( {
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "Name Produk" },
            { title: "Jumlah" },
            { title: "Keterangan" },
            { title: "Harga" },
        ],
         rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );


/**************************************
*       Server-side processing        *
**************************************/

    $('.server-side').DataTable( {
        "processing": true,
        "serverSide": true,
        //"ajax": "../server_side/scripts/server_processing.php" NOTE: use serverside script to fatch the data
        "ajax": "../../../app-assets/data/datatables/server-side.json"
    } );



} );