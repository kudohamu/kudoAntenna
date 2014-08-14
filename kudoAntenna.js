window.onload = initializer;

var myajax;
var page = '';
var prm = '';
var id = 'hoge';
var animate = '';

var title1 = '1';
var title2 = '2';

var reloadTime = (15 * 60 + 0 * 30) * 1000;
var reloadTime2 = (15 * 60 + 0 * 30) * 1000;

function initializer() {

	externalLinks();
	var maina = document.getElementById("main");
	maina.style.opacity = 0.00;

	document.getElementById('settingsButton').onclick = settingsButtonPush;
	document.getElementById('allCheck').onclick = allCheckButtonPush;
	document.getElementById('allRelease').onclick = allReleaseButtonPush;

	var cataN = document.getElementsByName('catagoryN');
	prms = location.href.split("?")[1];
	
	if (prms != undefined) {
		var prmf = prms.split("&")[0];
		var prmb = prms.split("&")[1];
		if (prmb == undefined) {
			if (prmf.split("=")[0] == "prm") {
				prm = prmf.split("=")[1];
			}else if (prmf.split("=")[0] == "page"){
				page = prmf.split("=")[1];
			}else {
				id = prmf.split("=")[1];
			}
		}else {
			prm = prmf.split("=")[1];
			page = prmb.split("=")[1];
		}
	}

	for (var p = 0; p < cataN.length; p++) {
		cataN[p].onmouseover = (function(val, num) {
			
			return function() {
				var url = '';

				if (val == '0' && (prm != '' || id != 'hoge')) {
					cataN[num].style.backgroundImage = 'url(./images/cata1s.png)';
				}else if (val == '1' && prm != 1) {
					cataN[num].style.backgroundImage = 'url(./images/cata2s.png)';
				}else if (val == '2' && prm != 2) {
					cataN[num].style.backgroundImage = 'url(./images/cata3s.png)';
				}else if (val == '3' && prm != 3) {
					cataN[num].style.backgroundImage = 'url(./images/cata4s.png)';
				}else if (val == '4' && prm != 4) {
					cataN[num].style.backgroundImage = 'url(./images/cata5s.png)';
				}else if (val == '5' && prm != 5) {
					cataN[num].style.backgroundImage = 'url(./images/cata6s.png)';
				}else if (val == '6' && prm != 6) {
					cataN[num].style.backgroundImage = 'url(./images/cata7s.png)';
				}else if (val == '7' && prm != 7) {
					cataN[num].style.backgroundImage = 'url(./images/cata8s.png)';
				}

			};

		})(cataN[p].getAttribute('value'), p);

		cataN[p].onmouseout = (function(val, num) {
			
			return function() {
				var url = '';

				if (val == '0' && (prm != '' || id != 'hoge')) {
					cataN[num].style.backgroundImage = 'url(./images/cata1.png)';
				}else if (val == '1' && prm != 1) {
					cataN[num].style.backgroundImage = 'url(./images/cata2.png)';
				}else if (val == '2' && prm != 2) {
					cataN[num].style.backgroundImage = 'url(./images/cata3.png)';
				}else if (val == '3' && prm != 3) {
					cataN[num].style.backgroundImage = 'url(./images/cata4.png)';
				}else if (val == '4' && prm != 4) {
					cataN[num].style.backgroundImage = 'url(./images/cata5.png)';
				}else if (val == '5' && prm != 5) {
					cataN[num].style.backgroundImage = 'url(./images/cata6.png)';
				}else if (val == '6' && prm != 6) {
					cataN[num].style.backgroundImage = 'url(./images/cata7.png)';
				}else if (val == '7' && prm != 7) {
					cataN[num].style.backgroundImage = 'url(./images/cata8.png)';
				}

			};

		})(cataN[p].getAttribute('value'), p);

		if (p == 0) {
			if (prm == '' && id == 'hoge') {
				cataN[p].style.backgroundImage = 'url(./images/cata1p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata1.png)';
			}
		}else if (p == 1) {
			if (prm == 1) {
				cataN[p].style.backgroundImage = 'url(./images/cata2p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata2.png)';
			}
		}else if (p == 2) {
			if (prm == 2) {
				cataN[p].style.backgroundImage = 'url(./images/cata3p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata3.png)';
			}
		}else if (p == 3) {
			if (prm == 3) {
				cataN[p].style.backgroundImage = 'url(./images/cata4p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata4.png)';
			}
		}else if (p == 4) {
			if (prm == 4) {
				cataN[p].style.backgroundImage = 'url(./images/cata5p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata5.png)';
			}
		}else if (p == 5) {
			if (prm == 5) {
				cataN[p].style.backgroundImage = 'url(./images/cata6p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata6.png)';
			}
		}else if (p == 6) {
			if (prm == 6) {
				cataN[p].style.backgroundImage = 'url(./images/cata7p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata7.png)';
			}
		}else if (p == 7) {
			if (prm == 7) {
				cataN[p].style.backgroundImage = 'url(./images/cata8p.png)';
			}else {
				cataN[p].style.backgroundImage = 'url(./images/cata8.png)';
			}
		}

	}

	$(function() {
		var topBtn = $('#page-top');	
	
		//スクロールしてトップ
	    	topBtn.click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1500);
			return false;
	 	   });
	});

	$(function() {
		var bottomBtn = $('#page-bottom');	
		
		//スクロールしてボトム
		bottomBtn.click(function () {
			$('body,html').animate({
				scrollTop: $('#foot').offset().top
			}, 1500);
			return false;
 		   });
	});

	var allcookies = document.cookie;
	var position = allcookies.indexOf("kudoAntennaOtherBox");
	//var animate = '';
	var result = '';
	if( position != -1 ){
		var startIndex = position + "kudoAntennaOtherBox".length;

        	var endIndex = allcookies.indexOf( ';', startIndex );
       		if( endIndex == -1 ) {
            		endIndex = allcookies.length;
        	}

        	result = decodeURIComponent(allcookies.substring( startIndex, endIndex ) );
    	}
	
	if (result != '') {
		result = result.split("=")[1];
		
		animate = result.split("#")[7];
	}
	//alert(animate);
	//
	setInterval("autoReload2()", reloadTime2);
	if (id != "about" && id != "form") {
		autoReload();
		setInterval("autoReload()", reloadTime);
	}else {
		maina.style.opacity = 1.00;
	}
}


