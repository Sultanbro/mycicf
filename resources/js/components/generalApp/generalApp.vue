<template>
    <main>
        <div class="container">
            <h1>Генеральная заявка</h1>
            <div class="form-group">
                <a class="products-item btn btn-primary ga-searchButton" href="javascript:void(0);" tabindex="1" >
                    <img class="ga-icon" src="/images/icons/add-file.png">Создать <span class="ml-2"><i class="fas fa-caret-down"></i></span>
                </a>
                <ul class="sub-menu">
                    <li id="express" class="ga_sub-menu_li"><a href="/createGeneralApp" class="item">Генеральная заявка</a></li>
                    <li id="full" class="ga_sub-menu_li"><a href="#" class="item">Ген.заявка (доп.условие)</a></li>
                </ul>
                <button type="button" class="btn btn-primary">Поиск</button>

            </div>
            <div class="ga-AllApp">
                <ga-ViewApp></ga-ViewApp>
            </div>
            <app-input></app-input>
        </div>
    </main>
</template>

<script>
import CreatGeneralApp from "./creat-general-app";
export default {
    name: "generalApp",
    components: {
        CreatGeneralApp,
    },

}
</script>

<style scoped lang="scss">
.ga-searchButton {
    background-color:#56bb34;
}
.item {
    color: white;
}
.ga_sub-menu_li {
    margin: 10px 5px;

}
.sub-menu {
    box-shadow: 0 0 5px 0.5px #888888;
    border-radius: 10px;
}
.ga-icon {
    height:20px;
}
.ga-AllApp {
    display: flex;
    //grid-template-columns: 20% 20% 20% 20% 20%;
    box-shadow: 0 0 5px 0.5px #888888;
    border-radius: 10px;
    justify-content: center;
}

</style>
