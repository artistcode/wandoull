

layui.define(['form', 'upload'], function(exports){
    // 按钮给值

    var $ = layui.$
        , form = layui.form
        , table = layui.table
        , laydate = layui.laydate
        , element = layui.element;
    let data_to = $('button[data-to]');
    $('form').on("click", "[data-to]", function () {
        let that = $(this).attr('data-to');
        let give_val = $(this).attr('data-val');
        let t = $(this).attr('data-t');
        if (t == 1) {
            give_val = $(`input[name*="${that}"]`).val() * give_val;
        }
        $(`input[name*="${that}"]`).val(give_val);

        return false;
    });


    // 获取form提交的数据
    $('body').on("click", 'button[lay-submit]', function () {
        let lay_filter = $(this).parents('form').attr('lay-filter');
        // lay_filter 是form 的
        if (lay_filter == undefined || lay_filter == null) {
            alert('lay-filter未填写');
            return false;
        }
        let form_data = form.val(lay_filter);
        let window_parent = window.parent;
        let currency = window_parent.document.querySelector('#currency');
        $.post('execute', form_data, function (res) {
            if (res){
                layer.msg('发布失败');
            }
            layer.msg(res['msg']);
        });
        $.get('/task/app/getUserInfo',{},function(res){
            currency.innerHTML= `流量币:<font color="red">${res['currency']}</font>`;
        });
        return false;// 阻止默认行为
    });

    $('form').on('click', '.wx_box .wx_label i', function (e) {
        let box = $(this).parents('.wx_box');
        let opt = $(this).attr('opt-type');
        var form  =$(this).parents('form');
        var count = form[0].querySelectorAll('.wx_box').length-1;
        if (opt == 'del') {
            if(count-1){
                box.remove();
            }
        }
        if (opt == 'add') {
            let clone_box = $(this).parents('.wx_box').clone();
            clone_box.find('input').val('');
            box.after(clone_box);
            // 克隆数据
            let task = clone_box.find('input[name*=task]');
            layui.each(task,function(index,item){
                let name = $(item).attr('name');
                    if (/split_time/.test(name)){
                        $(item).val(0);
                    }
                    $(item).attr('name',name.replace(/\d/,count));
            });

        }
    });

    $('form').on('blur','[name*=url]',function(){
        let val = $(this).val();
        let form  = $(this).parents('form').get(0);

        let keywords = form.querySelector('[name*=keywords]');
        let title = form.querySelector('[name*=product_title]');
        let store_title = form.querySelector('[name*=product_title]');
        $.get('get_goods_info',{url:val},function(res){
            title.value = res['title'];
            keywords.value = res['keywords'];

        });
    });
    $('#release_day').on('click','button',function () {
        let text = $(this).text(); //获取button的值
        // 获取split_time
        let form = $(this).parents('form');
        let x = form.find('.send_number');
        let count = form.find('.send_number').length;
    });
    exports('task', {});
});
