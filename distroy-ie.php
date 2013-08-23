<?php
/*
Plugin Name: Distroy IE(抛弃IE6&7)
Plugin URI: http://wordpress.org/plugins/distroy-ie/
Description: 本插件将创建一个只在低于IE8版本的IE浏览器上显示“用户正在使用低版本IE”的警告图片，并且提供了10款更好的浏览器下载链接。大家一定觉得奇怪，作为中国互联网络垄断地位的大哥大腾讯旗下的腾讯TT浏览器为何没有在列表里呢？因为，因为腾讯TT用的是IE的Trident内核，如果不升级IE的话，一样不能用，一样慢得人心烦。希望讨厌IE浏览器的开发者喜欢。
Version: 1.2
Author: Michael Wang
Author URI: http://project.qqworld.org
*/

define('DISTROY_IE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('DISTROY_IE_PLUGIN_PATH', str_replace('\\', '/', dirname(__FILE__)) . '/');
if (!is_admin())
	add_action('wp_footer', 'QQWorld_add_distroy_ie');

function QQWorld_add_distroy_ie() {
?>
<!--[if lte IE 7]>
<style>
html, body {
	height: 100%;
}
#destroy_ie {
	position: fixed;
	top: 0;
	left: 0;
	z-index: 10000000;
	width: 640px;
	height: 700px;
}
#destroy_ie a {
	background: url(<?php echo DISTROY_IE_PLUGIN_URL; ?>/close.png);
	width: 52px;
	height: 22px;
	position: absolute;
	top: 0;
	right: 0;
	display: block;
}
#destroy_ie a:hover {
	background-position: left -22px;
}
#destroy_ie_bg {
	background: #000;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	filter: alpha(opacity=50);
	z-index: 9999999;
	cursor: pointer;
}
</style>
<div id="destroy_ie">
	<a id="close_destroy_ie" href="javascript:" title="关闭"></a>
	<img src="<?php echo DISTROY_IE_PLUGIN_URL; ?>/destroy_ie.png" alt="抛弃IE6&7" width="640" height="700" border="0" usemap="#Map" />
	<map name="Map" id="Map">
		<area shape="rect" coords="45,240,145,440" href="http://windows.microsoft.com/zh-cn/internet-explorer/download-ie" title="下载 Internet Exproler" target="_blank" />
		<area shape="rect" coords="160,240,260,440" href="http://www.firefox.com.cn" title="下载 Mozilla Firefox" target="_blank" />
		<area shape="rect" coords="272,240,375,440" href="http://www.google.com/intl/zh-CN/chrome/browser/" title="下载 Google Chrome" target="_blank" />
		<area shape="rect" coords="390,240,485,440" href="http://support.apple.com/kb/DL1531?viewlocale=zh_CN" title="下载 Apple Safari" target="_blank" />
		<area shape="rect" coords="500,240,600,440" href="http://www.opera.com" title="下载 Opera" target="_blank" />
		<area shape="rect" coords="45,455,145,655" href="http://chrome.360.cn" title="下载 360极速浏览器" target="_blank" />
		<area shape="rect" coords="160,455,260,655" href="http://www.theworld.cn" title="下载 世界之窗浏览器" target="_blank" />
		<area shape="rect" coords="273,455,375,655" href="http://ie.sogou.com" title="下载 搜狗浏览器" target="_blank" />
		<area shape="rect" coords="390,455,485,655" href="http://www.maxthon.cn" title="下载 遨游浏览器" target="_blank" />
		<area shape="rect" coords="500,455,600,655" href="http://liulanqi.baidu.com" title="下载 百度浏览器" target="_blank" />
	</map>
</div>
<div id="destroy_ie_bg"></div>
<script>
var distroy_ie = {
	show: function() {
		document.body.scrollTop = 0;
		this.resize();
		this.addEvent();
	},
	resize: function() {
		jQuery('#destroy_ie').css({
			top: (document.body.clientHeight-700)/2+"px",
			left: (document.body.clientWidth-640)/2+"px"
		});
	},
	hide: function() {
		jQuery('#destroy_ie, #destroy_ie_bg').fadeOut('normal');
	},
	addEvent: function() {
		jQuery('#destroy_ie_bg').bind('click', distroy_ie.hide);
		jQuery('#close_destroy_ie').bind('click', distroy_ie.hide);
		window.onresize = this.resize;
	}
}
distroy_ie.show();
</script>
<![endif]-->
<?php
}
?>