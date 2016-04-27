<!DOCTYPE html>
<html>
<head>
	<title></title>


<style type="text/css">

/*
body {margin:0;padding:50px}
    
    h2 {font-size:36px;margin:0 0 10px 0}
    p {margin:0 0 10px 0}
    
    table.width200,table.rwd_auto {border:1px solid #ccc;width:100%;margin:0 0 50px 0}
        .width200 th,.rwd_auto th {background:#ccc;padding:5px;text-align:center;}
        .width200 td,.rwd_auto td {border-bottom:1px solid #ccc;padding:5px;text-align:center}
        .width200 tr:last-child td, .rwd_auto tr:last-child td{border:0}
        
    .rwd {width:100%;overflow:auto;}
        .rwd table.rwd_auto {width:auto;min-width:100%}
            .rwd_auto th,.rwd_auto td {white-space: nowrap;}
            
    @media only screen and (max-width: 760px), (min-width: 768px) and (max-width: 1024px)  
    {
    
        table.width200, .width200 thead, .width200 tbody, .width200 th, .width200 td, .width200 tr { display: block; }
        
        .width200 thead tr { position: absolute;top: -9999px;left: -9999px; }
        
        .width200 tr { border: 1px solid #ccc; }
        
        .width200 td { border: none;border-bottom: 1px solid #ccc; position: relative;padding-left: 50%;text-align:left }
        
        .width200 td:before {  position: absolute; top: 6px; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap;}
        
        .width200 td:nth-of-type(1):before { content: "Nombre"; }
        .width200 td:nth-of-type(2):before { content: "Apellidos"; }
        .width200 td:nth-of-type(3):before { content: "Cargo"; }
        .width200 td:nth-of-type(4):before { content: "Twitter"; }
        .width200 td:nth-of-type(5):before { content: "ID"; }
        
        .descarto {display:none;}
        .fontsize {font-size:10px}
    }
    
    /* Smartphones (portrait and landscape) ----------- 
    @media only screen and (min-width : 320px) and (max-width : 480px) 
    {
        body { width: 320px; }
        .descarto {display:none;}
    }
    
    /* iPads (portrait and landscape) ----------- 
    @media only screen and (min-width: 768px) and (max-width: 1024px) 
    {
        body { width: 495px; }
        .descarto {display:none;}
        .fontsize {font-size:10px}
    }

    */

    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
    
        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee; 
            position: relative;
            padding-left: 50%; 
        }
        
        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
        }
        
        /*
        Label the data
        */
        td:nth-of-type(1):before { content: "First Name"; }
        td:nth-of-type(2):before { content: "Last Name"; }
        td:nth-of-type(3):before { content: "Job Title"; }
        td:nth-of-type(4):before { content: "Favorite Color"; }
        td:nth-of-type(5):before { content: "Wars of Trek?"; }
        td:nth-of-type(6):before { content: "Porn Name"; }
        td:nth-of-type(7):before { content: "Date of Birth"; }
        td:nth-of-type(8):before { content: "Dream Vacation City"; }
        td:nth-of-type(9):before { content: "GPA"; }
        td:nth-of-type(10):before { content: "Arbitrary Data"; }
    }
    
    /* Smartphones (portrait and landscape) ----------- */
    @media only screen
    and (min-device-width : 320px)
    and (max-device-width : 480px) {
        body { 
            padding: 0; 
            margin: 0; 
            width: 320px; }
        }
    
    /* iPads (portrait and landscape) ----------- */
    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
        body { 
            width: 495px; 
        }
    }

</style>

</head>
<body>




<table>
    <tr>
        <th class="un_first">
            First Name
        </th>
        <th>
            Last Name
        </th>
        <th>
            Company
        </th>
        <th class="un_age">
            Age
        </th>
        <th class="un_address">
            Address
        </th>
         <th class="un_address">
            Address
        </th>
    </tr>

    <tr>
        <td class="un_first">
            Bill
        </td>
        <td class="un">
            Gates
        </td>
        <td class="un">
            Microsoft
        </td>
        <td class="un_age">
            60
        </td>
        <td class="un_address">
            Washington, United States
        </td>
        <td class="un_address">
            Washington, United States
        </td>
</tr>

    <tr>
        <td class="un_first">
            Steve
        </td>
        <td>
            Jobs
        </td>
        <td>
            Apple
        </td>
        <td class="un_age">
            56
        </td>
        <td class="un_address">
            2101 Waverley Street, Palo Alto
        </td>
        <td class="un_address">
            2101 Waverley Street, Palo Alto
        </td>
    </tr>

    <tr>     
        <td class="un_first">
            Mark
        </td>
        <td>
            Zuckerberg
        </td>
        <td>
            Facebook
        </td>
        <td class="un_age">
            31
        </td>
        <td class="un_address">
            1 Hacker Way, Menlo Park, CA 94025, US
        </td>
         <td class="un_address">
            1 Hacker Way, Menlo Park, CA 94025, US
        </td>
    </tr>

</table>




</body>
</html>