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
<svg style="width: 100%" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events"
		xmlns:v="http://schemas.microsoft.com/visio/2003/SVGExtensions/" width="11.6929in" height="8.26772in"
		viewBox="0 0 841.89 595.276" xml:space="preserve" color-interpolation-filters="sRGB" class="st13">
	<v:documentProperties v:langID="1049" v:metric="true" v:viewMarkup="false">
		<v:custProps>
			<v:cp v:nameU="WantAutoLayout" v:langID="1049" v:cal="0" v:val="VT0(1):26"/>
			<v:cp v:nameU="CustomLayoutsAllowed" v:langID="1049" v:cal="0" v:val="VT0(0):26"/>
			<v:cp v:nameU="WantAutoSize" v:langID="1049" v:cal="0" v:val="VT0(1):26"/>
			<v:cp v:nameU="ShowDivider" v:langID="1049" v:cal="0" v:val="VT0(0):26"/>
			<v:cp v:nameU="GridGranularity" v:langID="1049" v:cal="0" v:val="VT0(0.039370078740157):24"/>
			<v:cp v:nameU="Theme" v:langID="1049" v:cal="0" v:val="VT4(Classic)"/>
			<v:cp v:nameU="TOPLINESTYLE" v:langID="1049" v:cal="0" v:val="VT0(0):26"/>
			<v:cp v:nameU="TOOLBARLOCATION" v:langID="1049" v:cal="0" v:val="VT0(4):26"/>
		</v:custProps>
		<v:userDefs>
			<v:ud v:nameU="BOXWIDTH" v:val="VT0(1.1811023622047):24"/>
			<v:ud v:nameU="BOXHEIGHT" v:val="VT0(0.59055118110236):24"/>
			<v:ud v:nameU="HASSYNCCOPIES" v:val="VT0(1):26"/>
			<v:ud v:nameU="OCNumDisplayFields" v:val="VT0(2):26"/>
			<v:ud v:nameU="visPPO" v:val="VT0(2):26"/>
			<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
			<v:ud v:nameU="DocShowDivider" v:prompt="" v:val="VT0(1):26"/>
			<v:ud v:nameU="msvNoAutoConnect" v:val="VT0(1):26"/>
			<v:ud v:nameU="msvNoSubprocess" v:prompt="" v:val="VT0(1):26"/>
		</v:userDefs>
	</v:documentProperties>

	<style type="text/css">
	<![CDATA[
		.st1 {visibility:visible}
		.st2 {stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:0.25}
		.st3 {stroke:#404040;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.25}
		.st4 {fill:#cdcdcd;fill-opacity:0.5}
		.st5 {fill:url(#grad30-7)}
		.st6 {fill:#000000;font-family:Calibri;font-size:0.666664em}
		.st7 {font-size:1em}
		.st8 {fill:#cdcdcd;fill-opacity:0.5;stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:0.25}
		.st9 {fill:url(#grad30-7);stroke:#404040;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.25}
		.st10 {fill:#cdcdcd;fill-opacity:0.5;stroke:#cdcdcd;stroke-dasharray:1.75,1.25,0,1.25;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:0.25}
		.st11 {fill:url(#grad30-7);stroke:#404040;stroke-dasharray:1.75,1.25,0,1.25;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.25}
		.st12 {stroke:#404040;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st13 {fill:none;fill-rule:evenodd;font-size:12px;overflow:visible;stroke-linecap:square;stroke-miterlimit:3}
	]]>
	</style>

	<defs id="Patterns_And_Gradients">
		<linearGradient id="grad30-7" v:fillPattern="30" v:foreground="#f0f0f0" v:background="#ffffff" x1="0" y1="1" x2="0" y2="0">
			<stop offset="0" style="stop-color:#f0f0f0;stop-opacity:1"/>
			<stop offset="1" style="stop-color:#ffffff;stop-opacity:1"/>
		</linearGradient>
	</defs>
	<g v:mID="0" v:index="1" v:groupContext="foregroundPage">
		<v:custProps>
			<v:cp v:nameU="Theme" v:type="1" v:format="Классический;Современный;Изысканный;Блокнот;Ретро" v:invis="true"
					v:langID="1049" v:cal="0" v:val="VT4(Классический)"/>
			<v:cp v:nameU="ShapeClass" v:lbl="Класс фигуры" v:type="1" v:format="{52BC4E31-A33B-11d1-B2B9-006008BD347E}"
					v:invis="true" v:langID="1049" v:cal="0" v:val="VT4({52BC4E31-A33B-11d1-B2B9-006008BD347E})"/>
		</v:custProps>
		<v:userDefs>
			<v:ud v:nameU="DocClass" v:prompt="Organization Chart Document" v:val="VT4({429428D1-A7E7-11d1-B2BD-006008BD347E})"/>
			<v:ud v:nameU="AllowShapeMoveCallback" v:val="VT0(1):26"/>
			<v:ud v:nameU="Theme" v:val="VT0(0):26"/>
			<v:ud v:nameU="AllowCtrlMoveCallback" v:val="VT0(1):26"/>
			<v:ud v:nameU="SCALECHANGEDEVENT" v:val="VT0(0):26"/>
			<v:ud v:nameU="BOXWIDTH" v:val="VT0(-0.039370078740157):24"/>
			<v:ud v:nameU="BOXHEIGHT" v:val="VT0(-0.039370078740157):24"/>
			<v:ud v:nameU="OCNumDisplayFields" v:val="VT0(2):26"/>
			<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
			<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			<v:ud v:nameU="msvThemeOrder" v:val="VT0(0):26"/>
		</v:userDefs>
		<title>Страница-1</title>
		<v:pageProperties v:drawingScale="0.0393701" v:pageScale="0.0393701" v:drawingUnits="24" v:shadowOffsetX="8.50394"
				v:shadowOffsetY="-8.50394"/>
		<v:layer v:name="Hidden" v:index="0" visibility="hidden" v:print="false"/>
		<g id="shape222-1" v:mID="222" v:groupContext="shape" transform="translate(360,884.409) rotate(180)">
			<title>Лист.222</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<g id="shadow222-2" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
					transform="matrix(1,0,0,1,-1.44,-1.44)" class="st1">
				<path d="M0 595.28 L8.5 595.28" class="st2"/>
			</g>
			<path d="M0 595.28 L8.5 595.28" class="st3"/>
		</g>
		<g id="group1-9" transform="translate(365.669,-535.748)" v:mID="1" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Общее собрание акционеров)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({9AAD38E2-241E-4A99-89C8-70A2926F640E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30291137616816):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель</title>
			<desc>Общее собрание акционеров</desc>
			<g id="shape1-10" v:mID="1" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow1-11" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st2"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st2"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st5"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				<text x="5.12" y="571.07" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Общее собрание <tspan
							x="13.55" dy="1.2em" class="st7">акционеров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group6-21" transform="translate(365.669,-493.228)" v:mID="6" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Совет директоров)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({5A01A9CA-34A8-4800-ADBA-BD5468FC9EF8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.59055118):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.677165354):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,194.9999999916MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.23624496381464):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.6</title>
			<desc>Совет директоров</desc>
			<g id="shape6-22" v:mID="6" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow6-23" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st2"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st2"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st5"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				<text x="3.29" y="575.87" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Совет директоров<v:newlineChar/> </text>			</g>
		</g>
		<g id="group12-32" transform="translate(365.669,-433.701)" v:mID="12" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Правление)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({680831F8-A133-46E9-847D-AC883B43C2B8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.826771654):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.23624496381464):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.12</title>
			<desc>Правление</desc>
			<g id="shape12-33" v:mID="12" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow12-34" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st2"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st2"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st5"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				<text x="15.27" y="575.87" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Правление<v:newlineChar/> </text>			</g>
		</g>
		<g id="group18-43" transform="translate(365.669,-374.173)" v:mID="18" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Председатель Правления)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({9C2C7ABC-FE65-43F1-8EBE-C81AE38924F5})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.826771653):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30291137616816):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.18</title>
			<desc>Председатель Правления</desc>
			<g id="shape18-44" v:mID="18" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow18-45" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st2"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st2"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st5"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				<text x="9.92" y="571.07" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Председатель <tspan
							x="15.37" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group59-55" transform="translate(204.094,-552.756)" v:mID="59" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Служба внутреннего аудита)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023638977):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.6535433070866):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047277953):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({63C72ED2-4D8C-4DD7-9D5B-7696BA6F0B11})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8897637790472):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0.70866141715354):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,198.0000000153MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256726601):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480114011698):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник</title>
			<desc>Служба внутреннего аудита</desc>
			<g id="shape59-56" v:mID="59" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="118.65" height="8.50394"/>
				<g id="shadow59-57" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
				<text x="12.08" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>			</g>
		</g>
		<g id="group44-62" transform="translate(204.094,-527.244)" v:mID="44" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Служба актуарных расчетов)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023634941):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.6535433070866):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047269882):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({91E729BB-A4E7-4AF9-B932-880DD3A4877A})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8897637790472):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0.3543307081939):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,189.00000000773MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256735374):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480114007662):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.44</title>
			<desc>Служба актуарных расчетов</desc>
			<g id="shape44-63" v:mID="44" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="118.65" height="8.50394"/>
				<g id="shadow44-64" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
				<text x="12.1" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>			</g>
		</g>
		<g id="group49-69" transform="translate(204.094,-501.732)" v:mID="49" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Комплаенс-контролер)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023641536):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.6535433070866):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047283071):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({019B2549-4A9C-4CA2-A9FF-C3783BC4A2DC})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8897637790472):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-5.3346838058133E-010):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,180.00000000605MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256721038):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480114014257):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.49</title>
			<desc>Комплаенс-контролер</desc>
			<g id="shape49-70" v:mID="49" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="118.65" height="8.50394"/>
				<g id="shadow49-71" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
				<text x="21.46" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group54-76" transform="translate(204.094,-476.22)" v:mID="54" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Риск-менеджер)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023622047):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.6535433070866):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047244094):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({128E5942-61F0-4C7D-B43E-95A503D0A4A5})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8897637790472):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.354330709):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,171.000000011MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256763404):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113994769):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.54</title>
			<desc>Риск-менеджер</desc>
			<g id="shape54-77" v:mID="54" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="118.65" height="8.50394"/>
				<g id="shadow54-78" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
				<text x="32.62" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group24-83" transform="translate(467.717,-552.756)" v:mID="24" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Совет по управлению активами и пассивами)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023534252):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(2.1259842519409):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047068504):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({C4B24507-5B35-43E0-BF1D-D544F496791B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.007874016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0.708661416):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,197.999999986MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842476):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.124938539149):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113906973):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант</title>
			<desc>Совет по управлению активами и пассивами</desc>
			<g id="shape24-84" v:mID="24" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="152.54" height="8.50394"/>
				<g id="shadow24-85" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st11"/>
				<text x="0.49" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению активами и пассивами<v:newlineChar/> </text>			</g>
		</g>
		<g id="group33-90" transform="translate(467.717,-527.244)" v:mID="33" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Андеррайтинговый совет)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023538977):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(2.1259842519409):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047077953):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({AF29E1BC-0AE3-4476-9908-3AA18CD86C69})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.007874016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0.354330707):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,188.9999999774MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842476):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.1249385378209):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113911698):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.33</title>
			<desc>Андеррайтинговый совет</desc>
			<g id="shape33-91" v:mID="33" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="152.54" height="8.50394"/>
				<g id="shadow33-92" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st11"/>
				<text x="33.33" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>			</g>
		</g>
		<g id="group38-97" transform="translate(467.717,-484.724)" v:mID="38" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Комитет по вопросам стратегического планирования, кадров и вознаграждений и по социальным вопросам )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244095):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(2.125984251937):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({42B95320-DB1D-49F1-91D9-B056CDDF1D5B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.007874016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.118110237):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,176.9999999998MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842345):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5151442880763):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.458552055993):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.458552055993):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.38</title>
			<desc>Комитет по вопросам стратегического планирования, кадров и во...</desc>
			<g id="shape38-98" v:mID="38" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="578.268" width="152.54" height="17.0079"/>
				<g id="shadow38-99" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L153.07 561.26 L153.07 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 561.26 L153.07 561.26 L153.07 595.28 L0 595.28 Z" class="st11"/>
				<text x="11.41" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам стратегического <tspan
							x="2.27" dy="1.2em" class="st7">планирования</tspan>, кадров и вознаграждений и <tspan x="32.43"
							dy="1.2em" class="st7">по</tspan> социальным вопросам <v:newlineChar/> </text>			</g>
		</g>
		<g id="group43-106" transform="translate(467.717,-459.213)" v:mID="43" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Комитет по внутреннему аудиту)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023625):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(2.1259842519213):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.2362204725):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({51BBA33E-75F1-421A-9604-4A9C3E9B6937})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.007874016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.590551181):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,165.0000000222MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.6947725284182):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.1249385136097):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113997721):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.43</title>
			<desc>Комитет по внутреннему аудиту</desc>
			<g id="shape43-107" v:mID="43" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="152.54" height="8.50394"/>
				<g id="shadow43-108" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st11"/>
				<text x="21.63" y="589.17" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>			</g>
		</g>
		<g id="group72-113" transform="translate(442.205,-374.173)" v:mID="72" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Советник Председателя Правления)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({3FA2DCBC-776F-4A5E-9026-DE9852A9E603})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.062992126):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.0000000827404E-009):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(167.9999999912MM,137.9999999964MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.72</title>
			<desc>Советник Председателя Правления</desc>
			<g id="shape72-114" v:mID="72" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow72-115" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="18.16" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.9" dy="1.2em" class="st7">Председателя</tspan> <tspan x="15.37" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group78-122" transform="translate(289.134,-374.173)" v:mID="78" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Советник Председателя Правления)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({4472A554-634D-46FB-A1EA-F2705E635702})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.0629921267638):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.0000000827404E-009):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(113.999999971MM,137.9999999964MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.78</title>
			<desc>Советник Председателя Правления</desc>
			<g id="shape78-123" v:mID="78" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow78-124" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="18.16" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.9" dy="1.2em" class="st7">Председателя</tspan> <tspan x="15.37" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group83-131" transform="translate(272.126,-416.693)" v:mID="83" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Комитет по продажам)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535433071):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070866141):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D776C980-D36C-40F8-A4A4-35E6A9E4B90E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.299212598):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.29527559077559):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(108.0000000016MM,151.5000000023MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267041144):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.83</title>
			<desc>Комитет по продажам</desc>
			<g id="shape83-132" v:mID="83" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="67.8" height="12.7559"/>
				<g id="shadow83-133" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="14.68" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="16.2" dy="1.2em" class="st7">продажам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group88-139" transform="translate(446.457,-416.693)" v:mID="88" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(IT-комитет)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535433071):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070866141):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({04D5988B-6C23-47B8-AAE5-E603F478257A})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.1220472445748):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.29527559043307):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(169.500000003MM,151.500000011MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.24385625805792):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.88</title>
			<desc>IT-комитет</desc>
			<g id="shape88-140" v:mID="88" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="67.8" height="12.7559"/>
				<g id="shadow88-141" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="15.91" y="584.92" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape95-146" v:mID="95" v:groupContext="shape" transform="translate(433.701,-453.543)">
			<title>Динамическая соединительная линия.95</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L46.77 598.11 L46.77 606.61" class="st12"/>
		</g>
		<g id="group96-150" transform="translate(357.165,-331.654)" v:mID="96" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Заместитель )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.5944881889764):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({3E513E09-A8E1-42A0-8486-76B63421E478})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291374803):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960630000296):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(146.25MM,121.50000000172MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.51760717410324):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.520398326324):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226707766):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape96-151" v:mID="96" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="57.4016" cy="582.52" width="114.41" height="12.7559"/>
				<g id="shadow96-152" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st9"/>
				<text x="36.03" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="13.73" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape101-158" v:mID="101" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.101</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L14.88 603.78 L14.88 612.28" class="st12"/>
		</g>
		<g id="group102-162" transform="translate(480.246,-331.654)" v:mID="102" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Заместитель )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.8338582673015):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({A2E552CA-EDC1-4203-9492-9DB62C3F8AC5})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.0358267722233):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960629927264):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(192.71000000527MM,121.50000002028MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.5973972002116):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7547703138504):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226707766):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.102</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape102-163" v:mID="102" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="66.0189" cy="582.52" width="131.58" height="12.7559"/>
				<g id="shadow102-164" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L132.04 569.76 L132.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L132.04 569.76 L132.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="44.65" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="22.35" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape107-170" v:mID="107" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.107</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L146.58 603.78 L146.58 612.28" class="st12"/>
		</g>
		<g id="group108-174" transform="translate(208.711,-331.654)" v:mID="108" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Заместитель )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.6434195725534):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({9B30E176-6E3F-43C4-828D-054E79B4B3E3})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8307086618425):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960630043603):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(94.49999998MM,121.49999999072MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53391763529559):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5683080137069):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226707766):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.108</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape108-175" v:mID="108" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.1631" cy="582.52" width="117.92" height="12.7559"/>
				<g id="shadow108-176" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st9"/>
				<text x="37.8" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="15.49" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape113-182" v:mID="113" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.113</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-131.81 603.78 L-131.81 612.28" class="st12"/>
		</g>
		<g id="group114-186" transform="translate(620.787,-331.654)" v:mID="114" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управляющий директор, член Правления)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.3093363329584):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({32385839-43E8-48FF-AD97-6793B5002D72})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.725534309):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.649606299):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(235.6285714394MM,121.5000000272MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.42255655543057):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.2412004929548):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226707766):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.114</title>
			<desc>Управляющий директор, член Правления</desc>
			<g id="shape114-187" v:mID="114" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="47.1361" cy="582.52" width="93.95" height="12.7559"/>
				<g id="shadow114-188" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L94.27 569.76 L94.27 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L94.27 569.76 L94.27 595.28 L0 595.28 Z" class="st9"/>
				<text x="4.86" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий директор, <tspan
							x="19.54" dy="1.2em" class="st7">член</tspan> Правления<v:newlineChar/> </text>			</g>
		</g>
		<g id="group120-194" transform="translate(58.1102,-331.654)" v:mID="120" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Заместитель Председателя Правления по финансам)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.5354330708661):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({5589D3A9-EEBA-494F-B94C-E3F784EFA8FF})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-3.9763779529694):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960629927264):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(39.999999985378MM,121.50000002028MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.49792213473316):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4625762898274):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226707766):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.120</title>
			<desc>Заместитель Председателя Правления по финансам</desc>
			<g id="shape120-195" v:mID="120" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="55.2756" cy="582.52" width="110.17" height="12.7559"/>
				<g id="shadow120-196" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st9"/>
				<text x="8.89" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель Председателя <tspan
							x="13.46" dy="1.2em" class="st7">Правления</tspan> по финансам<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape125-202" v:mID="125" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.125</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-286.3 603.78 L-286.3 612.28" class="st12"/>
		</g>
		<g id="group139-206" transform="translate(31.1811,-297.638)" v:mID="139" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Главный бухгалтер)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779545817):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0236220465862):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559091634):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({344FDD0F-E2C0-4E10-93A9-804EB39FA822})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.62992125926684):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850455266):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5748031490306):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.94488188976378,4.2814960631747)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5748031490306,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32731845997317):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1632335771903):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.21432869918539):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.139</title>
			<desc>Главный бухгалтер</desc>
			<g id="shape139-207" v:mID="139" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="584.646" width="73.45" height="10.6299"/>
				<g id="shadow139-208" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st9"/>
				<text x="4.74" y="587.05" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный бухгалтер<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape144-213" v:mID="144" v:groupContext="shape" transform="translate(113.386,-332.362)">
			<title>Динамическая соединительная линия.144</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.98 L0 604.49 L-45.35 604.49 L-45.35 608.74" class="st12"/>
		</g>
		<g id="group145-217" transform="translate(31.1811,-255.118)" v:mID="145" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Департамент бухгалтерского учета и анализа)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0236220475731):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({C06328E7-91EA-494E-815E-D4DA45D44048})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-4.9343706898242E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850411959):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0.94488188976378):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.94488188927034,3.7795275590551)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(0.94488188976378,4.2814960631747)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32731846030213):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.7138087290729):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.32731846030213):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.32731846030213):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.145</title>
			<desc>Департамент бухгалтерского учета и анализа</desc>
			<g id="shape145-218" v:mID="145" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="578.268" width="73.45" height="17.0079"/>
				<g id="shadow145-219" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st9"/>
				<text x="14.34" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="1" dy="1.2em" class="st7">бухгалтерского</tspan> учета <tspan x="20" dy="1.2em" class="st7">и</tspan> анализа<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape150-226" v:mID="150" v:groupContext="shape" transform="translate(75.1181,-300.472)">
			<title>Динамическая соединительная линия.150</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 598.11 L-7.09 606.61" class="st12"/>
		</g>
		<g id="group151-230" transform="translate(112.677,-297.638)" v:mID="151" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Операционный департамент)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779545817):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1220472440945):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559091634):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({9C3BACDA-35D2-4EB9-9CF3-4C8DBABAD729})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.55118110293788):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850455266):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5748031490306):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.1259842519685,4.2814960631747)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5748031490306,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.36012685914261):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.2798289917321):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.2809951115389):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.151</title>
			<desc>Операционный департамент</desc>
			<g id="shape151-231" v:mID="151" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="40.3937" cy="584.646" width="80.51" height="10.6299"/>
				<g id="shadow151-232" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L80.79 574.02 L80.79 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.02 L80.79 574.02 L80.79 595.28 L0 595.28 Z" class="st9"/>
				<text x="14.11" y="582.25" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
							x="18.22" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape156-238" v:mID="156" v:groupContext="shape" transform="translate(113.386,-332.362)">
			<title>Динамическая соединительная линия.156</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.98 L0 604.49 L39.69 604.49 L39.69 608.74" class="st12"/>
		</g>
		<g id="group157-242" transform="translate(114.803,-136.063)" v:mID="157" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4( Управление по сопровождению договоров )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921267874):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.70866141730315):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({EC76DB72-7FA5-47CE-B2DE-1DBABA98EBA6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.3858205128467E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.0374015749956):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.1259842519685):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.1259842523071,2.2440944881791)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.1259842519685,4.2814960631747)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044182004024):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.69477252841426):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.49000472257771):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182004024):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182004024):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.62102084943933):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.157</title>
			<desc>Управление по сопровождению договоров страхования</desc>
			<g id="shape157-243" v:mID="157" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="569.764" width="76.27" height="25.5118"/>
				<g id="shadow157-244" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="13.63" y="557.76" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="9.98" dy="1.2em" class="st7">сопровождению</tspan> <tspan x="20.28" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="17.14" dy="1.2em" class="st7">страхования</tspan><tspan x="38.27" dy="1.2em" class="st7"> </tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group163-253" transform="translate(114.803,-240.236)" v:mID="163" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление администрирования договоров страхования и перестрахования)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921258416):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.67913385808513):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({72E0CDAE-1016-4351-A9EB-9BCC1A208249})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(8.1145934416327E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.6053149603873):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.1259842519685):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.12598425278,3.6761811027874)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.1259842519685,4.2814960631747)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181972499):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.66524496919624):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.51175406878509):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181972499):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181972499):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.67292348218384):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.163</title>
			<desc>Управление администрирования договоров страхования и перестра...</desc>
			<g id="shape163-254" v:mID="163" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="570.827" width="76.27" height="24.4488"/>
				<g id="shadow163-255" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="17.82" y="554.03" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="3.21" dy="1.2em" class="st7">администрирования</tspan> <tspan x="20.28" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="14.07" dy="1.2em" class="st7">страхования</tspan> и <tspan x="8.97" dy="1.2em" class="st7">перестрахования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group169-264" transform="translate(114.803,-97.6535)" v:mID="169" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление расчетов и платежей)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.062992126):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({34A078EF-DE3E-4DA2-B942-497B5E7564B5})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(7.3228179076068E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.6889763781353):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.1259842519685):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.1259842527008,1.5925196850394)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.1259842519685,4.2814960631747)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181977778):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.74242785596184):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181977778):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181977778):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778852167):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.169</title>
			<desc>Управление расчетов и платежей</desc>
			<g id="shape169-265" v:mID="169" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="76.27" height="17.0079"/>
				<g id="shadow169-266" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="1.77" y="575.87" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
							x="18.72" dy="1.2em" class="st7">и</tspan> платежей<v:newlineChar/> </text>			</g>
		</g>
		<g id="group175-272" transform="translate(114.803,-191.339)" v:mID="175" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление по контролю дебиторской задолженности)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(5):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921259843):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.59055118130906):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({36207F05-C1A0-4DAF-BB75-CF4932F2F257})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(7.4015638062974E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.3287401576629):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.1259842519685):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.1259842527087,2.9527559055118)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.1259842519685,4.2814960631747)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.57666229242017):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.59036601533931):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.56196573144229):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.175</title>
			<desc>Управление по контролю дебиторской задолженности</desc>
			<g id="shape175-273" v:mID="175" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="574.016" width="76.27" height="21.2598"/>
				<g id="shadow175-274" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="12.72" y="562.02" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="21.48" dy="1.2em" class="st7">контролю</tspan> <tspan x="16.17" dy="1.2em" class="st7">дебиторской</tspan> <tspan
							x="11.74" dy="1.2em" class="st7">задолженности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group181-282" transform="translate(31.8898,-221.102)" v:mID="181" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Административное управление )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535434252):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0039370083474):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070868504):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({66BF23F1-17FF-4C34-9B48-E627A278DF86})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.62992125926684):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.5354330716526):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5748031490306):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.94488188976378,3.2480314960748)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5748031490306,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181979615):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.94217796377754):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.24385625806973):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.181</title>
			<desc>Административное управление</desc>
			<g id="shape181-283" v:mID="181" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="582.52" width="72.04" height="12.7559"/>
				<g id="shadow181-284" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st9"/>
				<text x="3.3" y="575.32" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Административное <tspan
							x="15.99" dy="1.2em" class="st7">управление</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group195-290" transform="translate(195.591,-259.37)" v:mID="195" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Департамент корпоративного страхования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020669291380709):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.93982002463779):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41338582761417):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({93805E13-82D5-4B69-AD2A-9C9ECC2EFA9C})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.53149606402756):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.47244094500787):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.7179415089646):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960630079):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.186445444937,3.809055118)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.7179415089646,4.2814960630079)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.29938445265704):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39949693872529):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.74940362149537):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.29938445265704):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.29938445265704):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40671664224133):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.195</title>
			<desc>Департамент корпоративного страхования</desc>
			<g id="shape195-291" v:mID="195" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="33.8335" cy="580.394" width="67.44" height="14.8819"/>
				<g id="shadow195-292" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L67.67 565.51 L67.67 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 565.51 L67.67 565.51 L67.67 595.28 L0 595.28 Z" class="st9"/>
				<text x="11.32" y="573.19" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="6.19" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.7" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group206-299" transform="translate(272.126,-216.709)" v:mID="206" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Департамент перестрахования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047241458):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094482917):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({BFF83A06-F207-433E-BFA8-2ABFFE804BF8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.53149606299213):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.5374015749486):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.7204724401575):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.2519685031496,3.2460629916154)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.7204724401575,4.783464566564)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.45855205594028):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047467602):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778849531):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.206</title>
			<desc>Департамент перестрахования</desc>
			<g id="shape206-300" v:mID="206" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow206-301" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
				<text x="11.5" y="575.87" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.72" dy="1.2em" class="st7">перестрахования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group211-307" transform="translate(195.591,-216.85)" v:mID="211" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление корпоративного страхования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047293012):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094586024):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({090C3FEF-6429-4F70-9464-635E1B72CB11})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.0025309330157484):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.561023622):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.186445444937):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.809055118):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.1889763779528,3.248031496)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.186445444937,3.809055118)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.45855205697135):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047319969):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420136436):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.211</title>
			<desc>Управление корпоративного страхования</desc>
			<g id="shape211-308" v:mID="211" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow211-309" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
				<text x="13.57" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="6.37" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.89" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group230-316" transform="translate(425.197,-284.74)" v:mID="230" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление партнерских продаж)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023615945):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023618898):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.2362204723189):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1390C0C5-2C84-4F8C-B939-30B7AD49180F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.1072834642835):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.179133858):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.388779528):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.251968504):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.4960629922835,103.4500000084MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.388779528,108.0000000016MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.3798118984077):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158343001):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7083128386357):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158343001):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158343001):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25146755224018):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.230</title>
			<desc>Управление партнерских продаж</desc>
			<g id="shape230-317" v:mID="230" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="84.75" height="8.50394"/>
				<g id="shadow230-318" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="22.07" y="584.37" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="7.1" dy="1.2em" class="st7">партнерских</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="group235-324" transform="translate(357.165,-242.22)" v:mID="235" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Департамент регионального развития )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047231792):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.82677165325197):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094463583):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({82B89068-6AB7-40C3-964F-C52E2A98BC75})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.38385826774803):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.183070865997):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.757874015748):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566997):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.374015748,3.600393701)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.757874015748,4.783464566997)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.2617016621951):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.45855205574694):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.57071309334512):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.2617016621951):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.2617016621951):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420075216):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.235</title>
			<desc>Департамент регионального развития</desc>
			<g id="shape235-325" v:mID="235" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="29.7638" cy="578.268" width="59.33" height="17.0079"/>
				<g id="shadow235-326" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L59.53 561.26 L59.53 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L59.53 561.26 L59.53 595.28 L0 595.28 Z" class="st9"/>
				<text x="7.25" y="571.07" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.3" dy="1.2em" class="st7">регионального</tspan> <tspan x="14.37" dy="1.2em" class="st7">развития</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group240-333" transform="translate(420.945,-250.724)" v:mID="240" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Филиалы )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023619685):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023620472):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.2362204723937):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({E4C27411-757A-4C79-AEAE-9E8965BDF17F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.062992126):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.374015748):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.600393701):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.437007874,3.600393701)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.374015748,3.600393701)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158350481):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7083128382971):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158350481):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158350481):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113992407):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.240</title>
			<desc>Филиалы</desc>
			<g id="shape240-334" v:mID="240" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="84.75" height="8.50394"/>
				<g id="shadow240-335" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="26.74" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>			</g>
		</g>
		<g id="group245-340" transform="translate(357.165,-212.598)" v:mID="245" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Юридический департамент )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.01771653544685):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.82677165327953):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070893701):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({82A6B1BA-4CD0-473B-A97D-016CF0181FF9})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.38385826763779):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.653543306997):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.757874015748):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566997):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.3740157481102,3.12992126)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.757874015748,4.783464566997)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.26170166220429):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182004812):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.76871185263695):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.26170166220429):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.26170166220429):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267054923):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.245</title>
			<desc>Юридический департамент</desc>
			<g id="shape245-341" v:mID="245" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="29.7638" cy="582.52" width="59.33" height="12.7559"/>
				<g id="shadow245-342" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L59.53 569.76 L59.53 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L59.53 569.76 L59.53 595.28 L0 595.28 Z" class="st9"/>
				<text x="5.85" y="580.12" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
							x="7.59" dy="1.2em" class="st7">департамент</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group250-348" transform="translate(420.945,-212.598)" v:mID="250" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление правового обеспечения )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535417634):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023620472):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070835267):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({90EDB92B-FDC0-451A-9E18-CFCEBE3EA5B6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.062992126):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.3740157481102):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.12992126):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.4370078741102,3.12992126)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.3740157481102,3.12992126)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181946378):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1156440740988):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181946378):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181946378):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267025707):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.250</title>
			<desc>Управление правового обеспечения</desc>
			<g id="shape250-349" v:mID="250" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="84.75" height="12.7559"/>
				<g id="shadow250-350" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="3.53" y="580.12" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление правового <tspan
							x="20.46" dy="1.2em" class="st7">обеспечения</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group255-356" transform="translate(420.945,-182.835)" v:mID="255" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление по претензионно-исковой работе)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535419685):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023620472):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.3543307083937):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1A5CA138-21B1-492A-AEF6-A34664DC734E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.062992126):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.41338582649606):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.3740157481102):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.12992126):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.4370078741102,2.7165354335039)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.3740157481102,3.12992126)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181950481):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1156440739644):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181950481):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181950481):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3771890826311):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.255</title>
			<desc>Управление по претензионно-исковой работе</desc>
			<g id="shape255-357" v:mID="255" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="84.75" height="12.7559"/>
				<g id="shadow255-358" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="16.98" y="575.32" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="3.09" dy="1.2em" class="st7">претензионно</tspan>-исковой <tspan x="30.72" dy="1.2em" class="st7">работе</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group260-365" transform="translate(516.501,-306.142)" v:mID="260" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Департамент страховых выплат )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023612795):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.240157480315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047225591):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({24636543-A3BF-4F57-B1A3-D45B74B5958E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291288977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.41338582772736):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,4.37007874)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693788276):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158336702):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519444369):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158336702):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158336702):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25146755220868):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.260</title>
			<desc>Департамент страховых выплат</desc>
			<g id="shape260-366" v:mID="260" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow260-367" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="3.82" y="584.37" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
							x="32.48" dy="1.2em" class="st7">выплат</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group265-373" transform="translate(516.501,-281.259)" v:mID="265" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(контроля выплат )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014228716384858):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574796422):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.28457432769716):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({F102C497-1290-47FB-87DC-DFCC5241C8A2})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.321421021):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.7937007871131):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.37007874):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,4.048657719)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,4.37007874)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693765852):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.27068543880827):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4758715482346):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.27068543880827):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.27068543880827):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.14231165522228):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.265</title>
			<desc>Управление контроля выплат</desc>
			<g id="shape265-374" v:mID="265" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="585.031" width="88.99" height="10.2447"/>
				<g id="shadow265-375" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="24.2" y="582.63" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
							x="15.77" dy="1.2em" class="st7">контроля</tspan> выплат </text>			</g>
		</g>
		<g id="group270-381" transform="translate(516.501,-250.866)" v:mID="270" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017667322836022):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574795192):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35334645672045):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({12A79B2A-2BBB-4D70-AD09-29E4A16397A6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.387732522):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.7937007871131):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.048657719):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,3.660925197)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,4.048657719)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693761751):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.33945756783156):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1768685558242):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.33945756783156):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.33945756783156):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.37669695679447):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.270</title>
			<desc>Управление аварийного комиссариата</desc>
			<g id="shape270-382" v:mID="270" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="582.555" width="88.99" height="12.7205"/>
				<g id="shadow270-383" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.83 L89.29 569.83 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.83 L89.29 569.83 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="24.2" y="575.35" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="24.73" dy="1.2em" class="st7">аварийного</tspan> <tspan x="20.87" dy="1.2em" class="st7">комиссариата</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group275-390" transform="translate(516.501,-229.606)" v:mID="275" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление маркетинга )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023625492):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574798937):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047250984):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D50BEF27-523C-40A5-BDDA-232C304AF6D9})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.4763779527274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,3.307086615)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693774234):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158362095):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519417531):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158362095):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158362095):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113998213):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.275</title>
			<desc>Управление маркетинга</desc>
			<g id="shape275-391" v:mID="275" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow275-392" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="3.58" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>			</g>
		</g>
		<g id="group280-397" transform="translate(516.501,-208.205)" v:mID="280" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(HR-управление )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023618792):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574802977):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047237583):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({68B4C0CD-07AA-423C-AEB2-FBDA9331D585})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291288977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.7736220477274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,3.00984252)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693787702):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158348694):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519434419):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158348694):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158348694):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113991513):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.280</title>
			<desc>HR-управление</desc>
			<g id="shape280-398" v:mID="280" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow280-399" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="18.61" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>			</g>
		</g>
		<g id="group285-404" transform="translate(516.501,-187.087)" v:mID="285" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Отдел кадров )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023625984):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574801195):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047251969):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({A4150864-29CC-47BF-9059-B221C7271C03})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.293307086):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.793700787113):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.00984252):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,2.716535434)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,3.00984252)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693781762):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.2223315836308):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519420121):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.2223315836308):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.2223315836308):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113998706):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.285</title>
			<desc>Отдел кадров</desc>
			<g id="shape285-405" v:mID="285" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow285-406" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="21.15" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group290-411" transform="translate(516.501,-165.685)" v:mID="290" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Отдел развития персонала )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023597441):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574805182):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047194882):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({76363B01-456C-46D2-8DBE-2AEED61E2555})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.0000000827404E-009):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.590551181):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.793700787113):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.00984252):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,2.419291339)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.7937007871131,3.00984252)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693795051):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158305993):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519472235):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158305993):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158305993):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25146755205514):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.290</title>
			<desc>Отдел развития персонала</desc>
			<g id="shape290-412" v:mID="290" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow290-413" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="17.89" y="584.37" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
							x="26.66" dy="1.2em" class="st7">персонала</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group295-419" transform="translate(516.501,-140.457)" v:mID="295" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управление по внешним коммуникациям )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.01466535433504):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574800315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29330708670079):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({758D3F6A-AF40-49D1-A700-4CF305661B4A})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.6860236227274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,2.097440945)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4297455960875):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.28001085943112):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.295</title>
			<desc>Управление по внешним коммуникациям</desc>
			<g id="shape295-420" v:mID="295" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="584.717" width="88.99" height="10.5591"/>
				<g id="shadow295-421" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.16 L89.29 574.16 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.16 L89.29 574.16 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="2.23" y="582.32" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по внешним <tspan
							x="16.46" dy="1.2em" class="st7">коммуникациям</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group300-427" transform="translate(516.501,-119.055)" v:mID="300" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Отдел Contact-center )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023607087):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574804665):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047214174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({54BA7226-860C-40A7-98A7-109C6567A138})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.0118110237274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,1.771653544)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693793329):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158325285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519455869):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158325285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158325285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113979808):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.300</title>
			<desc>Отдел Contact-center</desc>
			<g id="shape300-428" v:mID="300" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow300-429" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="8.92" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел Contact-center  <v:newlineChar/> </text>			</g>
		</g>
		<g id="group305-434" transform="translate(516.614,-97.7953)" v:mID="305" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Служба контроля качества)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023623179):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574800315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047246358):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D077DF95-CD93-44E7-AEC1-FF4123EDF427})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.0015748026664779):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.295275591):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.7937007881131):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(1.771653544):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7952755907795,1.476377953)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,1.771653544)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158357469):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519423335):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158357469):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158357469):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25146755231252):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.305</title>
			<desc>Служба контроля качества</desc>
			<g id="shape305-435" v:mID="305" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow305-436" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="15.15" y="584.37" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
							x="29.94" dy="1.2em" class="st7">качества</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group310-442" transform="translate(516.501,-76.5354)" v:mID="310" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Служба аджастеров )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023606841):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574799488):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047213681):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({458FA027-900C-415B-B89D-2361F11C660F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.6023622057274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,1.181102362)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693776072):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158324792):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519448505):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158324792):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158324792):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480113979562):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.310</title>
			<desc>Служба аджастеров</desc>
			<g id="shape310-443" v:mID="310" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow310-444" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="10.78" y="589.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба аджастеров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group315-449" transform="translate(516.501,-51.0236)" v:mID="315" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Служба информационной безопасности)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023614173):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574800315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047228347):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({7BC8E975-30FE-40E0-B272-0DEC9A92FE73})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.9566929137274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7937007881131,0.826771654)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158339458):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519437892):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158339458):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158339458):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25146755222246):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.315</title>
			<desc>Служба информационной безопасности</desc>
			<g id="shape315-450" v:mID="315" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow315-451" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="0.34" y="584.37" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба информационной <tspan
							x="21.38" dy="1.2em" class="st7">безопасности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group320-457" transform="translate(516.614,-29.7638)" v:mID="320" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Канцелярия )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.01181102363937):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574800315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.2362204727874):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({2DFCC530-6E9E-4E89-A01C-154A086B80E1})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20826771633577):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-4.2519685047274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.5870078742233):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.7952755905591,0.531496063)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.5870078742233,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519397164):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.18480114012092):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.320</title>
			<desc>Канцелярия</desc>
			<g id="shape320-458" v:mID="320" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="88.99" height="8.50394"/>
				<g id="shadow320-459" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="24.17" y="589.17" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия <v:newlineChar/> </text>			</g>
		</g>
		<g id="group325-464" transform="translate(623.278,-297.638)" v:mID="325" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Департамент андеррайтинга )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535425689):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574799783):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070851378):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({69AC883F-62DD-4DAE-8333-DE50407BF5A8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.47244094572736):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464568):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.3110236222726)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.783464568)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693777056):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181962489):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1734661100412):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181962489):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181962489):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267033762):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.325</title>
			<desc>Департамент андеррайтинга</desc>
			<g id="shape325-465" v:mID="325" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="582.52" width="88.99" height="12.7559"/>
				<g id="shadow325-466" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st9"/>
				<text x="22.13" y="580.12" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="18.94" dy="1.2em" class="st7">андеррайтинга</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group330-472" transform="translate(627.894,-267.874)" v:mID="330" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Управление сопровождения ДМС)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535437377):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0579302587944):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070874754):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({E81B3380-7502-4881-A377-9D41338BB3B5})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.026996625628517):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.413385827):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.3110236222726):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.2497187853715,3.8976377952726)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.3110236222726)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.33875453070925):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181985865):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.99504382525597):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.33875453070925):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.33875453070925):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226704545):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.330</title>
			<desc>Управление сопровождения ДМС</desc>
			<g id="shape330-473" v:mID="330" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="582.52" width="75.91" height="12.7559"/>
				<g id="shadow330-474" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st9"/>
				<text x="17.64" y="580.12" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="1.76" dy="1.2em" class="st7">сопровождения</tspan> ДМС<v:newlineChar/> </text>			</g>
		</g>
		<g id="group335-480" transform="translate(627.894,-246.614)" v:mID="335" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел методологии)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023641339):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0579302587944):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047282677):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({11038837-00C4-4357-82FA-0674F032FFDA})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.026996625628517):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.767716535):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.3110236222726):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.2497187853715,3.5433070872726)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.3110236222726)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.33875453070925):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158393788):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5236455599754):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158393788):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158393788):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.1848011401406):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.335</title>
			<desc>Отдел методологии</desc>
			<g id="shape335-481" v:mID="335" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="586.772" width="75.91" height="8.50394"/>
				<g id="shadow335-482" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st9"/>
				<text x="4.17" y="589.17" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>			</g>
		</g>
		<g id="group340-487" transform="translate(621.152,-216.85)" v:mID="340" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Управление стратегического анализа )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535425):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2350956128948):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.3543307085):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1108D926-E9FF-4FF9-AD4C-31FC9457C550})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.032058492765184):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.5944881897274):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464568):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.2446569182348,3.1889763782726)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.783464568)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39780964874272):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181961111):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1685099356981):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181961111):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181961111):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267033073):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.340</title>
			<desc>Управление стратегического анализа</desc>
			<g id="shape340-488" v:mID="340" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.4634" cy="582.52" width="88.62" height="12.7559"/>
				<g id="shadow340-489" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L88.93 569.76 L88.93 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L88.93 569.76 L88.93 595.28 L0 595.28 Z" class="st9"/>
				<text x="24.02" y="580.12" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="2.42" dy="1.2em" class="st7">стратегического</tspan> анализа <v:newlineChar/> </text>			</g>
		</g>
		<g id="group345-495" transform="translate(731.339,-297.638)" v:mID="345" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Технологический департамент)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535423819):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921259843):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070847638):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({10CFF5D4-A716-49A6-9E94-9BC25388C8AB})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.059055118110237):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.47244094664272):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.62992126):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.68897637811,4.3110236223573)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.62992126,4.783464569)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181958749):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.0000000005435):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181958749):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181958749):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267031892):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.345</title>
			<desc>Технологический департамент</desc>
			<g id="shape345-496" v:mID="345" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="582.52" width="76.27" height="12.7559"/>
				<g id="shadow345-497" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="8.92" y="580.12" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
							x="16.1" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group350-503" transform="translate(731.339,-272.126)" v:mID="350" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Департамент программирования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779515354):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921259843):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559030709):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({B83E09B1-D5CC-480F-AF7F-CC3853387BD2})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.059055118110237):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.85629921364272):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.62992126):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.68897637811,3.9271653553573)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.62992126,4.783464569)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.2813867014182):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.2098717460942):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.2813867014182):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.2813867014182):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.28099511123427):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.350</title>
			<desc>Департамент программирования</desc>
			<g id="shape350-504" v:mID="350" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="584.646" width="76.27" height="10.6299"/>
				<g id="shadow350-505" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="15.75" y="582.25" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.76" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group355-511" transform="translate(735.591,-238.11)" v:mID="355" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020570866141733):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.003937007874):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41141732283465):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({4FB091F5-3CDE-45D2-A92E-069E4ED1902B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.029527559055118):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.414370079):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.68897637811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.9271653553573):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937165,3.5127952763573)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.68897637811,3.9271653553573)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39752843394576):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.80687757909215):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40573238985157):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.355</title>
			<desc>Управление Web-программирования</desc>
			<g id="shape355-512" v:mID="355" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="72.04" height="14.811"/>
				<g id="shadow355-513" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st9"/>
				<text x="15.69" y="573.26" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="27.27" dy="1.2em" class="st7">Web</tspan>-<tspan x="2.64" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group360-520" transform="translate(735.591,-204.094)" v:mID="360" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление системных разработок )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020570866122392):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.003937007874):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41141732244784):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({C0727AB4-BDF9-4F5A-8CBE-6B39047E98D3})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.029527559055118):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.886811024):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.68897637811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.9271653553573):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937165,3.0403543313573)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.68897637811,3.9271653553573)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39752843355895):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.80687757987728):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.32075678040245):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40573238965816):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.360</title>
			<desc>Управление системных разработок</desc>
			<g id="shape360-521" v:mID="360" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="72.04" height="14.811"/>
				<g id="shadow360-522" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st9"/>
				<text x="15.69" y="573.26" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="17.82" dy="1.2em" class="st7">системных</tspan> <tspan x="16.66" dy="1.2em" class="st7">разработок</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group365-529" transform="translate(731.339,-165.685)" v:mID="365" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управление системного администрирования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0629921259744):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({344D02C8-E86A-4AF6-8B53-554F2D625641})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.059055118105317):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.2460629936427):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.62992126):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976378105,2.5374015753573)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.62992126,4.783464569)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34044181976925):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.74242785594324):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181976925):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181976925):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.365</title>
			<desc>Управление системного администрирования</desc>
			<g id="shape365-530" v:mID="365" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="76.27" height="17.0079"/>
				<g id="shadow365-531" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st9"/>
				<text x="17.82" y="571.07" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="18.74" dy="1.2em" class="st7">системного</tspan> <tspan x="3.21" dy="1.2em" class="st7">администрирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group370-538" transform="translate(314.646,-161.575)" v:mID="370" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0"
						v:val="VT4(Департамент страхового посредничества )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({90F006BA-9E9C-40E3-A1D9-242A801CB788})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.70866141696063):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.9527559063701):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(123MM,63MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420087519):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.370</title>
			<desc>Департамент страхового посредничества</desc>
			<g id="shape370-539" v:mID="370" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow370-540" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
				<text x="11.5" y="571.07" class="st6" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="15.4" dy="1.2em" class="st7">страхового</tspan> <tspan x="6.57" dy="1.2em" class="st7">посредничества</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group375-547" transform="translate(263.622,-110.551)" v:mID="375" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Управления страхования)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4()"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D0B58870-30F2-48D8-8FC7-2713DB1F0DB4})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30291137616816):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.375</title>
			<desc>Управления страхования</desc>
			<g id="shape375-548" v:mID="375" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow375-549" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
				<text x="13.66" y="571.07" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управления <tspan
							x="12.89" dy="1.2em" class="st7">страхования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group395-555" transform="translate(722.835,-331.654)" v:mID="395" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Управляющий директор)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535469587):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023622047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070939174):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({0324452B-3497-4C02-AD38-83C1087AB3A6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(5.078740158):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.649606298):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(270.000000004MM,121.5000000526MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189851269):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.115644070848):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.24385625842308):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.395</title>
			<desc>Управляющий директор</desc>
			<g id="shape395-556" v:mID="395" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="84.75" height="12.7559"/>
				<g id="shadow395-557" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="1.24" y="584.92" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий директор<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape29-562" v:mID="29" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.29</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 544.25 L-42.52 544.25" class="st12"/>
		</g>
		<g id="group17-566" transform="translate(193.606,-416.693)" v:mID="17" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Комитет по рискам)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535433071):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070866141):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({F3E1F859-4940-4908-B8B5-639E93CD0988})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-2.38976378):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.29527559043307):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(80.2999999788MM,151.500000011MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.24385625805792):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.17</title>
			<desc>Комитет по рискам</desc>
			<g id="shape17-567" v:mID="17" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="67.8" height="12.7559"/>
				<g id="shadow17-568" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="1.35" y="584.92" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по рискам<v:newlineChar/> </text>			</g>
		</g>
		<g id="group77-573" transform="translate(535.748,-416.693)" v:mID="77" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
						v:val="VT4(Выплатной комитет)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(3):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535433071):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070866141):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({DB7D0990-5C91-4318-9EE8-DA18C65A0D6D})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.3622047248898):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.29527559043307):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(201.000000003MM,151.500000011MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.24385625805792):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.77</title>
			<desc>Выплатной комитет</desc>
			<g id="shape77-574" v:mID="77" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="67.8" height="12.7559"/>
				<g id="shadow77-575" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st10"/>
				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st11"/>
				<text x="0.35" y="584.92" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной комитет<v:newlineChar/> </text>			</g>
		</g>
		<g id="group162-580" transform="translate(365.669,-110.551)" v:mID="162" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Управления активных продаж)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4( )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D50B95E0-88A3-4AFD-A8FF-DA75552FCF18})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30291137616816):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.162</title>
			<desc>Управления активных продаж</desc>
			<g id="shape162-581" v:mID="162" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="67.8" height="17.0079"/>
				<g id="shadow162-582" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
				<text x="13.66" y="571.07" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/>Управления <tspan
							x="3.98" dy="1.2em" class="st7">активных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape402-588" v:mID="402" v:groupContext="shape" transform="translate(433.701,-453.543)">
			<title>Динамическая соединительная линия.402</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L136.06 598.11 L136.06 606.61" class="st12"/>
		</g>
		<g id="shape404-592" v:mID="404" v:groupContext="shape" transform="translate(365.669,-453.543)">
			<title>Динамическая соединительная линия.404</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-138.05 598.11 L-138.05 606.61" class="st12"/>
		</g>
		<g id="shape30-596" v:mID="30" v:groupContext="shape" transform="translate(365.669,-517.323)">
			<title>Динамическая соединительная линия.30</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 602.36 L-42.52 602.36" class="st12"/>
		</g>
		<g id="shape31-600" v:mID="31" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.31</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 569.76 L-42.52 569.76" class="st12"/>
		</g>
		<g id="shape137-604" v:mID="137" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.137</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 620.79 L-42.52 620.79" class="st12"/>
		</g>
		<g id="shape32-608" v:mID="32" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.32</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 544.25 L34.02 544.25" class="st12"/>
		</g>
		<g id="shape219-612" v:mID="219" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.219</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 637.8 L34.02 637.8" class="st12"/>
		</g>
		<g id="shape138-616" v:mID="138" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.138</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 569.76 L34.02 569.76" class="st12"/>
		</g>
		<g id="shape220-620" v:mID="220" v:groupContext="shape" transform="translate(433.701,-513.071)">
			<title>Динамическая соединительная линия.220</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L8.5 598.11 L8.5 606.61 L34.02 606.61" class="st12"/>
		</g>
		<g id="shape23-624" v:mID="23" v:groupContext="shape" transform="translate(365.669,-453.543)">
			<title>Динамическая соединительная линия.23</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-59.53 598.11 L-59.53 606.61" class="st12"/>
		</g>
		<g id="shape94-628" v:mID="94" v:groupContext="shape" transform="translate(368.504,-398.268)">
			<title>Динамическая соединительная линия.94</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-2.83 602.36 L-11.34 602.36" class="st12"/>
		</g>
		<g id="shape127-632" v:mID="127" v:groupContext="shape" transform="translate(392.598,-433.701)">
			<title>Динамическая соединительная линия.127</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st12"/>
		</g>
		<g id="shape128-636" v:mID="128" v:groupContext="shape" transform="translate(106.654,-308.268)">
			<title>Динамическая соединительная линия.128</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.02 595.28 L1.77 595.28 L1.77 638.86 L8.15 638.86" class="st12"/>
		</g>
		<g id="shape130-640" v:mID="130" v:groupContext="shape" transform="translate(106.654,-308.268)">
			<title>Динамическая соединительная линия.130</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.02 595.28 L1.77 595.28 L1.77 788.88 L8.15 788.88" class="st12"/>
		</g>
		<g id="shape126-644" v:mID="126" v:groupContext="shape" transform="translate(106.654,-308.268)">
			<title>Динамическая соединительная линия.126</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.02 595.28 L1.77 595.28 L1.77 690.94 L8.15 690.94" class="st12"/>
		</g>
		<g id="shape131-648" v:mID="131" v:groupContext="shape" transform="translate(106.654,-308.268)">
			<title>Динамическая соединительная линия.131</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.02 595.28 L1.77 595.28 L1.77 741.97 L8.15 741.97" class="st12"/>
		</g>
		<g id="shape133-652" v:mID="133" v:groupContext="shape" transform="translate(222.429,-262.205)">
			<title>Динамическая соединительная линия.133</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7 598.11 L7 602.36 L7.18 602.36 L7.18 606.61" class="st12"/>
		</g>
		<g id="shape132-656" v:mID="132" v:groupContext="shape" transform="translate(326.511,-344.409)">
			<title>Динамическая соединительная линия.132</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0.53 595.28 L22.15 595.28 L22.15 705.97 L13.65 705.97" class="st12"/>
		</g>
		<g id="shape136-660" v:mID="136" v:groupContext="shape" transform="translate(350.079,-344.409)">
			<title>Динамическая соединительная линия.136</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L1.42 595.28 L1.42 714.33 L7.09 714.33" class="st12"/>
		</g>
		<g id="shape135-664" v:mID="135" v:groupContext="shape" transform="translate(411.732,-252.142)">
			<title>Динамическая соединительная линия.135</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 588.19 L9.21 588.19" class="st12"/>
		</g>
		<g id="shape186-668" v:mID="186" v:groupContext="shape" transform="translate(411.732,-218.268)">
			<title>Динамическая соединительная линия.186</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 588.19 L9.21 588.19" class="st12"/>
		</g>
		<g id="shape193-672" v:mID="193" v:groupContext="shape" transform="translate(411.732,-225.354)">
			<title>Динамическая соединительная линия.193</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L7.09 595.28 L7.09 625.04 L9.21 625.04" class="st12"/>
		</g>
		<g id="shape218-676" v:mID="218" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.218</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-51.02 603.78 L-51.02 773.86" class="st12"/>
		</g>
		<g id="shape383-680" v:mID="383" v:groupContext="shape" transform="translate(348.661,-155.906)">
			<title>Динамическая соединительная линия.383</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L-51.02 602.36 L-51.02 606.61" class="st12"/>
		</g>
		<g id="shape384-684" v:mID="384" v:groupContext="shape" transform="translate(341.575,-154.488)">
			<title>Динамическая соединительная линия.384</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape385-685" v:mID="385" v:groupContext="shape" transform="translate(348.661,-161.575)">
			<title>Динамическая соединительная линия.385</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 608.03 L51.02 608.03 L51.02 612.28" class="st12"/>
		</g>
		<g id="shape405-689" v:mID="405" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.405</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 612.28 L59.53 612.28" class="st12"/>
		</g>
		<g id="shape406-693" v:mID="406" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.406</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 688.82 L59.53 688.82" class="st12"/>
		</g>
		<g id="shape407-697" v:mID="407" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.407</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 710.22 L59.53 710.22" class="st12"/>
		</g>
		<g id="shape408-701" v:mID="408" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.408</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 775.91 L59.53 775.91" class="st12"/>
		</g>
		<g id="shape409-705" v:mID="409" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.409</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 799.37 L59.53 799.37" class="st12"/>
		</g>
		<g id="shape410-709" v:mID="410" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.410</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 841.89 L59.53 841.89" class="st12"/>
		</g>
		<g id="shape411-713" v:mID="411" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.411</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 867.4 L59.53 867.4" class="st12"/>
		</g>
		<g id="shape412-717" v:mID="412" v:groupContext="shape" transform="translate(546.265,-331.654)">
			<title>Динамическая соединительная линия.412</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 888.66 L59.64 888.66" class="st12"/>
		</g>
		<g id="shape413-721" v:mID="413" v:groupContext="shape" transform="translate(523.587,-263.587)">
			<title>Динамическая соединительная линия.413</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L-9.21 595.28 L-9.21 567.36 L-7.09 567.36" class="st12"/>
		</g>
		<g id="shape414-725" v:mID="414" v:groupContext="shape" transform="translate(509.414,-314.646)">
			<title>Динамическая соединительная линия.414</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L4.96 595.28 L4.96 618.42 L7.09 618.42" class="st12"/>
		</g>
		<g id="shape415-729" v:mID="415" v:groupContext="shape" transform="translate(509.414,-216.709)">
			<title>Динамическая соединительная линия.415</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L2.83 595.28 L2.83 637.8 L7.09 637.8" class="st12"/>
		</g>
		<g id="shape416-733" v:mID="416" v:groupContext="shape" transform="translate(509.414,-216.709)">
			<title>Динамическая соединительная линия.416</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L2.83 595.28 L2.83 616.39 L7.09 616.39" class="st12"/>
		</g>
		<g id="shape417-737" v:mID="417" v:groupContext="shape" transform="translate(720.901,-344.409)">
			<title>Динамическая соединительная линия.417</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-5.84 595.28 L-1.59 595.28 L-1.59 629.29 L-8.33 629.29" class="st12"/>
		</g>
		<g id="shape418-741" v:mID="418" v:groupContext="shape" transform="translate(719.656,-344.409)">
			<title>Динамическая соединительная линия.418</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-4.6 595.28 L-0.34 595.28 L-0.34 710.08 L-9.58 710.08" class="st12"/>
		</g>
		<g id="shape421-745" v:mID="421" v:groupContext="shape" transform="translate(800.787,-344.409)">
			<title>Динамическая соединительная линия.421</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 629.29 L7.09 629.29" class="st12"/>
		</g>
		<g id="shape423-749" v:mID="423" v:groupContext="shape" transform="translate(800.787,-344.409)">
			<title>Динамическая соединительная линия.423</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 656.93 L7.09 656.93" class="st12"/>
		</g>
		<g id="shape424-753" v:mID="424" v:groupContext="shape" transform="translate(814.961,-344.409)">
			<title>Динамическая соединительная линия.424</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L1.42 595.28 L1.42 756.99 L-7.09 756.99" class="st12"/>
		</g>
		<g id="shape425-757" v:mID="425" v:groupContext="shape" transform="translate(726.378,-282.756)">
			<title>Динамическая соединительная линия.425</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L-3.54 595.28 L-3.54 625.11 L9.21 625.11" class="st12"/>
		</g>
		<g id="shape426-761" v:mID="426" v:groupContext="shape" transform="translate(726.378,-282.756)">
			<title>Динамическая соединительная линия.426</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L-3.54 595.28 L-3.54 659.13 L9.21 659.13" class="st12"/>
		</g>
		<g id="shape386-765" v:mID="386" v:groupContext="shape" transform="translate(430.866,-398.268)">
			<title>Динамическая соединительная линия.386</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 602.36 L11.34 602.36" class="st12"/>
		</g>
		<g id="shape168-769" v:mID="168" v:groupContext="shape" transform="translate(272.126,-259.37)">
			<title>Должность.201</title>
			<desc>Управление страхования ответственности</desc>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
			<v:textRect cx="34.0157" cy="580.394" width="68.04" height="29.7638"/>
			<g id="shadow168-770" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
					transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
				<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st8"/>
			</g>
			<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st9"/>
			<text x="13.57" y="573.19" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
						x="12.89" dy="1.2em" class="st7">страхования</tspan> <tspan x="5.97" dy="1.2em" class="st7">ответственности</tspan><v:newlineChar/> </text>		</g>
		<g id="group188-777" transform="translate(225.172,-297.638)" v:mID="188" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0"
						v:val="VT4(Управляющий директор)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779529134):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023618189):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559058268):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({3B1897AB-01AD-4EAF-83D3-234F55E92415})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.0025309311929034):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.5019685035561):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.7204724401575):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.7179415089646,4.2814960630079)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.7204724401575,4.783464566564)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189838408):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.349786241133):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.21432869901855):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.188</title>
			<desc>Управляющий директор</desc>
			<g id="shape188-778" v:mID="188" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="584.646" width="84.75" height="10.6299"/>
				<g id="shadow188-779" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="1.24" y="587.05" class="st6" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий директор<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape194-784" v:mID="194" v:groupContext="shape" transform="translate(274.87,-332.362)">
			<title>Динамическая соединительная линия.194</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7 595.98 L-7 604.49 L-7.18 604.49 L-7.18 608.74" class="st12"/>
		</g>
		<g id="shape200-788" v:mID="200" v:groupContext="shape" transform="translate(267.692,-300.472)">
			<title>Динамическая соединительная линия.200</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L-38.27 602.36 L-38.27 606.61" class="st12"/>
		</g>
		<g id="shape201-792" v:mID="201" v:groupContext="shape" transform="translate(267.692,-300.472)">
			<title>Динамическая соединительная линия.201</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L38.45 602.36 L38.45 606.61" class="st12"/>
		</g>
		<g id="shape134-796" v:mID="134" v:groupContext="shape" transform="translate(350.079,-344.409)">
			<title>Динамическая соединительная линия.134</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L1.42 595.28 L1.42 680.46 L7.09 680.46" class="st12"/>
		</g>
		<g id="group205-800" transform="translate(357.165,-289.134)" v:mID="205" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="2057" v:cal="0"
						v:val="VT4(Департамент развития партнерских отношений)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.85629921268504):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({87F09E5F-2F96-4183-946E-4186E722AC6B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.107283464):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.118110236):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.496062992):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.37007874):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.388779528,4.251968504)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.496062992,4.37007874)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.59217743865108):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.50291061322871):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.205</title>
			<desc>Департамент развития партнерских отношений</desc>
			<g id="shape205-801" v:mID="205" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="30.8268" cy="578.268" width="61.44" height="17.0079"/>
				<g id="shadow205-802" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L61.65 561.26 L61.65 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 561.26 L61.65 561.26 L61.65 595.28 L0 595.28 Z" class="st9"/>
				<text x="8.31" y="566.27" class="st6" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="15.43" dy="1.2em" class="st7">развития</tspan> <tspan x="9.51" dy="1.2em" class="st7">партнерских</tspan> <tspan
							x="11.55" dy="1.2em" class="st7">отношений</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape202-810" v:mID="202" v:groupContext="shape" transform="translate(618.499,-310.394)">
			<title>Динамическая соединительная линия.202</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.78 595.28 L-3.73 595.28 L-3.73 625.04 L9.39 625.04" class="st12"/>
		</g>
		<g id="shape204-814" v:mID="204" v:groupContext="shape" transform="translate(618.499,-310.394)">
			<title>Динамическая соединительная линия.204</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.78 595.28 L-3.73 595.28 L-3.73 650.55 L9.39 650.55" class="st12"/>
		</g>
		<g id="shape203-818" v:mID="203" v:groupContext="shape" transform="translate(414.921,-306.78)">
			<title>Динамическая соединительная линия.203</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M3.9 595.91 L6.02 595.91 L6.02 608.81 L10.28 608.81" class="st12"/>
		</g>
		<g id="group217-822" transform="translate(425.197,-306.142)" v:mID="217" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Управление электронных продаж)"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Электронная почта)"/>
				<v:cp v:nameU="Calendar" v:lbl="" v:prompt="" v:type="0" v:format="" v:sortKey="" v:invis="false" v:ask="false"
						v:langID="0" v:cal="0"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.011811023622047):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023622047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047244094):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({AE7B4753-1648-4311-AF92-EA013F852993})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189851269):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158355205):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7083128381702):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158355205):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158355205):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.2514675523012):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.217</title>
			<desc>Управление электронных продаж</desc>
			<g id="shape217-823" v:mID="217" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="84.75" height="8.50394"/>
				<g id="shadow217-824" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st8"/>
				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st9"/>
				<text x="22.07" y="584.37" class="st6" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="6.33" dy="1.2em" class="st7">электронных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape227-830" v:mID="227" v:groupContext="shape" transform="translate(418.11,-307.559)">
			<title>Динамическая соединительная линия.227</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape228-831" v:mID="228" v:groupContext="shape" transform="translate(411.732,-299.055)">
			<title>Динамическая соединительная линия.228</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape221-832" v:mID="221" v:groupContext="shape" transform="translate(509.471,-127.559)">
			<title>Динамическая соединительная линия.221</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.03 595.28 L-1.47 595.28 L-1.47 616.54 L7.14 616.54" class="st12"/>
		</g>
		<g id="shape229-836" v:mID="229" v:groupContext="shape" transform="translate(429.094,-317.48)">
			<title>Динамическая соединительная линия.229</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-3.9 598.11 L-8.15 598.11 L-8.15 606.61 L-10.28 606.61" class="st12"/>
		</g>
		<g id="shape119-840" v:mID="119" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.119</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L268.24 603.78 L268.24 612.28" class="st12"/>
		</g>
		<g id="shape391-844" v:mID="391" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.391</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L365.67 603.78 L365.67 612.28" class="st12"/>
		</g>
		<g id="shape392-848" v:mID="392" v:groupContext="shape" transform="translate(392.598,-538.583)">
			<title>Динамическая соединительная линия.392</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 598.11 L7.09 606.61" class="st12"/>
		</g>
		<g id="shape393-852" v:mID="393" v:groupContext="shape" transform="translate(392.598,-493.228)">
			<title>Динамическая соединительная линия.393</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st12"/>
		</g>
		<g id="shape11-856" v:mID="11" v:groupContext="shape" transform="translate(58.1102,-344.409)">
			<title>Динамическая соединительная линия</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-34.72 595.28 L-34.72 705.83 L-26.22 705.83" class="st12"/>
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