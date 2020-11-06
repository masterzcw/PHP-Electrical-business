/**
 * Created by ziniu on 2016/5/17.
 */
$(function () {
    var tid = setInterval(function () {
        var oTimebox = $("#timebox");
        var syTime = oTimebox.text();
        var totalSec = getTotalSecond(syTime) - 1;
        if (totalSec >= 0) {
            oTimebox.text(getNewSyTime(totalSec));
        } else {
            clearInterval(tid);
            // 执行页面刷新
            //window.location.reload();//刷新当前页面.
            //var button = '<a href="http://www.jingshan.net">点击进入秒杀页面</a>';
            //oTimebox.html(button);
        }
    }, 1000);

    //根据剩余时间字符串计算出总秒数
    function getTotalSecond(timestr) {
        var reg = /\d+/g;
        var timenums = new Array();
        var r;
        while ((r = reg.exec(timestr)) != null) {
            r = r.toString();
            timenums.push(parseInt(r,10));
        }
        var second = 0, i = 0;
        if (timenums.length == 4) {
            second += timenums[0] * 24 * 3600;
            i = 1;
        }
        second += timenums[i] * 3600 + timenums[++i] * 60 + timenums[++i];
        return second;
    }
    //根据剩余秒数生成时间格式
    function getNewSyTime(sec) {
        var s = sec % 60;
        sec = (sec - s) / 60; //min
        var m = sec % 60;
        sec = (sec - m) / 60; //hour
        var h = sec % 24;
        var d = (sec - h) / 24;//day
        var syTimeStr = "";
        if (d > 0) {
            syTimeStr += d.toString() + "天";
        }
        syTimeStr += ("0" + h.toString()).substr(-2) + "时"
        + ("0" + m.toString()).substr(-2) + "分"
        + ("0" + s.toString()).substr(-2) + "秒";
        return syTimeStr;
    }
});