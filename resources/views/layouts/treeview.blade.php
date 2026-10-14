<html>
<head>
    <!-- include Vue 2.x -->
    <script src="https://cdn.jsdelivr.net/npm/vue@^2"></script>
    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">
    <script src="{{asset('js/tree_view.js')}}"></script>
</head>
<body>
<div id="app">
    <treeselect v-model="value" :multiple="false" :options="options" />
</div>
</body>
</html>