//設定ボタンが押されたときの処理
function settingsButtonPush() {

	var otherStr = "";
	var cnt = 0;

	var gcheckBox = document.genreCheckBox.elements;
	for (var x = 0; x < gcheckBox.length; x++) {
		if (gcheckBox[x].checked) {
			otherStr = otherStr + "checked#";
			cnt++;
		}else {
			otherStr = otherStr + "#";
		}
	}
	
	if (cnt == 0) {
		alert("最低でも1つはジャンルを選んでください。");
		return;
	}
	
	var checkBoxStr = "";
	
	cnt = 0;
	var checkBox = document.blogCheckBox.elements;
	//var num = checkBox.length;
	for (var i = 0; i < checkBox.length; i++) {
		if (checkBox[i].checked) {
			checkBoxStr = checkBoxStr + "checked#";
			cnt++;
		}else {
			checkBoxStr = checkBoxStr + "#";
		}
	}

	if (cnt == 0) {
		alert("最低でも1つはブログを選んでください。");
		return;
	}

	
	var ocheckBox = document.otherCheckBox.elements;
	for (var j = 0; j < ocheckBox.length; j++) {
		if (ocheckBox[j].checked) {
			otherStr = otherStr + "checked#";
		}else {
			otherStr = otherStr + "#";
		}
	}
	
	var acn = document.acform.articleComb.selectedIndex;
	otherStr += document.acform.articleComb.options[acn].value;

	if (document.dispTyp.elements[0].checked) {
		otherStr = otherStr + "#0#";
	}else {
		otherStr = otherStr + "#1#";
	}

	//cookie書き込み
	document.cookie = 'kudoAntennaCheckBox=' + encodeURIComponent(checkBoxStr) + '; expires=Tue, 1-Jan-2030 00:00:00 GMT;';
	document.cookie = 'kudoAntennaOtherBox=' + encodeURIComponent(otherStr) + '; expires=Tue, 1-Jan-2030 00:00:00 GMT;';
	
	//window.location.reload();
	location.href = "./";
}

