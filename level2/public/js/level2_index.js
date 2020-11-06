/**
 * Created by ziniu on 2016/5/31.
 */
$(function(){
    //var url = 'http://www.maizi.net/miao%20sha%20prepare/level%203/';
    //var url = 'http://www.miaosha_level3.net/';
    var url = 'http://level3.5ihy.com/';
    function check(myphone,mynumber){
        // TODO 添加你的检验规则
        // 检测 手机号
        var myphone_reg = /^(13[0-9]|15[7-9]|153|156|18[7-9])[0-9]{8}$/;
        var myphone_reg_test = myphone_reg.test(myphone);
        if(myphone_reg_test){
            return true;
        }
        alert('你是输入信息有误');
        return false;
    }
    $("#qianggou").click(function(){
        var myphone = $("#myphone").val();
        var mynumber = $("#mynumber").val();
        var data = {'phone':myphone, 'number':mynumber};
        var res = check(myphone,mynumber);
        if(res){
            $.ajax({
                url:url,
                data:data,
                dataType:'jsonp',
                jsonp:'callback',//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
                jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
                success:function(cc){
                    if(cc.msg=='ok'){
                        $.cookie('miao','ok');
                    }
                },
                error:function(){
                    $.cookie('miao',null);
                },
                timeout:300
            });
        }
    });
    // 检测是否秒杀了
    var miao = $.cookie('miao');
    //alert(miao);
    if(miao){
        alert('你已经成功登记');
        //$("#qianggou").remove();
    }
});