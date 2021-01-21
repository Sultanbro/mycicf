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
<svg style="width:100%;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ev="http://www.w3.org/2001/xml-events"
	 xmlns:v="http://schemas.microsoft.com/visio/2003/SVGExtensions/" width="11.6929in" height="16.0354in"
	 viewBox="0 0 841.89 1154.55" xml:space="preserve" color-interpolation-filters="sRGB" class="st35">
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
		.st35 {fill:none;fill-rule:evenodd;font-size:12px;overflow:visible;stroke-linecap:square;stroke-miterlimit:3}
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
		<g id="group1-1" transform="translate(365.669,-1095.02)" v:mID="1" v:groupContext="group">
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
				<v:textRect cx="34.0157" cy="1137.54" width="64.82" height="17.0079"/>
				<g id="shadow1-3" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st2"/>
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st3"/>
					<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st3"/>
				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st4"/>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st5"/>
				<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st5"/>
				<text x="20.5" y="1129.44" class="st6" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Общее <tspan
							x="15.46" dy="1.2em" class="st7">собрание</tspan> <tspan x="10.34" dy="1.2em" class="st7">акционеров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group6-15" transform="translate(365.669,-1052.5)" v:mID="6" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(15.444881889):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,392.2999999806MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="64.82" height="17.0079"/>
				<g id="shadow6-17" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st2"/>
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st3"/>
					<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st3"/>
				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st4"/>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st5"/>
				<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st5"/>
				<text x="22.36" y="1134.69" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет <tspan
							x="9.46" dy="1.2em" class="st7">директоров</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group12-27" transform="translate(365.669,-992.976)" v:mID="12" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="64.82" height="17.0079"/>
				<g id="shadow12-29" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st2"/>
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st3"/>
					<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st3"/>
				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st4"/>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st5"/>
				<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st5"/>
				<text x="11.27" y="1140.39" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Правление<v:newlineChar/> </text>			</g>
		</g>
		<g id="group18-38" transform="translate(365.669,-933.449)" v:mID="18" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.027559055):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="64.82" height="17.0079"/>
				<g id="shadow18-40" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st2"/>
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st3"/>
					<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st3"/>
				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st4"/>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55" class="st5"/>
				<path d="M1.7 1152.85 L1.7 1122.24 L66.33 1122.24 L66.33 1152.85 L1.7 1152.85" class="st5"/>
				<text x="4.74" y="1134.69" class="st8" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Председатель <tspan
							x="11.29" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group59-50" transform="translate(204.094,-1112.03)" v:mID="59" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,395.3000000043MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="59.5276" cy="1146.05" width="116.58" height="8.50394"/>
				<g id="shadow59-52" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="4.8" y="1148.75" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st11"/>
				<text x="4.8" y="1148.75" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба внутреннего аудита<v:newlineChar/> </text>			</g>
		</g>
		<g id="group44-57" transform="translate(204.094,-1086.52)" v:mID="44" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,386.29999999673MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="59.5276" cy="1146.05" width="116.58" height="8.50394"/>
				<g id="shadow44-59" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="4.61" y="1148.75" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st11"/>
				<text x="4.61" y="1148.75" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба актуарных расчетов<v:newlineChar/> </text>			</g>
		</g>
		<g id="group49-64" transform="translate(204.094,-1061.01)" v:mID="49" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,377.29999999505MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="59.5276" cy="1146.05" width="116.58" height="8.50394"/>
				<g id="shadow49-66" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.66" y="1148.75" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st11"/>
				<text x="15.66" y="1148.75" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комплаенс-контролер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group54-71" transform="translate(204.094,-1035.5)" v:mID="54" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(93.000000003MM,368.3MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="59.5276" cy="1146.05" width="116.58" height="8.50394"/>
				<g id="shadow54-73" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="28.33" y="1148.75" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L119.06 1137.54 L119.06 1154.55 L0 1154.55 Z" class="st11"/>
				<text x="28.33" y="1148.75" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Риск-менеджер<v:newlineChar/> </text>			</g>
		</g>
		<g id="group24-78" transform="translate(467.717,-1112.03)" v:mID="24" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,395.299999975MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="76.5354" cy="1146.05" width="149.89" height="8.50394"/>
				<g id="shadow24-80" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="35.14" y="1143.5" class="st13" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
								x="32.88" dy="1.2em" class="st7">активами</tspan> и пассивами<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="35.14" y="1143.5" class="st15" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Совет по управлению <tspan
							x="32.88" dy="1.2em" class="st7">активами</tspan> и пассивами<v:newlineChar/> </text>			</g>
		</g>
		<g id="group33-87" transform="translate(467.717,-1086.52)" v:mID="33" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,386.3000000101MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="76.5354" cy="1146.05" width="149.89" height="8.50394"/>
				<g id="shadow33-89" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="23.47" y="1148.75" class="st16" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="23.47" y="1148.75" class="st17" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Андеррайтинговый совет<v:newlineChar/> </text>			</g>
		</g>
		<g id="group38-94" transform="translate(467.717,-1039.75)" v:mID="38" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,374.299999989MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="76.5354" cy="1133.29" width="149.89" height="21.2598"/>
				<g id="shadow38-96" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1112.03 L153.07 1112.03 L153.07 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="33.15" y="1120.54" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
								x="14.23" dy="1.2em" class="st7">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
																											  class="st7">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st7">социальным</tspan> вопросам <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1112.03 L153.07 1112.03 L153.07 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="33.15" y="1120.54" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по вопросам <tspan
							x="14.23" dy="1.2em" class="st7">стратегического</tspan> планирования, <tspan x="18.86" dy="1.2em"
																										  class="st7">кадров</tspan> и вознаграждений и по <tspan x="33.94" dy="1.2em" class="st7">социальным</tspan> вопросам <v:newlineChar/> </text>			</g>
		</g>
		<g id="group43-107" transform="translate(467.717,-1018.49)" v:mID="43" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.854330709):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(191.9999999972MM,362.3000000112MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,377.3000000086MM)):40"/>
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
				<v:textRect cx="76.5354" cy="1146.05" width="149.89" height="8.50394"/>
				<g id="shadow43-109" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="10.29" y="1148.6" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L153.07 1137.54 L153.07 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="10.29" y="1148.6" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по внутреннему аудиту<v:newlineChar/> </text>			</g>
		</g>
		<g id="group72-114" transform="translate(442.205,-933.449)" v:mID="72" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(167.9999999912MM,335.2999999854MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="66.62" height="17.0079"/>
				<g id="shadow72-116" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st18"/>
					<text x="17.81" y="1130.34" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st20"/>
				<text x="17.81" y="1130.34" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group78-125" transform="translate(289.134,-933.449)" v:mID="78" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(113.999999971MM,335.2999999854MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="66.62" height="17.0079"/>
				<g id="shadow78-127" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st18"/>
					<text x="17.81" y="1130.34" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
								x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st20"/>
				<text x="17.81" y="1130.34" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Советник <tspan
							x="9.35" dy="1.2em" class="st7">Председателя</tspan> <tspan x="14.88" dy="1.2em" class="st7">Правления</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group83-136" transform="translate(272.126,-975.969)" v:mID="83" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.027559055):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(108.0000000016MM,348.7999999913MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1141.8" width="66.62" height="12.7559"/>
				<g id="shadow83-138" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="9.72" y="1139.25" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="13.95" dy="1.2em" class="st7">продажам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="9.72" y="1139.25" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="13.95" dy="1.2em" class="st7">продажам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group88-145" transform="translate(446.457,-975.969)" v:mID="88" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.027559055):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(169.500000003MM,348.8MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
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
				<v:textRect cx="34.0157" cy="1141.8" width="66.62" height="12.7559"/>
				<g id="shadow88-147" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="10.94" y="1144.35" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="10.94" y="1144.35" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>IT-комитет<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape95-152" v:mID="95" v:groupContext="shape" transform="translate(433.701,-1012.82)">
			<title>Динамическая соединительная линия.95</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L46.77 1157.39 L46.77 1165.89" class="st5"/>
		</g>
		<g id="group96-155" transform="translate(433.701,-890.929)" v:mID="96" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.269685039):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.6496063):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(173.2499999814MM,318.7999999908MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="57.4016" cy="1141.8" width="112.42" height="12.7559"/>
				<g id="shadow96-157" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L114.8 1129.04 L114.8 1154.55 L0 1154.55 Z" class="st22"/>
				</g>
				<path d="M0 1154.55 L0 1129.04 L114.8 1129.04 L114.8 1154.55 L0 1154.55 Z" class="st23"/>
				<text x="32.78" y="1139.1" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="7.11" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="group108-163" transform="translate(238.839,-890.929)" v:mID="108" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(105.12857142857MM,318.7999999908MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="59.1631" cy="1141.8" width="115.87" height="12.7559"/>
				<g id="shadow108-165" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L118.33 1129.04 L118.33 1154.55 L0 1154.55 Z" class="st22"/>
				</g>
				<path d="M0 1154.55 L0 1129.04 L118.33 1129.04 L118.33 1154.55 L0 1154.55 Z" class="st24"/>
				<text x="34.54" y="1139.1" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель <tspan
							x="8.87" dy="1.2em" class="st7">Председателя</tspan> Правления <v:newlineChar/> </text>			</g>
		</g>
		<g id="group120-171" transform="translate(77.9528,-890.929)" v:mID="120" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(47.000000002089MM,318.8000000162MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="55.2756" cy="1141.8" width="108.25" height="12.7559"/>
				<g id="shadow120-173" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L110.55 1129.04 L110.55 1154.55 L0 1154.55 Z" class="st22"/>
				</g>
				<path d="M0 1154.55 L0 1129.04 L110.55 1129.04 L110.55 1154.55 L0 1154.55 Z" class="st25"/>
				<text x="1.89" y="1139.1" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Заместитель Председателя <tspan
							x="6.9" dy="1.2em" class="st7">Правления</tspan> по финансам<v:newlineChar/> </text>			</g>
		</g>
		<g id="group139-179" transform="translate(53.8583,-861.165)" v:mID="139" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181103):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,12.10826771592)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,12.551181103)):40"/>
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
				<v:textRect cx="36.8504" cy="1143.92" width="72.17" height="10.6299"/>
				<g id="shadow139-181" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L73.7 1133.29 L73.7 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="19.93" y="1141.22" class="st10" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
								x="17.64" dy="1.2em" class="st7">бухгалтер</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L73.7 1133.29 L73.7 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="19.93" y="1141.22" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Главный <tspan
							x="17.64" dy="1.2em" class="st7">бухгалтер</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape144-188" v:mID="144" v:groupContext="shape" transform="translate(133.228,-893.764)">
			<title>Динамическая соединительная линия.144</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L0 1161.64 L-42.52 1161.64 L-42.52 1165.89" class="st27"/>
		</g>
		<g id="group145-191" transform="translate(53.8583,-818.646)" v:mID="145" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.10826771592):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425197673,11.6062992118)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,12.10826771592)):40"/>
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
				<v:textRect cx="36.8504" cy="1137.54" width="72.17" height="17.0079"/>
				<g id="shadow145-193" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L73.7 1120.54 L73.7 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="13.75" y="1130.34" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="10.4" dy="1.2em" class="st7">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st7">учета</tspan> и анализа<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L73.7 1120.54 L73.7 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="13.75" y="1130.34" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="10.4" dy="1.2em" class="st7">бухгалтерского</tspan> <tspan x="9.28" dy="1.2em" class="st7">учета</tspan> и анализа<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape150-202" v:mID="150" v:groupContext="shape" transform="translate(97.7953,-864)">
			<title>Динамическая соединительная линия.150</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 1157.39 L-7.09 1165.89" class="st27"/>
		</g>
		<g id="group151-205" transform="translate(135.354,-861.165)" v:mID="151" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.56594488209536):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.44291338708022):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(1.8503937008696):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181103):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.416338582965,12.10826771592)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,12.551181103)):40"/>
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
				<v:textRect cx="38.622" cy="1143.92" width="75.64" height="10.6299"/>
				<g id="shadow151-207" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L77.24 1133.29 L77.24 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="11.58" y="1141.52" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
								x="15.88" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L77.24 1133.29 L77.24 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="11.58" y="1141.52" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Операционный <tspan
							x="15.88" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape156-214" v:mID="156" v:groupContext="shape" transform="translate(133.228,-893.764)">
			<title>Динамическая соединительная линия.156</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L0 1161.64 L40.75 1161.64 L40.75 1165.89" class="st27"/>
		</g>
		<g id="group157-217" transform="translate(135.709,-699.591)" v:mID="157" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.416338582965):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.10826771592):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4163385833036,10.070866140924)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.416338582965,12.10826771592)):40"/>
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
				<v:textRect cx="38.2677" cy="1129.04" width="74.95" height="25.5118"/>
				<g id="shadow157-219" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1103.53 L76.54 1103.53 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="13.02" y="1117.04" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="9.17" dy="1.2em" class="st7">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
								x="16.57" dy="1.2em" class="st7">страхования</tspan><tspan x="38.27" dy="1.2em" class="st7"> </tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1103.53 L76.54 1103.53 L76.54 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="13.02" y="1117.04" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="9.17" dy="1.2em" class="st7">сопровождению</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="16.57" dy="1.2em" class="st7">страхования</tspan><tspan x="38.27" dy="1.2em" class="st7"> </tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group163-232" transform="translate(135.709,-803.764)" v:mID="163" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.416338582965):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.10826771592):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4163385837765,11.502952755532)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.416338582965,12.10826771592)):40"/>
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
				<v:textRect cx="38.2677" cy="1130.1" width="74.95" height="24.4488"/>
				<g id="shadow163-234" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1105.65 L76.54 1105.65 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="17.3" y="1113.3" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="2.22" dy="1.2em" class="st7">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
								x="13.44" dy="1.2em" class="st7">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st7">перестрахования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1105.65 L76.54 1105.65 L76.54 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="17.3" y="1113.3" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="2.22" dy="1.2em" class="st7">администрирования</tspan> <tspan x="19.82" dy="1.2em" class="st7">договоров</tspan> <tspan
							x="13.44" dy="1.2em" class="st7">страхования</tspan> и <tspan x="8.26" dy="1.2em" class="st7">перестрахования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group169-247" transform="translate(135.709,-661.181)" v:mID="169" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.416338582965):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.10826771592):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4163385836973,9.4192913377844)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.416338582965,12.10826771592)):40"/>
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
				<v:textRect cx="38.2677" cy="1137.54" width="74.95" height="17.0079"/>
				<g id="shadow169-249" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L76.54 1120.54 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="0.95" y="1135.14" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
								x="18.16" dy="1.2em" class="st7">и</tspan> платежей<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L76.54 1120.54 L76.54 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="0.95" y="1135.14" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление расчетов <tspan
							x="18.16" dy="1.2em" class="st7">и</tspan> платежей<v:newlineChar/> </text>			</g>
		</g>
		<g id="group175-256" transform="translate(135.709,-754.866)" v:mID="175" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(2.416338582965):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.10826771592):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(2.4163385837052,10.779527558257)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(2.416338582965,12.10826771592)):40"/>
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
				<v:textRect cx="38.2677" cy="1133.29" width="74.95" height="21.2598"/>
				<g id="shadow175-258" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1112.03 L76.54 1112.03 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="12.11" y="1121.29" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="20.99" dy="1.2em" class="st7">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st7">дебиторской</tspan> <tspan
								x="11.07" dy="1.2em" class="st7">задолженности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1112.03 L76.54 1112.03 L76.54 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="12.11" y="1121.29" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="20.99" dy="1.2em" class="st7">контролю</tspan> <tspan x="15.69" dy="1.2em" class="st7">дебиторской</tspan> <tspan
							x="11.07" dy="1.2em" class="st7">задолженности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group181-269" transform="translate(54.5669,-784.63)" v:mID="181" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181103):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.2598425202607,11.07480314882)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,12.551181103)):40"/>
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
				<v:textRect cx="36.1417" cy="1141.8" width="70.78" height="12.7559"/>
				<g id="shadow181-271" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L72.28 1129.04 L72.28 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="2.44" y="1139.4" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
								x="15.47" dy="1.2em" class="st7">управление</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L72.28 1129.04 L72.28 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="2.44" y="1139.4" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Административное <tspan
							x="15.47" dy="1.2em" class="st7">управление</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group195-278" transform="translate(263.804,-818.646)" v:mID="195" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.0050618672665923):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850347244):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1389201349831):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.078740156472):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1338582677165,11.576771653)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,12.078740156472)):40"/>
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
			<g id="shape195-279" v:mID="195" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="33.8335" cy="1139.67" width="66.26" height="14.8819"/>
				<g id="shadow195-280" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.79 L67.67 1124.79 L67.67 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="10.73" y="1132.47" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="5.49" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.14" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.79 L67.67 1124.79 L67.67 1154.55 L0 1154.55 Z" class="st28"/>
				<text x="10.73" y="1132.47" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="5.49" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.14" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group206-289" transform="translate(399.685,-610.299)" v:mID="206" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.797244094):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.8385826767768):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,8.7125984252232)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="66.62" height="17.0079"/>
				<g id="shadow206-291" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="23.31" y="1135.14" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел <tspan
								x="9.3" dy="1.2em" class="st7">Contact</tspan>-center  <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="23.31" y="1135.14" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел <tspan
							x="9.3" dy="1.2em" class="st7">Contact</tspan>-center  <v:newlineChar/> </text>			</g>
		</g>
		<g id="group211-298" transform="translate(263.713,-780.378)" v:mID="211" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.50196850284597):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1338582677165):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(11.576771653):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1338582677165,11.074803150154)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1338582677165,11.576771653)):40"/>
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
			<desc>Управление корпоративного страхования</desc>
			<g id="shape211-299" v:mID="211" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="33.9246" cy="1137.54" width="66.44" height="17.0079"/>
				<g id="shadow211-300" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L67.85 1120.54 L67.85 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="12.96" y="1130.34" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="5.58" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.23" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L67.85 1120.54 L67.85 1154.55 L0 1154.55 Z" class="st28"/>
				<text x="12.96" y="1130.34" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="5.58" dy="1.2em" class="st7">корпоративного</tspan> <tspan x="12.23" dy="1.2em" class="st7">страхования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group230-309" transform="translate(479.409,-856.913)" v:mID="230" v:groupContext="group">
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
				<v:textRect cx="45.1772" cy="1141.8" width="88.48" height="12.7559"/>
				<g id="shadow230-311" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L90.35 1129.04 L90.35 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="1.43" y="1139.4" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление партнерских <tspan
								x="31.49" dy="1.2em" class="st7">продаж</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L90.35 1129.04 L90.35 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="1.43" y="1139.4" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление партнерских <tspan
							x="31.49" dy="1.2em" class="st7">продаж</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group235-318" transform="translate(399.685,-784.63)" v:mID="235" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.797244094):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.3582677166063):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,11.192913385394)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
				<v:textRect cx="34.0157" cy="1133.29" width="66.62" height="21.2598"/>
				<g id="shadow235-320" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1112.03 L68.03 1112.03 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="10.91" y="1126.09" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="7.92" dy="1.2em" class="st7">регионального</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1112.03 L68.03 1112.03 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="10.91" y="1126.09" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="7.92" dy="1.2em" class="st7">регионального</tspan> <tspan x="18.21" dy="1.2em" class="st7">развития</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group240-329" transform="translate(479.409,-797.386)" v:mID="240" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.26230315):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.023622047):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(11.192913385394):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.285925197,11.192913385394)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.023622047,11.192913385394)):40"/>
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
				<v:textRect cx="45.1772" cy="1146.05" width="88.48" height="8.50394"/>
				<g id="shadow240-331" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L90.35 1137.54 L90.35 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="28.8" y="1148.45" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L90.35 1137.54 L90.35 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="28.8" y="1148.45" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Филиалы <v:newlineChar/> </text>			</g>
		</g>
		<g id="group245-336" transform="translate(399.685,-746.362)" v:mID="245" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.797244094):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.9488188978573):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,10.602362204143)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
				<v:textRect cx="34.0157" cy="1137.54" width="66.62" height="17.0079"/>
				<g id="shadow245-338" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="9.36" y="1135.14" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
								x="11.28" dy="1.2em" class="st7">департамент</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="9.36" y="1135.14" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Юридический <tspan
							x="11.28" dy="1.2em" class="st7">департамент</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group250-345" transform="translate(399.685,-703.843)" v:mID="250" v:groupContext="group">
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
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.561023622):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.023622047):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.602362204143):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,10.041338582143)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.023622047,10.602362204143)):40"/>
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
				<v:textRect cx="34.0157" cy="1135.42" width="66.62" height="19.1339"/>
				<g id="shadow250-347" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1116.28 L68.03 1116.28 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="13.05" y="1128.22" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="15.55" dy="1.2em" class="st7">Правового<v:newlineChar/></tspan><tspan x="11.53" dy="1.2em"
																										 class="st7">обеспечения</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1116.28 L68.03 1116.28 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="13.05" y="1128.22" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="15.55" dy="1.2em" class="st7">Правового<v:newlineChar/></tspan><tspan x="11.53" dy="1.2em"
																									 class="st7">обеспечения</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group255-356" transform="translate(399.685,-657.071)" v:mID="255" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.023622047):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.602362204143):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,9.4212598421427)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.023622047,10.602362204143)):40"/>
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
				<v:textRect cx="34.0157" cy="1133.29" width="66.62" height="21.2598"/>
				<g id="shadow255-358" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1112.03 L68.03 1112.03 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="7.86" y="1126.09" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
								x="8.14" dy="1.2em" class="st7">претензионно</tspan>-<tspan x="6.75" dy="1.2em" class="st7">исковой</tspan> работе<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1112.03 L68.03 1112.03 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="7.86" y="1126.09" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление по <tspan
							x="8.14" dy="1.2em" class="st7">претензионно</tspan>-<tspan x="6.75" dy="1.2em" class="st7">исковой</tspan> работе<v:newlineChar/> </text>			</g>
		</g>
		<g id="group260-367" transform="translate(480.472,-767.622)" v:mID="260" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.472440945):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-1.7125984248574):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.838582677143)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
				<v:textRect cx="44.6457" cy="1141.8" width="87.44" height="12.7559"/>
				<g id="shadow260-369" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L89.29 1129.04 L89.29 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="2.63" y="1139.4" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
								x="32.05" dy="1.2em" class="st7">выплат</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L89.29 1129.04 L89.29 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="2.63" y="1139.4" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент страховых <tspan
							x="32.05" dy="1.2em" class="st7">выплат</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group265-376" transform="translate(480.472,-742.11)" v:mID="265" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.293307086):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.838582677143):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.449373777)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.838582677143)):40"/>
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
				<v:textRect cx="44.6457" cy="1144.31" width="87.44" height="10.2447"/>
				<g id="shadow265-378" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1134.06 L89.29 1134.06 L89.29 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="23.68" y="1141.91" class="st30" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
								x="14.88" dy="1.2em" class="st7">контроля</tspan> выплат </text>				</g>
				<path d="M0 1154.55 L0 1134.06 L89.29 1134.06 L89.29 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="23.68" y="1141.91" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/>Управление<v:newlineChar/><tspan
							x="14.88" dy="1.2em" class="st7">контроля</tspan> выплат </text>			</g>
		</g>
		<g id="group270-385" transform="translate(480.472,-705.672)" v:mID="270" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.293307086):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.838582677143):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.011811023)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.838582677143)):40"/>
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
				<v:textRect cx="44.6457" cy="1139.37" width="87.44" height="15.1786"/>
				<g id="shadow270-387" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.19 L89.29 1124.19 L89.29 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="23.68" y="1132.17" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="24.22" dy="1.2em" class="st7">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st7">комиссариата</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.19 L89.29 1124.19 L89.29 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="23.68" y="1132.17" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="24.22" dy="1.2em" class="st7">аварийного</tspan> <tspan x="20.23" dy="1.2em" class="st7">комиссариата</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group280-396" transform="translate(610.157,-768.047)" v:mID="280" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,273.94999998623MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
				<v:textRect cx="42.5197" cy="1146.05" width="83.27" height="8.50394"/>
				<g id="shadow280-398" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L85.04 1137.54 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.85" y="1148.45" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L85.04 1137.54 L85.04 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="15.85" y="1148.45" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>HR-управление <v:newlineChar/> </text>			</g>
		</g>
		<g id="group285-403" transform="translate(614.693,-746.929)" v:mID="285" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.785433070324):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.066929134768,10.492125984324)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,10.785433070324)):40"/>
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
				<v:textRect cx="38.126" cy="1146.05" width="74.67" height="8.50394"/>
				<g id="shadow285-405" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L76.25 1137.54 L76.25 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="13.96" y="1148.45" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L76.25 1137.54 L76.25 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="13.96" y="1148.45" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел кадров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group290-410" transform="translate(614.409,-725.528)" v:mID="290" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.492125984324):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0669291346814,10.194881889324)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.066929134768,10.492125984324)):40"/>
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
				<v:textRect cx="38.4094" cy="1146.05" width="75.22" height="8.50394"/>
				<g id="shadow290-412" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L76.82 1137.54 L76.82 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="10.99" y="1143.65" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
								x="20.05" dy="1.2em" class="st7">персонала</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L76.82 1137.54 L76.82 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="10.99" y="1143.65" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел развития <tspan
							x="20.05" dy="1.2em" class="st7">персонала</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group310-419" transform="translate(480.472,-678.331)" v:mID="310" v:groupContext="group">
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
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.293307086):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.838582677143):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.293307087,9.568897637)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.293307086,10.838582677143)):40"/>
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
				<v:textRect cx="44.6457" cy="1143.92" width="87.44" height="10.6299"/>
				<g id="shadow310-421" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L89.29 1133.29 L89.29 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="2.03" y="1146.32" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление аджастеров <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L89.29 1133.29 L89.29 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="2.03" y="1146.32" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление аджастеров <v:newlineChar/> </text>			</g>
		</g>
		<g id="group320-426" transform="translate(399.685,-576.283)" v:mID="320" v:groupContext="group">
			<v:custProps>
				<v:cp v:nameU="Department" v:lbl="Отдел" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Отдел)"/>
				<v:cp v:nameU="Telephone" v:lbl="Телефон" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0"
					  v:val="VT4(Телефон)"/>
				<v:cp v:nameU="Name" v:lbl="Имя" v:type="0" v:invis="false" v:ask="false" v:langID="1049" v:cal="0" v:val="VT4( )"/>
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
				<v:ud v:nameU="Margin" v:prompt="" v:val="VT0(0.020669291328642):1"/>
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="IsHidingSubs" v:prompt="" v:val="VT0(0):5"/>
				<v:ud v:nameU="ShowDivider" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="ThisLayoutStyle" v:prompt="" v:val="VT0(204):26"/>
				<v:ud v:nameU="HasPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188957874):1"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.41338582657284):1"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({2DFCC530-6E9E-4E89-A01C-154A086B80E1})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.797244094):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-4.340551181):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,8.210629921)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
				<v:ud v:nameU="PictureAreaWidth" v:prompt="" v:val="VT0(0.30107174097069):29"/>
				<v:ud v:nameU="PictureAreaHeight" v:prompt="" v:val="VT0(0.39949693768395):29"/>
				<v:ud v:nameU="PictureAreaAspectRatio" v:prompt="" v:val="VT0(0.75362715598305):26"/>
				<v:ud v:nameU="PictureWidth" v:prompt="" v:val="VT0(0.30107174097069):29"/>
				<v:ud v:nameU="PictureHeight" v:prompt="" v:val="VT0(0.30107174097069):29"/>
				<v:ud v:nameU="DividerOffset" v:prompt="" v:val="VT0(0.54004946642769):29"/>
				<v:ud v:nameU="CalcTextLineHeight" v:prompt="" v:val="VT0(0.13333333333333):29"/>
				<v:ud v:nameU="ExpandedForPicture" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="Theme" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="visVersion" v:prompt="" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<title>Должность.320</title>
			<desc>Управление по внешним коммуникациям</desc>
			<g id="shape320-427" v:mID="320" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="1139.67" width="66.62" height="14.8819"/>
				<g id="shadow320-428" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.79 L68.03 1124.79 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="7.86" y="1132.47" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/><v:space/><v:newlineChar/>Управление по <tspan
								x="17.53" dy="1.2em" class="st7">внешним</tspan> <tspan x="4.6" dy="1.2em" class="st7">коммуникациям</tspan> <v:newlineChar/> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.79 L68.03 1124.79 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="7.86" y="1132.47" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/><v:space/><v:newlineChar/>Управление по <tspan
							x="17.53" dy="1.2em" class="st7">внешним</tspan> <tspan x="4.6" dy="1.2em" class="st7">коммуникациям</tspan> <v:newlineChar/> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group325-437" transform="translate(610.157,-844.583)" v:mID="325" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,302.44999998383MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
			<g id="shape325-438" v:mID="325" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1141.8" width="83.27" height="12.7559"/>
				<g id="shadow325-439" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L85.04 1129.04 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="19.42" y="1139.4" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="16.17" dy="1.2em" class="st7">андеррайтинга</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L85.04 1129.04 L85.04 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="19.42" y="1139.4" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="16.17" dy="1.2em" class="st7">андеррайтинга</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group330-446" transform="translate(614.592,-814.819)" v:mID="330" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(11.907480314324):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0649606309176,11.494094487324)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,11.907480314324)):40"/>
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
			<g id="shape330-447" v:mID="330" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="1141.8" width="74.59" height="12.7559"/>
				<g id="shadow330-448" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L76.17 1129.04 L76.17 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="17.12" y="1139.4" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="0.8" dy="1.2em" class="st7">сопровождения</tspan> ДМС<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L76.17 1129.04 L76.17 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="17.12" y="1139.4" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="0.8" dy="1.2em" class="st7">сопровождения</tspan> ДМС<v:newlineChar/> </text>			</g>
		</g>
		<g id="group335-455" transform="translate(614.592,-793.559)" v:mID="335" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(11.907480314324):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.0649606309176,11.139763778)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307208,11.907480314324)):40"/>
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
			<g id="shape335-456" v:mID="335" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.0855" cy="1146.05" width="74.59" height="8.50394"/>
				<g id="shadow335-457" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1137.54 L76.17 1137.54 L76.17 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="3.29" y="1148.45" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1137.54 L76.17 1137.54 L76.17 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="3.29" y="1148.45" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Отдел методологии<v:newlineChar/> </text>			</g>
		</g>
		<g id="group340-462" transform="translate(610.157,-878.598)" v:mID="340" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(3.5137795287208):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.79133858367592):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(5.551181102):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,315.19999998543MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
			<g id="shape340-463" v:mID="340" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1139.67" width="83.27" height="14.8819"/>
				<g id="shadow340-464" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.79 L85.04 1124.79 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="21.55" y="1132.47" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="14.61" dy="1.2em" class="st7">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st7">анализа</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.79 L85.04 1124.79 L85.04 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="21.55" y="1132.47" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="14.61" dy="1.2em" class="st7">стратегического</tspan> <tspan x="28.38" dy="1.2em" class="st7">анализа</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group345-473" transform="translate(731.339,-856.913)" v:mID="345" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181101564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,12.078740154519)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,12.551181101564)):40"/>
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
			<g id="shape345-474" v:mID="345" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="1141.8" width="74.95" height="12.7559"/>
				<g id="shadow345-475" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L76.54 1129.04 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="8.13" y="1139.4" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
								x="15.53" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L76.54 1129.04 L76.54 1154.55 L0 1154.55 Z" class="st32"/>
				<text x="8.13" y="1139.4" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Технологический <tspan
							x="15.53" dy="1.2em" class="st7">департамент</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group350-482" transform="translate(731.339,-778.252)" v:mID="350" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181101564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,10.956692910517)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,12.551181101564)):40"/>
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
			<g id="shape350-483" v:mID="350" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="1143.92" width="74.95" height="10.6299"/>
				<g id="shadow350-484" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L76.54 1133.29 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.16" y="1141.52" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="3.71" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L76.54 1133.29 L76.54 1154.55 L0 1154.55 Z" class="st32"/>
				<text x="15.16" y="1141.52" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="3.71" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group355-491" transform="translate(735.591,-744.236)" v:mID="355" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.956692910517):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,10.542322831564)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.688976377718,10.956692910517)):40"/>
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
			<g id="shape355-492" v:mID="355" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="1139.74" width="70.78" height="14.811"/>
				<g id="shadow355-493" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.93 L72.28 1124.93 L72.28 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.18" y="1132.54" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="27.13" dy="1.2em" class="st7">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.93 L72.28 1124.93 L72.28 1154.55 L0 1154.55 Z" class="st32"/>
				<text x="15.18" y="1132.54" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="27.13" dy="1.2em" class="st7">Web</tspan>-<tspan x="1.58" dy="1.2em" class="st7">программирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group360-502" transform="translate(735.591,-710.22)" v:mID="360" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(10.542322831564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,10.069881886564)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.718503937008,10.542322831564)):40"/>
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
			<g id="shape360-503" v:mID="360" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.1417" cy="1139.74" width="70.78" height="14.811"/>
				<g id="shadow360-504" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.93 L72.28 1124.93 L72.28 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.18" y="1132.54" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="17.27" dy="1.2em" class="st7">системных</tspan> <tspan x="16.23" dy="1.2em" class="st7">разработок</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.93 L72.28 1124.93 L72.28 1154.55 L0 1154.55 Z" class="st32"/>
				<text x="15.18" y="1132.54" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="17.27" dy="1.2em" class="st7">системных</tspan> <tspan x="16.23" dy="1.2em" class="st7">разработок</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group365-513" transform="translate(731.339,-810.142)" v:mID="365" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181101564):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(10.688976377722,11.488188973509)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(10.629921259607,12.551181101564)):40"/>
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
			<g id="shape365-514" v:mID="365" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="38.2677" cy="1137.54" width="74.95" height="17.0079"/>
				<g id="shadow365-515" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L76.54 1120.54 L76.54 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="17.3" y="1130.34" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="18.37" dy="1.2em" class="st7">системного</tspan> <tspan x="2.22" dy="1.2em" class="st7">администрирования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L76.54 1120.54 L76.54 1154.55 L0 1154.55 Z" class="st32"/>
				<text x="17.3" y="1130.34" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="18.37" dy="1.2em" class="st7">системного</tspan> <tspan x="2.22" dy="1.2em" class="st7">администрирования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group370-524" transform="translate(610.157,-659.48)" v:mID="370" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002091MM,237.89999999005MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
			<g id="shape370-525" v:mID="370" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1139.67" width="83.27" height="14.8819"/>
				<g id="shadow370-526" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1124.79 L85.04 1124.79 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="19.42" y="1132.47" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="23.48" dy="1.2em" class="st7">страхового</tspan> <tspan x="14.51" dy="1.2em" class="st7">посредничества</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1124.79 L85.04 1124.79 L85.04 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="19.42" y="1132.47" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="23.48" dy="1.2em" class="st7">страхового</tspan> <tspan x="14.51" dy="1.2em" class="st7">посредничества</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group375-535" transform="translate(586.772,-623.339)" v:mID="375" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(9.3661417318917):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(8.598425197,8.828740157648)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307444,9.3661417318917)):40"/>
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
			<g id="shape375-536" v:mID="375" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="32.315" cy="1142.22" width="63.29" height="12.3307"/>
				<g id="shadow375-537" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.89 L64.63 1129.89 L64.63 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="11.37" y="1139.82" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="10.62" dy="1.2em" class="st7">страхования</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.89 L64.63 1129.89 L64.63 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="11.37" y="1139.82" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="10.62" dy="1.2em" class="st7">страхования</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group395-544" transform="translate(722.835,-890.929)" v:mID="395" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(269.99999999403MM,318.79999997972MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
			<g id="shape395-545" v:mID="395" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1141.8" width="83.27" height="12.7559"/>
				<g id="shadow395-546" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L85.04 1129.04 L85.04 1154.55 L0 1154.55 Z" class="st22"/>
				</g>
				<path d="M0 1154.55 L0 1129.04 L85.04 1129.04 L85.04 1154.55 L0 1154.55 Z" class="st33"/>
				<text x="14.23" y="1139.1" class="st6" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape29-552" v:mID="29" v:groupContext="shape" transform="translate(365.669,-1069.51)">
			<title>Динамическая соединительная линия.29</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-8.5 1154.55 L-8.5 1103.53 L-42.52 1103.53" class="st5"/>
		</g>
		<g id="group17-555" transform="translate(193.606,-975.969)" v:mID="17" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.027559055):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(80.2999999788MM,348.8MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
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
			<g id="shape17-556" v:mID="17" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="1141.8" width="66.62" height="12.7559"/>
				<g id="shadow17-557" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="9.72" y="1139.25" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
								x="20.4" dy="1.2em" class="st7">рискам</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="9.72" y="1139.25" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Комитет по <tspan
							x="20.4" dy="1.2em" class="st7">рискам</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group77-564" transform="translate(535.748,-975.969)" v:mID="77" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(14.027559055):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(201.000000003MM,348.8MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,356.299999997MM)):40"/>
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
			<g id="shape77-565" v:mID="77" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="1141.8" width="66.62" height="12.7559"/>
				<g id="shadow77-566" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st12"/>
					<text x="11.66" y="1139.25" class="st13" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
								x="15.48" dy="1.2em" class="st7">комитет</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L68.03 1129.04 L68.03 1154.55 L0 1154.55 Z" class="st14"/>
				<text x="11.66" y="1139.25" class="st15" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Выплатной <tspan
							x="15.48" dy="1.2em" class="st7">комитет</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group162-573" transform="translate(658.205,-623.48)" v:mID="162" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(9.3661417318917):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(9.5905511811099,8.8307086614173)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(9.0649606307444,9.3661417318917)):40"/>
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
			<g id="shape162-574" v:mID="162" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="32.315" cy="1142.22" width="63.29" height="12.3307"/>
				<g id="shadow162-575" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.89 L64.63 1129.89 L64.63 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="11.37" y="1139.82" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
								x="1.14" dy="1.2em" class="st7">активных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.89 L64.63 1129.89 L64.63 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="11.37" y="1139.82" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управления <tspan
							x="1.14" dy="1.2em" class="st7">активных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape402-582" v:mID="402" v:groupContext="shape" transform="translate(433.701,-1012.82)">
			<title>Динамическая соединительная линия.402</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L136.06 1157.39 L136.06 1165.89" class="st5"/>
		</g>
		<g id="shape404-585" v:mID="404" v:groupContext="shape" transform="translate(365.669,-1012.82)">
			<title>Динамическая соединительная линия.404</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L-138.05 1157.39 L-138.05 1165.89" class="st5"/>
		</g>
		<g id="shape30-588" v:mID="30" v:groupContext="shape" transform="translate(365.669,-1076.6)">
			<title>Динамическая соединительная линия.30</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1161.64 L-42.52 1161.64" class="st5"/>
		</g>
		<g id="shape31-591" v:mID="31" v:groupContext="shape" transform="translate(365.669,-1069.51)">
			<title>Динамическая соединительная линия.31</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-8.5 1154.55 L-8.5 1129.04 L-42.52 1129.04" class="st5"/>
		</g>
		<g id="shape137-594" v:mID="137" v:groupContext="shape" transform="translate(365.669,-1069.51)">
			<title>Динамическая соединительная линия.137</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-8.5 1154.55 L-8.5 1180.06 L-42.52 1180.06" class="st5"/>
		</g>
		<g id="shape32-597" v:mID="32" v:groupContext="shape" transform="translate(433.701,-1069.51)">
			<title>Динамическая соединительная линия.32</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L8.5 1154.55 L8.5 1103.53 L34.02 1103.53" class="st5"/>
		</g>
		<g id="shape219-600" v:mID="219" v:groupContext="shape" transform="translate(433.701,-1069.51)">
			<title>Динамическая соединительная линия.219</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L8.5 1154.55 L8.5 1197.07 L34.02 1197.07" class="st5"/>
		</g>
		<g id="shape138-603" v:mID="138" v:groupContext="shape" transform="translate(433.701,-1069.51)">
			<title>Динамическая соединительная линия.138</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L8.5 1154.55 L8.5 1129.04 L34.02 1129.04" class="st5"/>
		</g>
		<g id="shape220-606" v:mID="220" v:groupContext="shape" transform="translate(433.701,-1072.35)">
			<title>Динамическая соединительная линия.220</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L8.5 1157.39 L8.5 1165.89 L34.02 1165.89" class="st5"/>
		</g>
		<g id="shape23-609" v:mID="23" v:groupContext="shape" transform="translate(365.669,-1012.82)">
			<title>Динамическая соединительная линия.23</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1157.39 L-59.53 1157.39 L-59.53 1165.89" class="st5"/>
		</g>
		<g id="shape94-612" v:mID="94" v:groupContext="shape" transform="translate(368.504,-957.543)">
			<title>Динамическая соединительная линия.94</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-2.83 1161.64 L-11.34 1161.64" class="st5"/>
		</g>
		<g id="shape127-615" v:mID="127" v:groupContext="shape" transform="translate(392.598,-992.976)">
			<title>Динамическая соединительная линия.127</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L7.09 1180.06" class="st5"/>
		</g>
		<g id="shape128-618" v:mID="128" v:groupContext="shape" transform="translate(128.445,-871.795)">
			<title>Динамическая соединительная линия.128</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 1154.55 L2.66 1154.55 L2.66 1198.13 L7.26 1198.13" class="st27"/>
		</g>
		<g id="shape130-621" v:mID="130" v:groupContext="shape" transform="translate(128.445,-871.795)">
			<title>Динамическая соединительная линия.130</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 1154.55 L2.66 1154.55 L2.66 1348.16 L7.26 1348.16" class="st27"/>
		</g>
		<g id="shape126-624" v:mID="126" v:groupContext="shape" transform="translate(128.445,-871.795)">
			<title>Динамическая соединительная линия.126</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 1154.55 L2.66 1154.55 L2.66 1250.22 L7.26 1250.22" class="st27"/>
		</g>
		<g id="shape131-627" v:mID="131" v:groupContext="shape" transform="translate(128.445,-871.795)">
			<title>Динамическая соединительная линия.131</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.91 1154.55 L2.66 1154.55 L2.66 1301.24 L7.26 1301.24" class="st27"/>
		</g>
		<g id="shape135-630" v:mID="135" v:groupContext="shape" transform="translate(466.476,-798.803)">
			<title>Динамическая соединительная линия.135</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M1.24 1147.46 L12.93 1147.46" class="st34"/>
		</g>
		<g id="shape384-633" v:mID="384" v:groupContext="shape" transform="translate(594.567,-622.346)">
			<title>Динамическая соединительная линия.384</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape421-634" v:mID="421" v:groupContext="shape" transform="translate(800.787,-903.685)">
			<title>Динамическая соединительная линия.421</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L15.59 1154.55 L15.59 1188.57 L7.09 1188.57" class="st27"/>
		</g>
		<g id="shape423-637" v:mID="423" v:groupContext="shape" transform="translate(800.787,-903.685)">
			<title>Динамическая соединительная линия.423</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L15.59 1154.55 L15.59 1269.35 L7.09 1269.35" class="st27"/>
		</g>
		<g id="shape424-640" v:mID="424" v:groupContext="shape" transform="translate(800.787,-903.685)">
			<title>Динамическая соединительная линия.424</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L15.59 1154.55 L15.59 1231.09 L7.09 1231.09" class="st27"/>
		</g>
		<g id="shape386-643" v:mID="386" v:groupContext="shape" transform="translate(430.866,-957.543)">
			<title>Динамическая соединительная линия.386</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.83 1161.64 L11.34 1161.64" class="st5"/>
		</g>
		<g id="shape168-646" v:mID="168" v:groupContext="shape" transform="translate(263.622,-746.362)">
			<title>Должность.201</title>
			<desc>Управление страхования ответственности</desc>
			<v:userDefs>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
			<v:textRect cx="34.0157" cy="1139.67" width="68.04" height="29.7638"/>
			<g id="shadow168-647" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
			   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
				<rect x="0" y="1124.79" width="68.0315" height="29.7638" class="st9"/>
				<text x="13.05" y="1132.47" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="12.32" dy="1.2em" class="st7">страхования</tspan> <tspan x="5.56" dy="1.2em" class="st7">ответственности</tspan><v:newlineChar/> </text>			</g>
			<rect x="0" y="1124.79" width="68.0315" height="29.7638" class="st28"/>
			<text x="13.05" y="1132.47" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
						x="12.32" dy="1.2em" class="st7">страхования</tspan> <tspan x="5.56" dy="1.2em" class="st7">ответственности</tspan><v:newlineChar/> </text>		</g>
		<g id="group188-656" transform="translate(255.483,-859.039)" v:mID="188" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.47244094552756):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1389201349831):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,12.078740156472)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,12.551181102)):40"/>
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
			<g id="shape188-657" v:mID="188" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1143.92" width="83.27" height="10.6299"/>
				<g id="shadow188-658" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L85.04 1133.29 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="14.23" y="1141.22" class="st10" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
								x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L85.04 1133.29 L85.04 1154.55 L0 1154.55 Z" class="st28"/>
				<text x="14.23" y="1141.22" class="st6" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управляющий <tspan
							x="23.9" dy="1.2em" class="st7">директор</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group205-665" transform="translate(399.685,-831.402)" v:mID="205" v:groupContext="group">
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
				<v:ud v:nameU="HasSubordinates" v:prompt="" v:val="VT0(0):26"/>
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(-0.797244094):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.649606299):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(6.023622047,11.901574803)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
			<g id="shape205-666" v:mID="205" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="1129.04" width="66.62" height="25.5118"/>
				<g id="shadow205-667" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1103.53 L68.03 1103.53 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="10.91" y="1117.04" class="st19" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="18.21" dy="1.2em" class="st7">развития</tspan> <tspan x="12.14" dy="1.2em" class="st7">партнерских</tspan> <tspan
								x="14.27" dy="1.2em" class="st7">отношений</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1103.53 L68.03 1103.53 L68.03 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="10.91" y="1117.04" class="st21" v:langID="2057"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="18.21" dy="1.2em" class="st7">развития</tspan> <tspan x="12.14" dy="1.2em" class="st7">партнерских</tspan> <tspan
							x="14.27" dy="1.2em" class="st7">отношений</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape202-678" v:mID="202" v:groupContext="shape" transform="translate(605.288,-857.339)">
			<title>Динамическая соединительная линия.202</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.87 1154.55 L-3.63 1154.55 L-3.63 1184.31 L9.3 1184.31" class="st27"/>
		</g>
		<g id="shape228-681" v:mID="228" v:groupContext="shape" transform="translate(460.63,-849.827)">
			<title>Динамическая соединительная линия.228</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape391-682" v:mID="391" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.391</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L365.67 1163.06 L365.67 1171.56" class="st5"/>
		</g>
		<g id="shape392-685" v:mID="392" v:groupContext="shape" transform="translate(392.598,-1097.86)">
			<title>Динамическая соединительная линия.392</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1157.39 L7.09 1165.89" class="st5"/>
		</g>
		<g id="shape393-688" v:mID="393" v:groupContext="shape" transform="translate(392.598,-1052.5)">
			<title>Динамическая соединительная линия.393</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L7.09 1180.06" class="st5"/>
		</g>
		<g id="shape11-691" v:mID="11" v:groupContext="shape" transform="translate(77.9528,-903.685)">
			<title>Динамическая соединительная линия</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-31.89 1154.55 L-31.89 1260.85 L-23.39 1260.85" class="st27"/>
		</g>
		<g id="group428-694" transform="translate(264.685,-703.843)" v:mID="428" v:groupContext="group">
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
				<v:ud v:nameU="Width" v:prompt="" v:val="VT0(0.94488188976378):24"/>
				<v:ud v:nameU="Height" v:prompt="" v:val="VT0(0.47244094488189):24"/>
				<v:ud v:nameU="Prop" v:prompt="" v:val="VT4(Name;Title)"/>
				<v:ud v:nameU="PictureAspectRatio" v:prompt="" v:val="VT0(1):26"/>
				<v:ud v:nameU="PictureID" v:prompt=""/>
				<v:ud v:nameU="SetWidth" v:prompt=""/>
				<v:ud v:nameU="SetHeight" v:prompt=""/>
				<v:ud v:nameU="PositionID" v:prompt="" v:val="VT4({C34C32DA-F321-4AA2-8FA2-1DF09D2BA109})"/>
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.0097019120168733):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-2.539370078):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(4.1389201349831):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(4.148622047,10.011811024)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(4.1389201349831,12.551181102)):40"/>
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
			<title>Должность.428</title>
			<desc>Департамент перестрахования</desc>
			<g id="shape428-695" v:mID="428" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="34.0157" cy="1137.54" width="66.62" height="17.0079"/>
				<g id="shadow428-696" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="10.91" y="1135.14" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
								x="4.01" dy="1.2em" class="st7">перестрахования</tspan> <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1120.54 L68.03 1120.54 L68.03 1154.55 L0 1154.55 Z" class="st28"/>
				<text x="10.91" y="1135.14" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Департамент <tspan
							x="4.01" dy="1.2em" class="st7">перестрахования</tspan> <v:newlineChar/> </text>			</g>
		</g>
		<g id="group221-703" transform="translate(481.89,-614.551)" v:mID="221" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(1.279527559):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(1.0411849160619E-010):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.023622047):24"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(8.7125984252232):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(185.4999999924MM,8.7125984253273)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(152.9999999938MM,8.7125984252232)):40"/>
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
			<g id="shape221-704" v:mID="221" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="43.937" cy="1141.8" width="86.05" height="12.7559"/>
				<g id="shadow221-705" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L87.87 1129.04 L87.87 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="13.6" y="1139.4" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
								x="28.83" dy="1.2em" class="st7">качества</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L87.87 1129.04 L87.87 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="13.6" y="1139.4" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба контроля <tspan
							x="28.83" dy="1.2em" class="st7">качества</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="group304-712" transform="translate(480.472,-647.504)" v:mID="304" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0.47244094536163):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-3.3661417323543):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(6.820866141):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181102):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.2933070863616,9.1850393696457)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(6.820866141,12.551181102)):40"/>
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
			<g id="shape304-713" v:mID="304" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="44.6457" cy="1140.73" width="87.44" height="13.8189"/>
				<g id="shadow304-714" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1126.91 L89.29 1126.91 L89.29 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="2.45" y="1143.13" class="st19" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1126.91 L89.29 1126.91 L89.29 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="2.45" y="1143.13" class="st21" v:langID="1033"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление маркетинга <v:newlineChar/> </text>			</g>
		</g>
		<g id="group275-719" transform="translate(54.7087,-754.866)" v:mID="275" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.551181103):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(1.265748031,10.631889763)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(1.8503937008696,12.551181103)):40"/>
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
			<g id="shape275-720" v:mID="275" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="36.4252" cy="1143.92" width="71.34" height="10.6299"/>
				<g id="shadow275-721" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1133.29 L72.85 1133.29 L72.85 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="15.29" y="1146.32" class="st19" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1133.29 L72.85 1133.29 L72.85 1154.55 L0 1154.55 Z" class="st26"/>
				<text x="15.29" y="1146.32" class="st21" v:langID="1087"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Канцелярия<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape102-726" v:mID="102" v:groupContext="shape" transform="translate(607.465,-734.031)">
			<title>Динамическая соединительная линия.102</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M6.94 1154.55 L-1.56 1154.55 L-1.56 1133.15 L7.23 1133.15" class="st27"/>
		</g>
		<g id="shape103-729" v:mID="103" v:groupContext="shape" transform="translate(605.339,-776.551)">
			<title>Динамическая соединительная линия.103</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.82 1154.55 L0.57 1154.55 L0.57 1175.67 L9.35 1175.67" class="st27"/>
		</g>
		<g id="shape104-732" v:mID="104" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.104</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L-266.46 1163.06 L-266.46 1171.56" class="st5"/>
		</g>
		<g id="shape105-735" v:mID="105" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.105</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L-101.68 1163.06 L-101.68 1171.56" class="st5"/>
		</g>
		<g id="group113-738" transform="translate(479.409,-827.15)" v:mID="113" v:groupContext="group">
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
				<v:ud v:nameU="DeltaX" v:prompt="" v:val="VT0(0):26"/>
				<v:ud v:nameU="DeltaY" v:prompt="" v:val="VT0(-0.413385826):26"/>
				<v:ud v:nameU="ParLocX" v:prompt="" v:val="VT0(7.285925197):1"/>
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(12.078740157):1"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(7.285925197,11.665354331)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(7.285925197,12.078740157)):40"/>
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
			<g id="shape113-739" v:mID="113" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="45.1772" cy="1141.8" width="88.48" height="12.7559"/>
				<g id="shadow113-740" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1129.04 L90.35 1129.04 L90.35 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="24.21" y="1139.4" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
								x="7.84" dy="1.2em" class="st7">электронных</tspan> продаж<v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1129.04 L90.35 1129.04 L90.35 1154.55 L0 1154.55 Z" class="st29"/>
				<text x="24.21" y="1139.4" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Управление <tspan
							x="7.84" dy="1.2em" class="st7">электронных</tspan> продаж<v:newlineChar/> </text>			</g>
		</g>
		<g id="shape129-747" v:mID="129" v:groupContext="shape" transform="translate(526.535,-883.843)">
			<title>Динамическая соединительная линия.129</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape203-748" v:mID="203" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.203</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L252.99 1163.06 L252.99 1179.64" class="st5"/>
		</g>
		<g id="shape204-751" v:mID="204" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.204</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L304.02 1163.06 L304.02 1230.66 L295.51 1230.66" class="st5"/>
		</g>
		<g id="shape217-754" v:mID="217" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.217</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L304.02 1163.06 L304.02 1311.45 L295.51 1311.45" class="st5"/>
		</g>
		<g id="shape223-757" v:mID="223" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.223</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L304.02 1163.06 L304.02 1413.64 L295.51 1413.64" class="st5"/>
		</g>
		<g id="group224-760" transform="translate(610.157,-693.921)" v:mID="224" v:groupContext="group">
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
				<v:ud v:nameU="ParLocY" v:prompt="" v:val="VT0(13.200787402):24"/>
				<v:ud v:nameU="PageLoc" v:prompt="" v:val="VT6(PNT(230.25000002031MM,249.549999987MM)):40"/>
				<v:ud v:nameU="ParLoc" v:prompt="" v:val="VT6(PNT(140.9999999908MM,335.3000000108MM)):40"/>
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
			<g id="shape224-761" v:mID="224" v:groupContext="groupContent">
				<v:textBlock v:margins="rect(0,0,0,0)" v:tabSpace="42.5197"/>
				<v:textRect cx="42.5197" cy="1141.09" width="83.27" height="13.4646"/>
				<g id="shadow224-762" v:groupContext="shadow" v:shadowOffsetX="1.44" v:shadowOffsetY="-1.44" v:shadowType="1"
				   transform="matrix(1,0,0,1,1.44,1.44)" class="st1">
					<path d="M0 1154.55 L0 1127.62 L85.04 1127.62 L85.04 1154.55 L0 1154.55 Z" class="st9"/>
					<text x="29.35" y="1133.59" class="st19" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
								x="10.92" dy="1.2em" class="st7">информационной</tspan> <tspan x="18.94" dy="1.2em" class="st7">безопасности</tspan><v:newlineChar/> </text>				</g>
				<path d="M0 1154.55 L0 1127.62 L85.04 1127.62 L85.04 1154.55 L0 1154.55 Z" class="st31"/>
				<text x="29.35" y="1133.59" class="st21" v:langID="1049"><v:paragraph v:horizAlign="1"/><v:tabList/><v:space/><v:newlineChar/>Служба <tspan
							x="10.92" dy="1.2em" class="st7">информационной</tspan> <tspan x="18.94" dy="1.2em" class="st7">безопасности</tspan><v:newlineChar/> </text>			</g>
		</g>
		<g id="shape106-771" v:mID="106" v:groupContext="shape" transform="translate(290.916,-892.701)">
			<title>Динамическая соединительная линия.106</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1156.32 L7.09 1166.95" class="st27"/>
		</g>
		<g id="shape298-774" v:mID="298" v:groupContext="shape" transform="translate(392.74,-696.756)">
			<title>Динамическая соединительная линия.298</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape299-775" v:mID="299" v:groupContext="shape" transform="translate(401.102,-926.362)">
			<title>Динамическая соединительная линия.299</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape315-776" v:mID="315" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.315</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L304.02 1163.06 L304.02 1380.61 L295.51 1380.61" class="st5"/>
		</g>
		<g id="shape316-779" v:mID="316" v:groupContext="shape" transform="translate(645.591,-652.394)">
			<title>Динамическая соединительная линия.316</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape317-780" v:mID="317" v:groupContext="shape" transform="translate(694.063,-647.717)">
			<title>Динамическая соединительная линия.317</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape318-781" v:mID="318" v:groupContext="shape" transform="translate(597.118,-611.291)">
			<title>Динамическая соединительная линия.318</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
		</g>
		<g id="shape319-782" v:mID="319" v:groupContext="shape" transform="translate(652.677,-660.898)">
			<title>Динамическая соединительная линия.319</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1155.97 L0 1163.06 L37.84 1163.06 L37.84 1167.31" class="st27"/>
		</g>
		<g id="shape114-785" v:mID="114" v:groupContext="shape" transform="translate(652.677,-660.827)">
			<title>Динамическая соединительная линия.114</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1155.9 L0 1162.98 L-33.59 1162.98 L-33.59 1167.38" class="st27"/>
		</g>
		<g id="shape125-788" v:mID="125" v:groupContext="shape" transform="translate(728.504,-725.031)">
			<title>Динамическая соединительная линия.125</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L-1.42 1154.55 L-1.42 1120.54 L7.09 1120.54" class="st27"/>
		</g>
		<g id="shape132-791" v:mID="132" v:groupContext="shape" transform="translate(726.378,-788.882)">
			<title>Динамическая соединительная линия.132</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.96 1154.55 L0.71 1154.55 L0.71 1184.39 L9.21 1184.39" class="st27"/>
		</g>
		<g id="shape107-794" v:mID="107" v:groupContext="shape" transform="translate(433.701,-903.685)">
			<title>Динамическая соединительная линия.107</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-42.52 1154.55 L-42.52 1252.35 L-34.02 1252.35" class="st27"/>
		</g>
		<g id="shape136-797" v:mID="136" v:groupContext="shape" transform="translate(433.701,-903.685)">
			<title>Динамическая соединительная линия.136</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-42.52 1154.55 L-42.52 1294.87 L-34.02 1294.87" class="st27"/>
		</g>
		<g id="shape186-800" v:mID="186" v:groupContext="shape" transform="translate(433.701,-903.685)">
			<title>Динамическая соединительная линия.186</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-42.52 1154.55 L-42.52 1430.93 L-34.02 1430.93" class="st27"/>
		</g>
		<g id="shape385-803" v:mID="385" v:groupContext="shape" transform="translate(548.504,-903.685)">
			<title>Динамическая соединительная линия.385</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L29.76 1154.55 L29.76 1396.91 L21.26 1396.91" class="st27"/>
		</g>
		<g id="shape101-806" v:mID="101" v:groupContext="shape" transform="translate(399.685,-933.449)">
			<title>Динамическая соединительная линия.101</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L0 1163.06 L91.42 1163.06 L91.42 1171.56" class="st5"/>
		</g>
		<g id="shape134-809" v:mID="134" v:groupContext="shape" transform="translate(433.701,-903.685)">
			<title>Динамическая соединительная линия.134</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-42.52 1154.55 L-42.52 1201.32 L-34.02 1201.32" class="st27"/>
		</g>
		<g id="shape119-812" v:mID="119" v:groupContext="shape" transform="translate(548.504,-903.685)">
			<title>Динамическая соединительная линия.119</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L29.76 1154.55 L29.76 1277.86 L21.26 1277.86" class="st27"/>
		</g>
		<g id="shape297-815" v:mID="297" v:groupContext="shape" transform="translate(486.496,-869.669)">
			<title>Динамическая соединительная линия.297</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 1154.55 L-11.34 1154.55 L-11.34 1184.31 L-7.09 1184.31" class="st27"/>
		</g>
		<g id="shape400-818" v:mID="400" v:groupContext="shape" transform="translate(464.35,-849.827)">
			<title>Динамическая соединительная линия.400</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M3.37 1147.46 L10.81 1147.46" class="st27"/>
		</g>
		<g id="shape193-821" v:mID="193" v:groupContext="shape" transform="translate(474.803,-763.37)">
			<title>Динамическая соединительная линия.193</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 1154.55 L-2.83 1154.55 L-2.83 1194.94 L-7.09 1194.94" class="st27"/>
		</g>
		<g id="shape401-824" v:mID="401" v:groupContext="shape" transform="translate(474.803,-763.37)">
			<title>Динамическая соединительная линия.401</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M-7.09 1154.55 L-2.83 1154.55 L-2.83 1239.59 L-7.09 1239.59" class="st27"/>
		</g>
		<g id="shape394-827" v:mID="394" v:groupContext="shape" transform="translate(77.9528,-903.685)">
			<title>Динамическая соединительная линия.394</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-31.89 1154.55 L-31.89 1292.74 L-23.24 1292.74" class="st27"/>
		</g>
		<g id="shape295-830" v:mID="295" v:groupContext="shape" transform="translate(467.717,-620.22)">
			<title>Динамическая соединительная линия.295</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1147.46 L14.17 1147.46" class="st27"/>
		</g>
		<g id="shape218-833" v:mID="218" v:groupContext="shape" transform="translate(433.701,-903.685)">
			<title>Динамическая соединительная линия.218</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-42.52 1154.55 L-42.52 1467.07 L-34.02 1467.07" class="st27"/>
		</g>
		<g id="shape200-836" v:mID="200" v:groupContext="shape" transform="translate(238.839,-903.685)">
			<title>Динамическая соединительная линия.200</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M0 1154.55 L-8.5 1154.55 L-8.5 1337.39 L25.85 1337.39" class="st27"/>
		</g>
		<g id="shape133-839" v:mID="133" v:groupContext="shape" transform="translate(252.557,-869.669)">
			<title>Динамическая соединительная линия.133</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M2.93 1154.55 L-5.58 1154.55 L-5.58 1190.69 L11.25 1190.69" class="st27"/>
		</g>
		<g id="shape201-842" v:mID="201" v:groupContext="shape" transform="translate(252.466,-869.669)">
			<title>Динамическая соединительная линия.201</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M3.02 1154.55 L-5.49 1154.55 L-5.49 1269.35 L11.16 1269.35" class="st27"/>
		</g>
		<g id="shape296-845" v:mID="296" v:groupContext="shape" transform="translate(290.551,-823.606)">
			<title>Динамическая соединительная линия.296</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1159.51 L7.09 1163.76" class="st27"/>
		</g>
		<g id="shape303-848" v:mID="303" v:groupContext="shape" transform="translate(473.386,-780.378)">
			<title>Динамическая соединительная линия.303</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L2.83 1154.55 L2.83 1182.57 L7.09 1182.57" class="st27"/>
		</g>
		<g id="shape309-851" v:mID="309" v:groupContext="shape" transform="translate(473.386,-780.378)">
			<title>Динамическая соединительная линия.309</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L2.83 1154.55 L2.83 1214.08 L7.09 1214.08" class="st27"/>
		</g>
		<g id="shape194-854" v:mID="194" v:groupContext="shape" transform="translate(605.288,-857.339)">
			<title>Динамическая соединительная линия.194</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M4.87 1154.55 L-3.63 1154.55 L-3.63 1209.83 L9.3 1209.83" class="st27"/>
		</g>
		<g id="shape383-857" v:mID="383" v:groupContext="shape" transform="translate(473.386,-780.378)">
			<title>Динамическая соединительная линия.383</title>
			<v:userDefs>
				<v:ud v:nameU="ShapeClass" v:val="VT4({D84F7AF5-C993-11d1-B2E7-006008BD347E})"/>
				<v:ud v:nameU="OwnerUniqueID" v:val="VT0(-1):26"/>
				<v:ud v:nameU="visVersion" v:val="VT0(14):26"/>
				<v:ud v:nameU="msvThemeColors" v:val="VT0(36):26"/>
				<v:ud v:nameU="msvThemeEffects" v:val="VT0(16):26"/>
			</v:userDefs>
			<path d="M7.09 1154.55 L2.83 1154.55 L2.83 1245.97 L7.09 1245.97" class="st27"/>
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