//指定リンク以外を別窓で開く
function externalLinks() {
	if (!document.getElementsByTagName) return;
	var anchors = document.getElementsByTagName("a");  
	for (var i = 0; i < anchors.length; i++) {  
		var anchor = anchors[i];  
		if (anchor.getAttribute("href") && anchor.getAttribute("rel") != "internal") {
			anchor.target = "_blank";
		}
	}

	var ancs = document.getElementsByTagName('a');
	for (var i = 0; i < ancs.length; i++) {
		ancs[i].onclick = (function(link) {
			return function() {
				//alert(link);
				$.ajax ({
					type:"GET", 
					url:"./clickCount.php", 
					data:"link=" + link, 
					async:false
				});

			};
		})(ancs[i].getAttribute("href"));
	}

}


//自動更新処理＜メイン記事＞
function autoReload() {

	var para = 'p=hoge';
	if (prm != '' && page != '') {
		para = "prm=" + prm + "&page=" + page;
	}else if (prm != '') {
		para = "prm=" + prm;
	}else if (page != '') {
		para = "page=" + page;
	}
		
	var main = document.getElementById("main");

	var articleGet = function() {
		
		$.ajax({
			url: "./displayArticles.php", 
			type:"get", 
			data:para, 
			success: function(data) {
				document.getElementById('main').innerHTML = data;
				externalLinks();
				appear();
			}, 
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				document.getElementById('main').style.opacity = 1.00;
				//alert('通信不具合により記事の自動読み込み機能がオンにできませんでした。記事更新の際は手動でリロードしてください。');
			}
		});
		
	};
	
	
	var appear = function() {
		appear.endTime || (appear.endTime = Date.now() + 1000);
		var ratio = Math.min(1, Math.abs(1 - (appear.endTime - Date.now()) / 1000));
		main.style.opacity = ratio;
		
		if(ratio < 1 && animate == "checked") {		
			setTimeout(appear, 30);
		}else {
			main.style.opacity = 1.00;
		}
	};

	if (main.style.opacity > 0) {
		(function disappear() {
			disappear.endTime || (disappear.endTime = Date.now() + 1000);
			var ratio = Math.max(0, (disappear.endTime - Date.now()) / 1000);

			disappear.endTime2 || (disappear.endTime2 = Date.now() + 500);
			var ratio2 = Math.max(0, (disappear.endTime2 - Date.now()) / 500);

			main.style.opacity = ratio2;
			main.style.top = (300 * (1 - ratio)) + "px";

			if(ratio > 0 && animate == "checked") {
   	       			setTimeout(disappear, 30);
   	     		}else {
				main.style.top = 0 + "px";
				articleGet();
			}
		})();
	
	}else {
		articleGet();
		
	}
	externalLinks();	
}

function allCheckButtonPush() {
	var checkBox = document.blogCheckBox.elements;
	for (var i = 0; i < checkBox.length; i++) {
		checkBox[i].checked = true;
	}
}

function allReleaseButtonPush() {
	var checkBox = document.blogCheckBox.elements;
	for (var i = 0; i < checkBox.length; i++) {
		checkBox[i].checked = false;
	}
}

//自動更新処理＜人気記事＞
function autoReload2() {
	$.ajax({
		url: "./displayPopularArticles.php", 
		type:"get", 
		data:"hoge=hoge", 
		success: function(data) {
			document.getElementById('dpa').innerHTML = data;
			externalLinks();
		}, 
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			//alert('通信不具合により人気記事の自動読み込み機能がオンにできませんでした。人気記事更新の際は手動でリロードしてください。');
		}
	});

}
