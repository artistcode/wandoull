/**

 @Name: layuiNetCompany - 大气风格的网络公司企业模版
 @Author: xuxingyu
 @Copyright: layui.com

 */

layui.define(['jquery', 'element', 'carousel', 'laypage'], function(exports){
  var $ = layui.jquery
  ,element = layui.element
  ,carousel = layui.carousel
  ,laypage = layui.laypage;
  $('.login_out_in').on('click' ,'span' ,function () {
    let event = $(this).attr('lay-even');
    if (event =='login'){
        location.href = '/home/free/login.html';
    }
    if (event == 'register'){
        location.href = '/home/free/register.html';
    }
    console.log(this);
  });
  //轮播渲染
  carousel.render({
    elem: '#banner'
    ,width: '100%'
    ,height: '898px'
    ,arrow: 'always'
  });
  carousel.render({
    elem: '#banners'
    ,width: '100%' //设置容器宽度
    ,arrow: 'always' //始终显示箭头
    //,anim: 'updown' //切换动画方式
  });
  //滚动监听
  $(window).scroll(function() {
    var scr=$(document).scrollTop();
    scr > 0 ? $(".nav").addClass('scroll') : $(".nav").removeClass('scroll');
  });

  //轮播文字
  $(function(){
    $('.banner').children('.title').addClass('active');
  })

  //导航切换
  var btn = $('.nav').find('.nav-list').children('button')
  ,spa = btn.children('span')
  ,ul = $('.nav').find('.nav-list').children('.layui-nav');
  btn.on('click', function(){
    if(!$(spa[0]).hasClass('spa1')){
      spa[0].className = 'spa1';
      spa[1].style.display = 'none';
      spa[2].className = 'spa3';
      $('.nav')[0].style.height = 90 + ul[0].offsetHeight + 'px';
    }else{
      spa[0].className = '';
      spa[1].style.display = 'block';
      spa[2].className = '';
      $('.nav')[0].style.height = 80 + 'px';
    }
  });

  //关于内容
  $('.main-about').find('.aboutab').children('li').each(function(index){
    $(this).on('click', function(){
      $(this).addClass('layui-this').siblings().removeClass('layui-this');
      $('.aboutab').siblings().fadeOut("fast");
      $('.aboutab').siblings().eq(index).fadeIn("");
    });
  });
/*
  //动态分页
  laypage.render({
    elem: 'newsPage'
    ,count: 100
    ,theme: '#2db5a3'
    ,layout: ['page', 'next']
  });

  //案例分页
  laypage.render({
    elem: 'casePage'
    ,count: 50
    ,theme: '#2db5a3'
    ,layout: ['page', 'next']
  });
*/

  //新闻字段截取
  $(function(){
    $(".main-news").find(".content").each(function(){
      var span = $(this).find(".detail").children("span")
      ,spanTxt = span.html();
      if(document.body.clientWidth > 463){
        span.html(spanTxt);
      }else{
        span.html(span.html().substring(0, 42)+ '...')
      };
      $(window).resize(function(){
        if(document.body.clientWidth > 463){
          span.html(spanTxt);
        }else{
          span.html(span.html().substring(0, 42)+ '...')
        };
      });
    });
  });

  exports('firm', {});
});
