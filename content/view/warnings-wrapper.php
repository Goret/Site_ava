<div id="warnings-wrapper">
<!--[if lt IE 8]>
<div id="browser-warning" class="warning warning-red">
<div class="warning-inner2">
Vous utilisez un navigateur qui n'est pas � jour.<br />
<a href="http://eu.blizzard.com/support/article/browserupdate">Mettre � niveau</a> ou <a href="http://www.google.com/chromeframe/?hl=fr-FR" id="chrome-frame-link">installer Firefox</a>.
<a href="#close" class="warning-close" onclick="App.closeWarning('#browser-warning', 'browserWarning'); return false;"></a>
</div>
</div>
<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="http://eu.battle.net/wow/static/local-common/js/third-party/CFInstall.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
var age = 365 * 24 * 60 * 60 * 1000;
var src = 'https://www.google.com/chromeframe/?hl=fr-FR';
if ('http:' == document.location.protocol) {
src = 'http://www.google.com/firefox';
}
document.cookie = "disableGCFCheck=0;path=/;max-age="+age;
$('#chrome-frame-link').bind({
'click': function() {
App.closeWarning('#browser-warning');
CFInstall.check({
mode: 'overlay',
url: src
});
return false;
}
});
});
//]]>
</script>
<![endif]-->
<noscript>
	<div id="javascript-warning" class="warning warning-red">
		<div class="warning-inner2">
			JavaScript doit �tre activ� sur votre navigateur pour afficher ce site !
		</div>
	</div>
</noscript>
</div>