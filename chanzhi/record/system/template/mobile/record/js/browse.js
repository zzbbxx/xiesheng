$(function ()
{
    var startDate = v.startDate;
    var endDate = v.endDate;
    $('#searchStartDate').on('change', function ()
    {
        var startDate = $(this).val().replace(/-/g, '.');
        var parameter = 'status=' + v.status + v.baseParameter + '&beginDate=' + startDate + '&finishDate=' + endDate;

        window.location = createLink('record', 'browse', parameter); 
    });

    $('#searchEndDate').on('change', function ()
    {
        var endDate = $(this).val().replace(/-/g, '.');
        var parameter = 'status=' + v.status + v.baseParameter + '&beginDate=' + startDate + '&finishDate=' + endDate;

        window.location = createLink('record', 'browse', parameter); 
    });
});
