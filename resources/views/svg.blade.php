<!DOCTYPE html>
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
	<main>
		<div class="w-100 d-flex justify-content-end">
			<div class="d-flex flex-column mr-3 mt-1" style="color:#4267b2;"> <!-- надо добавить в css -->
				<span><strong>Оргструктура действует с 05.01.2021 года</strong></span>
				<span>на основании решения Совета директоров от 31.12.2020 года</span>
			</div>
		</div>
	</main>
</div>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events"
	 xmlns:v="http://schemas.microsoft.com/visio/2003/SVGExtensions/" width="11.6929in" height="8.26772in"
	 viewBox="0 0 841.89 595.276" xml:space="preserve" color-interpolation-filters="sRGB" class="st38">
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
		.st2 {fill:#cdcdcd;fill-opacity:0.5}
		.st3 {stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st4 {fill:url(#grad25-9)}
		.st5 {stroke:#3366cc;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st6 {fill:#002060;font-family:Calibri;font-size:0.75em;font-weight:bold}
		.st7 {font-size:1em}
		.st8 {fill:#002060;font-family:Calibri;font-size:0.791656em;font-weight:bold}
		.st9 {fill:none;stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st10 {fill:#cdcdcd;font-family:Calibri;font-size:0.75em;font-weight:bold}
		.st11 {fill:none;stroke:#6699ff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st12 {fill:none;stroke:#cdcdcd;stroke-dasharray:1.5,3;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st13 {fill:#cdcdcd;font-family:Calibri;font-size:0.708344em;font-style:italic;font-weight:bold}
		.st14 {fill:none;stroke:#3366cc;stroke-dasharray:1.5,3;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st15 {fill:#002060;font-family:Calibri;font-size:0.708344em;font-style:italic;font-weight:bold}
		.st16 {fill:#cdcdcd;font-family:Calibri;font-size:0.75em;font-style:italic;font-weight:bold}
		.st17 {fill:#002060;font-family:Calibri;font-size:0.75em;font-style:italic;font-weight:bold}
		.st18 {fill:none;stroke:#cdcdcd;stroke-dasharray:10.5,7.5,0,7.5;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st19 {fill:#cdcdcd;font-family:Calibri;font-size:0.666664em;font-weight:bold}
		.st20 {fill:none;stroke:#8976ac;stroke-dasharray:10.5,7.5,0,7.5;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st21 {fill:#002060;font-family:Calibri;font-size:0.666664em;font-weight:bold}
		.st22 {fill:#cdcdcd;fill-opacity:0.5;stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st23 {fill:url(#grad25-9);stroke:#ff3300;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st24 {fill:url(#grad25-9);stroke:#00b050;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st25 {fill:url(#grad25-9);stroke:#cad318;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st26 {fill:none;stroke:#cad318;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st27 {stroke:#3366cc;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st28 {fill:none;stroke:#00b050;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st29 {fill:none;stroke:#ff3300;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st30 {fill:#cdcdcd;font-family:Calibri;font-size:0.666664em;font-weight:bold;opacity:0.498039}
		.st31 {fill:none;stroke:#7030a0;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st32 {fill:none;stroke:#800000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st33 {fill:url(#grad25-9);stroke:#800000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st34 {stroke:#3366cc;stroke-dasharray:1,2;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st35 {fill:none;stroke:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.25}
		.st36 {fill:#1f497d;font-family:Calibri;font-size:0.833336em;font-weight:bold}
		.st37 {font-size:1em;font-weight:normal}
		.st38 {fill:none;fill-rule:evenodd;font-size:12px;overflow:visible;stroke-linecap:square;stroke-miterlimit:3}
		]]>
	</style>

	<defs id="Patterns_And_Gradients">
		<linearGradient id="grad25-9" v:fillPattern="25" v:foreground="#ffffff" v:background="#99ccff" x1="0" y1="0" x2="1" y2="0">
			<stop offset="0" style="stop-color:#ffffff;stop-opacity:1"/>
			<stop offset="1" style="stop-color:#99ccff;stop-opacity:1"/>
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
		<title>Page-1</title>
		<v:pageProperties v:drawingScale="0.0393701" v:pageScale="0.0393701" v:drawingUnits="24" v:shadowOffsetX="8.50394"
						  v:shadowOffsetY="-8.50394"/>
		<v:layer v:name="Hidden" v:index="0" visibility="hidden" v:print="false"/>
		<g id="group1-1" transform="translate(365.669,-518.74)" v:mID="1" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Общее собрание акционеров)"/>
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
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.47791213910761):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель</title>
			<desc>Общее собрание акционеров</desc>
			<g id="shape1-2" v:mID="1" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow1-3" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st2"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				<text x="20.5" y="570.17" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Общее <tspan
							x="15.46" dy="1.2em" class="st7">собрание</tspan> <tspan x="10.34" dy="1.2em" class="st7">акционеров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group6-15" transform="translate(365.669,-476.22)" v:mID="6" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Совет директоров)"/>
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.440944882):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,189.0000000028MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.41957473676386):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.6</title>
			<desc>Совет директоров</desc>
			<g id="shape6-16" v:mID="6" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow6-17" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st2"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				<text x="22.36" y="575.42" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет <tspan
							x="9.46" dy="1.2em" class="st7">директоров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group12-27" transform="translate(365.669,-416.693)" v:mID="12" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Правление)"/>
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3404090873498):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.12</title>
			<desc>Правление</desc>
			<g id="shape12-28" v:mID="12" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow12-29" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st2"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				<text x="11.27" y="581.12" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Правление<v:newlineChar/> </text>			</g>
		</g>
		<g id="group18-38" transform="translate(365.669,-357.165)" v:mID="18" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Председатель Правления)"/>
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.023622048):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.41130796150481):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.61712310555703):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.25382764654418):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.41957473676386):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель.18</title>
			<desc>Председатель Правления</desc>
			<g id="shape18-39" v:mID="18" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow18-40" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st2"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st3"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st3"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				<text x="4.74" y="575.42" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Председатель <tspan
							x="11.29" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group59-50" transform="translate(204.094,-535.748)" v:mID="59" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,192.0000000265MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256726601):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158389064):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.20980190305643):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник</title>
			<desc>Служба внутреннего аудита</desc>
			<g id="shape59-51" v:mID="59" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow59-52" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
					<text x="4.8" y="589.47" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st11"/>
				<text x="4.8" y="589.47" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>			</g>
		</g>
		<g id="group44-57" transform="translate(204.094,-510.236)" v:mID="44" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,183.00000001893MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256735374):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158380993):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.20980190301608):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.44</title>
			<desc>Служба актуарных расчетов</desc>
			<g id="shape44-58" v:mID="44" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow44-59" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
					<text x="4.61" y="589.47" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st11"/>
				<text x="4.61" y="589.47" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>			</g>
		</g>
		<g id="group49-64" transform="translate(204.094,-484.724)" v:mID="49" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,174.00000001725MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256721038):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158394182):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.20980190308202):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.49</title>
			<desc>Комплаенс-контролер</desc>
			<g id="shape49-65" v:mID="49" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow49-66" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.66" y="589.47" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st11"/>
				<text x="15.66" y="589.47" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group54-71" transform="translate(204.094,-459.213)" v:mID="54" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,165.0000000222MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53729221347332):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(2.4166256763404):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158355206):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.20980190288714):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Помощник.54</title>
			<desc>Риск-менеджер</desc>
			<g id="shape54-72" v:mID="54" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow54-73" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st9"/>
					<text x="28.33" y="589.47" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st11"/>
				<text x="28.33" y="589.47" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group24-78" transform="translate(467.717,-535.748)" v:mID="24" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Совет по управлению )"/>
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,191.9999999972MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842476):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.124938539149):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158179615):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.26813930435294):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант</title>
			<desc>Совет по управлению активами и пассивами</desc>
			<g id="shape24-79" v:mID="24" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow24-80" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st12"/>
					<text x="35.14" y="584.22" class="st13" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
								x="32.88" dy="1.2em" class="st7">активами</tspan> и пассивами<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
				<text x="35.14" y="584.22" class="st15" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
							x="32.88" dy="1.2em" class="st7">активами</tspan> и пассивами<v:newlineChar/> </text>			</g>
		</g>
		<g id="group33-87" transform="translate(467.717,-510.236)" v:mID="33" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0.35433070872047):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,183.0000000323MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842476):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.1249385378209):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158189064):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.20980190205643):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.33</title>
			<desc>Андеррайтинговый совет</desc>
			<g id="shape33-88" v:mID="33" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow33-89" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st12"/>
					<text x="23.47" y="589.47" class="st16" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
				<text x="23.47" y="589.47" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>			</g>
		</g>
		<g id="group38-94" transform="translate(467.717,-463.465)" v:mID="38" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(2.125984251937):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.59055118111023):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({42B95320-DB1D-49F1-91D9-B056CDDF1D5B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.007874016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.11811023699213):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,171.0000000112MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.69477252842345):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.57666229222135):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.2048169921899):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.57666229222135):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.57666229222135):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.58697336073741):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.38</title>
			<desc>Комитет по вопросам стратегического планирования, кадров и во...</desc>
			<g id="shape38-95" v:mID="38" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="574.016" width="149.89" height="21.2598"/>
				<g id="shadow38-96" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L153.07 552.76 L153.07 595.28 L0 595.28 Z" class="st12"/>
					<text x="33.15" y="561.27" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
								x="14.23" dy="1.2em" class="st7">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
																											  class="st7">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st7">социальным</tspan> вопросам <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L153.07 552.76 L153.07 595.28 L0 595.28 Z" class="st14"/>
				<text x="33.15" y="561.27" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
							x="14.23" dy="1.2em" class="st7">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
																										  class="st7">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st7">социальным</tspan> вопросам <v:newlineChar/> </text>			</g>
		</g>
		<g id="group43-107" transform="translate(467.717,-442.205)" v:mID="43" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.850393702):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,159.0000000334MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,174.0000000308MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.6947725284182):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(3.1249385136097):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158361111):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.19730495467448):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.43</title>
			<desc>Комитет по внутреннему аудиту</desc>
			<g id="shape43-108" v:mID="43" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow43-109" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st12"/>
					<text x="10.29" y="589.32" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
				<text x="10.29" y="589.32" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>			</g>
		</g>
		<g id="group72-114" transform="translate(442.205,-357.165)" v:mID="72" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(167.9999999912MM,132.0000000076MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
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
			<g id="shape72-115" v:mID="72" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow72-116" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st18"/>
					<text x="17.81" y="571.07" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st20"/>
				<text x="17.81" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group78-125" transform="translate(289.134,-357.165)" v:mID="78" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(113.999999971MM,132.0000000076MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
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
			<g id="shape78-126" v:mID="78" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow78-127" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st18"/>
					<text x="17.81" y="571.07" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st20"/>
				<text x="17.81" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group83-136" transform="translate(272.126,-399.685)" v:mID="83" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.023622048):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(108.0000000016MM,145.5000000135MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.32719442334112):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.83</title>
			<desc>Комитет по продажам</desc>
			<g id="shape83-137" v:mID="83" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow83-138" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st12"/>
					<text x="9.72" y="579.97" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="13.95" dy="1.2em" class="st7">продажам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
				<text x="9.72" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="13.95" dy="1.2em" class="st7">продажам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group88-145" transform="translate(446.457,-399.685)" v:mID="88" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.023622048):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(169.500000003MM,145.5000000222MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25636007275519):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.88</title>
			<desc>IT-комитет</desc>
			<g id="shape88-146" v:mID="88" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow88-147" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st12"/>
					<text x="10.94" y="585.07" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
				<text x="10.94" y="585.07" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape95-152" v:mID="95" v:groupContext="shape" transform="translate(433.701,-436.535)">
			<title>Динамическая соединительная линия.95</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L46.77 598.11 L46.77 606.61" class="st5"/>
		</g>
		<g id="group96-155" transform="translate(412.441,-314.646)" v:mID="96" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.9744094491811):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.6496063):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(165.75MM,115.500000013MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.51760717410324):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.520398326324):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.32719035469587):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.15):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape96-156" v:mID="96" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="57.4016" cy="582.52" width="112.42" height="12.7559"/>
				<g id="shadow96-157" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st22"/>
				</g>
				<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st23"/>
				<text x="32.78" y="579.82" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="7.11" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="group108-163" transform="translate(238.839,-314.646)" v:mID="108" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.4122609670169):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.6496063):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(105.12857142857MM,115.500000013MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.53391763529559):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5683080137069):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.32719035469587):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.15):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.108</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape108-164" v:mID="108" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.1631" cy="582.52" width="115.87" height="12.7559"/>
				<g id="shadow108-165" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st22"/>
				</g>
				<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st24"/>
				<text x="34.54" y="579.82" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="8.87" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="group120-171" transform="translate(77.9528,-314.646)" v:mID="120" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-3.7007874011304):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.649606299):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(47.000000002089MM,115.5000000384MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.49792213473316):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4625762898274):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.34385702136254):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.120</title>
			<desc>Заместитель Председателя Правления по финансам</desc>
			<g id="shape120-172" v:mID="120" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="55.2756" cy="582.52" width="108.25" height="12.7559"/>
				<g id="shadow120-173" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st22"/>
				</g>
				<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st25"/>
				<text x="1.89" y="579.82" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель Председателя <tspan
							x="6.9" dy="1.2em" class="st7">Правления</tspan> по финансам<v:newlineChar/> </text>			</g>
		</g>
		<g id="group139-179" transform="translate(53.8583,-284.882)" v:mID="139" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.59055118060892):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.44291338708022):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.8503937008696):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244096):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,4.1043307089198)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,4.547244096)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32731845997317):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1632335771903):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31432946212484):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.139</title>
			<desc>Главный бухгалтер</desc>
			<g id="shape139-180" v:mID="139" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="584.646" width="72.17" height="10.6299"/>
				<g id="shadow139-181" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st9"/>
					<text x="19.93" y="581.95" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
								x="17.64" dy="1.2em" class="st7">бухгалтер</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st26"/>
				<text x="19.93" y="581.95" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
							x="17.64" dy="1.2em" class="st7">бухгалтер</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape144-188" v:mID="144" v:groupContext="shape" transform="translate(133.228,-317.48)">
			<title>Динамическая соединительная линия.144</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L-42.52 602.36 L-42.52 606.61" class="st27"/>
		</g>
		<g id="group145-191" transform="translate(53.8583,-242.362)" v:mID="145" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.2598425202607):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.1043307089198):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425197673,3.6023622048002)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,4.1043307089198)):40"/>
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
			<g id="shape145-192" v:mID="145" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="578.268" width="72.17" height="17.0079"/>
				<g id="shadow145-193" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st9"/>
					<text x="13.75" y="571.07" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="10.4" dy="1.2em" class="st7">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st7">учета</tspan> и анализа<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st26"/>
				<text x="13.75" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="10.4" dy="1.2em" class="st7">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st7">учета</tspan> и анализа<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape150-202" v:mID="150" v:groupContext="shape" transform="translate(97.7953,-287.717)">
			<title>Динамическая соединительная линия.150</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 598.11 L-7.09 606.61" class="st27"/>
		</g>
		<g id="group151-205" transform="translate(136.063,-284.882)" v:mID="151" v:groupContext="group">
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0728346450936):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559091634):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({9C3BACDA-35D2-4EB9-9CF3-4C8DBABAD729})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.57578740120473):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.44291338708022):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.8503937008696):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244096):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4261811020744,4.1043307089198)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,4.547244096)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34372265947565):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670202745):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.2215312841689):26"/>
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
			<g id="shape151-206" v:mID="151" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.622" cy="584.646" width="75.64" height="10.6299"/>
				<g id="shadow151-207" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L77.24 574.02 L77.24 595.28 L0 595.28 Z" class="st9"/>
					<text x="11.58" y="582.25" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
								x="15.88" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L77.24 574.02 L77.24 595.28 L0 595.28 Z" class="st26"/>
				<text x="11.58" y="582.25" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
							x="15.88" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape156-214" v:mID="156" v:groupContext="shape" transform="translate(133.228,-317.48)">
			<title>Динамическая соединительная линия.156</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L41.46 602.36 L41.46 606.61" class="st27"/>
		</g>
		<g id="group157-217" transform="translate(136.417,-123.307)" v:mID="157" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.4261811020744):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.1043307089198):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4261811024129,2.0669291339242)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.4261811020744,4.1043307089198)):40"/>
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
			<g id="shape157-218" v:mID="157" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="569.764" width="74.95" height="25.5118"/>
				<g id="shadow157-219" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="13.02" y="557.76" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="9.17" dy="1.2em" class="st7">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
								x="16.57" dy="1.2em" class="st7">страхования</tspan><tspan x="38.27" dy="1.2em" class="st7"> </tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st26"/>
				<text x="13.02" y="557.76" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="9.17" dy="1.2em" class="st7">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="16.57" dy="1.2em" class="st7">страхования</tspan><tspan x="38.27" dy="1.2em" class="st7"> </tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group163-232" transform="translate(136.417,-227.48)" v:mID="163" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.4261811020744):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.1043307089198):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4261811028858,3.4990157485325)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.4261811020744,4.1043307089198)):40"/>
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
			<g id="shape163-233" v:mID="163" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="570.827" width="74.95" height="24.4488"/>
				<g id="shadow163-234" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="17.3" y="554.03" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="2.22" dy="1.2em" class="st7">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
								x="13.44" dy="1.2em" class="st7">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st7">перестрахования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st26"/>
				<text x="17.3" y="554.03" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="2.22" dy="1.2em" class="st7">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="13.44" dy="1.2em" class="st7">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st7">перестрахования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group169-247" transform="translate(136.417,-84.8976)" v:mID="169" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.4261811020744):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.1043307089198):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4261811028066,1.4153543307844)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.4261811020744,4.1043307089198)):40"/>
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
			<g id="shape169-248" v:mID="169" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="74.95" height="17.0079"/>
				<g id="shadow169-249" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="0.95" y="575.87" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
								x="18.16" dy="1.2em" class="st7">и</tspan> платежей<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st26"/>
				<text x="0.95" y="575.87" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
							x="18.16" dy="1.2em" class="st7">и</tspan> платежей<v:newlineChar/> </text>			</g>
		</g>
		<g id="group175-256" transform="translate(136.417,-178.583)" v:mID="175" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.4261811020744):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.1043307089198):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4261811028145,2.7755905512569)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.4261811020744,4.1043307089198)):40"/>
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
			<g id="shape175-257" v:mID="175" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="574.016" width="74.95" height="21.2598"/>
				<g id="shadow175-258" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="12.11" y="562.02" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="20.99" dy="1.2em" class="st7">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st7">дебиторской</tspan> <tspan
								x="11.07" dy="1.2em" class="st7">задолженности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st26"/>
				<text x="12.11" y="562.02" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="20.99" dy="1.2em" class="st7">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st7">дебиторской</tspan> <tspan
							x="11.07" dy="1.2em" class="st7">задолженности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group181-269" transform="translate(54.5669,-208.346)" v:mID="181" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Административное управление )"/>
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.59055118060892):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.4763779541801):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.8503937008696):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244096):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,3.0708661418199)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,4.547244096)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181979615):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.94217796377754):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.32075678056026):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267042325):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.181</title>
			<desc>Административное управление</desc>
			<g id="shape181-270" v:mID="181" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="582.52" width="70.78" height="12.7559"/>
				<g id="shadow181-271" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st9"/>
					<text x="2.44" y="580.12" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
								x="15.47" dy="1.2em" class="st7">управление</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st26"/>
				<text x="2.44" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
							x="15.47" dy="1.2em" class="st7">управление</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group195-278" transform="translate(263.622,-250.729)" v:mID="195" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017811956689766):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488189194277):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35623913379533):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({93805E13-82D5-4B69-AD2A-9C9ECC2EFA9C})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-8.9658236390733E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.44386759716599):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.133858268):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.104330709):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1338582671034,3.660463111834)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.133858268,4.104330709)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.3010717417587):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34235024490644):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.87942610305707):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.3010717417587):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.3010717417587):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.37814329533191):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.195</title>
			<desc>Департамент корпоративного страхования</desc>
			<g id="shape195-279" v:mID="195" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.451" width="66.62" height="12.8246"/>
				<g id="shadow195-280" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.63 L68.03 569.63 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="10.91" y="575.25" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="5.67" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.32" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.63 L68.03 569.63 L68.03 595.28 L0 595.28 Z" class="st28"/>
				<text x="10.91" y="575.25" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="5.67" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.32" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group206-289" transform="translate(384.803,-8.50394)" v:mID="206" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел )"/>
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.7086614161811):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-4.192913386):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.5255905511811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.816929135,0.354330709)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.5255905511811,4.547244095)):40"/>
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
			<desc>Отдел Contact-center</desc>
			<g id="shape206-290" v:mID="206" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow206-291" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="23.31" y="575.87" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел <tspan
								x="9.3" dy="1.2em" class="st7">Contact</tspan>-center  <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="23.31" y="575.87" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел <tspan
							x="9.3" dy="1.2em" class="st7">Contact</tspan>-center  <v:newlineChar/> </text>			</g>
		</g>
		<g id="group211-298" transform="translate(263.713,-210.404)" v:mID="211" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Управления корпоративного страхования )"/>
				<v:cp v:nameU="Email" v:lbl="Электронная почта" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Электронная почта)"/>
			</v:custProps>
			<v:userDefs>
				<v:ud v:nameU="Solsh" v:prompt="" v:val="VT14({0BF98B35-200C-41D5-8A23-20EF77CBC94A}):41"/>
				<v:ud v:nameU="ShapeType" v:prompt="" v:val="VT0(2):26"/>
				<v:ud v:nameU="ShowPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ShowSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="DocShowPicture" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047298868):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94235095758408):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094597736):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({090C3FEF-6429-4F70-9464-635E1B72CB11})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(8.8817841970013E-016):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.501968503):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1338582671034):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.660463111834):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1338582671034,3.158494608834)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1338582671034,3.660463111834)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30022809697247):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.45855205708847):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65473067306412):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30022809697247):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30022809697247):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.43624420142293):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.211</title>
			<desc>Управления корпоративного страхования</desc>
			<g id="shape211-299" v:mID="211" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="33.9246" cy="578.268" width="66.44" height="17.0079"/>
				<g id="shadow211-300" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L67.85 561.26 L67.85 595.28 L0 595.28 Z" class="st9"/>
					<text x="12.98" y="571.07" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="5.58" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.23" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L67.85 561.26 L67.85 595.28 L0 595.28 Z" class="st28"/>
				<text x="12.98" y="571.07" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="5.58" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.23" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group230-309" transform="translate(470.906,-280.63)" v:mID="230" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535426968):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2549212598307):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070853937):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1390C0C5-2C84-4F8C-B939-30B7AD49180F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.40441819772135):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181965048):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1879216194313):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181965048):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181965048):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267035041):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.230</title>
			<desc>Управление партнерских продаж</desc>
			<g id="shape230-310" v:mID="230" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="45.1772" cy="582.52" width="88.48" height="12.7559"/>
				<g id="shadow230-311" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L90.35 569.76 L90.35 595.28 L0 595.28 Z" class="st9"/>
					<text x="1.43" y="580.12" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление партнерских <tspan
								x="31.49" dy="1.2em" class="st7">продаж</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L90.35 569.76 L90.35 595.28 L0 595.28 Z" class="st29"/>
				<text x="1.43" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление партнерских <tspan
							x="31.49" dy="1.2em" class="st7">продаж</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group235-318" transform="translate(384.803,-182.835)" v:mID="235" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188964764):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.59055118058563):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({82B89068-6AB7-40C3-964F-C52E2A98BC75})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.7086614161811):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.712598426):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.5255905511811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.816929135,2.834645669)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.5255905511811,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174099366):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.57666229169674):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.5220936852101):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174099366):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174099366):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.49529931872706):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.235</title>
			<desc>Департамент регионального развития</desc>
			<g id="shape235-319" v:mID="235" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="574.016" width="66.62" height="21.2598"/>
				<g id="shadow235-320" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L68.03 552.76 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="10.91" y="566.82" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="7.92" dy="1.2em" class="st7">регионального</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L68.03 552.76 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="10.91" y="566.82" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="7.92" dy="1.2em" class="st7">регионального</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group240-329" transform="translate(473.031,-195.591)" v:mID="240" v:groupContext="group">
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.254921258748):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.2362204723937):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({E4C27411-757A-4C79-AEAE-9E8965BDF17F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.3804133863159):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.816929135):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.834645669):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.1973425213159,2.834645669)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.816929135,2.834645669)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.40441819736045):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158350481):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.8189867178799):26"/>
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
			<g id="shape240-330" v:mID="240" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="45.1772" cy="586.772" width="88.48" height="8.50394"/>
				<g id="shadow240-331" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L90.35 578.27 L90.35 595.28 L0 595.28 Z" class="st9"/>
					<text x="28.8" y="589.17" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L90.35 578.27 L90.35 595.28 L0 595.28 Z" class="st29"/>
				<text x="28.8" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>			</g>
		</g>
		<g id="group245-336" transform="translate(384.803,-144.567)" v:mID="245" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047258957):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488189013091):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094517913):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({82A6B1BA-4CD0-473B-A97D-016CF0181FF9})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.7086614161811):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.303149607):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.5255905511811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.816929135,2.244094488)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.5255905511811,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174115475):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.45855205629024):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047444179):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174115475):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174115475):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3695777886703):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.245</title>
			<desc>Юридический департамент</desc>
			<g id="shape245-337" v:mID="245" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow245-338" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="9.36" y="575.87" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
								x="11.28" dy="1.2em" class="st7">департамент</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="9.36" y="575.87" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
							x="11.28" dy="1.2em" class="st7">департамент</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group250-345" transform="translate(384.803,-102.047)" v:mID="250" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188999311):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.53149606280626):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({90EDB92B-FDC0-451A-9E18-CFCEBE3EA5B6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.56102362199551):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.816929135):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.244094488):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.816929135,1.6830708660045)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.816929135,2.244094488)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174110881):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.51760717391737):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.58166068068615):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174110881):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174110881):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.46577175983737):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.250</title>
			<desc>Управление Правового обеспечения</desc>
			<g id="shape250-346" v:mID="250" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="576.142" width="66.62" height="19.1339"/>
				<g id="shadow250-347" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 557.01 L68.03 557.01 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="13.05" y="568.94" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="15.55" dy="1.2em" class="st7">Правового<v:newlineChar/></tspan><tspan x="11.53" dy="1.2em"
																										 class="st7">обеспечения</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 557.01 L68.03 557.01 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="13.05" y="568.94" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="15.55" dy="1.2em" class="st7">Правового<v:newlineChar/></tspan><tspan x="11.53" dy="1.2em"
																									 class="st7">обеспечения</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group255-356" transform="translate(384.803,-55.2756)" v:mID="255" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188992913):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.59055118111024):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1A5CA138-21B1-492A-AEF6-A34664DC734E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.181102362):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.816929135):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.244094488):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.816929135,1.062992126)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.816929135,2.244094488)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174108749):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.57666229222135):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.52209368489786):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174108749):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174108749):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.49529931898936):29"/>
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
				<v:textRect cx="34.0157" cy="574.016" width="66.62" height="21.2598"/>
				<g id="shadow255-358" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L68.03 552.76 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="7.86" y="566.82" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="8.14" dy="1.2em" class="st7">претензионно</tspan>-<tspan x="6.75" dy="1.2em" class="st7">исковой</tspan> работе<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L68.03 552.76 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="7.86" y="566.82" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="8.14" dy="1.2em" class="st7">претензионно</tspan>-<tspan x="6.75" dy="1.2em" class="st7">исковой</tspan> работе<v:newlineChar/> </text>			</g>
		</g>
		<g id="group260-367" transform="translate(474.094,-165.827)" v:mID="260" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535404035):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574807087):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070808071):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({24636543-A3BF-4F57-B1A3-D45B74B5958E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.6791338588189):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.066929134):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.5255905511811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.20472441,2.480314961)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.5255905511811,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.399496938014):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181919182):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.173466112249):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181919182):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181919182):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267012108):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.260</title>
			<desc>Департамент страховых выплат</desc>
			<g id="shape260-368" v:mID="260" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="582.52" width="87.44" height="12.7559"/>
				<g id="shadow260-369" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st9"/>
					<text x="2.63" y="580.12" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
								x="32.05" dy="1.2em" class="st7">выплат</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st29"/>
				<text x="2.63" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
							x="32.05" dy="1.2em" class="st7">выплат</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group265-376" transform="translate(474.094,-140.315)" v:mID="265" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Управление)"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.38920890014261):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.20472441):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.480314961):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.20472441,2.0911060608574)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.20472441,2.480314961)):40"/>
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
			<g id="shape265-377" v:mID="265" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="585.031" width="87.44" height="10.2447"/>
				<g id="shadow265-378" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st9"/>
					<text x="23.68" y="582.63" class="st30" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
								x="14.88" dy="1.2em" class="st7">контроля</tspan> выплат </text>				</g>
				<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st29"/>
				<text x="23.68" y="582.63" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
							x="14.88" dy="1.2em" class="st7">контроля</tspan> выплат </text>			</g>
		</g>
		<g id="group270-385" transform="translate(474.094,-103.877)" v:mID="270" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.021081323088484):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574795192):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.42162646176967):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({12A79B2A-2BBB-4D70-AD09-29E4A16397A6})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.82677165414261):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.20472441):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.480314961):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.20472441,1.6535433068574)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.20472441,2.480314961)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693761751):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.40773757288078):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.97978936499511):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.39949693761751):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.39949693761751):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.41083695931908):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.270</title>
			<desc>Управление аварийного комиссариата</desc>
			<g id="shape270-386" v:mID="270" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="580.097" width="87.44" height="15.1786"/>
				<g id="shadow270-387" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 564.92 L89.29 564.92 L89.29 595.28 L0 595.28 Z" class="st9"/>
					<text x="23.68" y="572.9" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="24.22" dy="1.2em" class="st7">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st7">комиссариата</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 564.92 L89.29 564.92 L89.29 595.28 L0 595.28 Z" class="st29"/>
				<text x="23.68" y="572.9" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="24.22" dy="1.2em" class="st7">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st7">комиссариата</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group280-396" transform="translate(610.157,-191.764)" v:mID="280" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023624481):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047237583):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({68B4C0CD-07AA-423C-AEB2-FBDA9331D585})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.5137795287208):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.4153543316759):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,70.650000008432MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.3798118985938):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158348694):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7083128390353):26"/>
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
			<g id="shape280-397" v:mID="280" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="83.27" height="8.50394"/>
				<g id="shadow280-398" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.85" y="589.17" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="15.85" y="589.17" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>			</g>
		</g>
		<g id="group285-403" transform="translate(614.693,-170.646)" v:mID="285" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0590551182835):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047251969):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({A4150864-29CC-47BF-9059-B221C7271C03})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.0019685040472446):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.293307086):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.0649606307208):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.7814960633241):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.066929134768,2.4881889773241)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,2.7814960633241)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.33912948387227):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.2223315836308):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5253320213624):26"/>
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
			<g id="shape285-404" v:mID="285" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.126" cy="586.772" width="74.67" height="8.50394"/>
				<g id="shadow285-405" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L76.25 578.27 L76.25 595.28 L0 595.28 Z" class="st9"/>
					<text x="13.96" y="589.17" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L76.25 578.27 L76.25 595.28 L0 595.28 Z" class="st31"/>
				<text x="13.96" y="589.17" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group290-410" transform="translate(614.409,-149.244)" v:mID="290" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0669291338583):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.23622047194882):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({76363B01-456C-46D2-8DBE-2AEED61E2555})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-8.6615159489156E-011):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.297244095):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.066929134768):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.4881889773241):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0669291346814,2.1909448823241)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.066929134768,2.4881889773241)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.34175415573053):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158305993):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.5371372390148):26"/>
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
			<g id="shape290-411" v:mID="290" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.4094" cy="586.772" width="75.22" height="8.50394"/>
				<g id="shadow290-412" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L76.82 578.27 L76.82 595.28 L0 595.28 Z" class="st9"/>
					<text x="10.99" y="584.37" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
								x="20.05" dy="1.2em" class="st7">персонала</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L76.82 578.27 L76.82 595.28 L0 595.28 Z" class="st31"/>
				<text x="10.99" y="584.37" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
							x="20.05" dy="1.2em" class="st7">персонала</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group310-419" transform="translate(474.094,-76.5354)" v:mID="310" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Управление аджастеров )"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779512352):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574799488):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559024705):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({458FA027-900C-415B-B89D-2361F11C660F})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.0000000827404E-009):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.2696850401426):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.20472441):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.480314961):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.204724411,1.2106299208574)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.20472441,2.480314961)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693776072):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670135816):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4197434911902):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670135816):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670135816):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.21432869885074):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.310</title>
			<desc>Управление аджастеров</desc>
			<g id="shape310-420" v:mID="310" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="584.646" width="87.44" height="10.6299"/>
				<g id="shadow310-421" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L89.29 574.02 L89.29 595.28 L0 595.28 Z" class="st9"/>
					<text x="2.03" y="587.05" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление аджастеров <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L89.29 574.02 L89.29 595.28 L0 595.28 Z" class="st29"/>
				<text x="2.03" y="587.05" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление аджастеров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group325-426" transform="translate(610.157,-268.299)" v:mID="325" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023623031):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070851378):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({69AC883F-62DD-4DAE-8333-DE50407BF5A8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.5137795287208):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.2933070876759):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,99.150000006032MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189854549):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181962489):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1156440738214):26"/>
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
			<g id="shape325-427" v:mID="325" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="83.27" height="12.7559"/>
				<g id="shadow325-428" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="19.42" y="580.12" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="16.17" dy="1.2em" class="st7">андеррайтинга</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="19.42" y="580.12" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="16.17" dy="1.2em" class="st7">андеррайтинга</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group330-435" transform="translate(614.592,-238.535)" v:mID="330" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.968452068013E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.413385827):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.0649606307208):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.9035433073241):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0649606309176,3.4901574803241)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,3.9035433073241)):40"/>
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
			<g id="shape330-436" v:mID="330" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="582.52" width="74.59" height="12.7559"/>
				<g id="shadow330-437" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st9"/>
					<text x="17.12" y="580.12" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="0.8" dy="1.2em" class="st7">сопровождения</tspan> ДМС<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st31"/>
				<text x="17.12" y="580.12" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="0.8" dy="1.2em" class="st7">сопровождения</tspan> ДМС<v:newlineChar/> </text>			</g>
		</g>
		<g id="group335-444" transform="translate(614.592,-217.276)" v:mID="335" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.968452068013E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.76771653632408):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.0649606307208):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.9035433073241):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0649606309176,3.135826771)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,3.9035433073241)):40"/>
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
			<g id="shape335-445" v:mID="335" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="586.772" width="74.59" height="8.50394"/>
				<g id="shadow335-446" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st9"/>
					<text x="3.29" y="589.17" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st31"/>
				<text x="3.29" y="589.17" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>			</g>
		</g>
		<g id="group340-451" transform="translate(610.157,-302.315)" v:mID="340" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020669291334547):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023619961):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41338582669095):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1108D926-E9FF-4FF9-AD4C-31FC9457C550})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.513779529):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.791338584):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.2500000274MM,111.8999999994MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189844313):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39949693780206):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.95072543117045):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.37981189844313):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.37981189844313):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40671664177972):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.340</title>
			<desc>Управление стратегического анализа</desc>
			<g id="shape340-452" v:mID="340" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="580.394" width="83.27" height="14.8819"/>
				<g id="shadow340-453" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="21.55" y="573.19" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="14.61" dy="1.2em" class="st7">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st7">анализа</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="21.55" y="573.19" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="14.61" dy="1.2em" class="st7">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st7">анализа</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group345-462" transform="translate(731.339,-280.63)" v:mID="345" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.47244094704528):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259607):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244094564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,4.0748031475187)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,4.547244094564)):40"/>
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
			<g id="shape345-463" v:mID="345" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="582.52" width="74.95" height="12.7559"/>
				<g id="shadow345-464" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="8.13" y="580.12" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
								x="15.53" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st32"/>
				<text x="8.13" y="580.12" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
							x="15.53" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group350-471" transform="translate(731.339,-201.969)" v:mID="350" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.059055118110235):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.5944881910472):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259607):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244094564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,2.9527559035167)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,4.547244094564)):40"/>
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
			<g id="shape350-472" v:mID="350" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="584.646" width="74.95" height="10.6299"/>
				<g id="shadow350-473" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.16" y="582.25" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="3.71" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st32"/>
				<text x="15.16" y="582.25" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="3.71" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group355-480" transform="translate(735.591,-167.953)" v:mID="355" v:groupContext="group">
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.02952755929034):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.41437007895275):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.688976377718):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.9527559035167):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,2.538385824564)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,2.9527559035167)):40"/>
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
			<g id="shape355-481" v:mID="355" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="70.78" height="14.811"/>
				<g id="shadow355-482" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.18" y="573.26" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="27.13" dy="1.2em" class="st7">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st32"/>
				<text x="15.18" y="573.26" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="27.13" dy="1.2em" class="st7">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group360-491" transform="translate(735.591,-133.937)" v:mID="360" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.472440945):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.718503937008):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(2.538385824564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,2.065944879564)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,2.538385824564)):40"/>
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
			<g id="shape360-492" v:mID="360" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="70.78" height="14.811"/>
				<g id="shadow360-493" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.18" y="573.26" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="17.27" dy="1.2em" class="st7">системных</tspan> <tspan x="16.23" dy="1.2em" class="st7">разработок</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st32"/>
				<text x="15.18" y="573.26" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="17.27" dy="1.2em" class="st7">системных</tspan> <tspan x="16.23" dy="1.2em" class="st7">разработок</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group365-502" transform="translate(731.339,-233.858)" v:mID="365" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.059055118115152):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.0629921280551):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259607):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244094564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377722,3.4842519665089)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,4.547244094564)):40"/>
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
			<g id="shape365-503" v:mID="365" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="74.95" height="17.0079"/>
				<g id="shadow365-504" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st9"/>
					<text x="17.3" y="571.07" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="18.37" dy="1.2em" class="st7">системного</tspan> <tspan x="2.22" dy="1.2em" class="st7">администрирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st32"/>
				<text x="17.3" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="18.37" dy="1.2em" class="st7">системного</tspan> <tspan x="2.22" dy="1.2em" class="st7">администрирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group370-513" transform="translate(610.157,-83.1969)" v:mID="370" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020669291318152):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023622047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41338582636304):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({90F006BA-9E9C-40E3-A1D9-242A801CB788})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.5137795287444):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.8346456701083):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002091MM,34.600000012248MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189851268):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39949693747415):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.95072543212489):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.37981189851268):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.37981189851268):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40671664161577):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.370</title>
			<desc>Департамент страхового посредничества</desc>
			<g id="shape370-514" v:mID="370" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="580.394" width="83.27" height="14.8819"/>
				<g id="shadow370-515" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="19.42" y="573.19" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="23.48" dy="1.2em" class="st7">страхового</tspan> <tspan x="14.51" dy="1.2em" class="st7">посредничества</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="19.42" y="573.19" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="23.48" dy="1.2em" class="st7">страхового</tspan> <tspan x="14.51" dy="1.2em" class="st7">посредничества</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group375-524" transform="translate(586.772,-47.0551)" v:mID="375" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Управления страхования)"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017125984296661):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.89763779526047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.34251968593323):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D0B58870-30F2-48D8-8FC7-2713DB1F0DB4})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.46653543374439):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.53740157424368):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.0649606307444):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(1.3622047248917):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(8.598425197,0.82480315064798)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307444,1.3622047248917)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.32863079704434):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.86821963156658):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30461715904734):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.375</title>
			<desc>Управления страхования</desc>
			<g id="shape375-525" v:mID="375" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="32.315" cy="582.945" width="63.29" height="12.3307"/>
				<g id="shadow375-526" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 570.61 L64.63 570.61 L64.63 595.28 L0 595.28 Z" class="st9"/>
					<text x="11.37" y="580.54" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="10.62" dy="1.2em" class="st7">страхования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 570.61 L64.63 570.61 L64.63 595.28 L0 595.28 Z" class="st31"/>
				<text x="11.37" y="580.54" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="10.62" dy="1.2em" class="st7">страхования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group395-533" transform="translate(722.835,-314.646)" v:mID="395" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(5.0787401576073):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960630043603):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(269.99999999403MM,115.50000000192MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189851269):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.115644070848):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.34385702136254):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.395</title>
			<desc>Управляющий директор</desc>
			<g id="shape395-534" v:mID="395" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="83.27" height="12.7559"/>
				<g id="shadow395-535" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st22"/>
				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st33"/>
				<text x="14.23" y="579.82" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape29-541" v:mID="29" v:groupContext="shape" transform="translate(365.669,-493.228)">
			<title>Динамическая соединительная линия.29</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 544.25 L-42.52 544.25" class="st5"/>
		</g>
		<g id="group17-544" transform="translate(193.606,-399.685)" v:mID="17" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.023622048):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(80.2999999788MM,145.5000000222MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.32719442334112):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.17</title>
			<desc>Комитет по рискам</desc>
			<g id="shape17-545" v:mID="17" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow17-546" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st12"/>
					<text x="9.72" y="579.97" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="20.4" dy="1.2em" class="st7">рискам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
				<text x="9.72" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="20.4" dy="1.2em" class="st7">рискам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group77-553" transform="translate(535.748,-399.685)" v:mID="77" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.023622048):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(201.000000003MM,145.5000000222MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,153.0000000192MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181977253):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.88435592675876):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):24"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.32719442334112):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Консультант.77</title>
			<desc>Выплатной комитет</desc>
			<g id="shape77-554" v:mID="77" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow77-555" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st12"/>
					<text x="11.66" y="579.97" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
								x="15.48" dy="1.2em" class="st7">комитет</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
				<text x="11.66" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
							x="15.48" dy="1.2em" class="st7">комитет</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group162-562" transform="translate(658.205,-47.1969)" v:mID="162" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
					  v:val="VT4(Управления активных продаж)"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017125984246661):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.89763779526047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.34251968493323):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D50B95E0-88A3-4AFD-A8FF-DA75552FCF18})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.52559055036553):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.53543307047434):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.0649606307444):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(1.3622047248917):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.5905511811099,0.82677165441732)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307444,1.3622047248917)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.32863079604434):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.86821963420851):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28532370953127):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.30461715854734):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.162</title>
			<desc>Управления активных продаж</desc>
			<g id="shape162-563" v:mID="162" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="32.315" cy="582.945" width="63.29" height="12.3307"/>
				<g id="shadow162-564" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 570.61 L64.63 570.61 L64.63 595.28 L0 595.28 Z" class="st9"/>
					<text x="11.37" y="580.54" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="1.14" dy="1.2em" class="st7">активных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 570.61 L64.63 570.61 L64.63 595.28 L0 595.28 Z" class="st31"/>
				<text x="11.37" y="580.54" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="1.14" dy="1.2em" class="st7">активных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape402-571" v:mID="402" v:groupContext="shape" transform="translate(433.701,-436.535)">
			<title>Динамическая соединительная линия.402</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L136.06 598.11 L136.06 606.61" class="st5"/>
		</g>
		<g id="shape404-574" v:mID="404" v:groupContext="shape" transform="translate(365.669,-436.535)">
			<title>Динамическая соединительная линия.404</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-138.05 598.11 L-138.05 606.61" class="st5"/>
		</g>
		<g id="shape30-577" v:mID="30" v:groupContext="shape" transform="translate(365.669,-500.315)">
			<title>Динамическая соединительная линия.30</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 602.36 L-42.52 602.36" class="st5"/>
		</g>
		<g id="shape31-580" v:mID="31" v:groupContext="shape" transform="translate(365.669,-493.228)">
			<title>Динамическая соединительная линия.31</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 569.76 L-42.52 569.76" class="st5"/>
		</g>
		<g id="shape137-583" v:mID="137" v:groupContext="shape" transform="translate(365.669,-493.228)">
			<title>Динамическая соединительная линия.137</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 620.79 L-42.52 620.79" class="st5"/>
		</g>
		<g id="shape32-586" v:mID="32" v:groupContext="shape" transform="translate(433.701,-493.228)">
			<title>Динамическая соединительная линия.32</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 544.25 L34.02 544.25" class="st5"/>
		</g>
		<g id="shape219-589" v:mID="219" v:groupContext="shape" transform="translate(433.701,-493.228)">
			<title>Динамическая соединительная линия.219</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 637.8 L34.02 637.8" class="st5"/>
		</g>
		<g id="shape138-592" v:mID="138" v:groupContext="shape" transform="translate(433.701,-493.228)">
			<title>Динамическая соединительная линия.138</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 569.76 L34.02 569.76" class="st5"/>
		</g>
		<g id="shape220-595" v:mID="220" v:groupContext="shape" transform="translate(433.701,-496.063)">
			<title>Динамическая соединительная линия.220</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L8.5 598.11 L8.5 606.61 L34.02 606.61" class="st5"/>
		</g>
		<g id="shape23-598" v:mID="23" v:groupContext="shape" transform="translate(365.669,-436.535)">
			<title>Динамическая соединительная линия.23</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-59.53 598.11 L-59.53 606.61" class="st5"/>
		</g>
		<g id="shape94-601" v:mID="94" v:groupContext="shape" transform="translate(368.504,-381.26)">
			<title>Динамическая соединительная линия.94</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-2.83 602.36 L-11.34 602.36" class="st5"/>
		</g>
		<g id="shape127-604" v:mID="127" v:groupContext="shape" transform="translate(392.598,-416.693)">
			<title>Динамическая соединительная линия.127</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st5"/>
		</g>
		<g id="shape128-607" v:mID="128" v:groupContext="shape" transform="translate(129.154,-295.512)">
			<title>Динамическая соединительная линия.128</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 638.86 L7.26 638.86" class="st27"/>
		</g>
		<g id="shape130-610" v:mID="130" v:groupContext="shape" transform="translate(129.154,-295.512)">
			<title>Динамическая соединительная линия.130</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 788.88 L7.26 788.88" class="st27"/>
		</g>
		<g id="shape126-613" v:mID="126" v:groupContext="shape" transform="translate(129.154,-295.512)">
			<title>Динамическая соединительная линия.126</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 690.94 L7.26 690.94" class="st27"/>
		</g>
		<g id="shape131-616" v:mID="131" v:groupContext="shape" transform="translate(129.154,-295.512)">
			<title>Динамическая соединительная линия.131</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 741.97 L7.26 741.97" class="st27"/>
		</g>
		<g id="shape135-619" v:mID="135" v:groupContext="shape" transform="translate(452.835,-197.008)">
			<title>Динамическая соединительная линия.135</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 588.19 L20.2 588.19" class="st34"/>
		</g>
		<g id="shape384-622" v:mID="384" v:groupContext="shape" transform="translate(594.567,-46.063)">
			<title>Динамическая соединительная линия.384</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape421-623" v:mID="421" v:groupContext="shape" transform="translate(800.787,-327.402)">
			<title>Динамическая соединительная линия.421</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 629.29 L7.09 629.29" class="st27"/>
		</g>
		<g id="shape423-626" v:mID="423" v:groupContext="shape" transform="translate(800.787,-327.402)">
			<title>Динамическая соединительная линия.423</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 710.08 L7.09 710.08" class="st27"/>
		</g>
		<g id="shape424-629" v:mID="424" v:groupContext="shape" transform="translate(800.787,-327.402)">
			<title>Динамическая соединительная линия.424</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 671.81 L7.09 671.81" class="st27"/>
		</g>
		<g id="shape386-632" v:mID="386" v:groupContext="shape" transform="translate(430.866,-381.26)">
			<title>Динамическая соединительная линия.386</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 602.36 L11.34 602.36" class="st5"/>
		</g>
		<g id="shape168-635" v:mID="168" v:groupContext="shape" transform="translate(263.622,-172.205)">
			<title>Должность.201</title>
			<desc>Управление корпоративного развития</desc>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
			<v:textRect cx="34.0157" cy="580.394" width="68.04" height="29.7638"/>
			<g id="shadow168-636" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
			   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
				<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st9"/>
				<text x="13.96" y="573.19" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
							x="5.67" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> </text>			</g>
			<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st28"/>
			<text x="13.96" y="573.19" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление <tspan
						x="5.67" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> </text>		</g>
		<g id="group188-645" transform="translate(255.118,-284.882)" v:mID="188" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.0050618669831266):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.442913386):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1389201349831):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.133858268,4.104330709)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189838408):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.349786241133):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670169379):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31432946195801):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.188</title>
			<desc>Управляющий директор</desc>
			<g id="shape188-646" v:mID="188" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="584.646" width="83.27" height="10.6299"/>
				<g id="shadow188-647" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="14.23" y="581.95" class="st10" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
								x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st28"/>
				<text x="14.23" y="581.95" class="st6" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group205-654" transform="translate(382.677,-238.11)" v:mID="205" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.025):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188950824):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.70866141747244):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({87F09E5F-2F96-4183-946E-4186E722AC6B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.380413386):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.413385827):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.167814961):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.07480315):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.787401575,3.661417323)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.167814961,4.07480315)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174094719):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.69477252858355):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.43333857998242):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174094719):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174094719):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.62102084952398):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.205</title>
			<desc>Департамент развития партнерских отношений</desc>
			<g id="shape205-655" v:mID="205" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="569.764" width="66.62" height="25.5118"/>
				<g id="shadow205-656" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 544.25 L68.03 544.25 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="10.91" y="557.76" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="18.21" dy="1.2em" class="st7">развития</tspan> <tspan x="12.14" dy="1.2em" class="st7">партнерских</tspan> <tspan
								x="14.27" dy="1.2em" class="st7">отношений</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 544.25 L68.03 544.25 L68.03 595.28 L0 595.28 Z" class="st29"/>
				<text x="10.91" y="557.76" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="18.21" dy="1.2em" class="st7">развития</tspan> <tspan x="12.14" dy="1.2em" class="st7">партнерских</tspan> <tspan
							x="14.27" dy="1.2em" class="st7">отношений</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape202-667" v:mID="202" v:groupContext="shape" transform="translate(605.288,-281.055)">
			<title>Динамическая соединительная линия.202</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.87 595.28 L-3.63 595.28 L-3.63 625.04 L9.3 625.04" class="st27"/>
		</g>
		<g id="shape228-670" v:mID="228" v:groupContext="shape" transform="translate(443.622,-256.535)">
			<title>Динамическая соединительная линия.228</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape391-671" v:mID="391" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.391</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L365.67 603.78 L365.67 612.28" class="st5"/>
		</g>
		<g id="shape392-674" v:mID="392" v:groupContext="shape" transform="translate(392.598,-521.575)">
			<title>Динамическая соединительная линия.392</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 598.11 L7.09 606.61" class="st5"/>
		</g>
		<g id="shape393-677" v:mID="393" v:groupContext="shape" transform="translate(392.598,-476.22)">
			<title>Динамическая соединительная линия.393</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st5"/>
		</g>
		<g id="shape11-680" v:mID="11" v:groupContext="shape" transform="translate(77.9528,-327.402)">
			<title>Динамическая соединительная линия</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-31.89 595.28 L-31.89 701.57 L-23.39 701.57" class="st27"/>
		</g>
		<g id="group428-683" transform="translate(263.622,-127.559)" v:mID="428" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Департамент перестрахования )"/>
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({C34C32DA-F321-4AA2-8FA2-1DF09D2BA109})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.0050618672665914):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.539370078811):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1389201349831):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1338582677165,2.007874016189)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174103237):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.65657047460052):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174103237):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174103237):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778852167):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.428</title>
			<desc>Департамент перестрахования</desc>
			<g id="shape428-684" v:mID="428" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow428-685" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st9"/>
					<text x="10.91" y="575.87" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="4.01" dy="1.2em" class="st7">перестрахования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st28"/>
				<text x="10.91" y="575.87" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.01" dy="1.2em" class="st7">перестрахования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group221-692" transform="translate(474.803,-12.7559)" v:mID="221" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535434646):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2204724407324):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070869291):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({A4CCF633-0E71-44D2-B3DC-7AEEA5B0C7F1})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.3877952744488):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(1.0411849160619E-010):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.816929135):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(0.354330709):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(183MM,0.35433070910412)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(147.750000029MM,0.354330709)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39293525802191):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181980403):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1541920973402):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181980403):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181980403):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267042719):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.221</title>
			<desc>Служба контроля качества</desc>
			<g id="shape221-693" v:mID="221" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="43.937" cy="582.52" width="86.05" height="12.7559"/>
				<g id="shadow221-694" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L87.87 569.76 L87.87 595.28 L0 595.28 Z" class="st9"/>
					<text x="13.6" y="580.12" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
								x="28.83" dy="1.2em" class="st7">качества</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L87.87 569.76 L87.87 595.28 L0 595.28 Z" class="st29"/>
				<text x="13.6" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
							x="28.83" dy="1.2em" class="st7">качества</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group304-701" transform="translate(474.094,-42.5197)" v:mID="304" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.019192913420226):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574798099):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.38385826840453):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({0D3CFAC7-67D9-4A66-9087-AEB04ED57CEE})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.6791338588189):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.764763779):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.5255905511811):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244095):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.20472441,0.782480316)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.5255905511811,4.547244095)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.3994969377144):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.36996937951564):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.0798108163368):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.36996937951564):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.36996937951564):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.25862003792948):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.304</title>
			<desc>Управление маркетинга</desc>
			<g id="shape304-702" v:mID="304" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="581.457" width="87.44" height="13.8189"/>
				<g id="shadow304-703" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 567.64 L89.29 567.64 L89.29 595.28 L0 595.28 Z" class="st9"/>
					<text x="2.45" y="583.86" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 567.64 L89.29 567.64 L89.29 595.28 L0 595.28 Z" class="st29"/>
				<text x="2.45" y="583.86" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>			</g>
		</g>
		<g id="group275-708" transform="translate(54.7087,-178.583)" v:mID="275" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Канцелярия)"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.014763779507087):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(100):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.0118110232424):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.29527559014173):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({AE1BAC2B-122B-45F1-A11B-82902FCCFE1E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.58464566986964):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.91929134):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.8503937008696):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244096):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.265748031,2.627952756)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,4.547244096)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.32338145219191):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.28138670125284):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1492421310321):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.28138670125284):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.28138670125284):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.21432869879808):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.275</title>
			<desc>Канцелярия</desc>
			<g id="shape275-709" v:mID="275" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.4252" cy="584.646" width="71.34" height="10.6299"/>
				<g id="shadow275-710" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L72.85 574.02 L72.85 595.28 L0 595.28 Z" class="st9"/>
					<text x="15.29" y="587.05" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L72.85 574.02 L72.85 595.28 L0 595.28 Z" class="st26"/>
				<text x="15.29" y="587.05" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape102-715" v:mID="102" v:groupContext="shape" transform="translate(607.465,-157.748)">
			<title>Динамическая соединительная линия.102</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.94 595.28 L-1.56 595.28 L-1.56 573.87 L7.23 573.87" class="st27"/>
		</g>
		<g id="shape103-718" v:mID="103" v:groupContext="shape" transform="translate(605.339,-200.268)">
			<title>Динамическая соединительная линия.103</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.82 595.28 L0.57 595.28 L0.57 616.39 L9.35 616.39" class="st27"/>
		</g>
		<g id="shape104-721" v:mID="104" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.104</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-266.46 603.78 L-266.46 612.28" class="st5"/>
		</g>
		<g id="shape105-724" v:mID="105" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.105</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-101.68 603.78 L-101.68 612.28" class="st5"/>
		</g>
		<g id="group113-727" transform="translate(470.906,-250.866)" v:mID="113" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535415157):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2549212599921):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070830315):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({AF7677BE-528F-4B42-BA19-6407FA4797DE})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.3804133853479):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-7.4804162863984E-011):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.787401575):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.661417323):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.1678149603479,3.6614173229252)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.787401575,3.661417323)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.40441819777515):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181941426):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1879216204136):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181941426):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181941426):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.3105226702323):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.113</title>
			<desc>Управление электронных продаж</desc>
			<g id="shape113-728" v:mID="113" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="45.1772" cy="582.52" width="88.48" height="12.7559"/>
				<g id="shadow113-729" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L90.35 569.76 L90.35 595.28 L0 595.28 Z" class="st9"/>
					<text x="24.21" y="580.12" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="7.84" dy="1.2em" class="st7">электронных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L90.35 569.76 L90.35 595.28 L0 595.28 Z" class="st29"/>
				<text x="24.21" y="580.12" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="7.84" dy="1.2em" class="st7">электронных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape129-736" v:mID="129" v:groupContext="shape" transform="translate(526.535,-307.559)">
			<title>Динамическая соединительная линия.129</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape204-737" v:mID="204" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.204</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L304.02 603.78 L304.02 671.39 L295.51 671.39" class="st5"/>
		</g>
		<g id="shape217-740" v:mID="217" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.217</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L304.02 603.78 L304.02 752.17 L295.51 752.17" class="st5"/>
		</g>
		<g id="shape223-743" v:mID="223" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.223</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L304.02 603.78 L304.02 854.36 L295.51 854.36" class="st5"/>
		</g>
		<g id="group224-746" transform="translate(610.157,-117.638)" v:mID="224" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.018700787409449):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023621811):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.37401574818898):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({06ECB9DE-139B-4965-BED4-1FC82590C1E2})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.5137795287208):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.3759842529055):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.196850395):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,46.2500000092MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,132.000000033MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189850481):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.36012685930009):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.0546614024929):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.36012685930009):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.36012685930009):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.38286595311467):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.224</title>
			<desc>Служба информационной безопасности</desc>
			<g id="shape224-747" v:mID="224" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="581.811" width="83.27" height="13.4646"/>
				<g id="shadow224-748" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 568.35 L85.04 568.35 L85.04 595.28 L0 595.28 Z" class="st9"/>
					<text x="29.35" y="574.31" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
								x="10.92" dy="1.2em" class="st7">информационной</tspan> <tspan x="18.94" dy="1.2em" class="st7">безопасности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 568.35 L85.04 568.35 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="29.35" y="574.31" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
							x="10.92" dy="1.2em" class="st7">информационной</tspan> <tspan x="18.94" dy="1.2em" class="st7">безопасности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape298-757" v:mID="298" v:groupContext="shape" transform="translate(392.74,-94.9606)">
			<title>Динамическая соединительная линия.298</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape299-758" v:mID="299" v:groupContext="shape" transform="translate(401.102,-350.079)">
			<title>Динамическая соединительная линия.299</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape315-759" v:mID="315" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.315</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L304.02 603.78 L304.02 821.34 L295.51 821.34" class="st5"/>
		</g>
		<g id="shape316-762" v:mID="316" v:groupContext="shape" transform="translate(645.591,-76.1102)">
			<title>Динамическая соединительная линия.316</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape317-763" v:mID="317" v:groupContext="shape" transform="translate(694.063,-71.4331)">
			<title>Динамическая соединительная линия.317</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape318-764" v:mID="318" v:groupContext="shape" transform="translate(597.118,-35.0079)">
			<title>Динамическая соединительная линия.318</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape319-765" v:mID="319" v:groupContext="shape" transform="translate(652.677,-84.6142)">
			<title>Динамическая соединительная линия.319</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 596.69 L0 603.78 L37.84 603.78 L37.84 608.03" class="st27"/>
		</g>
		<g id="shape114-768" v:mID="114" v:groupContext="shape" transform="translate(652.677,-84.5433)">
			<title>Динамическая соединительная линия.114</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 596.62 L0 603.71 L-33.59 603.71 L-33.59 608.1" class="st27"/>
		</g>
		<g id="shape125-771" v:mID="125" v:groupContext="shape" transform="translate(728.504,-148.748)">
			<title>Динамическая соединительная линия.125</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 561.26 L7.09 561.26" class="st27"/>
		</g>
		<g id="shape132-774" v:mID="132" v:groupContext="shape" transform="translate(726.378,-212.598)">
			<title>Динамическая соединительная линия.132</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L0.71 595.28 L0.71 625.11 L9.21 625.11" class="st27"/>
		</g>
		<g id="shape101-777" v:mID="101" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.101</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L70.16 603.78 L70.16 612.28" class="st5"/>
		</g>
		<g id="shape401-780" v:mID="401" v:groupContext="shape" transform="translate(459.921,-161.575)">
			<title>Динамическая соединительная линия.401</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L-1.42 595.28 L-1.42 680.31 L-7.09 680.31" class="st27"/>
		</g>
		<g id="shape394-783" v:mID="394" v:groupContext="shape" transform="translate(77.9528,-327.402)">
			<title>Динамическая соединительная линия.394</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-31.89 595.28 L-31.89 733.46 L-23.24 733.46" class="st27"/>
		</g>
		<g id="shape295-786" v:mID="295" v:groupContext="shape" transform="translate(452.835,-18.4252)">
			<title>Динамическая соединительная линия.295</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 588.19 L21.97 588.19" class="st27"/>
		</g>
		<g id="shape200-789" v:mID="200" v:groupContext="shape" transform="translate(238.839,-327.402)">
			<title>Динамическая соединительная линия.200</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 778.11 L24.78 778.11" class="st27"/>
		</g>
		<g id="shape303-792" v:mID="303" v:groupContext="shape" transform="translate(467.008,-178.583)">
			<title>Динамическая соединительная линия.303</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 623.3 L7.09 623.3" class="st27"/>
		</g>
		<g id="shape309-795" v:mID="309" v:groupContext="shape" transform="translate(467.008,-178.583)">
			<title>Динамическая соединительная линия.309</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 654.8 L7.09 654.8" class="st27"/>
		</g>
		<g id="shape194-798" v:mID="194" v:groupContext="shape" transform="translate(605.288,-281.055)">
			<title>Динамическая соединительная линия.194</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.87 595.28 L-3.63 595.28 L-3.63 650.55 L9.3 650.55" class="st27"/>
		</g>
		<g id="shape383-801" v:mID="383" v:groupContext="shape" transform="translate(467.008,-178.583)">
			<title>Динамическая соединительная линия.383</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 686.69 L7.09 686.69" class="st27"/>
		</g>
		<g id="group218-804" transform="translate(737.008,-93.5433)" v:mID="218" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.023622047244094):24"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.98425196844095):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({206C9537-0AA1-41CF-979C-2F0BC69F310B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.098425197392705):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.011811023564):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259607):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.547244094564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.728346457,1.535433071)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,4.547244094564)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.31419510059143):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.458552055993):24"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.68518960167136):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.31419510059143):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.31419510059143):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778852167):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.218</title>
			<desc>Управление Альфы</desc>
			<g id="shape218-805" v:mID="218" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="35.4331" cy="578.268" width="69.39" height="17.0079"/>
				<g id="shadow218-806" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L70.87 561.26 L70.87 595.28 L0 595.28 Z" class="st9"/>
					<text x="14.47" y="575.87" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="23.38" dy="1.2em" class="st7">Альфы</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L70.87 561.26 L70.87 595.28 L0 595.28 Z" class="st32"/>
				<text x="14.47" y="575.87" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="23.38" dy="1.2em" class="st7">Альфы</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape324-813" v:mID="324" v:groupContext="shape" transform="translate(800.787,-327.402)">
			<title>Динамическая соединительная линия.324</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 812.13 L7.09 812.13" class="st27"/>
		</g>
		<g id="group403-816" transform="translate(471.118,-221.102)" v:mID="403" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
					  v:val="VT4(Управление корпоративных продаж)"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535413386):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2519685034921):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070826772):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({D1F5F660-E30A-4403-9B8C-6A02338E3C0A})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.3818897635979):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.41338582704331):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.787401575):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.661417323):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.1692913385979,3.2480314959567)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.787401575,3.661417323)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.40343394560849):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181937883):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1850305181208):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.34044181937883):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.34044181937883):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.31052267021459):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.403</title>
			<desc>Управление корпоративных продаж</desc>
			<g id="shape403-817" v:mID="403" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="45.0709" cy="582.52" width="88.27" height="12.7559"/>
				<g id="shadow403-818" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L90.14 569.76 L90.14 595.28 L0 595.28 Z" class="st9"/>
					<text x="24.11" y="580.12" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="3.17" dy="1.2em" class="st7">корпоративных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L90.14 569.76 L90.14 595.28 L0 595.28 Z" class="st29"/>
				<text x="24.11" y="580.12" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="3.17" dy="1.2em" class="st7">корпоративных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape409-825" v:mID="409" v:groupContext="shape" transform="translate(450.709,-263.622)">
			<title>Динамическая соединительная линия.409</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 625.04 L20.41 625.04" class="st27"/>
		</g>
		<g id="shape134-828" v:mID="134" v:groupContext="shape" transform="translate(450.709,-270.709)">
			<title>Динамическая соединительная линия.134</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 602.36 L20.2 602.36" class="st27"/>
		</g>
		<g id="shape201-831" v:mID="201" v:groupContext="shape" transform="translate(338.74,-263.553)">
			<title>Динамическая соединительная линия.201</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L1.42 595.28 L1.42 671.74 L-7.09 671.74" class="st27"/>
		</g>
		<g id="shape296-834" v:mID="296" v:groupContext="shape" transform="translate(338.695,-263.553)">
			<title>Динамическая соединительная линия.296</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.04 595.28 L1.46 595.28 L1.46 631.42 L-7.13 631.42" class="st27"/>
		</g>
		<g id="shape133-837" v:mID="133" v:groupContext="shape" transform="translate(459.921,-161.575)">
			<title>Динамическая соединительная линия.133</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L-1.42 595.28 L-1.42 635.67 L-7.09 635.67" class="st27"/>
		</g>
		<g id="shape193-840" v:mID="193" v:groupContext="shape" transform="translate(304.724,-287.717)">
			<title>Динамическая соединительная линия.193</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 598.11 L-7.09 606.61" class="st27"/>
		</g>
		<g id="shape107-843" v:mID="107" v:groupContext="shape" transform="translate(527.244,-327.402)">
			<title>Динамическая соединительная линия.107</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L44.65 595.28 L44.65 866.34 L36.14 866.34" class="st27"/>
		</g>
		<g id="shape119-846" v:mID="119" v:groupContext="shape" transform="translate(527.244,-327.402)">
			<title>Динамическая соединительная линия.119</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L44.65 595.28 L44.65 744.09 L36.14 744.09" class="st27"/>
		</g>
		<g id="shape186-849" v:mID="186" v:groupContext="shape" transform="translate(412.441,-327.402)">
			<title>Динамическая соединительная линия.186</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-36.14 595.28 L-36.14 718.58 L-27.64 718.58" class="st27"/>
		</g>
		<g id="shape297-852" v:mID="297" v:groupContext="shape" transform="translate(412.441,-327.402)">
			<title>Динамическая соединительная линия.297</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-36.14 595.28 L-36.14 761.1 L-27.64 761.1" class="st27"/>
		</g>
		<g id="shape385-855" v:mID="385" v:groupContext="shape" transform="translate(412.441,-327.402)">
			<title>Динамическая соединительная линия.385</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-36.14 595.28 L-36.14 897.17 L-27.64 897.17" class="st27"/>
		</g>
		<g id="shape203-858" v:mID="203" v:groupContext="shape" transform="translate(399.685,-357.165)">
			<title>Динамическая соединительная линия.203</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L304.02 603.78 L304.02 635.24 L295.51 635.24" class="st5"/>
		</g>
		<g id="shape106-861" v:mID="106" v:groupContext="shape" transform="translate(238.839,-327.402)">
			<title>Динамическая соединительная линия.106</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 627.17 L16.28 627.17" class="st27"/>
		</g>
		<g id="shape433-864" v:mID="433" v:groupContext="shape" transform="translate(470.906,-293.386)">
			<title>Динамическая соединительная линия.433</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-11.69 595.28 L-11.69 625.04 L-20.2 625.04" class="st27"/>
		</g>
		<g id="shape434-867" v:mID="434" v:groupContext="shape" transform="translate(629.291,-547.654)">
			<title>Лист.434</title>
			<desc>Оргструктура введена с 01.02.2021 года на основании решения С...</desc>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
			<v:textRect cx="102.047" cy="571.465" width="204.1" height="47.622"/>
			<rect x="0" y="547.654" width="204.094" height="47.622" class="st35"/>
			<text x="0" y="562.46" class="st36" v:langID="1049"><v:paragraph v:bulletSize="0.166667"/><v:tabList/>Оргструктура введена с 01.02.2021 года<v:newlineChar/><tspan
						x="0" dy="1.2em" class="st37">на</tspan><tspan class="st37"> </tspan><tspan class="st37">основании</tspan><tspan
						class="st37"> </tspan><tspan class="st37">решения</tspan><tspan class="st37"> </tspan><tspan class="st37">Совета</tspan><tspan
						class="st37"> </tspan><tspan class="st37">директоров</tspan><tspan class="st37"> </tspan><tspan x="0"
																														dy="1.2em" class="st37">Протокол</tspan><tspan class="st37"> </tspan><tspan class="st37">№</tspan><tspan
						class="st37">8 </tspan><tspan class="st37">от</tspan><tspan class="st37"> </tspan><tspan class="st37">01</tspan><tspan
						class="st37">.</tspan><tspan class="st37">02</tspan><tspan class="st37">.</tspan><tspan class="st37">2021</tspan><tspan
						class="st37">г</tspan><tspan class="st37">.</tspan></text>		</g>
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