$(".form-date").datetimepicker(
{
    language:  "zh-CN",
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    format: "yyyy-mm-dd"
});

$(function(){
    $('#type').on('change', function (){
        var value = $(this).val();
        if(value === 'individual'){
            $('.enterpriseNameBox').hide();
            $('.individualNameBox').show();
        }else{
            $('.individualNameBox').hide();
            $('.enterpriseNameBox').show();
        }
    })
})
