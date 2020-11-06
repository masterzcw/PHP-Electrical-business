/**
 * Created by ziniu on 2016/5/31.
 */
$(function(){
    var url = 'http://www.maizi.net/miao%20sha%20prepare/level%203/';
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
            $.post(url,data,function(msg){
                // TODO
                if(msg=='ok'){// 已经提交了
                    $.data('miao','ok');
                }else{
                    $.data('miao',null);
                }
            });
        }
    });
    // 检测是否秒杀了
    var miao = $.data('miao');
    if(miao){
        alert('你已经成功登记');
        //$("#qianggou").remove();
    }
});