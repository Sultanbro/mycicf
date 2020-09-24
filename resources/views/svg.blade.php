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
			<div class="d-flex flex-column mr-3 mt-1">
				<span><strong>Оргструктура действует с 01.07.2020 года</strong></span><br>
				<span>на основании решения Совета</span><br>
				<span>директоров от 29.06.2020 года</span>
			</div>
		</div>
	</main>
</div>
<svg style="width: 100%;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events"
		xmlns:v="http://schemas.microsoft.com/visio/2003/SVGExtensions/" width="11.6929in" height="8.26772in"
		viewBox="0 0 841.89 595.276" xml:space="preserve" color-interpolation-filters="sRGB" class="st41">
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
		.st2 {stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1}
		.st3 {stroke:#3366cc;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st4 {fill:#cdcdcd;fill-opacity:0.5}
		.st5 {stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st6 {fill:url(#grad25-15)}
		.st7 {stroke:#3366cc;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st8 {fill:#002060;font-family:Calibri;font-size:0.791656em;font-weight:bold}
		.st9 {font-size:1em}
		.st10 {fill:none;stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st11 {fill:#cdcdcd;font-family:Calibri;font-size:0.75em;font-weight:bold}
		.st12 {fill:none;stroke:#6699ff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st13 {fill:#002060;font-family:Calibri;font-size:0.75em;font-weight:bold}
		.st14 {fill:none;stroke:#cdcdcd;stroke-dasharray:1.5,3;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st15 {fill:#cdcdcd;font-family:Calibri;font-size:0.708344em;font-style:italic;font-weight:bold}
		.st16 {fill:none;stroke:#3366cc;stroke-dasharray:1.5,3;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st17 {fill:#002060;font-family:Calibri;font-size:0.708344em;font-style:italic;font-weight:bold}
		.st18 {fill:#cdcdcd;font-family:Calibri;font-size:0.75em;font-style:italic;font-weight:bold}
		.st19 {fill:#002060;font-family:Calibri;font-size:0.75em;font-style:italic;font-weight:bold}
		.st20 {fill:none;stroke:#cdcdcd;stroke-dasharray:10.5,7.5,0,7.5;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st21 {fill:#cdcdcd;font-family:Calibri;font-size:0.666664em;font-weight:bold}
		.st22 {fill:none;stroke:#8976ac;stroke-dasharray:10.5,7.5,0,7.5;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st23 {fill:#002060;font-family:Calibri;font-size:0.666664em;font-weight:bold}
		.st24 {fill:#cdcdcd;fill-opacity:0.5;stroke:#cdcdcd;stroke-linecap:round;stroke-linejoin:round;stroke-opacity:0.5;stroke-width:1.5}
		.st25 {fill:url(#grad25-15);stroke:#ff3300;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st26 {fill:url(#grad25-15);stroke:#6699ff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st27 {fill:url(#grad25-15);stroke:#00b050;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st28 {fill:url(#grad25-15);stroke:#ff6600;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st29 {fill:url(#grad25-15);stroke:#cad318;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st30 {fill:none;stroke:#cad318;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st31 {fill:none;stroke:#00b050;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st32 {fill:none;stroke:#ff3300;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st33 {fill:#cdcdcd;font-family:Calibri;font-size:0.666664em;font-weight:bold;opacity:0.498039}
		.st34 {fill:none;stroke:#ff6600;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st35 {fill:none;stroke:#800000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st36 {fill:none;stroke:#7030a0;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st37 {fill:url(#grad25-15);stroke:#800000;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5}
		.st38 {stroke:#3366cc;stroke-dasharray:1,2;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st39 {stroke:#3366cc;stroke-linecap:round;stroke-linejoin:round;stroke-width:0.75}
		.st40 {stroke:#404040;stroke-linecap:round;stroke-linejoin:round;stroke-width:1}
		.st41 {fill:none;fill-rule:evenodd;font-size:12px;overflow:visible;stroke-linecap:square;stroke-miterlimit:3}
	]]>
	</style>

	<defs id="Patterns_And_Gradients">
		<linearGradient id="grad25-15" v:fillPattern="25" v:foreground="#ffffff" v:background="#99ccff" x1="0" y1="0" x2="1" y2="0">
			<stop offset="0" style="stop-color:#ffffff;stop-opacity:1"/>
			<stop offset="1" style="stop-color:#99ccff;stop-opacity:1"/>
		</linearGradient>
		<linearGradient id="grad30-874" v:fillPattern="30" v:foreground="#f0f0f0" v:background="#ffffff" x1="0" y1="1" x2="0"
				y2="0">
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
		<g id="shape427-1" v:mID="427" v:groupContext="shape" transform="translate(357.165,886.535) rotate(180)">
			<title>Лист.427</title>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<g id="shadow427-2" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
					transform="matrix(1,0,0,1,-1.44,-1.44)" class="st1">
				<path d="M0 595.28 L6.38 595.28" class="st2"/>
			</g>
			<path d="M0 595.28 L6.38 595.28" class="st3"/>
		</g>
		<g id="group1-7" transform="translate(365.669,-535.748)" v:mID="1" v:groupContext="group">
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
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.49874038617792):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Руководитель</title>
			<desc>Общее собрание акционеров</desc>
			<g id="shape1-8" v:mID="1" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow1-9" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st6"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st7"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st7"/>
				<text x="19.74" y="569.72" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Общее <tspan
							x="14.43" dy="1.2em" class="st9">собрание</tspan> <tspan x="9.02" dy="1.2em" class="st9">акционеров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group6-21" transform="translate(365.669,-493.228)" v:mID="6" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.677165354):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,194.9999999916MM)):40"/>
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
			<g id="shape6-22" v:mID="6" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow6-23" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st6"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st7"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st7"/>
				<text x="22.36" y="575.42" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет <tspan
							x="9.46" dy="1.2em" class="st9">директоров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group12-33" transform="translate(365.669,-433.701)" v:mID="12" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
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
			<g id="shape12-34" v:mID="12" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow12-35" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st6"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st7"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st7"/>
				<text x="11.27" y="581.12" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Правление<v:newlineChar/> </text>			</g>
		</g>
		<g id="group18-44" transform="translate(365.669,-374.173)" v:mID="18" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(6.25984252):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,159.000000008MM)):40"/>
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
			<g id="shape18-45" v:mID="18" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="64.82" height="17.0079"/>
				<g id="shadow18-46" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st4"/>
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st5"/>
					<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st5"/>
				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st6"/>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28" class="st7"/>
				<path d="M1.7 593.57 L1.7 562.96 L66.33 562.96 L66.33 593.57 L1.7 593.57" class="st7"/>
				<text x="4.74" y="575.42" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Председатель <tspan
							x="11.29" dy="1.2em" class="st9">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group59-56" transform="translate(204.094,-552.756)" v:mID="59" v:groupContext="group">
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
			<g id="shape59-57" v:mID="59" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow59-58" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st10"/>
					<text x="4.8" y="589.47" class="st11" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st12"/>
				<text x="4.8" y="589.47" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>			</g>
		</g>
		<g id="group44-63" transform="translate(204.094,-527.244)" v:mID="44" v:groupContext="group">
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
			<g id="shape44-64" v:mID="44" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow44-65" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st10"/>
					<text x="4.61" y="589.47" class="st11" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st12"/>
				<text x="4.61" y="589.47" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>			</g>
		</g>
		<g id="group49-70" transform="translate(204.094,-501.732)" v:mID="49" v:groupContext="group">
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
			<g id="shape49-71" v:mID="49" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow49-72" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st10"/>
					<text x="15.66" y="589.47" class="st11" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st12"/>
				<text x="15.66" y="589.47" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group54-77" transform="translate(204.094,-476.22)" v:mID="54" v:groupContext="group">
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
			<g id="shape54-78" v:mID="54" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.5276" cy="586.772" width="116.58" height="8.50394"/>
				<g id="shadow54-79" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st10"/>
					<text x="28.33" y="589.47" class="st11" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L119.06 578.27 L119.06 595.28 L0 595.28 Z" class="st12"/>
				<text x="28.33" y="589.47" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group24-84" transform="translate(467.717,-552.756)" v:mID="24" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,197.999999986MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
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
			<g id="shape24-85" v:mID="24" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow24-86" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
					<text x="35.14" y="584.22" class="st15" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
								x="32.88" dy="1.2em" class="st9">активами</tspan> и пассивами<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st16"/>
				<text x="35.14" y="584.22" class="st17" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
							x="32.88" dy="1.2em" class="st9">активами</tspan> и пассивами<v:newlineChar/> </text>			</g>
		</g>
		<g id="group33-93" transform="translate(467.717,-527.244)" v:mID="33" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,189.0000000211MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
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
			<g id="shape33-94" v:mID="33" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow33-95" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
					<text x="23.47" y="589.47" class="st18" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st16"/>
				<text x="23.47" y="589.47" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>			</g>
		</g>
		<g id="group38-100" transform="translate(467.717,-480.472)" v:mID="38" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(7.086614174):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,177MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,180.0000000196MM)):40"/>
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
			<g id="shape38-101" v:mID="38" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="574.016" width="149.89" height="21.2598"/>
				<g id="shadow38-102" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L153.07 552.76 L153.07 595.28 L0 595.28 Z" class="st14"/>
					<text x="33.15" y="561.27" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
								x="14.23" dy="1.2em" class="st9">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
								class="st9">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st9">социальным</tspan> вопросам <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L153.07 552.76 L153.07 595.28 L0 595.28 Z" class="st16"/>
				<text x="33.15" y="561.27" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
							x="14.23" dy="1.2em" class="st9">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
							class="st9">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st9">социальным</tspan> вопросам <v:newlineChar/> </text>			</g>
		</g>
		<g id="group43-113" transform="translate(467.717,-459.213)" v:mID="43" v:groupContext="group">
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
			<g id="shape43-114" v:mID="43" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="76.5354" cy="586.772" width="149.89" height="8.50394"/>
				<g id="shadow43-115" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st14"/>
					<text x="10.29" y="589.32" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L153.07 578.27 L153.07 595.28 L0 595.28 Z" class="st16"/>
				<text x="10.29" y="589.32" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>			</g>
		</g>
		<g id="group72-120" transform="translate(442.205,-374.173)" v:mID="72" v:groupContext="group">
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
			<g id="shape72-121" v:mID="72" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow72-122" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st20"/>
					<text x="17.81" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st9">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st9">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st22"/>
				<text x="17.81" y="571.07" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st9">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st9">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group78-131" transform="translate(289.134,-374.173)" v:mID="78" v:groupContext="group">
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
			<g id="shape78-132" v:mID="78" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow78-133" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st20"/>
					<text x="17.81" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st9">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st9">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st22"/>
				<text x="17.81" y="571.07" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st9">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st9">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group83-142" transform="translate(272.126,-416.693)" v:mID="83" v:groupContext="group">
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
			<g id="shape83-143" v:mID="83" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow83-144" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
					<text x="9.72" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="13.95" dy="1.2em" class="st9">продажам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st16"/>
				<text x="9.72" y="579.97" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="13.95" dy="1.2em" class="st9">продажам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group88-151" transform="translate(446.457,-416.693)" v:mID="88" v:groupContext="group">
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
			<g id="shape88-152" v:mID="88" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow88-153" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
					<text x="10.94" y="585.07" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st16"/>
				<text x="10.94" y="585.07" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape95-158" v:mID="95" v:groupContext="shape" transform="translate(433.701,-453.543)">
			<title>Динамическая соединительная линия.95</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L46.77 598.11 L46.77 606.61" class="st7"/>
		</g>
		<g id="group96-161" transform="translate(359.291,-331.654)" v:mID="96" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.23622047280315):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960630000296):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(147MM,121.50000000172MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
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
			<g id="shape96-162" v:mID="96" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="57.4016" cy="582.52" width="112.42" height="12.7559"/>
				<g id="shadow96-163" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L114.8 569.76 L114.8 595.28 L0 595.28 Z" class="st25"/>
				<text x="32.78" y="579.82" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="7.11" dy="1.2em" class="st9">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape101-169" v:mID="101" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.101</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L17.01 603.78 L17.01 612.28" class="st7"/>
		</g>
		<g id="group102-172" transform="translate(484.724,-331.654)" v:mID="102" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(2.0980314962177):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960629927264):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(194.28999999473MM,121.50000002028MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.5973972002116):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044182050285):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7547703138504):26"/>
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
			<title>Должность.102</title>
			<desc>Заместитель Председателя Правления</desc>
			<g id="shape102-173" v:mID="102" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="66.0189" cy="582.52" width="129.29" height="12.7559"/>
				<g id="shadow102-174" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L132.04 569.76 L132.04 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L132.04 569.76 L132.04 595.28 L0 595.28 Z" class="st26"/>
				<text x="41.4" y="579.82" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="15.72" dy="1.2em" class="st9">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape107-180" v:mID="107" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.107</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L151.06 603.78 L151.06 612.28" class="st7"/>
		</g>
		<g id="group108-183" transform="translate(204.823,-331.654)" v:mID="108" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.8847019118988):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960630043603):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.128571428571MM,121.49999999072MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
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
			<g id="shape108-184" v:mID="108" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="59.1631" cy="582.52" width="115.87" height="12.7559"/>
				<g id="shadow108-185" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L118.33 569.76 L118.33 595.28 L0 595.28 Z" class="st27"/>
				<text x="34.54" y="579.82" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="8.87" dy="1.2em" class="st9">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="shape113-191" v:mID="113" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.113</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-135.7 603.78 L-135.7 612.28" class="st7"/>
		</g>
		<g id="group114-194" transform="translate(620.787,-331.654)" v:mID="114" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1033" v:cal="0"
						v:val="VT4(Управляющий директор)"/>
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
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.34385702136254):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.114</title>
			<desc>Управляющий директор</desc>
			<g id="shape114-195" v:mID="114" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="47.1361" cy="582.52" width="92.31" height="12.7559"/>
				<g id="shadow114-196" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L94.27 569.76 L94.27 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L94.27 569.76 L94.27 595.28 L0 595.28 Z" class="st28"/>
				<text x="18.85" y="579.82" class="st13" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="28.52" dy="1.2em" class="st9">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group120-202" transform="translate(55.2756,-331.654)" v:mID="120" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-4.0157480311339):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.64960629927264):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(39MM,121.50000002028MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
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
			<g id="shape120-203" v:mID="120" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="55.2756" cy="582.52" width="108.25" height="12.7559"/>
				<g id="shadow120-204" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L110.55 569.76 L110.55 595.28 L0 595.28 Z" class="st29"/>
				<text x="1.89" y="579.82" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель Председателя <tspan
							x="6.9" dy="1.2em" class="st9">Правления</tspan> по финансам<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape125-210" v:mID="125" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.125</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-289.13 603.78 L-289.13 612.28" class="st7"/>
		</g>
		<g id="group139-213" transform="translate(28.3465,-297.638)" v:mID="139" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5354330708661):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.9055118115993,4.2814960631747)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5354330708661,4.7834645677274)):40"/>
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
			<g id="shape139-214" v:mID="139" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="584.646" width="72.17" height="10.6299"/>
				<g id="shadow139-215" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st10"/>
					<text x="19.93" y="581.95" class="st11" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
								x="17.64" dy="1.2em" class="st9">бухгалтер</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L73.7 574.02 L73.7 595.28 L0 595.28 Z" class="st30"/>
				<text x="19.93" y="581.95" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
							x="17.64" dy="1.2em" class="st9">бухгалтер</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape144-222" v:mID="144" v:groupContext="shape" transform="translate(110.551,-332.362)">
			<title>Динамическая соединительная линия.144</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.98 L0 604.49 L-45.35 604.49 L-45.35 608.74" class="st3"/>
		</g>
		<g id="group145-225" transform="translate(28.3465,-255.118)" v:mID="145" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(0.9055118115993):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.90551181110586,3.7795275590551)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(0.9055118115993,4.2814960631747)):40"/>
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
			<g id="shape145-226" v:mID="145" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.8504" cy="578.268" width="72.17" height="17.0079"/>
				<g id="shadow145-227" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st10"/>
					<text x="13.75" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="10.4" dy="1.2em" class="st9">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st9">учета</tspan> и анализа<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L73.7 561.26 L73.7 595.28 L0 595.28 Z" class="st30"/>
				<text x="13.75" y="571.07" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="10.4" dy="1.2em" class="st9">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st9">учета</tspan> и анализа<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape150-236" v:mID="150" v:groupContext="shape" transform="translate(72.2835,-300.472)">
			<title>Динамическая соединительная линия.150</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 598.11 L-7.09 606.61" class="st3"/>
		</g>
		<g id="group151-239" transform="translate(109.843,-297.638)" v:mID="151" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.52657480343744):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850455266):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5354330708661):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.0620078743036,4.2814960631747)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5354330708661,4.7834645677274)):40"/>
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
			<g id="shape151-240" v:mID="151" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.622" cy="584.646" width="75.64" height="10.6299"/>
				<g id="shadow151-241" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L77.24 574.02 L77.24 595.28 L0 595.28 Z" class="st10"/>
					<text x="11.58" y="582.25" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
								x="15.88" dy="1.2em" class="st9">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L77.24 574.02 L77.24 595.28 L0 595.28 Z" class="st30"/>
				<text x="11.58" y="582.25" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
							x="15.88" dy="1.2em" class="st9">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape156-248" v:mID="156" v:groupContext="shape" transform="translate(110.551,-332.362)">
			<title>Динамическая соединительная линия.156</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.98 L0 604.49 L37.91 604.49 L37.91 608.74" class="st3"/>
		</g>
		<g id="group157-251" transform="translate(110.197,-136.063)" v:mID="157" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.0620078743036):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.0620078746422,2.2440944881791)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.0620078743036,4.2814960631747)):40"/>
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
			<g id="shape157-252" v:mID="157" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="569.764" width="74.95" height="25.5118"/>
				<g id="shadow157-253" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="13.02" y="557.76" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="9.17" dy="1.2em" class="st9">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st9">договоров</tspan> <tspan
								x="16.57" dy="1.2em" class="st9">страхования</tspan><tspan x="38.27" dy="1.2em" class="st9"> </tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 544.25 L76.54 544.25 L76.54 595.28 L0 595.28 Z" class="st30"/>
				<text x="13.02" y="557.76" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="9.17" dy="1.2em" class="st9">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st9">договоров</tspan> <tspan
							x="16.57" dy="1.2em" class="st9">страхования</tspan><tspan x="38.27" dy="1.2em" class="st9"> </tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group163-266" transform="translate(110.197,-240.236)" v:mID="163" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.0620078743036):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.062007875115,3.6761811027874)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.0620078743036,4.2814960631747)):40"/>
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
			<g id="shape163-267" v:mID="163" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="570.827" width="74.95" height="24.4488"/>
				<g id="shadow163-268" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="17.3" y="554.03" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="2.22" dy="1.2em" class="st9">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st9">договоров</tspan> <tspan
								x="13.44" dy="1.2em" class="st9">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st9">перестрахования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 546.38 L76.54 546.38 L76.54 595.28 L0 595.28 Z" class="st30"/>
				<text x="17.3" y="554.03" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="2.22" dy="1.2em" class="st9">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st9">договоров</tspan> <tspan
							x="13.44" dy="1.2em" class="st9">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st9">перестрахования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group169-281" transform="translate(110.197,-97.6535)" v:mID="169" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.0620078743036):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.0620078750359,1.5925196850394)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.0620078743036,4.2814960631747)):40"/>
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
			<g id="shape169-282" v:mID="169" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="74.95" height="17.0079"/>
				<g id="shadow169-283" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="0.95" y="575.87" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
								x="18.16" dy="1.2em" class="st9">и</tspan> платежей<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st30"/>
				<text x="0.95" y="575.87" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
							x="18.16" dy="1.2em" class="st9">и</tspan> платежей<v:newlineChar/> </text>			</g>
		</g>
		<g id="group175-290" transform="translate(110.197,-191.339)" v:mID="175" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.0620078743036):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960631747):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.0620078750437,2.9527559055118)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.0620078743036,4.2814960631747)):40"/>
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
			<g id="shape175-291" v:mID="175" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="574.016" width="74.95" height="21.2598"/>
				<g id="shadow175-292" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="12.11" y="562.02" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="20.99" dy="1.2em" class="st9">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st9">дебиторской</tspan> <tspan
								x="11.07" dy="1.2em" class="st9">задолженности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 552.76 L76.54 552.76 L76.54 595.28 L0 595.28 Z" class="st30"/>
				<text x="12.11" y="562.02" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="20.99" dy="1.2em" class="st9">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st9">дебиторской</tspan> <tspan
							x="11.07" dy="1.2em" class="st9">задолженности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group181-303" transform="translate(29.0551,-221.102)" v:mID="181" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.5354330708661):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(0.9055118115993,3.2480314960748)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.5354330708661,4.7834645677274)):40"/>
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
			<g id="shape181-304" v:mID="181" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="582.52" width="70.78" height="12.7559"/>
				<g id="shadow181-305" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st10"/>
					<text x="2.44" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
								x="15.47" dy="1.2em" class="st9">управление</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L72.28 569.76 L72.28 595.28 L0 595.28 Z" class="st30"/>
				<text x="2.44" y="580.12" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
							x="15.47" dy="1.2em" class="st9">управление</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group195-312" transform="translate(191.885,-259.37)" v:mID="195" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.6664791899083):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.2814960630079):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.1349831258808,3.809055118)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.6664791899083,4.2814960630079)):40"/>
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
			<g id="shape195-313" v:mID="195" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="33.8335" cy="580.394" width="66.26" height="14.8819"/>
				<g id="shadow195-314" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L67.67 565.51 L67.67 595.28 L0 595.28 Z" class="st10"/>
					<text x="10.73" y="573.19" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="5.49" dy="1.2em" class="st9">корпоративного</tspan> <tspan x="12.14" dy="1.2em" class="st9">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.51 L67.67 565.51 L67.67 595.28 L0 595.28 Z" class="st31"/>
				<text x="10.73" y="573.19" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="5.49" dy="1.2em" class="st9">корпоративного</tspan> <tspan x="12.14" dy="1.2em" class="st9">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group206-323" transform="translate(264.351,-221.102)" v:mID="206" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.47750281214848):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.4763779524171):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.6664791901012):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1439820022497,3.3070866141469)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.6664791901012,4.783464566564)):40"/>
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
			<g id="shape206-324" v:mID="206" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow206-325" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
					<text x="10.91" y="575.87" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="4.01" dy="1.2em" class="st9">перестрахования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st31"/>
				<text x="10.91" y="575.87" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.01" dy="1.2em" class="st9">перестрахования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group211-332" transform="translate(191.885,-221.102)" v:mID="211" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850431595):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.1349831258808):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.809055118):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.1375140588965,3.3070866136841)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.1349831258808,3.809055118)):40"/>
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
			<g id="shape211-333" v:mID="211" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow211-334" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
					<text x="13.05" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="5.67" dy="1.2em" class="st9">корпоративного</tspan> <tspan x="12.32" dy="1.2em" class="st9">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st31"/>
				<text x="13.05" y="571.07" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="5.67" dy="1.2em" class="st9">корпоративного</tspan> <tspan x="12.32" dy="1.2em" class="st9">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group230-343" transform="translate(425.197,-282.614)" v:mID="230" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.222440945):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.4960629922835,4.043307087)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.388779528,4.222440945)):40"/>
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
			<g id="shape230-344" v:mID="230" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="83.27" height="8.50394"/>
				<g id="shadow230-345" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="21.55" y="584.37" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="6.06" dy="1.2em" class="st9">партнерских</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st32"/>
				<text x="21.55" y="584.37" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="6.06" dy="1.2em" class="st9">партнерских</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="group235-352" transform="translate(359.291,-242.22)" v:mID="235" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.7874015748031):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566997):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.4035433070551,3.600393701)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.7874015748031,4.783464566997)):40"/>
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
			<g id="shape235-353" v:mID="235" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="29.7638" cy="578.268" width="58.29" height="17.0079"/>
				<g id="shadow235-354" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L59.53 561.26 L59.53 595.28 L0 595.28 Z" class="st10"/>
					<text x="6.66" y="571.07" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="3.67" dy="1.2em" class="st9">регионального</tspan> <tspan x="13.95" dy="1.2em" class="st9">развития</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L59.53 561.26 L59.53 595.28 L0 595.28 Z" class="st32"/>
				<text x="6.66" y="571.07" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="3.67" dy="1.2em" class="st9">регионального</tspan> <tspan x="13.95" dy="1.2em" class="st9">развития</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group240-363" transform="translate(427.323,-250.724)" v:mID="240" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.1220472440472):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.4035433070551):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.600393701):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.5255905511024,3.600393701)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.4035433070551,3.600393701)):40"/>
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
			<g id="shape240-364" v:mID="240" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="83.27" height="8.50394"/>
				<g id="shadow240-365" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="26.14" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st32"/>
				<text x="26.14" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>			</g>
		</g>
		<g id="group245-370" transform="translate(359.291,-212.598)" v:mID="245" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.7874015748031):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566997):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.4035433071654,3.12992126)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.7874015748031,4.783464566997)):40"/>
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
			<g id="shape245-371" v:mID="245" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="29.7638" cy="582.52" width="58.29" height="12.7559"/>
				<g id="shadow245-372" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L59.53 569.76 L59.53 595.28 L0 595.28 Z" class="st10"/>
					<text x="5.11" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
								x="7.02" dy="1.2em" class="st9">департамент</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L59.53 569.76 L59.53 595.28 L0 595.28 Z" class="st32"/>
				<text x="5.11" y="580.12" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
							x="7.02" dy="1.2em" class="st9">департамент</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group250-379" transform="translate(427.323,-212.598)" v:mID="250" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.122047243937):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.4035433071654):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.12992126):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.5255905511024,3.12992126)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.4035433071654,3.12992126)):40"/>
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
			<g id="shape250-380" v:mID="250" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="83.27" height="12.7559"/>
				<g id="shadow250-381" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="2.57" y="580.12" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление правового <tspan
								x="20.04" dy="1.2em" class="st9">обеспечения</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st32"/>
				<text x="2.57" y="580.12" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление правового <tspan
							x="20.04" dy="1.2em" class="st9">обеспечения</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group255-388" transform="translate(427.323,-178.583)" v:mID="255" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020669291353543):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023620472):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41338582707087):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({1A5CA138-21B1-492A-AEF6-A34664DC734E})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.122047243937):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.44291338583465):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.4035433071654):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.12992126):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.5255905511024,2.6870078741654)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(5.4035433071654,3.12992126)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39949693818198):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.95072543030901):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.37981189846019):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.40671664196968):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.255</title>
			<desc>Управление по претензионно-исковой работе</desc>
			<g id="shape255-389" v:mID="255" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="580.394" width="83.27" height="14.8819"/>
				<g id="shadow255-390" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="16.36" y="573.19" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="2.26" dy="1.2em" class="st9">претензионно</tspan>-исковой <tspan x="30.55" dy="1.2em"
								class="st9">работе</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st32"/>
				<text x="16.36" y="573.19" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="2.26" dy="1.2em" class="st9">претензионно</tspan>-исковой <tspan x="30.55" dy="1.2em" class="st9">работе</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group260-399" transform="translate(520.98,-306.142)" v:mID="260" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,4.37007874)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
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
			<g id="shape260-400" v:mID="260" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow260-401" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="2.63" y="584.37" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
								x="32.05" dy="1.2em" class="st9">выплат</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="2.63" y="584.37" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
							x="32.05" dy="1.2em" class="st9">выплат</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group265-408" transform="translate(520.98,-281.259)" v:mID="265" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.8559055111074):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.37007874):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,4.048657719)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,4.37007874)):40"/>
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
			<g id="shape265-409" v:mID="265" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="585.031" width="87.44" height="10.2447"/>
				<g id="shadow265-410" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="23.68" y="582.63" class="st33" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
								x="14.88" dy="1.2em" class="st9">контроля</tspan> выплат </text>				</g>
				<path d="M0 595.28 L0 574.79 L89.29 574.79 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="23.68" y="582.63" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
							x="14.88" dy="1.2em" class="st9">контроля</tspan> выплат </text>			</g>
		</g>
		<g id="group270-417" transform="translate(520.98,-250.866)" v:mID="270" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.8559055111074):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.048657719):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,3.660925197)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,4.048657719)):40"/>
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
			<g id="shape270-418" v:mID="270" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="582.555" width="87.44" height="12.7205"/>
				<g id="shadow270-419" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.83 L89.29 569.83 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="23.68" y="575.35" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="24.22" dy="1.2em" class="st9">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st9">комиссариата</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.83 L89.29 569.83 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="23.68" y="575.35" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="24.22" dy="1.2em" class="st9">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st9">комиссариата</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group275-428" transform="translate(520.98,-229.606)" v:mID="275" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,3.307086615)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
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
			<g id="shape275-429" v:mID="275" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow275-430" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="2.45" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="2.45" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>			</g>
		</g>
		<g id="group280-435" transform="translate(520.98,-208.205)" v:mID="280" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,3.00984252)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
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
			<g id="shape280-436" v:mID="280" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow280-437" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="17.98" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="17.98" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>			</g>
		</g>
		<g id="group285-442" transform="translate(520.98,-187.087)" v:mID="285" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.8559055111074):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.00984252):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,2.716535434)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,3.00984252)):40"/>
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
			<g id="shape285-443" v:mID="285" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow285-444" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="20.48" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="20.48" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group290-449" transform="translate(520.98,-165.685)" v:mID="290" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.8559055111074):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.00984252):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,2.419291339)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.8559055111074,3.00984252)):40"/>
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
			<g id="shape290-450" v:mID="290" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow290-451" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="17.22" y="584.37" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
								x="26.29" dy="1.2em" class="st9">персонала</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="17.22" y="584.37" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
							x="26.29" dy="1.2em" class="st9">персонала</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group295-458" transform="translate(520.98,-140.457)" v:mID="295" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4()"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,2.097440945)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.4297455960875):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.2794181978119):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.21334444707761):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.295</title>
			<desc>Канцелярия</desc>
			<g id="shape295-459" v:mID="295" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="584.717" width="87.44" height="10.5591"/>
				<g id="shadow295-460" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.16 L89.29 574.16 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="23.51" y="587.12" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.16 L89.29 574.16 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="23.51" y="587.12" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>			</g>
		</g>
		<g id="group300-465" transform="translate(520.98,-119.055)" v:mID="300" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,1.771653544)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
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
			<g id="shape300-466" v:mID="300" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow300-467" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="8.32" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел Contact-center  <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="8.32" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел Contact-center  <v:newlineChar/> </text>			</g>
		</g>
		<g id="group305-472" transform="translate(521.093,-97.7953)" v:mID="305" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.8559055121074):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(1.771653544):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8574803147739,1.476377953)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,1.771653544)):40"/>
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
			<g id="shape305-473" v:mID="305" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow305-474" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="14.31" y="584.37" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
								x="29.54" dy="1.2em" class="st9">качества</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="14.31" y="584.37" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
							x="29.54" dy="1.2em" class="st9">качества</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group310-481" transform="translate(520.98,-76.5354)" v:mID="310" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,1.181102362)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
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
			<g id="shape310-482" v:mID="310" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow310-483" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="9.83" y="589.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба аджастеров <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="9.83" y="589.17" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба аджастеров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group315-488" transform="translate(520.98,-46.7717)" v:mID="315" v:groupContext="group">
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.017716535406299):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.2401574800315):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070812598):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({7BC8E975-30FE-40E0-B272-0DEC9A92FE73})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.20669291388977):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.9566929141841):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8559055121074,0.82677165354331)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.3404418192371):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1734661114299):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.3404418192371):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.3404418192371):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.37718908249724):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.315</title>
			<desc>Служба информационной безопасности</desc>
			<g id="shape315-489" v:mID="315" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="582.52" width="87.44" height="12.7559"/>
				<g id="shadow315-490" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="31.48" y="575.32" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
								x="13.05" dy="1.2em" class="st9">информационной</tspan> <tspan x="21.07" dy="1.2em" class="st9">безопасности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L89.29 569.76 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="31.48" y="575.32" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
							x="13.05" dy="1.2em" class="st9">информационной</tspan> <tspan x="21.07" dy="1.2em" class="st9">безопасности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group320-499" transform="translate(521.093,-25.5118)" v:mID="320" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
						v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0" v:val="VT4( )"/>
				<v:cp v:nameU="Title" v:lbl="Должность" v:type="0" v:invis="false" v:ask="false" v:langID="1087" v:cal="0"
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-4.3110236226722):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.6492125982177):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.7834645677274):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.8574803145534,0.47244094505512)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.6492125982177,4.7834645677274)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.39949693778828):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.7968519397164):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.22233158389851):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.38480037718146):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.320</title>
			<desc>Управление по внешним коммуникациям</desc>
			<g id="shape320-500" v:mID="320" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="586.772" width="87.44" height="8.50394"/>
				<g id="shadow320-501" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st10"/>
					<text x="1.1" y="584.37" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/><v:space/><v:newlineChar/>Управление по внешним <tspan
								x="15.23" dy="1.2em" class="st9">коммуникациям</tspan> <v:newlineChar/> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L89.29 578.27 L89.29 595.28 L0 595.28 Z" class="st12"/>
				<text x="1.1" y="584.37" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/><v:space/><v:newlineChar/>Управление по внешним <tspan
							x="15.23" dy="1.2em" class="st9">коммуникациям</tspan> <v:newlineChar/> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group325-508" transform="translate(629.291,-259.37)" v:mID="325" v:groupContext="group">
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(1.1811023622047):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.35433070851378):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({69AC883F-62DD-4DAE-8333-DE50407BF5A8})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.053993250417319):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.0039370089449):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464568):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.3307086614173,3.7795275590551)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.783464568)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.37981189851269):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.34044181962489):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(1.1156440737251):26"/>
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
			<g id="shape325-509" v:mID="325" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="83.27" height="12.7559"/>
				<g id="shadow325-510" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="19.42" y="580.12" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="16.17" dy="1.2em" class="st9">андеррайтинга</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st34"/>
				<text x="19.42" y="580.12" class="st23" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="16.17" dy="1.2em" class="st9">андеррайтинга</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group330-517" transform="translate(631.782,-229.606)" v:mID="330" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.3307086614173):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.7795275590551):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.3037120357888,3.3661417320551)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.3307086614173,3.7795275590551)):40"/>
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
			<g id="shape330-518" v:mID="330" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="582.52" width="74.59" height="12.7559"/>
				<g id="shadow330-519" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st10"/>
					<text x="17.12" y="580.12" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="0.8" dy="1.2em" class="st9">сопровождения</tspan> ДМС<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L76.17 569.76 L76.17 595.28 L0 595.28 Z" class="st34"/>
				<text x="17.12" y="580.12" class="st23" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="0.8" dy="1.2em" class="st9">сопровождения</tspan> ДМС<v:newlineChar/> </text>			</g>
		</g>
		<g id="group335-526" transform="translate(631.782,-208.346)" v:mID="335" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.76771653585138):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.3307086614173):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.7795275590551):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.3037120357888,3.0118110232037)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.3307086614173,3.7795275590551)):40"/>
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
			<g id="shape335-527" v:mID="335" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="586.772" width="74.59" height="8.50394"/>
				<g id="shadow335-528" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st10"/>
					<text x="3.29" y="589.17" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L76.17 578.27 L76.17 595.28 L0 595.28 Z" class="st34"/>
				<text x="3.29" y="589.17" class="st23" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>			</g>
		</g>
		<g id="group340-533" transform="translate(629.291,-293.386)" v:mID="340" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.05399325):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.501968505):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(9.276715411):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464568):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.330708661,4.281496063)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.276715411,4.783464568)):40"/>
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
			<g id="shape340-534" v:mID="340" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="580.394" width="83.27" height="14.8819"/>
				<g id="shadow340-535" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="21.55" y="573.19" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="14.61" dy="1.2em" class="st9">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st9">анализа</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.51 L85.04 565.51 L85.04 595.28 L0 595.28 Z" class="st34"/>
				<text x="21.55" y="573.19" class="st23" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="14.61" dy="1.2em" class="st9">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st9">анализа</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group345-544" transform="translate(731.339,-297.638)" v:mID="345" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259843):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377953,4.3110236219547)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259843,4.783464569)):40"/>
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
			<g id="shape345-545" v:mID="345" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="582.52" width="74.95" height="12.7559"/>
				<g id="shadow345-546" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="8.13" y="580.12" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
								x="15.53" dy="1.2em" class="st9">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L76.54 569.76 L76.54 595.28 L0 595.28 Z" class="st35"/>
				<text x="8.13" y="580.12" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
							x="15.53" dy="1.2em" class="st9">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group350-553" transform="translate(731.339,-218.976)" v:mID="350" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259843):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377953,3.1889763779528)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259843,4.783464569)):40"/>
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
			<g id="shape350-554" v:mID="350" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="584.646" width="74.95" height="10.6299"/>
				<g id="shadow350-555" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="15.16" y="582.25" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="3.71" dy="1.2em" class="st9">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L76.54 574.02 L76.54 595.28 L0 595.28 Z" class="st35"/>
				<text x="15.16" y="582.25" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="3.71" dy="1.2em" class="st9">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group355-562" transform="translate(735.591,-184.961)" v:mID="355" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.688976377953):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.1889763779528):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,2.7746062989528)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.688976377953,3.1889763779528)):40"/>
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
			<g id="shape355-563" v:mID="355" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="70.78" height="14.811"/>
				<g id="shadow355-564" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st10"/>
					<text x="15.18" y="573.26" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="27.13" dy="1.2em" class="st9">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st9">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st35"/>
				<text x="15.18" y="573.26" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="27.13" dy="1.2em" class="st9">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st9">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group360-573" transform="translate(735.591,-150.945)" v:mID="360" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.688976377953):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(3.1889763779528):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,2.3021653539528)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.688976377953,3.1889763779528)):40"/>
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
			<g id="shape360-574" v:mID="360" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="580.465" width="70.78" height="14.811"/>
				<g id="shadow360-575" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st10"/>
					<text x="15.18" y="573.26" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="17.27" dy="1.2em" class="st9">системных</tspan> <tspan x="16.23" dy="1.2em" class="st9">разработок</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 565.65 L72.28 565.65 L72.28 595.28 L0 595.28 Z" class="st35"/>
				<text x="15.18" y="573.26" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="17.27" dy="1.2em" class="st9">системных</tspan> <tspan x="16.23" dy="1.2em" class="st9">разработок</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group365-584" transform="translate(731.339,-250.866)" v:mID="365" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(10.629921259843):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464569):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377958,3.7204724409449)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259843,4.783464569)):40"/>
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
			<g id="shape365-585" v:mID="365" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="578.268" width="74.95" height="17.0079"/>
				<g id="shadow365-586" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st10"/>
					<text x="17.3" y="571.07" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="18.37" dy="1.2em" class="st9">системного</tspan> <tspan x="2.22" dy="1.2em" class="st9">администрирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L76.54 561.26 L76.54 595.28 L0 595.28 Z" class="st35"/>
				<text x="17.3" y="571.07" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="18.37" dy="1.2em" class="st9">системного</tspan> <tspan x="2.22" dy="1.2em" class="st9">администрирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group370-595" transform="translate(314.646,-153.071)" v:mID="370" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.7086614172441):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.0708661427244):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(122.9999999928MM,59.9999999966MM)):40"/>
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
			<g id="shape370-596" v:mID="370" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow370-597" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
					<text x="10.91" y="571.07" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="14.98" dy="1.2em" class="st9">страхового</tspan> <tspan x="6.01" dy="1.2em" class="st9">посредничества</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st36"/>
				<text x="10.91" y="571.07" class="st23" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="14.98" dy="1.2em" class="st9">страхового</tspan> <tspan x="6.01" dy="1.2em" class="st9">посредничества</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group375-606" transform="translate(263.622,-102.047)" v:mID="375" v:groupContext="group">
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
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778852167):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.375</title>
			<desc>Управления страхования</desc>
			<g id="shape375-607" v:mID="375" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow375-608" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
					<text x="13.07" y="575.87" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="12.32" dy="1.2em" class="st9">страхования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st36"/>
				<text x="13.07" y="575.87" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="12.32" dy="1.2em" class="st9">страхования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group395-615" transform="translate(722.835,-331.654)" v:mID="395" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(5.0787401578425):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.649606298):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(5.433070867):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(270MM,121.5000000526MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,138.0000000218MM)):40"/>
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
			<g id="shape395-616" v:mID="395" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="582.52" width="83.27" height="12.7559"/>
				<g id="shadow395-617" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st24"/>
				</g>
				<path d="M0 595.28 L0 569.76 L85.04 569.76 L85.04 595.28 L0 595.28 Z" class="st37"/>
				<text x="14.23" y="579.82" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st9">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape29-623" v:mID="29" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.29</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 544.25 L-42.52 544.25" class="st7"/>
		</g>
		<g id="group17-626" transform="translate(193.606,-416.693)" v:mID="17" v:groupContext="group">
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
			<g id="shape17-627" v:mID="17" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow17-628" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
					<text x="9.72" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="20.4" dy="1.2em" class="st9">рискам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st16"/>
				<text x="9.72" y="579.97" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="20.4" dy="1.2em" class="st9">рискам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group77-635" transform="translate(535.748,-416.693)" v:mID="77" v:groupContext="group">
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
			<g id="shape77-636" v:mID="77" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="582.52" width="66.62" height="12.7559"/>
				<g id="shadow77-637" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st14"/>
					<text x="11.66" y="579.97" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
								x="15.48" dy="1.2em" class="st9">комитет</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 569.76 L68.03 569.76 L68.03 595.28 L0 595.28 Z" class="st16"/>
				<text x="11.66" y="579.97" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
							x="15.48" dy="1.2em" class="st9">комитет</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group162-644" transform="translate(365.669,-102.047)" v:mID="162" v:groupContext="group">
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
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.36957778852167):24"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.162</title>
			<desc>Управления активных продаж</desc>
			<g id="shape162-645" v:mID="162" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="578.268" width="66.62" height="17.0079"/>
				<g id="shadow162-646" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st10"/>
					<text x="13.07" y="575.87" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="2.84" dy="1.2em" class="st9">активных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 561.26 L68.03 561.26 L68.03 595.28 L0 595.28 Z" class="st36"/>
				<text x="13.07" y="575.87" class="st23" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="2.84" dy="1.2em" class="st9">активных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape402-653" v:mID="402" v:groupContext="shape" transform="translate(433.701,-453.543)">
			<title>Динамическая соединительная линия.402</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L136.06 598.11 L136.06 606.61" class="st7"/>
		</g>
		<g id="shape404-656" v:mID="404" v:groupContext="shape" transform="translate(365.669,-453.543)">
			<title>Динамическая соединительная линия.404</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-138.05 598.11 L-138.05 606.61" class="st7"/>
		</g>
		<g id="shape30-659" v:mID="30" v:groupContext="shape" transform="translate(365.669,-517.323)">
			<title>Динамическая соединительная линия.30</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 602.36 L-42.52 602.36" class="st7"/>
		</g>
		<g id="shape31-662" v:mID="31" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.31</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 569.76 L-42.52 569.76" class="st7"/>
		</g>
		<g id="shape137-665" v:mID="137" v:groupContext="shape" transform="translate(365.669,-510.236)">
			<title>Динамическая соединительная линия.137</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-8.5 595.28 L-8.5 620.79 L-42.52 620.79" class="st7"/>
		</g>
		<g id="shape32-668" v:mID="32" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.32</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 544.25 L34.02 544.25" class="st7"/>
		</g>
		<g id="shape219-671" v:mID="219" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.219</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 637.8 L34.02 637.8" class="st7"/>
		</g>
		<g id="shape138-674" v:mID="138" v:groupContext="shape" transform="translate(433.701,-510.236)">
			<title>Динамическая соединительная линия.138</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L8.5 595.28 L8.5 569.76 L34.02 569.76" class="st7"/>
		</g>
		<g id="shape220-677" v:mID="220" v:groupContext="shape" transform="translate(433.701,-513.071)">
			<title>Динамическая соединительная линия.220</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L8.5 598.11 L8.5 606.61 L34.02 606.61" class="st7"/>
		</g>
		<g id="shape23-680" v:mID="23" v:groupContext="shape" transform="translate(365.669,-453.543)">
			<title>Динамическая соединительная линия.23</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L-59.53 598.11 L-59.53 606.61" class="st7"/>
		</g>
		<g id="shape94-683" v:mID="94" v:groupContext="shape" transform="translate(368.504,-398.268)">
			<title>Динамическая соединительная линия.94</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-2.83 602.36 L-11.34 602.36" class="st7"/>
		</g>
		<g id="shape127-686" v:mID="127" v:groupContext="shape" transform="translate(392.598,-433.701)">
			<title>Динамическая соединительная линия.127</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st7"/>
		</g>
		<g id="shape128-689" v:mID="128" v:groupContext="shape" transform="translate(102.933,-308.268)">
			<title>Динамическая соединительная линия.128</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 638.86 L7.26 638.86" class="st3"/>
		</g>
		<g id="shape130-692" v:mID="130" v:groupContext="shape" transform="translate(102.933,-308.268)">
			<title>Динамическая соединительная линия.130</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 788.88 L7.26 788.88" class="st3"/>
		</g>
		<g id="shape126-695" v:mID="126" v:groupContext="shape" transform="translate(102.933,-308.268)">
			<title>Динамическая соединительная линия.126</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 690.94 L7.26 690.94" class="st3"/>
		</g>
		<g id="shape131-698" v:mID="131" v:groupContext="shape" transform="translate(102.933,-308.268)">
			<title>Динамическая соединительная линия.131</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 595.28 L2.66 595.28 L2.66 741.97 L7.26 741.97" class="st3"/>
		</g>
		<g id="shape133-701" v:mID="133" v:groupContext="shape" transform="translate(218.723,-264.331)">
			<title>Динамическая соединительная линия.133</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7 600.24 L7 602.36 L7.18 602.36 L7.18 604.49" class="st3"/>
		</g>
		<g id="shape132-704" v:mID="132" v:groupContext="shape" transform="translate(320.679,-344.409)">
			<title>Динамическая соединительная линия.132</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.47 595.28 L20.21 595.28 L20.21 701.57 L11.7 701.57" class="st3"/>
		</g>
		<g id="shape136-707" v:mID="136" v:groupContext="shape" transform="translate(352.205,-344.409)">
			<title>Динамическая соединительная линия.136</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 714.33 L7.09 714.33" class="st3"/>
		</g>
		<g id="shape135-710" v:mID="135" v:groupContext="shape" transform="translate(415.984,-252.142)">
			<title>Динамическая соединительная линия.135</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 588.19 L11.34 588.19" class="st38"/>
		</g>
		<g id="shape186-713" v:mID="186" v:groupContext="shape" transform="translate(415.984,-218.268)">
			<title>Динамическая соединительная линия.186</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 588.19 L11.34 588.19" class="st3"/>
		</g>
		<g id="shape193-716" v:mID="193" v:groupContext="shape" transform="translate(415.984,-225.354)">
			<title>Динамическая соединительная линия.193</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 595.28 L7.09 595.28 L7.09 627.17 L11.34 627.17" class="st3"/>
		</g>
		<g id="shape218-719" v:mID="218" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.218</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L-51.02 603.78 L-51.02 782.36" class="st3"/>
		</g>
		<g id="shape383-722" v:mID="383" v:groupContext="shape" transform="translate(348.661,-148.819)">
			<title>Динамическая соединительная линия.383</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 596.69 L0 600.94 L-51.02 600.94 L-51.02 608.03" class="st7"/>
		</g>
		<g id="shape384-725" v:mID="384" v:groupContext="shape" transform="translate(341.575,-145.984)">
			<title>Динамическая соединительная линия.384</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape385-726" v:mID="385" v:groupContext="shape" transform="translate(348.661,-153.071)">
			<title>Динамическая соединительная линия.385</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 605.2 L51.02 605.2 L51.02 612.28" class="st7"/>
		</g>
		<g id="shape405-729" v:mID="405" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.405</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 612.28 L59.53 612.28" class="st3"/>
		</g>
		<g id="shape406-732" v:mID="406" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.406</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 688.82 L59.53 688.82" class="st3"/>
		</g>
		<g id="shape407-735" v:mID="407" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.407</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 710.22 L59.53 710.22" class="st3"/>
		</g>
		<g id="shape408-738" v:mID="408" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.408</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 775.91 L59.53 775.91" class="st3"/>
		</g>
		<g id="shape409-741" v:mID="409" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.409</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 799.37 L59.53 799.37" class="st3"/>
		</g>
		<g id="shape410-744" v:mID="410" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.410</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 841.89 L59.53 841.89" class="st3"/>
		</g>
		<g id="shape411-747" v:mID="411" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.411</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 867.4 L59.53 867.4" class="st39"/>
		</g>
		<g id="shape412-750" v:mID="412" v:groupContext="shape" transform="translate(550.743,-331.654)">
			<title>Динамическая соединительная линия.412</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 599.53 L63.78 599.53 L63.78 892.91 L59.64 892.91" class="st3"/>
		</g>
		<g id="shape413-753" v:mID="413" v:groupContext="shape" transform="translate(528.066,-263.587)">
			<title>Динамическая соединительная линия.413</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L-11.34 595.28 L-11.34 567.36 L-7.09 567.36" class="st3"/>
		</g>
		<g id="shape414-756" v:mID="414" v:groupContext="shape" transform="translate(513.893,-314.646)">
			<title>Динамическая соединительная линия.414</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L2.83 595.28 L2.83 618.42 L7.09 618.42" class="st3"/>
		</g>
		<g id="shape415-759" v:mID="415" v:groupContext="shape" transform="translate(513.893,-216.709)">
			<title>Динамическая соединительная линия.415</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L2.83 595.28 L2.83 637.8 L7.09 637.8" class="st3"/>
		</g>
		<g id="shape416-762" v:mID="416" v:groupContext="shape" transform="translate(513.893,-216.709)">
			<title>Динамическая соединительная линия.416</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L2.83 595.28 L2.83 616.39 L7.09 616.39" class="st3"/>
		</g>
		<g id="shape417-765" v:mID="417" v:groupContext="shape" transform="translate(721.782,-344.409)">
			<title>Динамическая соединительная линия.417</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-6.72 595.28 L-2.47 595.28 L-2.47 667.56 L-7.45 667.56" class="st3"/>
		</g>
		<g id="shape418-768" v:mID="418" v:groupContext="shape" transform="translate(721.782,-344.409)">
			<title>Динамическая соединительная линия.418</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-6.72 595.28 L-2.47 595.28 L-2.47 631.42 L-7.45 631.42" class="st3"/>
		</g>
		<g id="shape421-771" v:mID="421" v:groupContext="shape" transform="translate(800.787,-344.409)">
			<title>Динамическая соединительная линия.421</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L15.59 595.28 L15.59 629.29 L7.09 629.29" class="st3"/>
		</g>
		<g id="shape423-774" v:mID="423" v:groupContext="shape" transform="translate(814.961,-344.409)">
			<title>Динамическая соединительная линия.423</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L1.42 595.28 L1.42 710.08 L-7.09 710.08" class="st3"/>
		</g>
		<g id="shape424-777" v:mID="424" v:groupContext="shape" transform="translate(814.961,-344.409)">
			<title>Динамическая соединительная линия.424</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.28 L1.42 595.28 L1.42 671.81 L-7.09 671.81" class="st3"/>
		</g>
		<g id="shape425-780" v:mID="425" v:groupContext="shape" transform="translate(726.378,-229.606)">
			<title>Динамическая соединительная линия.425</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L-3.54 595.28 L-3.54 625.11 L9.21 625.11" class="st3"/>
		</g>
		<g id="shape426-783" v:mID="426" v:groupContext="shape" transform="translate(726.378,-229.606)">
			<title>Динамическая соединительная линия.426</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 595.28 L-3.54 595.28 L-3.54 659.13 L9.21 659.13" class="st3"/>
		</g>
		<g id="shape386-786" v:mID="386" v:groupContext="shape" transform="translate(430.866,-398.268)">
			<title>Динамическая соединительная линия.386</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 602.36 L11.34 602.36" class="st7"/>
		</g>
		<g id="shape168-789" v:mID="168" v:groupContext="shape" transform="translate(263.622,-259.37)">
			<title>Должность.201</title>
			<desc>Управление страхования ответственности</desc>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
			<v:textRect cx="34.0157" cy="580.394" width="68.04" height="29.7638"/>
			<g id="shadow168-790" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
					transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
				<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st10"/>
				<text x="13.05" y="573.19" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="12.32" dy="1.2em" class="st9">страхования</tspan> <tspan x="5.56" dy="1.2em" class="st9">ответственности</tspan><v:newlineChar/> </text>			</g>
			<rect x="0" y="565.512" width="68.0315" height="29.7638" class="st31"/>
			<text x="13.05" y="573.19" class="st23" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
						x="12.32" dy="1.2em" class="st9">страхования</tspan> <tspan x="5.56" dy="1.2em" class="st9">ответственности</tspan><v:newlineChar/> </text>		</g>
		<g id="group188-799" transform="translate(221.467,-297.638)" v:mID="188" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.929136850265E-010):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.5019685035561):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(3.6664791901012):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.783464566564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(3.6664791899083,4.2814960630079)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(3.6664791901012,4.783464566564)):40"/>
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
			<g id="shape188-800" v:mID="188" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="584.646" width="83.27" height="10.6299"/>
				<g id="shadow188-801" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="14.23" y="581.95" class="st11" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
								x="23.9" dy="1.2em" class="st9">директор</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 574.02 L85.04 574.02 L85.04 595.28 L0 595.28 Z" class="st31"/>
				<text x="14.23" y="581.95" class="st13" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st9">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape194-808" v:mID="194" v:groupContext="shape" transform="translate(271.073,-332.362)">
			<title>Динамическая соединительная линия.194</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 595.98 L-7.09 608.74" class="st3"/>
		</g>
		<g id="shape200-811" v:mID="200" v:groupContext="shape" transform="translate(263.987,-300.472)">
			<title>Динамическая соединительная линия.200</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L-38.27 602.36 L-38.27 606.61" class="st3"/>
		</g>
		<g id="shape201-814" v:mID="201" v:groupContext="shape" transform="translate(263.987,-300.472)">
			<title>Динамическая соединительная линия.201</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 598.11 L0 602.36 L42.16 602.36 L42.16 606.61" class="st3"/>
		</g>
		<g id="shape134-817" v:mID="134" v:groupContext="shape" transform="translate(352.205,-344.409)">
			<title>Динамическая соединительная линия.134</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L-1.42 595.28 L-1.42 680.46 L7.09 680.46" class="st3"/>
		</g>
		<g id="group205-820" transform="translate(357.165,-284.882)" v:mID="205" v:groupContext="group">
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.85629921268504):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.53149606305512):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({87F09E5F-2F96-4183-946E-4186E722AC6B})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-1.107283464):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.147637795):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.496062992):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(4.37007874):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(5.388779528,4.222440945)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.496062992,4.37007874)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.51760717416623):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.52461440945739):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.27154418200612):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.53243817231532):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.205</title>
			<desc>Департамент развития партнерских отношений</desc>
			<g id="shape205-821" v:mID="205" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="30.8268" cy="576.142" width="60.37" height="19.1339"/>
				<g id="shadow205-822" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 557.01 L61.65 557.01 L61.65 595.28 L0 595.28 Z" class="st10"/>
					<text x="7.72" y="564.14" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="15.02" dy="1.2em" class="st9">развития</tspan> <tspan x="8.95" dy="1.2em" class="st9">партнерских</tspan> <tspan
								x="11.08" dy="1.2em" class="st9">отношений</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 557.01 L61.65 557.01 L61.65 595.28 L0 595.28 Z" class="st32"/>
				<text x="7.72" y="564.14" class="st23" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="15.02" dy="1.2em" class="st9">развития</tspan> <tspan x="8.95" dy="1.2em" class="st9">партнерских</tspan> <tspan
							x="11.08" dy="1.2em" class="st9">отношений</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape202-833" v:mID="202" v:groupContext="shape" transform="translate(623.45,-272.126)">
			<title>Динамическая соединительная линия.202</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M5.84 595.28 L-2.66 595.28 L-2.66 625.04 L8.33 625.04" class="st3"/>
		</g>
		<g id="shape204-836" v:mID="204" v:groupContext="shape" transform="translate(623.45,-272.126)">
			<title>Динамическая соединительная линия.204</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M5.84 595.28 L-2.66 595.28 L-2.66 650.55 L8.33 650.55" class="st3"/>
		</g>
		<g id="shape203-839" v:mID="203" v:groupContext="shape" transform="translate(414.921,-304.654)">
			<title>Динамическая соединительная линия.203</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M3.9 595.91 L6.02 595.91 L6.02 608.81 L10.28 608.81" class="st3"/>
		</g>
		<g id="group217-842" transform="translate(425.197,-306.142)" v:mID="217" v:groupContext="group">
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
			<g id="shape217-843" v:mID="217" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="586.772" width="83.27" height="8.50394"/>
				<g id="shadow217-844" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
						transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st10"/>
					<text x="21.55" y="584.37" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="5.18" dy="1.2em" class="st9">электронных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 595.28 L0 578.27 L85.04 578.27 L85.04 595.28 L0 595.28 Z" class="st32"/>
				<text x="21.55" y="584.37" class="st23" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="5.18" dy="1.2em" class="st9">электронных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape227-851" v:mID="227" v:groupContext="shape" transform="translate(418.11,-307.559)">
			<title>Динамическая соединительная линия.227</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape228-852" v:mID="228" v:groupContext="shape" transform="translate(411.732,-296.929)">
			<title>Динамическая соединительная линия.228</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape221-853" v:mID="221" v:groupContext="shape" transform="translate(513.95,-127.559)">
			<title>Динамическая соединительная линия.221</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.03 595.28 L-1.47 595.28 L-1.47 616.54 L7.14 616.54" class="st3"/>
		</g>
		<g id="shape119-856" v:mID="119" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.119</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L268.24 603.78 L268.24 612.28" class="st7"/>
		</g>
		<g id="shape391-859" v:mID="391" v:groupContext="shape" transform="translate(399.685,-374.173)">
			<title>Динамическая соединительная линия.391</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L0 603.78 L365.67 603.78 L365.67 612.28" class="st7"/>
		</g>
		<g id="shape392-862" v:mID="392" v:groupContext="shape" transform="translate(392.598,-538.583)">
			<title>Динамическая соединительная линия.392</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 598.11 L7.09 606.61" class="st7"/>
		</g>
		<g id="shape393-865" v:mID="393" v:groupContext="shape" transform="translate(392.598,-493.228)">
			<title>Динамическая соединительная линия.393</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 595.28 L7.09 620.79" class="st7"/>
		</g>
		<g id="shape11-868" v:mID="11" v:groupContext="shape" transform="translate(55.2756,-344.409)">
			<title>Динамическая соединительная линия</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 595.28 L-34.72 595.28 L-34.72 705.83 L-26.22 705.83" class="st3"/>
		</g>
		<g id="shape229-871" v:mID="229" v:groupContext="shape" transform="translate(429.094,-316.417)">
			<title>Динамическая соединительная линия.229</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-3.9 597.05 L-8.15 597.05 L-8.15 607.68 L-10.28 607.68" class="st40"/>
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