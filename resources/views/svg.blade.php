﻿<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Орг структура | My.cic.kz</title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-29153373-9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-29153373-9');
    </script>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font awesome-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap animations -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">
<style>
.pointer{
	cursor: pointer;
}
.zi-2{
	z-index: 2;
}
.menu-content{
	/*display: none;*/
	position: absolute;
	margin-top: 3rem;
	width: 100%;
	border: 1px solid black;
}
.menu-content section{
	width: 100%;
}
.menu-content option{
	background: #4974cc;
	width: 100%;
}
.menu-hover:hover + .menu-content{
	display: block;
}
.menu-content:hover{
	display: block;
}
.none{
	display: none;
}
.pointer{
	cursor: pointer;
}
</style>
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
@include('layouts.header')
<div id="app">
	<name></name>
</div>

<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
<!-- Создано Microsoft Visio 11.0, Экспорт SVG, версия 1.0 орг структура от 03.02.2020.svg Страница-1 -->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events"
		xmlns:v="http://schemas.microsoft.com/visio/2003/SVGExtensions/" width="11.6929in" height="16.0354in"
		viewBox="0 0 841.89 1154.55" xml:space="preserve" color-interpolation-filters="sRGB" class="st42"
		style="	width : 100%;
				height : auto;
				margin-top : 35px;"
		
		>
	<v:documentProperties v:langID="1049" v:metric="true" v:viewMarkup="false">
		<v:userDefs>
			<v:ud v:nameU="msvNoAutoConnect" v:val="VT0(1):26"/>
		</v:userDefs>
	</v:documentProperties>

	<style type="text/css">
	<![CDATA[
		.st1 {visibility:visible}
		.st2 {fill:#464646;filter:url(#filter_2);stroke:#464646}
		.st3 {fill:url(#grad0-7);stroke:#000000;stroke-width:2.25}
		.st4 {fill:#002060;font-family:Times New Roman;font-size:1.00001em;font-weight:bold}
		.st5 {font-size:1em}
		.st6 {fill:url(#grad0-7);stroke:#000000;stroke-width:1.5}
		.st7 {fill:#002060;font-family:Times New Roman;font-size:0.666664em;font-weight:bold}
		.st8 {fill:#464646;filter:url(#filter_2);stroke:#464646;stroke-dasharray:3,3}
		.st9 {fill:url(#grad0-7);stroke:#000000;stroke-dasharray:3,3;stroke-width:1}
		.st10 {marker-end:url(#mrkr5-98);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.75}
		.st11 {fill:#000000;fill-opacity:1;stroke:#000000;stroke-opacity:1;stroke-width:0.22935779816514}
		.st12 {marker-end:url(#mrkr5-123);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.25}
		.st13 {fill:#000000;fill-opacity:1;stroke:#000000;stroke-opacity:1;stroke-width:0.47169811320755}
		.st14 {fill:url(#grad0-148);stroke:#000000;stroke-width:1.5}
		.st15 {fill:url(#grad0-157);stroke:#000000;stroke-width:1.5}
		.st16 {fill:url(#grad0-166);stroke:#000000;stroke-width:1.5}
		.st17 {fill:url(#grad0-157);stroke:#000000;stroke-width:0.75}
		.st18 {fill:url(#grad0-166);stroke:#000000;stroke-width:0.5}
		.st19 {fill:#5b9bd5;fill-opacity:0.22;filter:url(#filter_2);stroke:#5b9bd5;stroke-opacity:0.22}
		.st20 {fill:#dce6fe;stroke:#000000;stroke-width:0.5}
		.st21 {fill:url(#grad0-233);stroke:#000000;stroke-width:0.75}
		.st22 {fill:url(#grad0-233);stroke:#000000;stroke-width:1.5}
		.st23 {fill:url(#grad0-265);stroke:#000000;stroke-width:1.5}
		.st24 {fill:url(#grad0-274);stroke:#000000;stroke-width:1.5}
		.st25 {fill:url(#grad0-284);stroke:#000000;stroke-width:0.5}
		.st26 {fill:url(#grad0-284);stroke:#000000;stroke-width:1}
		.st27 {marker-end:url(#mrkr5-345);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st28 {fill:#000000;fill-opacity:1;stroke:#000000;stroke-opacity:1;stroke-width:0.28409090909091}
		.st29 {fill:none;stroke:none;stroke-width:0.25}
		.st30 {marker-end:url(#mrkr5-435);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.5}
		.st31 {fill:#000000;fill-opacity:1;stroke:#000000;stroke-opacity:1;stroke-width:0.16556291390728}
		.st32 {stroke:#5b9bd5;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st33 {stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st34 {marker-end:url(#mrkr5-496);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st35 {fill:#000000;fill-opacity:1;stroke:#000000;stroke-opacity:1;stroke-width:0.37313432835821}
		.st36 {fill:url(#grad0-265);stroke:#000000;stroke-width:0.5}
		.st37 {fill:url(#grad0-148);stroke:#000000;stroke-width:0.75}
		.st38 {marker-end:url(#mrkr5-755);stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st39 {stroke:#5b9bd5;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.75}
		.st40 {stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.75}
		.st41 {fill:#9dbb61;stroke:#000000;stroke-width:1.5}
		.st42 {fill:none;fill-rule:evenodd;font-size:12px;overflow:visible;stroke-linecap:square;stroke-miterlimit:3}
	]]>
	</style>

	<defs id="Patterns_And_Gradients">
		<linearGradient id="grad0-7" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#ffffff" stop-opacity="1"/>
			<stop offset="1" stop-color="#b4b4b4" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-95" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#bfcee1" stop-opacity="1"/>
			<stop offset="1" stop-color="#96afcf" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-148" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#c2b6d1" stop-opacity="1"/>
			<stop offset="1" stop-color="#ab9ac0" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-157" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#fff2cc" stop-opacity="1"/>
			<stop offset="1" stop-color="#ffcd35" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-166" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#b0dbe6" stop-opacity="1"/>
			<stop offset="1" stop-color="#92cddc" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-233" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#b8cd8b" stop-opacity="1"/>
			<stop offset="1" stop-color="#9dbb61" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-265" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#f4b183" stop-opacity="1"/>
			<stop offset="1" stop-color="#cd5c12" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-274" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#deebf6" stop-opacity="1"/>
			<stop offset="1" stop-color="#67a4d6" stop-opacity="1"/>
		</linearGradient>
		<linearGradient id="grad0-284" x1="0" y1="0" x2="1" y2="0" gradientTransform="rotate(270 0.5 0.5)">
			<stop offset="0" stop-color="#dce6fe" stop-opacity="1"/>
			<stop offset="1" stop-color="#497efa" stop-opacity="1"/>
		</linearGradient>
	</defs>
	<defs id="Markers">
		<g id="lend5">
			<path d="M 2 1 L 0 0 L 1.98117 -0.993387 C 1.67173 -0.364515 1.67301 0.372641 1.98465 1.00043 " style="stroke:none"/>
		</g>
		<marker id="mrkr5-98" class="st11" v:arrowType="5" v:arrowSize="2" v:setback="7.63" refX="-7.63" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-4.36,-4.36) "/>
		</marker>
		<marker id="mrkr5-123" class="st13" v:arrowType="5" v:arrowSize="2" v:setback="3.71" refX="-3.71" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-2.12,-2.12) "/>
		</marker>
		<marker id="mrkr5-345" class="st28" v:arrowType="5" v:arrowSize="2" v:setback="6.16" refX="-6.16" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-3.52,-3.52) "/>
		</marker>
		<marker id="mrkr5-435" class="st31" v:arrowType="5" v:arrowSize="2" v:setback="10.57" refX="-10.57" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-6.04,-6.04) "/>
		</marker>
		<marker id="mrkr5-496" class="st35" v:arrowType="5" v:arrowSize="2" v:setback="4.69" refX="-4.69" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-2.68,-2.68) "/>
		</marker>
		<marker id="mrkr5-755" class="st28" v:arrowType="5" v:arrowSize="2" v:setback="0" refX="-0" orient="auto"
				markerUnits="strokeWidth" overflow="visible">
			<use xlink:href="#lend5" transform="scale(-3.52,-3.52) "/>
		</marker>
	</defs>
	<defs id="Filters">
		<filter id="filter_2">
			<feGaussianBlur stdDeviation="2"/>
		</filter>
	</defs>
	<g v:mID="0" v:index="1" v:groupContext="foregroundPage">
		<title>Страница-1</title>
		<v:pageProperties v:drawingScale="0.0393701" v:pageScale="0.0393701" v:drawingUnits="24" v:shadowOffsetX="8.50394"
				v:shadowOffsetY="-8.50394"/>
		<v:layer v:name="Блок-схема" v:index="0"/>
		<v:layer v:name="Соединительная линия" v:index="1"/>
		<g id="shape1-1" v:mID="1" v:groupContext="shape" v:layerMember="0" transform="translate(330.087,-1072.48)">
			<title>Лист.1</title>
			<desc>Общее собрание акционеров</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="78.6594" cy="1137.52" width="157.32" height="34.0713"/>
			<g id="shadow1-2" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1120.48" width="157.319" height="34.0713" class="st2"/>
			</g>
			<rect x="0" y="1120.48" width="157.319" height="34.0713" class="st3"/>
			<text x="34.52" y="1133.92" class="st4" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Общее собрание <tspan
						x="46.59" dy="1.2em" class="st5">акционеров</tspan></text>		</g>
		<g id="shape2-10" v:mID="2" v:groupContext="shape" v:layerMember="0" transform="translate(330.087,-1021.98)">
			<title>Лист.2</title>
			<desc>Совет директоров</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="78.6594" cy="1139.27" width="157.32" height="30.5693"/>
			<g id="shadow2-11" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1123.98" width="157.319" height="30.5693" class="st2"/>
			</g>
			<rect x="0" y="1123.98" width="157.319" height="30.5693" class="st3"/>
			<text x="29.5" y="1142.87" class="st4" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Совет директоров</text>		</g>
		<g id="shape3-17" v:mID="3" v:groupContext="shape" v:layerMember="0" transform="translate(330.087,-982.694)">
			<title>Лист.3</title>
			<desc>Правление</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="78.6594" cy="1143.11" width="157.32" height="22.8827"/>
			<g id="shadow3-18" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1131.67" width="157.319" height="22.8827" class="st2"/>
			</g>
			<rect x="0" y="1131.67" width="157.319" height="22.8827" class="st3"/>
			<text x="48.81" y="1146.73" class="st4" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Правление</text>		</g>
		<g id="shape4-24" v:mID="4" v:groupContext="shape" v:layerMember="0" transform="translate(319.806,-935.788)">
			<title>Лист.4</title>
			<desc>Председатель Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="88.9406" cy="1141.97" width="177.89" height="25.1548"/>
			<g id="shadow4-25" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1129.4" width="177.881" height="25.1548" class="st2"/>
			</g>
			<rect x="0" y="1129.4" width="177.881" height="25.1548" class="st3"/>
			<text x="19.79" y="1145.59" class="st4" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Председатель Правления</text>		</g>
		<g id="shape5-31" v:mID="5" v:groupContext="shape" v:layerMember="0" transform="translate(531.833,-1012.14)">
			<title>Лист.5</title>
			<desc>Комитет по вопросам стратегического планирования, кадров и во...</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="71.5085" cy="1132.13" width="143.02" height="44.8377"/>
			<g id="shadow5-32" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1109.71" width="143.017" height="44.8377" class="st2"/>
			</g>
			<rect x="0" y="1109.71" width="143.017" height="44.8377" class="st6"/>
			<text x="32.38" y="1120.13" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Комитет по вопросам <tspan
						x="13.44" dy="1.2em" class="st5">стратегического планирования</tspan>, <tspan x="21.46" dy="1.2em"
						class="st5">кадров и вознаграждений и <v:newlineChar/></tspan><tspan x="25.12" dy="1.2em" class="st5">по социальным вопросам</tspan></text>		</g>
		<g id="shape6-41" v:mID="6" v:groupContext="shape" v:layerMember="0" transform="translate(531.135,-1088.36)">
			<title>Лист.6</title>
			<desc>Совет по управлению активами и пассивами</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="71.5085" cy="1145.46" width="143.02" height="18.1918"/>
			<g id="shadow6-42" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="143.017" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="143.017" height="18.1918" class="st6"/>
			<text x="9.97" y="1143.06" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Совет по управлению активами и <tspan
						x="52.16" dy="1.2em" class="st5">пассивами</tspan></text>		</g>
		<g id="shape7-49" v:mID="7" v:groupContext="shape" v:layerMember="0" transform="translate(531.833,-1064.09)">
			<title>Лист.7</title>
			<desc>Андеррайтинговый совет</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="71.5085" cy="1145.97" width="143.02" height="17.1621"/>
			<g id="shadow7-50" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="143.017" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="143.017" height="17.1621" class="st6"/>
			<text x="25.11" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Андеррайтинговый совет</text>		</g>
		<g id="shape8-56" v:mID="8" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-1042.09)">
			<title>Лист.8</title>
			<desc>Комплаенс-контролер</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1145.34" width="141.74" height="18.4252"/>
			<g id="shadow8-57" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st2"/>
			</g>
			<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st6"/>
			<text x="30.46" y="1147.75" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Комплаенс-контролер  </text>		</g>
		<g id="shape9-63" v:mID="9" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-1088.25)">
			<title>Лист.9</title>
			<desc>Служба внутреннего аудита</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1145.34" width="141.74" height="18.4252"/>
			<g id="shadow9-64" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st2"/>
			</g>
			<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st6"/>
			<text x="19.91" y="1147.75" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Служба внутреннего аудита</text>		</g>
		<g id="shape10-70" v:mID="10" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-997.304)">
			<title>Лист.10</title>
			<desc>Комитет по продажам</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1147.46" width="141.74" height="14.1732"/>
			<g id="shadow10-71" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st8"/>
			</g>
			<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st9"/>
			<text x="30.75" y="1149.88" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Комитет по продажам</text>		</g>
		<g id="shape11-77" v:mID="11" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-980.712)">
			<title>Лист.11</title>
			<desc>Выплатной комитет</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1147.46" width="141.74" height="14.1732"/>
			<g id="shadow11-78" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st8"/>
			</g>
			<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st9"/>
			<text x="33.91" y="1149.88" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Выплатной комитет</text>		</g>
		<g id="shape12-84" v:mID="12" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-964.121)">
			<title>Лист.12</title>
			<desc>Комитет по рискам</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1147.46" width="141.74" height="14.1732"/>
			<g id="shadow12-85" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st8"/>
			</g>
			<path d="M0 1154.55 L141.73 1154.55 L141.73 1140.38 L0 1140.38 L0 1154.55 Z" class="st9"/>
			<text x="35.59" y="1149.88" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Комитет по рискам</text>		</g>
		<g id="shape13-91" v:mID="13" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-1037.2)">
			<title>Лист.13</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.48 L-24.44 1154.48 L-24.44 1140.45 L-40.38 1140.45" class="st10"/>
		</g>
		<g id="shape14-99" v:mID="14" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-998.054)">
			<title>Лист.14</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1158.47 L-23.97 1158.47 L-23.97 1164.81 L-40.38 1164.81" class="st10"/>
		</g>
		<g id="shape15-105" v:mID="15" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-994.136)">
			<title>Лист.15</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-23.97 1154.55 L-23.97 1177.48 L-40.38 1177.48" class="st10"/>
		</g>
		<g id="shape16-111" v:mID="16" v:groupContext="shape" v:layerMember="1" transform="translate(487.406,-1037.27)">
			<title>Лист.16</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L27.28 1154.55 L27.28 1094.36 L38.01 1094.36" class="st10"/>
		</g>
		<g id="shape17-117" v:mID="17" v:groupContext="shape" v:layerMember="1" transform="translate(401.66,-1021.98)">
			<title>Лист.17</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L7.09 1162.61" class="st12"/>
		</g>
		<g id="shape18-124" v:mID="18" v:groupContext="shape" v:layerMember="1" transform="translate(487.406,-1037.27)">
			<title>Лист.18</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L27.28 1154.55 L27.28 1119.15 L38.7 1119.15" class="st10"/>
		</g>
		<g id="shape19-130" v:mID="19" v:groupContext="shape" v:layerMember="1" transform="translate(401.66,-1072.48)">
			<title>Лист.19</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L7.09 1166.14" class="st12"/>
		</g>
		<g id="shape20-136" v:mID="20" v:groupContext="shape" v:layerMember="1" transform="translate(401.66,-982.694)">
			<title>Лист.20</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L7.09 1167.95" class="st12"/>
		</g>
		<g id="shape21-142" v:mID="21" v:groupContext="shape" v:layerMember="0" transform="translate(287.916,-878.709)">
			<title>Лист.21</title>
			<desc>Заместитель Председателя Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="49.6063" cy="1139.98" width="99.22" height="29.1454"/>
			<g id="shadow21-143" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st2"/>
			</g>
			<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st14"/>
			<text x="26.85" y="1137.56" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Заместитель <tspan
						x="3.46" dy="1.204em" class="st5">Председателя Правления </tspan> </text>		</g>
		<g id="shape22-151" v:mID="22" v:groupContext="shape" v:layerMember="0" transform="translate(161.977,-880.888)">
			<title>Лист.22</title>
			<desc>Заместитель Председателя Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="49.6063" cy="1139.98" width="99.22" height="29.1454"/>
			<g id="shadow22-152" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st2"/>
			</g>
			<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st15"/>
			<text x="26.85" y="1137.58" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Заместитель <tspan
						x="3.46" dy="1.2em" class="st5">Председателя Правления </tspan> </text>		</g>
		<g id="shape23-160" v:mID="23" v:groupContext="shape" v:layerMember="0" transform="translate(26.9057,-854.29)">
			<title>Лист.23</title>
			<desc>Главный бухгалтер</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1145.46" width="103.69" height="18.1918"/>
			<g id="shadow23-161" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="103.687" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="103.687" height="18.1918" class="st16"/>
			<text x="16.14" y="1147.87" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Главный бухгалтер</text>		</g>
		<g id="shape24-168" v:mID="24" v:groupContext="shape" v:layerMember="0" transform="translate(289.536,-702.789)">
			<title>Лист.24</title>
			<desc>Юридический департамент</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="49.6063" cy="1143.82" width="99.22" height="21.4526"/>
			<g id="shadow24-169" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="99.2126" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="99.2126" height="21.4526" class="st14"/>
			<text x="23.52" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Юридический <tspan
						x="26.54" dy="1.2em" class="st5">департамент</tspan></text>		</g>
		<g id="shape25-176" v:mID="25" v:groupContext="shape" v:layerMember="0" transform="translate(170.035,-810.292)">
			<title>Лист.25</title>
			<desc>Департамент корпоративного страхования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1140.25" width="87.94" height="28.6034"/>
			<g id="shadow25-177" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st2"/>
			</g>
			<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st17"/>
			<text x="20.17" y="1133.05" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="14.36" dy="1.2em" class="st5">корпоративного </tspan><tspan x="21.07" dy="1.2em" class="st5">страхования </tspan> </text>		</g>
		<g id="shape26-185" v:mID="26" v:groupContext="shape" v:layerMember="0" transform="translate(170.035,-775.15)">
			<title>Лист.26</title>
			<desc>Управление страхования ответственности</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1140.25" width="87.94" height="28.6034"/>
			<g id="shadow26-186" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st2"/>
			</g>
			<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st17"/>
			<text x="21.94" y="1133.05" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="21.07" dy="1.2em" class="st5">страхования </tspan><tspan x="13.77" dy="1.2em" class="st5">ответственности</tspan></text>		</g>
		<g id="shape27-194" v:mID="27" v:groupContext="shape" v:layerMember="0" transform="translate(39.2881,-792.011)">
			<title>Лист.27</title>
			<desc>Операционный департамент</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1144.64" width="92.41" height="19.8185"/>
			<g id="shadow27-195" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st2"/>
			</g>
			<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st16"/>
			<text x="18.14" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Операционный <tspan
						x="23.14" dy="1.2em" class="st5">департамент </tspan> </text>		</g>
		<g id="shape28-202" v:mID="28" v:groupContext="shape" v:layerMember="0" transform="translate(50.1358,-744.531)">
			<title>Лист.28</title>
			<desc>Управление администрирования страховой деятельности</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="40.7786" cy="1134.28" width="81.56" height="40.5523"/>
			<g id="shadow28-203" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1114" width="81.5571" height="40.5523" class="st2"/>
			</g>
			<rect x="0" y="1114" width="81.5571" height="40.5523" class="st18"/>
			<text x="18.75" y="1122.28" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="3.69" dy="1.2em" class="st5">администрирования </tspan><tspan x="22.35" dy="1.2em" class="st5">страховой </tspan><tspan
						x="16.37" dy="1.2em" class="st5">деятельности</tspan></text>		</g>
		<g id="shape29-212" v:mID="29" v:groupContext="shape" v:layerMember="0" transform="translate(50.5294,-714.719)">
			<title>Лист.29</title>
			<desc>Управление расчетов и платежей</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="40.0319" cy="1143.11" width="80.07" height="22.8827"/>
			<g id="shadow29-213" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1131.67" width="80.0637" height="22.8827" class="st2"/>
			</g>
			<rect x="0" y="1131.67" width="80.0637" height="22.8827" class="st18"/>
			<text x="18" y="1140.71" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="2.3" dy="1.2em" class="st5">расчетов и платежей </tspan> </text>		</g>
		<g id="shape30-220" v:mID="30" v:groupContext="shape" v:layerMember="0" transform="translate(705.769,-611.055)">
			<title>Лист.30</title>
			<desc>Управление активных продаж</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1144.64" width="87.94" height="19.8185"/>
			<g id="shadow30-221" v:groupContext="shadow" v:shadowOffsetX="0.3456" v:shadowOffsetY="-1.9728" v:shadowType="1"
					transform="matrix(1,0,0,1,0.3456,1.9728)" class="st1">
				<rect x="0" y="1134.73" width="87.932" height="19.8185" class="st19"/>
			</g>
			<rect x="0" y="1134.73" width="87.932" height="19.8185" class="st20"/>
			<text x="2.77" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление активных <tspan
						x="30.51" dy="1.2em" class="st5">продаж</tspan></text>		</g>
		<g id="shape31-227" v:mID="31" v:groupContext="shape" v:layerMember="0" transform="translate(438.689,-832.828)">
			<title>Лист.31</title>
			<desc>Управление контроля выплат</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="47.0115" cy="1144.64" width="94.03" height="19.8185"/>
			<g id="shadow31-228" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.73" width="94.0231" height="19.8185" class="st2"/>
			</g>
			<rect x="0" y="1134.73" width="94.0231" height="19.8185" class="st21"/>
			<text x="6.78" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление контроля <tspan
						x="33.21" dy="1.2em" class="st5">выплат</tspan></text>		</g>
		<g id="shape32-236" v:mID="32" v:groupContext="shape" v:layerMember="0" transform="translate(429.024,-856.728)">
			<title>Лист.32</title>
			<desc>Департамент страховых выплат</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1143.82" width="103.69" height="21.4526"/>
			<g id="shadow32-237" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="103.687" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="103.687" height="21.4526" class="st22"/>
			<text x="7.8" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент страховых <tspan
						x="38.05" dy="1.2em" class="st5">выплат</tspan></text>		</g>
		<g id="shape33-244" v:mID="33" v:groupContext="shape" v:layerMember="0" transform="translate(438.689,-808.927)">
			<title>Лист.33</title>
			<desc>Управление аварийного комиссариата</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1144.64" width="92.41" height="19.8185"/>
			<g id="shadow33-245" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st2"/>
			</g>
			<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st21"/>
			<text x="2.06" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление аварийного <tspan
						x="20.82" dy="1.2em" class="st5">комиссариата</tspan></text>		</g>
		<g id="shape34-252" v:mID="34" v:groupContext="shape" v:layerMember="0" transform="translate(428.433,-598.998)">
			<title>Лист.34</title>
			<desc>Служба аджастеров</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.529" cy="1147.46" width="103.06" height="14.1732"/>
			<g id="shadow34-253" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1140.38" width="103.058" height="14.1732" class="st2"/>
			</g>
			<rect x="0" y="1140.38" width="103.058" height="14.1732" class="st22"/>
			<text x="15.67" y="1149.86" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Служба аджастеров  </text>		</g>
		<g id="shape35-259" v:mID="35" v:groupContext="shape" v:layerMember="0" transform="translate(570.783,-853.415)">
			<title>Лист.35</title>
			<desc>Департамент андеррайтинга</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="47.8803" cy="1143.82" width="95.77" height="21.4526"/>
			<g id="shadow35-260" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="95.7605" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="95.7605" height="21.4526" class="st23"/>
			<text x="24.09" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="20.63" dy="1.2em" class="st5">андеррайтинга </tspan> </text>		</g>
		<g id="shape36-268" v:mID="36" v:groupContext="shape" v:layerMember="0" transform="translate(700.131,-659.32)">
			<title>Лист.36</title>
			<desc>Департамент страхового посредничества</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1138.64" width="92.41" height="31.8231"/>
			<g id="shadow36-269" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1122.73" width="92.4048" height="31.8231" class="st2"/>
			</g>
			<rect x="0" y="1122.73" width="92.4048" height="31.8231" class="st24"/>
			<text x="22.41" y="1131.44" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="26.26" dy="1.2em" class="st5">страхового </tspan><tspan x="17.56" dy="1.2em" class="st5">посредничества </tspan> </text>		</g>
		<g id="shape37-278" v:mID="37" v:groupContext="shape" v:layerMember="0" transform="translate(707.576,-634.906)">
			<title>Лист.37</title>
			<desc>Управления страхования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.0623" cy="1144.59" width="86.13" height="19.9261"/>
			<g id="shadow37-279" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.63" width="86.1245" height="19.9261" class="st2"/>
			</g>
			<rect x="0" y="1134.63" width="86.1245" height="19.9261" class="st25"/>
			<text x="20.64" y="1142.19" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управления <tspan
						x="20.16" dy="1.2em" class="st5">страхования</tspan></text>		</g>
		<g id="shape38-287" v:mID="38" v:groupContext="shape" v:layerMember="0" transform="translate(700.553,-695.745)">
			<title>Лист.38</title>
			<desc>Управление системного администрирования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="45.7803" cy="1143.82" width="91.57" height="21.4526"/>
			<g id="shadow38-288" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="91.5606" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="91.5606" height="21.4526" class="st26"/>
			<text x="2.31" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление системного <tspan
						x="8.69" dy="1.2em" class="st5">администрирования</tspan></text>		</g>
		<g id="shape39-295" v:mID="39" v:groupContext="shape" v:layerMember="0" transform="translate(37.0885,-818.758)">
			<title>Лист.39</title>
			<desc>Департамент бухгалтерского учета и анализа</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.7523" cy="1140.25" width="93.51" height="28.6034"/>
			<g id="shadow39-296" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.95" width="93.5047" height="28.6034" class="st2"/>
			</g>
			<rect x="0" y="1125.95" width="93.5047" height="28.6034" class="st16"/>
			<text x="22.96" y="1133.05" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="4.53" dy="1.2em" class="st5">бухгалтерского учета и </tspan><tspan x="32.29" dy="1.2em" class="st5">анализа</tspan></text>		</g>
		<g id="shape40-304" v:mID="40" v:groupContext="shape" v:layerMember="0" transform="translate(162.206,-746.935)">
			<title>Лист.40</title>
			<desc>Департамент перестрахования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="47.8803" cy="1143.82" width="95.77" height="21.4526"/>
			<g id="shadow40-305" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="95.7605" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="95.7605" height="21.4526" class="st15"/>
			<text x="24.09" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="16.9" dy="1.2em" class="st5">перестрахования</tspan></text>		</g>
		<g id="shape41-312" v:mID="41" v:groupContext="shape" v:layerMember="0" transform="translate(699.709,-783.392)">
			<title>Лист.41</title>
			<desc>Департамент программирования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1144.64" width="92.41" height="19.8185"/>
			<g id="shadow41-313" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st2"/>
			</g>
			<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st26"/>
			<text x="22.41" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="10.72" dy="1.2em" class="st5">программирования</tspan></text>		</g>
		<g id="shape42-320" v:mID="42" v:groupContext="shape" v:layerMember="1" transform="translate(487.406,-1030.46)">
			<title>Лист.42</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1147.75 L38.7 1147.25" class="st10"/>
		</g>
		<g id="shape43-326" v:mID="43" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-1037.27)">
			<title>Лист.43</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-24.44 1154.55 L-24.44 1094.36 L-40.38 1094.36" class="st10"/>
		</g>
		<g id="shape44-332" v:mID="44" v:groupContext="shape" v:layerMember="0" transform="translate(428.433,-641.243)">
			<title>Лист.44</title>
			<desc>Отдел Сontact - center</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1145.97" width="103.69" height="17.1621"/>
			<g id="shadow44-333" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st22"/>
			<text x="12.18" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел Сontact - center</text>		</g>
		<g id="shape45-339" v:mID="45" v:groupContext="shape" v:layerMember="1" transform="translate(123.507,-893.983)">
			<title>Лист.45</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L15.75 1154.55 L15.75 1185.15 L13.25 1185.15" class="st27"/>
		</g>
		<g id="shape46-346" v:mID="46" v:groupContext="shape" transform="translate(220.567,-1113.67)">
			<title>Лист.46</title>
			<desc>Организационная структура АО «СК «Сентрас Иншуранс»</desc>
			<v:textBlock v:margins="rect(4,4,4,4)" v:tabSpace="42.5197"/>
			<v:textRect cx="198.817" cy="1143.11" width="397.64" height="22.8827"/>
			<rect x="0" y="1131.67" width="397.633" height="22.8827" class="st29"/>
			<text x="36.77" y="1146.74" class="st4" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Организационная структура АО «СК «Сентрас Иншуранс»</text>		</g>
		<g id="shape47-349" v:mID="47" v:groupContext="shape" v:layerMember="0" transform="translate(706.123,-575.198)">
			<title>Лист.47</title>
			<desc>Отдел статистики и учёта договоров страхования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.7891" cy="1138.64" width="87.58" height="31.8231"/>
			<g id="shadow47-350" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1122.73" width="87.5781" height="31.8231" class="st2"/>
			</g>
			<rect x="0" y="1122.73" width="87.5781" height="31.8231" class="st25"/>
			<text x="7.7" y="1131.44" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел статистики и <tspan
						x="14.41" dy="1.2em" class="st5">учёта договоров </tspan><tspan x="20.89" dy="1.2em" class="st5">страхования</tspan></text>		</g>
		<g id="shape48-358" v:mID="48" v:groupContext="shape" v:layerMember="1" transform="translate(743.552,-647.746)">
			<title>Лист.48</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
		</g>
		<g id="shape49-359" v:mID="49" v:groupContext="shape" v:layerMember="0" transform="translate(695.753,-882.699)">
			<title>Лист.49</title>
			<desc>Советник Председателя Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="48.6024" cy="1141.97" width="97.21" height="25.1548"/>
			<g id="shadow49-360" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1129.4" width="97.2049" height="25.1548" class="st2"/>
			</g>
			<rect x="0" y="1129.4" width="97.2049" height="25.1548" class="st24"/>
			<text x="5.04" y="1139.57" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Советник Председателя <tspan
						x="28.31" dy="1.2em" class="st5">Правления</tspan></text>		</g>
		<g id="shape50-367" v:mID="50" v:groupContext="shape" v:layerMember="1" transform="translate(475.33,-738.916)">
			<title>Лист.50</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
		</g>
		<g id="shape51-368" v:mID="51" v:groupContext="shape" v:layerMember="0" transform="translate(26.9057,-879.411)">
			<title>Лист.51</title>
			<desc>Заместитель Председателя Правления по финансам</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1139.98" width="103.69" height="29.1454"/>
			<g id="shadow51-369" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.41" width="103.687" height="29.1454" class="st2"/>
			</g>
			<rect x="0" y="1125.41" width="103.687" height="29.1454" class="st16"/>
			<text x="3.23" y="1137.58" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Заместитель Председателя <tspan
						x="7.07" dy="1.2em" class="st5">Правления по финансам</tspan></text>		</g>
		<g id="shape52-376" v:mID="52" v:groupContext="shape" v:layerMember="0" transform="translate(439.678,-721.799)">
			<title>Лист.52</title>
			<desc>Отдел кадров</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1147.46" width="92.41" height="14.1732"/>
			<g id="shadow52-377" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1140.38" width="92.4048" height="14.1732" class="st2"/>
			</g>
			<rect x="0" y="1140.38" width="92.4048" height="14.1732" class="st21"/>
			<text x="21.37" y="1149.86" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел кадров</text>		</g>
		<g id="shape53-383" v:mID="53" v:groupContext="shape" v:layerMember="0" transform="translate(428.487,-741.911)">
			<title>Лист.53</title>
			<desc>HR-управление</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1145.97" width="103.69" height="17.1621"/>
			<g id="shadow53-384" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st22"/>
			<text x="23.42" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>HR-управление</text>		</g>
		<g id="shape54-390" v:mID="54" v:groupContext="shape" v:layerMember="0" transform="translate(26.9057,-686.338)">
			<title>Лист.54</title>
			<desc>Административное управление</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1143.82" width="103.69" height="21.4526"/>
			<g id="shadow54-391" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="103.687" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="103.687" height="21.4526" class="st16"/>
			<text x="16.82" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Административное <tspan
						x="30.75" dy="1.2em" class="st5">управление</tspan></text>		</g>
		<g id="shape55-398" v:mID="55" v:groupContext="shape" v:layerMember="0" transform="translate(568.985,-773.827)">
			<title>Лист.55</title>
			<desc>Управление стратегического анализа</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="48.6024" cy="1141.4" width="97.21" height="26.3104"/>
			<g id="shadow55-399" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1128.24" width="97.2049" height="26.3104" class="st2"/>
			</g>
			<rect x="0" y="1128.24" width="97.2049" height="26.3104" class="st23"/>
			<text x="26.57" y="1139" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="3.39" dy="1.2em" class="st5">стратегического анализа</tspan></text>		</g>
		<g id="shape56-406" v:mID="56" v:groupContext="shape" v:layerMember="0" transform="translate(439.678,-697.669)">
			<title>Лист.56</title>
			<desc>Отдел развития персонала</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1145.46" width="92.41" height="18.1918"/>
			<g id="shadow56-407" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="92.4048" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="92.4048" height="18.1918" class="st21"/>
			<text x="17.35" y="1143.06" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел развития <tspan
						x="27.57" dy="1.2em" class="st5">персонала</tspan></text>		</g>
		<g id="shape57-414" v:mID="57" v:groupContext="shape" v:layerMember="0" transform="translate(288.071,-754.828)">
			<title>Лист.57</title>
			<desc>Департамент регионального развития</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="49.6063" cy="1141.97" width="99.22" height="25.1548"/>
			<g id="shadow57-415" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1129.4" width="99.2126" height="25.1548" class="st2"/>
			</g>
			<rect x="0" y="1129.4" width="99.2126" height="25.1548" class="st14"/>
			<text x="25.82" y="1139.57" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент <tspan
						x="4.97" dy="1.2em" class="st5">регионального развития </tspan> </text>		</g>
		<g id="shape58-422" v:mID="58" v:groupContext="shape" v:layerMember="0" transform="translate(299.352,-730.954)">
			<title>Лист.58</title>
			<desc>Филиалы</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1145.97" width="87.94" height="17.1621"/>
			<g id="shadow58-423" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="87.932" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="87.932" height="17.1621" class="st14"/>
			<text x="26.31" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Филиалы</text>		</g>
		<g id="shape59-429" v:mID="59" v:groupContext="shape" v:layerMember="1" transform="translate(696.767,-675.232)">
			<title>Лист.59</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.36 1154.55 L3.36 1184.91 L5.52 1184.91" class="st30"/>
		</g>
		<g id="shape60-436" v:mID="60" v:groupContext="shape" v:layerMember="1" transform="translate(696.04,-675.232)">
			<title>Лист.60</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M4.09 1154.55 L4.09 1238.67 L4.8 1238.67" class="st30"/>
		</g>
		<g id="shape61-442" v:mID="61" v:groupContext="shape" v:layerMember="1" transform="translate(37.6253,-801.921)">
			<title>Лист.61</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.66 1154.55 L1.66 1191.67 L6.35 1191.67" class="st27"/>
		</g>
		<g id="shape62-448" v:mID="62" v:groupContext="shape" v:layerMember="1" transform="translate(37.8221,-801.921)">
			<title>Лист.62</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.47 1154.55 L1.47 1230.31 L6.55 1230.31" class="st27"/>
		</g>
		<g id="shape63-454" v:mID="63" v:groupContext="shape" transform="translate(1563.43,221.75) rotate(90)">
			<title>Лист.63</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L10.59 1154.55" class="st32"/>
		</g>
		<g id="shape64-457" v:mID="64" v:groupContext="shape" transform="translate(775.179,1387.22) rotate(-179.973)">
			<title>Лист.64</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L693.88 1154.55" class="st33"/>
		</g>
		<g id="shape65-460" v:mID="65" v:groupContext="shape" v:layerMember="1" transform="translate(219.378,-923.208)">
			<title>Лист.65</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.38 1155.55 L-7.8 1160.86 L-7.8 1161.57" class="st27"/>
		</g>
		<g id="shape66-466" v:mID="66" v:groupContext="shape" v:layerMember="1" transform="translate(426.995,-750.492)">
			<title>Лист.66</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.49 1154.55 L1.49 1198.28 L7.4 1198.28" class="st30"/>
		</g>
		<g id="shape67-472" v:mID="67" v:groupContext="shape" v:layerMember="1" transform="translate(426.995,-750.492)">
			<title>Лист.67</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.49 1154.55 L1.49 1176.16 L7.4 1176.16" class="st30"/>
		</g>
		<g id="shape68-478" v:mID="68" v:groupContext="shape" v:layerMember="1" transform="translate(426.77,-867.454)">
			<title>Лист.68</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M2.25 1154.55 L2.25 1179.27 L6.63 1179.27" class="st30"/>
		</g>
		<g id="shape69-484" v:mID="69" v:groupContext="shape" v:layerMember="1" transform="translate(426.77,-867.454)">
			<title>Лист.69</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M2.25 1154.55 L2.25 1203.17 L6.63 1203.17" class="st30"/>
		</g>
		<g id="shape70-490" v:mID="70" v:groupContext="shape" v:layerMember="1" transform="translate(317.346,-922.47)">
			<title>Лист.70</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.81 L-238.6 1154.81 L-238.6 1161.43" class="st34"/>
		</g>
		<g id="shape71-497" v:mID="71" v:groupContext="shape" v:layerMember="0" transform="translate(578.612,-826.84)">
			<title>Лист.71</title>
			<desc>Управление сопровождения ДМС</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1143.11" width="87.94" height="22.8827"/>
			<g id="shadow71-498" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1131.67" width="87.932" height="22.8827" class="st2"/>
			</g>
			<rect x="0" y="1131.67" width="87.932" height="22.8827" class="st36"/>
			<text x="21.94" y="1140.71" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="5.61" dy="1.2em" class="st5">сопровождения ДМС </tspan> </text>		</g>
		<g id="shape72-505" v:mID="72" v:groupContext="shape" v:layerMember="1" transform="translate(330.111,-922.089)">
			<title>Лист.72</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M6.76 1154.55 L7.13 1162.63" class="st27"/>
		</g>
		<g id="shape73-511" v:mID="73" v:groupContext="shape" v:layerMember="1" transform="translate(408.881,-922.21)">
			<title>Лист.73</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L396.28 1154.55 L396.28 1181.48 L389.8 1181.48" class="st10"/>
		</g>
		<g id="shape74-517" v:mID="74" v:groupContext="shape" v:layerMember="1" transform="translate(380.119,-893.282)">
			<title>Лист.74</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.01 1154.55 L18.87 1154.55 L18.87 1280.43 L13.32 1280.43" class="st27"/>
		</g>
		<g id="shape75-523" v:mID="75" v:groupContext="shape" v:layerMember="1" transform="translate(24.9105,-863.386)">
			<title>Лист.75</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M2 1154.55 L2 1184.88 L6.46 1184.88" class="st10"/>
		</g>
		<g id="shape76-529" v:mID="76" v:groupContext="shape" v:layerMember="0" transform="translate(300.816,-673.194)">
			<title>Лист.76</title>
			<desc>Управление правового обеспечения</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1143.11" width="87.94" height="22.8827"/>
			<g id="shadow76-530" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1131.67" width="87.932" height="22.8827" class="st2"/>
			</g>
			<rect x="0" y="1131.67" width="87.932" height="22.8827" class="st37"/>
			<text x="2.27" y="1140.71" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление правового <tspan
						x="21.53" dy="1.2em" class="st5">обеспечения</tspan></text>		</g>
		<g id="shape77-537" v:mID="77" v:groupContext="shape" v:layerMember="0" transform="translate(300.816,-638.137)">
			<title>Лист.77</title>
			<desc>Управление по претензионно-исковой работе</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1140.25" width="87.94" height="28.6034"/>
			<g id="shadow77-538" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st2"/>
			</g>
			<rect x="0" y="1125.95" width="87.932" height="28.6034" class="st37"/>
			<text x="21.94" y="1133.05" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <v:newlineChar/><tspan
						x="12.46" dy="1.2em" class="st5">по претензионно</tspan>-<tspan x="16.15" dy="1.2em" class="st5">исковой работе</tspan></text>		</g>
		<g id="shape78-546" v:mID="78" v:groupContext="shape" v:layerMember="1" transform="translate(288.089,-713.515)">
			<title>Лист.78</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.45 1154.55 L1.45 1215.63 L7.44 1215.63" class="st30"/>
		</g>
		<g id="shape79-552" v:mID="79" v:groupContext="shape" v:layerMember="1" transform="translate(288.089,-713.515)">
			<title>Лист.79</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.45 1154.55 L1.45 1183.43 L7.44 1183.43" class="st30"/>
		</g>
		<g id="shape81-558" v:mID="81" v:groupContext="shape" v:layerMember="1" transform="translate(270.349,-857.814)">
			<title>Лист.81</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-1.79 1154.55 L-1.79 1254.7 L-6.22 1254.7" class="st27"/>
		</g>
		<g id="shape82-564" v:mID="82" v:groupContext="shape" v:layerMember="0" transform="translate(531.833,-945.951)">
			<title>Лист.82</title>
			<desc>IT-комитет</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="71.5085" cy="1145.97" width="143.02" height="17.1621"/>
			<g id="shadow82-565" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<path d="M0 1154.55 L143.02 1154.55 L143.02 1137.39 L0 1137.39 L0 1154.55 Z" class="st8"/>
			</g>
			<path d="M0 1154.55 L143.02 1154.55 L143.02 1137.39 L0 1137.39 L0 1154.55 Z" class="st9"/>
			<text x="50.91" y="1148.37" class="st7" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>IT-<tspan
						class="st5" v:langID="1049">комитет</tspan></text>		</g>
		<g id="shape83-572" v:mID="83" v:groupContext="shape" v:layerMember="1" transform="translate(487.406,-994.136)">
			<title>Лист.83</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L18.85 1154.55 L18.85 1194.15 L38.7 1194.15" class="st10"/>
		</g>
		<g id="shape84-578" v:mID="84" v:groupContext="shape" v:layerMember="0" transform="translate(437.098,-619.148)">
			<title>Лист.84</title>
			<desc>Служба контроля качества</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="47.5111" cy="1145.46" width="95.03" height="18.1918"/>
			<g id="shadow84-579" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="95.0223" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="95.0223" height="18.1918" class="st21"/>
			<text x="15.27" y="1143.06" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Служба контроля <tspan
						x="31.27" dy="1.2em" class="st5">качества </tspan> </text>		</g>
		<g id="shape85-586" v:mID="85" v:groupContext="shape" v:layerMember="1" transform="translate(425.679,-649.824)">
			<title>Лист.85</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M2.75 1154.55 L2.75 1176.13 L6.13 1176.13" class="st30"/>
		</g>
		<g id="shape86-592" v:mID="86" v:groupContext="shape" v:layerMember="1" transform="translate(142.009,-873.425)">
			<title>Лист.86</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-2.76 1154.55 L-2.76 1330.91 L-5.26 1330.91" class="st27"/>
		</g>
		<g id="shape87-598" v:mID="87" v:groupContext="shape" v:layerMember="0" transform="translate(569.339,-882.263)">
			<title>Лист.87</title>
			<desc>Управляющий директор, член Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="48.6024" cy="1141.4" width="97.21" height="26.3104"/>
			<g id="shadow87-599" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1128.24" width="97.2049" height="26.3104" class="st2"/>
			</g>
			<rect x="0" y="1128.24" width="97.2049" height="26.3104" class="st23"/>
			<text x="2.7" y="1139" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управляющий директор, <tspan
						x="18.73" dy="1.2em" class="st5">член Правления</tspan></text>		</g>
		<g id="shape88-606" v:mID="88" v:groupContext="shape" v:layerMember="0" transform="translate(578.612,-805.986)">
			<title>Лист.88</title>
			<desc>Отдел методологии</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.7891" cy="1145.97" width="87.58" height="17.1621"/>
			<g id="shadow88-607" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="87.5781" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="87.5781" height="17.1621" class="st36"/>
			<text x="8.51" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел методологии</text>		</g>
		<g id="shape89-613" v:mID="89" v:groupContext="shape" v:layerMember="0" transform="translate(429.024,-882.263)">
			<title>Лист.89</title>
			<desc>Заместитель Председателя Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1140.72" width="103.69" height="27.6655"/>
			<g id="shadow89-614" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1126.89" width="103.687" height="27.6655" class="st2"/>
			</g>
			<rect x="0" y="1126.89" width="103.687" height="27.6655" class="st22"/>
			<text x="29.09" y="1138.32" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Заместитель <v:newlineChar/><tspan
						x="5.7" dy="1.2em" class="st5">Председателя Правления</tspan></text>		</g>
		<g id="shape91-621" v:mID="91" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-992.177)">
			<title>Лист.91</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1152.59 L-24.06 1152.59 L-24.06 1142.34 L-40.38 1142.34" class="st10"/>
		</g>
		<g id="shape93-627" v:mID="93" v:groupContext="shape" v:layerMember="1" transform="translate(539.188,-896.095)">
			<title>Лист.93</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.48 1154.55 L6.88 1154.55 L6.88 1444.56 L-1.97 1444.56" class="st10"/>
		</g>
		<g id="shape94-633" v:mID="94" v:groupContext="shape" v:layerMember="1" transform="translate(673.63,-895.418)">
			<title>Лист.94</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-7.09 1154.55 L2.09 1154.55 L2.09 1185.83 L-1.36 1185.83" class="st10"/>
		</g>
		<g id="shape95-639" v:mID="95" v:groupContext="shape" v:layerMember="1" transform="translate(539.798,-896.095)">
			<title>Лист.95</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-7.09 1154.55 L6.27 1154.55 L6.27 1183.19 L-1.36 1183.19" class="st10"/>
		</g>
		<g id="shape98-645" v:mID="98" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-1065.17)">
			<title>Лист.98</title>
			<desc>Служба актуарных расчетов</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1145.34" width="141.74" height="18.4252"/>
			<g id="shadow98-646" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st2"/>
			</g>
			<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st6"/>
			<text x="18.75" y="1147.75" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Служба актуарных расчетов</text>		</g>
		<g id="shape99-652" v:mID="99" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-1037.27)">
			<title>Лист.99</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-24.44 1154.55 L-24.44 1117.44 L-40.38 1117.44" class="st10"/>
		</g>
		<g id="shape100-658" v:mID="100" v:groupContext="shape" v:layerMember="0" transform="translate(699.709,-807.72)">
			<title>Лист.100</title>
			<desc>Технологический департамент</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1145.46" width="92.41" height="18.1918"/>
			<g id="shadow100-659" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="92.4048" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="92.4048" height="18.1918" class="st26"/>
			<text x="14.37" y="1143.06" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Технологический <tspan
						x="23.14" dy="1.2em" class="st5">департамент</tspan></text>		</g>
		<g id="shape101-666" v:mID="101" v:groupContext="shape" v:layerMember="0" transform="translate(531.833,-984.124)">
			<title>Лист.101</title>
			<desc>Комитет по внутреннему аудиту</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="71.5085" cy="1143.82" width="143.02" height="21.4526"/>
			<g id="shadow101-667" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="143.017" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="143.017" height="21.4526" class="st6"/>
			<text x="12.74" y="1146.22" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Комитет по внутреннему аудиту</text>		</g>
		<g id="shape102-673" v:mID="102" v:groupContext="shape" v:layerMember="1" transform="translate(498.036,-1037.27)">
			<title>Лист.102</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L16.65 1154.55 L16.65 1196.97 L28.07 1196.97" class="st10"/>
		</g>
		<g id="shape103-679" v:mID="103" v:groupContext="shape" v:layerMember="0" transform="translate(695.753,-853.415)">
			<title>Лист.103</title>
			<desc>Советник Председателя Правления</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="47.8803" cy="1142.31" width="95.77" height="24.486"/>
			<g id="shadow103-680" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1130.07" width="95.7605" height="24.486" class="st2"/>
			</g>
			<rect x="0" y="1130.07" width="95.7605" height="24.486" class="st24"/>
			<text x="4.32" y="1139.91" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Советник Председателя <tspan
						x="27.59" dy="1.2em" class="st5">Правления</tspan></text>		</g>
		<g id="shape105-687" v:mID="105" v:groupContext="shape" v:layerMember="0" transform="translate(428.395,-663.818)">
			<title>Лист.105</title>
			<desc>Управление по внешним коммуникациям</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1140.25" width="103.69" height="28.6034"/>
			<g id="shadow105-688" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.95" width="103.687" height="28.6034" class="st2"/>
			</g>
			<rect x="0" y="1125.95" width="103.687" height="28.6034" class="st22"/>
			<text x="29.81" y="1133.05" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <v:newlineChar/><tspan
						x="29.59" dy="1.2em" class="st5">по внешним </tspan><tspan x="21.68" dy="1.2em" class="st5">коммуникациям </tspan> </text>		</g>
		<g id="shape106-696" v:mID="106" v:groupContext="shape" v:layerMember="0" transform="translate(695.007,-830.141)">
			<title>Лист.106</title>
			<desc>Управляющий директор</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="48.6024" cy="1145.46" width="97.21" height="18.1918"/>
			<g id="shadow106-697" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="97.2049" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="97.2049" height="18.1918" class="st24"/>
			<text x="3.7" y="1147.86" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управляющий директор</text>		</g>
		<g id="shape107-703" v:mID="107" v:groupContext="shape" v:layerMember="0" transform="translate(428.433,-550.689)">
			<title>Лист.107</title>
			<desc>Канцелярия</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1145.46" width="103.69" height="18.1918"/>
			<g id="shadow107-704" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.36" width="103.687" height="18.1918" class="st2"/>
			</g>
			<rect x="0" y="1136.36" width="103.687" height="18.1918" class="st22"/>
			<text x="29.46" y="1147.86" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Канцелярия</text>		</g>
		<g id="shape108-710" v:mID="108" v:groupContext="shape" v:layerMember="0" transform="translate(161.977,-845.975)">
			<title>Лист.108</title>
			<desc>Управляющий директор</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="48.6024" cy="1141.97" width="97.21" height="25.1548"/>
			<g id="shadow108-711" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1129.4" width="97.2049" height="25.1548" class="st2"/>
			</g>
			<rect x="0" y="1129.4" width="97.2049" height="25.1548" class="st15"/>
			<text x="3.7" y="1144.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управляющий директор</text>		</g>
		<g id="shape109-717" v:mID="109" v:groupContext="shape" v:layerMember="0" transform="translate(287.916,-841.412)">
			<title>Лист.109</title>
			<desc>Департамент развития партнерских отношений</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="49.6063" cy="1139.98" width="99.22" height="29.1454"/>
			<g id="shadow109-718" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st2"/>
			</g>
			<rect x="0" y="1125.41" width="99.2126" height="29.1454" class="st14"/>
			<text x="8.08" y="1137.58" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Департамент развития <tspan
						x="5.09" dy="1.2em" class="st5">партнерских отношений </tspan> </text>		</g>
		<g id="shape110-725" v:mID="110" v:groupContext="shape" v:layerMember="1" transform="translate(380.042,-893.282)">
			<title>Лист.110</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L18.95 1154.55 L18.95 1191.85 L13.25 1191.85" class="st27"/>
		</g>
		<g id="shape111-731" v:mID="111" v:groupContext="shape" v:layerMember="1" transform="translate(267.272,-895.461)">
			<title>Лист.111</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.08 1154.55 L1.29 1154.55 L1.29 1191.46 L-1.93 1191.46" class="st27"/>
		</g>
		<g id="shape112-737" v:mID="112" v:groupContext="shape" v:layerMember="1" transform="translate(158.919,-858.553)">
			<title>Лист.112</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.06 1154.55 L3.06 1223.65 L4.96 1223.65" class="st27"/>
		</g>
		<g id="shape113-743" v:mID="113" v:groupContext="shape" v:layerMember="1" transform="translate(776.14,-921.882)">
			<title>Лист.113</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L29.02 1154.55 L29.02 1237.2 L21.79 1237.2" class="st10"/>
		</g>
		<g id="shape114-749" v:mID="114" v:groupContext="shape" v:layerMember="1" transform="translate(690.271,-839.237)">
			<title>Лист.114</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M4.74 1154.55 L4.74 1176.97 L9.44 1176.97" class="st38"/>
		</g>
		<g id="shape115-756" v:mID="115" v:groupContext="shape" v:layerMember="1" transform="translate(690.271,-839.237)">
			<title>Лист.115</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M4.74 1154.55 L4.74 1200.49 L9.44 1200.49" class="st38"/>
		</g>
		<g id="shape116-762" v:mID="116" v:groupContext="shape" v:layerMember="1" transform="translate(690.694,-839.237)">
			<title>Лист.116</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M4.31 1154.55 L4.31 1287.32 L9.86 1287.32" class="st38"/>
		</g>
		<g id="shape117-768" v:mID="117" v:groupContext="shape" v:layerMember="1" transform="translate(617.941,-921.882)">
			<title>Лист.117</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L187.22 1154.55 L187.22 1401.2 L180.32 1401.2" class="st10"/>
		</g>
		<g id="shape118-774" v:mID="118" v:groupContext="shape" v:layerMember="1" transform="translate(158.919,-858.553)">
			<title>Лист.118</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.06 1154.55 L3.06 1188.51 L4.96 1188.51" class="st27"/>
		</g>
		<g id="shape119-780" v:mID="119" v:groupContext="shape" v:layerMember="1" transform="translate(673.453,-895.418)">
			<title>Лист.119</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.91 1154.55 L2.27 1154.55 L2.27 1262.99 L-1.54 1262.99" class="st10"/>
		</g>
		<g id="shape121-786" v:mID="121" v:groupContext="shape" v:layerMember="1" transform="translate(546.163,-621.978)">
			<title>Лист.121</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-0.09 1154.55 L-0.09 1098.41 L-8.36 1098.41" class="st10"/>
		</g>
		<g id="shape122-792" v:mID="122" v:groupContext="shape" v:layerMember="1" transform="translate(539.503,-896.095)">
			<title>Лист.122</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.79 1154.55 L6.57 1154.55 L6.57 1490.86 L-1.66 1490.86" class="st10"/>
		</g>
		<g id="shape123-798" v:mID="123" v:groupContext="shape" v:layerMember="1" transform="translate(267.856,-888.374)">
			<title>Динамическая соединительная линия.480</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.67 1147.46 L-7.51 1147.46" class="st39"/>
		</g>
		<g id="shape124-801" v:mID="124" v:groupContext="shape" v:layerMember="1" transform="translate(267.856,-902.547)">
			<title>Динамическая соединительная линия.483</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.67 1161.64 L-7.51 1161.64" class="st39"/>
		</g>
		<g id="shape125-804" v:mID="125" v:groupContext="shape" v:layerMember="1" transform="translate(286.625,-767.406)">
			<title>Лист.125</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.45 1154.55 L1.45 1182.42 L7.44 1182.42" class="st30"/>
		</g>
		<g id="shape126-810" v:mID="126" v:groupContext="shape" v:layerMember="0" transform="translate(299.997,-813.334)">
			<title>Лист.126</title>
			<desc>Управление электронных продаж</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1144.59" width="87.94" height="19.9261"/>
			<g id="shadow126-811" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.63" width="87.932" height="19.9261" class="st2"/>
			</g>
			<rect x="0" y="1134.63" width="87.932" height="19.9261" class="st37"/>
			<text x="21.94" y="1142.19" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="5.54" dy="1.2em" class="st5">электронных продаж</tspan></text>		</g>
		<g id="shape127-818" v:mID="127" v:groupContext="shape" v:layerMember="1" transform="translate(286.87,-855.984)">
			<title>Лист.127</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.05 1154.55 L1.05 1187.24 L7.84 1187.24" class="st30"/>
		</g>
		<g id="shape128-824" v:mID="128" v:groupContext="shape" v:layerMember="1" transform="translate(26.0103,-863.386)">
			<title>Лист.128</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0.9 1154.55 L0.9 1216.02 L7.56 1216.02" class="st10"/>
		</g>
		<g id="shape129-830" v:mID="129" v:groupContext="shape" v:layerMember="1" transform="translate(401.727,-936.086)">
			<title>Динамическая соединительная линия</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M7.02 1154.85 L7.02 1160.16 L7.15 1160.16 L7.15 1168.43" class="st40"/>
		</g>
		<g id="shape130-833" v:mID="130" v:groupContext="shape" v:layerMember="0" transform="translate(142.257,-1019.01)">
			<title>Лист.130</title>
			<desc>Риск-менеджер</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="70.8661" cy="1145.34" width="141.74" height="18.4252"/>
			<g id="shadow130-834" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st2"/>
			</g>
			<rect x="0" y="1136.13" width="141.732" height="18.4252" class="st6"/>
			<text x="43.2" y="1147.75" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Риск-менеджер</text>		</g>
		<g id="shape131-840" v:mID="131" v:groupContext="shape" v:layerMember="1" transform="translate(330.087,-1039.83)">
			<title>Лист.131</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1157.11 L-24.44 1157.11 L-24.44 1166.16 L-40.38 1166.16" class="st10"/>
		</g>
		<g id="shape132-846" v:mID="132" v:groupContext="shape" v:layerMember="1" transform="translate(267.856,-888.374)">
			<title>Динамическая соединительная линия.503</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-6.67 1147.46 L-7.51 1147.46" class="st39"/>
		</g>
		<g id="shape133-849" v:mID="133" v:groupContext="shape" v:layerMember="0" transform="translate(705.989,-758.158)">
			<title>Лист.133</title>
			<desc>Управление Web-программирования</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.0623" cy="1143.82" width="86.13" height="21.4526"/>
			<g id="shadow133-850" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1133.1" width="86.1245" height="21.4526" class="st2"/>
			</g>
			<rect x="0" y="1133.1" width="86.1245" height="21.4526" class="st25"/>
			<text x="10.7" y="1141.42" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						class="st5" v:langID="1033">Web</tspan><tspan class="st5" v:langID="1033">-</tspan><tspan x="7.58"
						dy="1.2em" class="st5">программирования</tspan></text>		</g>
		<g id="shape134-859" v:mID="134" v:groupContext="shape" v:layerMember="0" transform="translate(706.637,-721.799)">
			<title>Лист.134</title>
			<desc>Управление системных разработок</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="42.7385" cy="1138.64" width="85.48" height="31.8231"/>
			<g id="shadow134-860" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1122.73" width="85.4771" height="31.8231" class="st2"/>
			</g>
			<rect x="0" y="1122.73" width="85.4771" height="31.8231" class="st25"/>
			<text x="20.71" y="1131.44" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="22.99" dy="1.2em" class="st5">системных </tspan><tspan x="22.41" dy="1.2em" class="st5">разработок</tspan></text>		</g>
		<g id="shape135-868" v:mID="135" v:groupContext="shape" v:layerMember="1" transform="translate(695.763,-793.302)">
			<title>Лист.135</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.95 1154.55 L3.95 1178.97 L4.94 1178.97" class="st30"/>
		</g>
		<g id="shape136-874" v:mID="136" v:groupContext="shape" v:layerMember="1" transform="translate(696.086,-793.302)">
			<title>Лист.136</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.62 1154.55 L3.62 1210.14 L5.27 1210.14" class="st30"/>
		</g>
		<g id="shape137-880" v:mID="137" v:groupContext="shape" v:layerMember="0" transform="translate(299.997,-786.695)">
			<title>Лист.137</title>
			<desc>Управление партнерских продаж</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="43.966" cy="1144.59" width="87.94" height="19.9261"/>
			<g id="shadow137-881" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.63" width="87.932" height="19.9261" class="st2"/>
			</g>
			<rect x="0" y="1134.63" width="87.932" height="19.9261" class="st37"/>
			<text x="21.94" y="1142.19" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="6.33" dy="1.2em" class="st5">партнерских продаж</tspan></text>		</g>
		<g id="shape138-888" v:mID="138" v:groupContext="shape" v:layerMember="1" transform="translate(286.87,-855.984)">
			<title>Лист.138</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.05 1154.55 L1.05 1213.88 L7.84 1213.88" class="st30"/>
		</g>
		<g id="shape139-894" v:mID="139" v:groupContext="shape" v:layerMember="1" transform="translate(546.183,-846.496)">
			<title>Лист.139</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-0.11 1154.55 L-0.11 1441.26 L-8.34 1441.26" class="st10"/>
		</g>
		<g id="shape140-900" v:mID="140" v:groupContext="shape" v:layerMember="1" transform="translate(753.872,-922.314)">
			<title>Лист.140</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.98 L-135.93 1154.98 L-135.93 1162.13" class="st27"/>
		</g>
		<g id="shape141-906" v:mID="141" v:groupContext="shape" v:layerMember="1" transform="translate(408.881,-923.156)">
			<title>Лист.141</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1155.5 L71.99 1155.5 L71.99 1161.62" class="st27"/>
		</g>
		<g id="shape142-912" v:mID="142" v:groupContext="shape" v:layerMember="1" transform="translate(617.941,-921.882)">
			<title>Лист.142</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L187.22 1154.55 L187.22 1210.77 L179.3 1210.77" class="st10"/>
		</g>
		<g id="shape143-918" v:mID="143" v:groupContext="shape" v:layerMember="0" transform="translate(428.433,-574.03)">
			<title>Лист.143</title>
			<desc>Служба информационной безопасности</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1144.64" width="103.69" height="19.8185"/>
			<g id="shadow143-919" v:groupContext="shadow" v:shadowOffsetX="0.3456" v:shadowOffsetY="-1.9728" v:shadowType="1"
					transform="matrix(1,0,0,1,0.3456,1.9728)" class="st1">
				<rect x="0" y="1134.73" width="103.687" height="19.8185" class="st19"/>
			</g>
			<rect x="0" y="1134.73" width="103.687" height="19.8185" class="st41"/>
			<text x="4.96" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Служба информационной <tspan
						x="28.03" dy="1.2em" class="st5">безопасности</tspan></text>		</g>
		<g id="shape144-925" v:mID="144" v:groupContext="shape" v:layerMember="0" transform="translate(428.433,-787.718)">
			<title>Лист.144</title>
			<desc>Управление маркетинга</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="51.8437" cy="1145.97" width="103.69" height="17.1621"/>
			<g id="shadow144-926" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st2"/>
			</g>
			<rect x="0" y="1137.39" width="103.687" height="17.1621" class="st22"/>
			<text x="7.39" y="1148.37" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление маркетинга</text>		</g>
		<g id="shape145-932" v:mID="145" v:groupContext="shape" v:layerMember="0" transform="translate(439.769,-764.381)">
			<title>Лист.145</title>
			<desc>Отдел Digital-маркетинга</desc>
			<v:custProps>
				<v:cp v:nameU="Cost" v:lbl="Стоимость" v:prompt="" v:type="7" v:format="@" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="ProcessNumber" v:lbl="Номер процесса" v:prompt="" v:type="2" v:format="" v:sortKey=""
						v:invis="false" v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Owner" v:lbl="Владелец" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Function" v:lbl="Функция" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="StartDate" v:lbl="Дата начала" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="EndDate" v:lbl="Дата окончания" v:prompt="" v:type="5" v:format="" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0"/>
				<v:cp v:nameU="Status" v:lbl="Состояние" v:prompt="" v:type="4"
						v:format=";Не начато;Выполняется;Завершено;Отложено;Ожидается ввод" v:sortKey="" v:invis="false"
						v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="DefaultWidth" v:prompt="" v:val="VT0(0.98425196850394):24"/>
				<v:ud v:nameU="DefaultHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="ResizeTxtHeight" v:prompt="" v:val="VT0(0.59055118110236):24"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(2,2,2,2)" v:tabSpace="42.5197"/>
			<v:textRect cx="46.2024" cy="1144.64" width="92.41" height="19.8185"/>
			<g id="shadow145-933" v:groupContext="shadow" v:shadowOffsetX="0" v:shadowOffsetY="0" v:shadowType="1"
					transform="matrix(1,0,0,1,0,0)" class="st1">
				<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st2"/>
			</g>
			<rect x="0" y="1134.73" width="92.4048" height="19.8185" class="st21"/>
			<text x="21.2" y="1142.24" class="st7" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Отдел Digital-<tspan
						x="24.78" dy="1.2em" class="st5">маркетинга</tspan></text>		</g>
		<g id="shape146-940" v:mID="146" v:groupContext="shape" v:layerMember="1" transform="translate(427.015,-796.299)">
			<title>Лист.146</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M1.42 1154.55 L1.42 1176.56 L7.47 1176.56" class="st30"/>
		</g>
		<g id="shape147-946" v:mID="147" v:groupContext="shape" v:layerMember="1" transform="translate(546.183,-690.59)">
			<title>Лист.147</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-0.11 1154.55 L-0.11 1048.84 L-8.34 1048.84" class="st10"/>
		</g>
		<g id="shape148-952" v:mID="148" v:groupContext="shape" v:layerMember="1" transform="translate(546.183,-771.791)">
			<title>Лист.148</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-0.11 1154.55 L-0.11 1342.4 L-8.34 1342.4" class="st10"/>
		</g>
		<g id="shape149-958" v:mID="149" v:groupContext="shape" v:layerMember="1" transform="translate(695.863,-675.232)">
			<title>Лист.149</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M4.27 1154.55 L4.27 1208.82 L4.62 1208.82" class="st30"/>
		</g>
		<g id="shape151-964" v:mID="151" v:groupContext="shape" v:layerMember="1" transform="translate(380.852,-893.282)">
			<title>Лист.151</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M6.28 1154.55 L18.14 1154.55 L18.14 1334.32 L14.06 1334.32" class="st27"/>
		</g>
		<g id="shape152-970" v:mID="152" v:groupContext="shape" v:layerMember="1" transform="translate(546.183,-743.445)">
			<title>Лист.152</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M-0.11 1154.55 L-0.11 1248.17 L-8.34 1248.17" class="st10"/>
		</g>
		<g id="shape153-976" v:mID="153" v:groupContext="shape" v:layerMember="1" transform="translate(567.611,-864.142)">
			<title>Лист.153</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.17 1154.55 L3.17 1180.41 L5.72 1180.41" class="st30"/>
		</g>
		<g id="shape154-982" v:mID="154" v:groupContext="shape" v:layerMember="1" transform="translate(567.611,-864.142)">
			<title>Лист.154</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(254):26"/>
			</v:userDefs>
			<path d="M3.17 1154.55 L3.17 1204.13 L5.72 1204.13" class="st30"/>
		</g>
	</g>
</svg>
<script type="text/javascript">
function changeDisplay(idName){
    var element = document.getElementById(idName);
    if(element.classList.contains('active')){
        element.classList.remove('active');
        element.style.display = "none";
    }
    else {
        element.classList.add('active');
        element.style.display = "block";
    }
}
</script>
</body>
</html>