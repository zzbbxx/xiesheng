$(function ()
{
    $('#search').click(function ()
    {
        var carID      = $('#carID').val();
        var driverID   = v.driverID == 0 ? $('#driverID').val() : v.driverID;
        var customerID = $('#customerID').val();
        var parameter  = "status=all&customerID=" + customerID + "&carID=" + carID + "&driverID=" + driverID + "&beginDate=" + v.now.replace(/-/g, '.');
        var browseLink = createLink('record', 'browse', parameter);
        window.location = browseLink;
    })
})
