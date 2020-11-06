/**
 * Created by ziniu on 2016/5/17.
 */
$(function(){
    var date_now = new Date($.ajax({async: false}).getResponseHeader("Date")).getTime();
    var date_between = (date_start-date_now)/1000-2;// 计算时间间隔
    // 计算天
    var day_tmp = (date_between/(3600*24)).toString();
    var day_for_hour = (date_between%(3600*24));
    var day = parseInt(day_tmp,10)>0?parseInt(day_tmp,10):0;// 计算倒计时天
    // 计算倒计时小时
    var hour_tmp = (day_for_hour/3600).toString();
    var hour_for_minute = ((date_between%(3600*24))%3600);
    var hour = parseInt(hour_tmp,10)>0?parseInt(hour_tmp,10):0;// 计算倒计时天
    // 倒计时算分钟 跟 秒
    var minute_tmp = (hour_for_minute/60).toString();
    var seconds_tmp = (hour_for_minute%60).toString();
    var minute = parseInt(minute_tmp,10)>0?parseInt(minute_tmp,10):0;// 计算倒计时天
    var seconds = parseInt(seconds_tmp,10)>0?parseInt(seconds_tmp,10):0;// 计算倒计时天
    // 初始化 时间设置
    if(day){
        var res = day+'天'+hour+'时'+minute+'分'+seconds+'秒';
    }else{
        var res = hour+'时'+minute+'分'+seconds+'秒';
    };
    $('#timebox').text(res);

})