<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>WCF Client</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>

<body>

<table id="location" border='1'>
    <tr>
        <th>Countries</th>
         <th>Cities</th>
    </tr>
</table>

<script>

var service = 'http://localhost/DistributedDataSystem/Service.svc/';

$(document).ready(function(){

    jQuery.support.cors = true;

    $.ajax(
    {
        type: "GET",
        url: service + '/GetAllCountries/',
        data: "{}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function (data) {
            
        var trHTML = '';
                
        $.each(data.Countries, function (i, item) {
            
            trHTML += '<tr><td>' + data.Countries[i] + '</td><td>' + data.Cities[i] + '</td></tr>';
        });
        
        $('#location').append(trHTML);
        
        },
        
        error: function (msg) {
            
            alert(msg.responseText);
        }
    });
})

</script>

</body>
</html>