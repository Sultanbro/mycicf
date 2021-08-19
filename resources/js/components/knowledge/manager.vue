<template>
    <div id="manager">
        <div class="p-4">
            <router-link to="/learning">Go to Foo</router-link>
            <router-link to="/bar">Go to Bar</router-link>
            <a href="learning.vue" class="btn bg-danger ml-3 text-white">Назначить обучения</a>
            <a href="#" class="btn bg-primary text-white ml-3">Поступившие заявки</a>
            <a href="#" class="btn bg-success text-white ">Загрузить</a>
            <a href="#" class="btn bg-warning text-white ml-3 mt-3">Программа обучения</a>
            <a href="#" class="btn bg-info mt-3 ml-3">Анонсы обучения</a>
            <a href="#" class="btn bg-dark mt-3 ml-3">Отчеты</a>
            <a href="#" class="btn bg-white mt-3 ml-3">Отчеты</a>
            <a href="#" class="btn bg-secondary mt-3 ml-3">Отчеты</a>
        </div>

        <p>

            <h1>Админка</h1>

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3" @click="show(1)"  :class="{ educate: isEdu }">Назначить обучение</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4" @click="show(2)"  :class="{ query: isQuery }"> Поступившие заявки</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample7" aria-expanded="false" aria-controls="multiCollapseExample7" @click="show(3)">Загрузки</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample21" aria-expanded="false" aria-controls="multiCollapseExample21" @click="hide()">Отчеты</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample07" aria-expanded="false" aria-controls="multiCollapseExample07"  @click="hide()">Программа обучения</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample08" aria-expanded="false" aria-controls="multiCollapseExample08" @click="hide(4)" :class="{ custom: isCustom }">Анонсы обучения</button>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample08" aria-expanded="false" aria-controls="multiCollapseExample08" @click="hide(3)"  >КастомныЙ</button>

            <hr v-bind:style="{'background-color': color, 'height': height}">


            <button class="btn btn-danger" type="button"   @click="hide(1)"  >КастомныЙ 1</button>
            <button class="btn btn-danger" type="button"  @click="hide(2)"  >КастомныЙ 2</button>
             <button class="btn btn-danger" type="button"   @click="hide(3)"  >КастомныЙ 3</button>



<!--            <div v-if="isEdu">-->
<!--                <h2>Hello Im custom</h2>-->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias beatae deleniti esse impedit maiores mollitia officiis pariatur perspiciatis possimus ut?</p>-->
<!--            </div>-->

<!--        <div  v-bind:class="{modal__content : isQuery }">-->
<!--            <h2>Hello Im custom 2</h2>-->
<!--        </div>-->

<!--        <div   v-bind:class="{modal__content : isCustom }">-->
<!--            <h2>Hello Im custom 3 </h2>-->
<!--        </div>-->


        </p>


        <div class="d-flex">

<!--            <div class="block">-->
<!--                <div class="block__item">-->
<!--                    <div class="block__title"> <h1>Hello</h1></div>-->
<!--                    <div class="block__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, repellendus.</div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="block">-->
<!--                <div class="block__item">-->
<!--                    <div class="block__title"> <h1>Hello</h1></div>-->
<!--                    <div class="block__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, repellendus.</div>-->
<!--                </div>-->
<!--            </div>-->


<!--            <div class="block">-->
<!--                <div class="block__item">-->
<!--                    <div class="block__title"> <h1>Hello</h1></div>-->
<!--                    <div class="block__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, repellendus.</div>-->
<!--                </div>-->
<!--            </div>-->



            <!--            <div class="accordion" id="accordionExample">-->
<!--                <div class="card">-->
<!--                    <div class="card-header" id="headingOne">-->
<!--                        <h2 class="mb-0">-->
<!--                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">-->
<!--                                Назначить обучение-->
<!--                            </button>-->
<!--                        </h2>-->
<!--                    </div>-->

<!--                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">-->
<!--                        <div class="card-body">-->


<!--                        </div>-->
<!--                    </div>-->

<!--                <div class="card">-->
<!--                    <div class="card-header" id="headingTwo">-->
<!--                        <h2 class="mb-0">-->
<!--                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
<!--                                Хочу провести обучение-->
<!--                            </button>-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">-->
<!--                        <div class="card-body">-->
<!--                                            </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="card">-->
<!--                    <div class="card-header" id="headingThree">-->
<!--                        <h2 class="mb-0">-->
<!--                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
<!--                                Collapsible Group Item #3-->
<!--                            </button>-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">-->
<!--                        <div class="card-body">-->
<!--                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->



<!--                <div class="card">-->
<!--                    <div class="card-header" id="headingThree">-->
<!--                        <h2 class="mb-0">-->
<!--                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
<!--                                Collapsible Group Item #3-->
<!--                            </button>-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">-->
<!--                        <div class="card-body">-->
<!--                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->



<!--            &lt;!&ndash; Logic for hide        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="checkbox" class="custom-control-input" name="Mytoggle" id="customCheck5" @click="toggleFunc(5)">&ndash;&gt;-->
<!--&lt;!&ndash;            <label class="custom-control-label" for="customCheck5">Программа обучения</label>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--&lt;!&ndash;        <div class="custom-control custom-checkbox">&ndash;&gt;-->
<!--&lt;!&ndash;            <input type="checkbox" class="custom-control-input " id="customCheck6" @click="toggleFunc(4)">&ndash;&gt;-->
<!--&lt;!&ndash;            <label class="custom-control-label " for="customCheck6">Анонсы обучения</label>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--        </div>-->






        <div class="row justify-content-center ">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>


            <!------------------------------------------------- Назначение на обучение  -------------------------------------------->

            <div class="col" v-if="tab">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" @click="toggleFunc(1)">Close</button>

                    <div class="card card-body">
                        <div class="col-12  ">

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                <label class="custom-control-label" for="customCheck11">Департамент/филиал</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck22">
                                <label class="custom-control-label" for="customCheck22">Список сотрудников</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck33">
                                <label class="custom-control-label" for="customCheck33">Выбор даты</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck44">
                                <!--                        <Check-this-custom-checkbox></Check-this-custom-checkbox>-->
                                <!--                        x>-->
                                <label class="custom-control-label px-4" for="customCheck44">Выбор материала</label>
                            </div>




                            <h2>Назначить обучение</h2>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Филиал/Департамент</th>
                                    <th scope="col">Кому назначить (ФИО сотрудника)</th>
                                    <th scope="col">Программа или материал обучения</th>
                                    <th scope="col">Сроки до окончания</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Programmers</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo <input type="date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Devops</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Managers</td>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                <tr v-for="user in users">
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input " id=customCheck1>
                                            <label class="custom-control-label px-5" for="customCheck1">Выбрать заявку</label>

                                        </div>

                                    </td>

                                    <td>{{user.id}}</td>
                                    <td>{{user.name}}</td>
                                    <td>{{user.learn}}</td>
                                    <td>{{user.deadline}}</td>
                                    <td><input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input"></td>


                                </tr>
                                </tbody>
                                <button type="submit" class="btn btn-primary">Назначить</button>
                            </table>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-12" v-if="toggle">
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <div class="card card-body">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" @click="toggleFunc(2)">Close</button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5" @click="hidetab2">Хочу провести обучение</button>
                        <button class="btn btn-primary mt-3" type="button" data-toggle="collapse" data-target="#multiCollapseExample6" aria-expanded="false" aria-controls="multiCollapseExample6" @click="hidetab3">Хочу пройти обучение</button>




                    </div>



                        <!------------------------------------------------- Хочу провести обучение -------------------------------------------->

                        <div class="col" v-if="tab2">
                            <div class="collapse multi-collapse" id="multiCollapseExample5">


                                <div class="card card-body">
                                    <table class="table">
                                        <h2>Хочу провести обучение</h2>

                                        <thead>
                                        <tr>
                                            <th class="d-flex"><h2>Фильтр: период...</h2> <input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

                                            <th scope="col">#</th>
                                            <th scope="col">Данные отправителя  <input v-model="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"></th>
                                            <th scope="col">Тема  <input v-model="topic" type="text" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"></th>
                                            <th scope="col">Дата <input v-model="date" type="date" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com"></th>
                                            <th scope="col">Обратная связь (заполняется вручную)  <textarea v-model="description" class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea></th>
                                            <th scope="col">Описание целевая аудитория  <input v-model="audience" type="text" class="form-control" id="exampleFormControlInput4" placeholder="name@example.com"></th>
                                            <button type="submit" class="btn btn-primary">Назначить</button>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">0</th>
                                            <td>{{name}}</td>
                                            <td>{{topic}}</td>
                                            <td>{{date}}</td>
                                            <td>{{description}}</td>
                                            <td>{{audience}}</td>


                                        </tr>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark Otto</td>
                                            <td>Sales</td>
                                            <td>20.01.21</td>
                                            <td>It Was AWESOME!</td>
                                            <td>Managers</td>


                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob Thornton</td>
                                            <td>Introduction To Artificial Intelligence And Game Dev</td>
                                            <td>21.21.21</td>
                                            <td>Wow this course is so breathtaking!</td>
                                            <td>Programmers</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry the Bird</td>
                                            <td>Writer Course In The Fantasy World</td>
                                            <td>20.02.21</td>
                                            <td>I wrote a lot of nice books and learned most of these valuable skills! Thx a million!</td>
                                            <td>Writers</td>


                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>



                        <!------------------------------------------------- Хочу пройти обучение  -------------------------------------------->

                        <div class="col" v-if="tab3">
                            <div class="collapse multi-collapse" id="multiCollapseExample6" >
                                <button class="btn btn-primary" type="button" data-toggle="collapse" @click="toggleFunc(3)">Close</button>

                                <div class="card card-body">
                                    <table class="table">
                                        <h2>Хочу пройти обучение</h2>


                                        <thead>

                                        <tr>
                                            <th class="d-flex"><h2>Фильтр: период...</h2> <input type="checkbox" class="form-check-input" id="exampleCheck1"></th>

                                            <th scope="col">#</th>
                                            <th scope="col">Данные отправителя  <input v-model="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"></th>
                                            <th scope="col">Чем будет полезна  <input v-model="topic" type="text" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"></th>
                                            <th scope="col"> Доп. Комментарий<input v-model="date" type="text" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com"></th>

                                            <th scope="col"> Дата<input v-model="audience" type="date" class="form-control" id="exampleFormControlInput4" placeholder="name@example.com"></th>
                                            <th scope="col">  Обратная связь (заполняется вручную) <textarea v-model="description" class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea></th>

                                            <button type="submit" class="btn btn-primary">Назначить</button>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">0</th>
                                            <td>{{name}}</td>
                                            <td>{{topic}}</td>
                                            <td>{{date}}</td>
                                            <td>{{description}}</td>
                                            <td>{{audience}}</td>


                                        </tr>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Larry the Bird </td>
                                            <td>Sales</td>
                                            <td>20.01.21</td>
                                            <td>It Was AWESOME!</td>
                                            <td>Managers</td>


                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>LMark Otto </td>
                                            <td>Introduction To Artificial Intelligence And Game Dev</td>
                                            <td>21.21.21</td>
                                            <td>Wow this course is so breathtaking!</td>
                                            <td>Programmers</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Jacob Thornton</td>
                                            <td>Writer Course In The Fantasy World</td>
                                            <td>20.02.21</td>
                                            <td>I wrote a lot of nice books and learned most of these valuable skills! Thx a million!</td>
                                            <td>Writers</td>


                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>




            <div class="col-12">
                <div class="collapse multi-collapse" id="multiCollapseExample">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>






           <!----------------------------------- Программа обучения  --------------------------->

            <div class="col"  v-if="tab4">
                <div class="collapse multi-collapse" id="multiCollapseExample07">
                    <div class="card card-body">
                        <table class="table" >
<!--                            <caption class="tab-caption">Программа обучения</caption>-->
                            <h2>Программа обучения</h2>
                            <a href="#" class="btn bg-success text-white ">Править</a>
                            <a href="#" class="btn bg-primary text-white ">Создать программу</a>

                            <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Программа</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Содержание</th>
                                <th scope="col">Дата добавления</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>20.03.21</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>





            <!------------------------------------------------- Анонсы обучения  -------------------------------------------->

            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample08" v-if="tab5">
                    <div class="card card-body">
                        <table class="table table-dark">
                            <h2>Анонсы обучения </h2>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тема обучения   <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Cпикер  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Описание   <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea></th>
                                <th scope="col">Дата и время <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Формат обучения <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Место обучения очно <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Место обучения онлайн <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>
                                <th scope="col">Тип обучения <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"></th>



                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
                            <button type="submit" class="btn btn-primary mt-3">Изменить</button>

                        </table>

                    </div>
                </div>
            </div>



            <!------------------------------------------------- Загрузки  -------------------------------------------->


            <div class="col-12" v-if="tab6">

                <div class="collapse multi-collapse" id="multiCollapseExample7">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck0">
                        <label class="custom-control-label" for="customCheck0">Учебный материал (презентация + тест , документ, вебинар)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Книга</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3"> Видео</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck4">
<!--                        <Check-this-custom-checkbox></Check-this-custom-checkbox>-->
<!--                        x>-->
                        <label class="custom-control-label" for="customCheck4">Тест</label>
                    </div>


                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label h-100" for="customFile">Choose file</label>
                    </div>
                    <a href="" class="btn text-white bg-dark mt-3 ml-0 mb-1" @click="edit">Редактировать</a>
<!--                    <input  class="custom-file-input mb-2" type="file" >Загрузки</input>-->
                    <div class="card card-body">
                        <table class="mt-4 table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Файл</th>
                                <th scope="col">Материал</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Дата загрузки</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>21.12.21</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>20.04.21</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>07.02.21</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                 </div>

            </div>



            <!------------------------------------------------- Отчеты -------------------------------------------->
            <div class="col" v-if="tab7">


                <div class="collapse multi-collapse" id="multiCollapseExample21">


                    <div class="col  left-check">
                        <h3>Создать отчет по:</h3>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck01">
                            <label class="custom-control-label" for="customCheck01">По всем тестированиям</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input " id="customCheck-02">
                            <label class="custom-control-label" for="customCheck-02">По результатам тестирования</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"  id="customCheck03">
                            <label class="custom-control-label" for="customCheck03">Заявки на обучение</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input " id="customCheck04">
                            <!--                        <Check-this-custom-checkbox></Check-this-custom-checkbox>-->
                            <!--                        x>-->
                            <label class="custom-control-label" for="customCheck04">Анкеты обратной связи</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input " id="customCheck05">
                            <label class="custom-control-label" for="customCheck05">По загрузкам</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input "  id="customCheck06">
                            <label class="custom-control-label " for="customCheck06">Популярные учебные материалы</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input "  id="customCheck07">
                            <label class="custom-control-label " for="customCheck07">Популярные учебные материалы</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input "  id="customCheck08">
                            <label class="custom-control-label " for="customCheck08">Популярные учебные материалы</label>
                        </div>




                    </div>
                    <div class="card card-body">
                        <table class="table table-dark mt-3">
                            <h2>Отчеты</h2>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Департамент</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Текст</th>
                                <th scope="col">дата</th>
                                <th scope="col">результат</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>





            <!--                    <div class="col">-->
<!--                        <div class="collapse multi-collapse" id="multiCollapseExampleA1">-->
<!--                            <div class="card card-body">-->
<!--                                <table class="table table-striped table-dark">-->
<!--                                    <thead>-->
<!--                                    <tr>-->
<!--                                        <th scope="col">#</th>-->
<!--                                        <th scope="col">First</th>-->
<!--                                        <th scope="col">Last</th>-->
<!--                                        <th scope="col">Handle</th>-->
<!--                                    </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                    <tr>-->
<!--                                        <th scope="row">1</th>-->
<!--                                        <td><input  type="text"></td>-->
<!--                                        <td>Otto</td>-->
<!--                                        <td>@mdo</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <th scope="row">2</th>-->
<!--                                        <td>Jacob</td>-->
<!--                                        <td>Thornton</td>-->
<!--                                        <td>@fat</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <th scope="row">3</th>-->
<!--                                        <td>Larry</td>-->
<!--                                        <td>the Bird</td>-->
<!--                                        <td>@twitter</td>-->
<!--                                    </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->









                </div>
        </div>


</template>

<!--<script src="/path/to/vue.js"></script>-->
<!--<script src="/path/to/vue-router.js"></script>-->
<script>


// let i = 0
// export  let form =
//     `<div className="input-group">
//     <div className="input-group-prepend">
//         <div className="input-group-text">
//             <input type="radio" aria-label="Radio button for following text input">
//         </div>
//     </div>
//     <input type="text" className="form-control" aria-label="Text input with radio button">
// </div>`






// Vue.use(VueRouter)
import learning from './learning.vue'

// const routes = [
//     { path: '/learning', component: learning },
//     { path: '/bar', component: Bar }
// ]
// const router = new VueRouter({
//     routes // short for `routes: routes`
// })


export default {

    // setup() {
    //     onMounted(() => {
    //         for(i of users) {
    //             i++
    //             data.customCheck1 = `customCheck${i}`
    //         }
    //
    //     })
    //
    //
    //
    //
    // },

name: "manager",
// components: {
//     name: 'learning'
// }


    data() {

    return {
        height: '20px',
        color: '#0f6674',
        isQuery: false,
        isEdu: false,
        isCustom: false,
        toggle: true,
        tab: true,
        tab2: true,
        tab3: true,
        tab4: false,
        tab5: false,
        tab6: false,
        tab7: false,

        // Form info for education
        name: '',
        topic: '',
        date: '',
        description: '',
        audience: '',

        // User
        users: [

            {id: 1, name: 'Mike', learn: 'Eng', deadline: '2021' },
            {id: 2,  name: 'David', learn: 'Eng', deadline: '2021' },
            {id: 3, name: 'FRANK', learn: 'RUS', deadline: '2021' }

            ],


      // basket.addEventListener('click', () => basket.addAttribute('style', 'color: red'))

    }


    },


    methods: {

        // toggleQuery() {
        //     this.toggle = !this.toggle
        //     this.tab =  false
        //     this.tab4 = false
        //     this.tab5 = false
        //     this.tab6 = false
        //     this.tab7 = false
        //
        // },
        //
        hide(id) {




            this.isEdu = !this.isEdu







        },
        //
        //
        // hidetab2() {
        //     this.tab = false
        //     this.tab2 = !this.tab2
        //     this.tab3 = false
        //     this.tab4 = false
        //     this.tab5 = false
        //     this.tab6 = false
        //     this.tab7 = false
        //     this.toggle = true
        // },
        //
        //
        // hidetab3() {
        //     this.tab = false
        //     this.tab2 = false
        //     this.tab3 = !this.tab3
        //     this.tab4 = false
        //     this.tab5 = false
        //     this.tab6 = false
        //     this.tab7 = false
        //     this.toggle = true
        // },

        // $('[data-target="#multiCollapseExample3"]').collapse('toggle')
        //    switch (val) {
        //        case 'tab':
        //
        //            this.tab = !this.tab
        //            this.tab2 = false
        //            this.tab3 = false
        //            this.tab4 = false
        //            this.tab5 = false
        //            this.tab6 = false
        //            this.tab7 = false
        //
        //
        //        case 'tab2':
        //            this.tab = false
        //            this.tab2 = !this.tab2
        //            this.tab3 = false
        //            this.tab4 = false
        //            this.tab5 = false
        //            this.tab6 = false
        //            this.tab7 = false
        //
        //
        //
        //
        //        case 'tab3':
        //            this.tab = false
        //            this.tab2 = false
        //            this.tab3 = !this.tab3
        //            this.tab4 = false
        //            this.tab5 = false
        //            this.tab6 = false
        //            this.tab7 = false

        // case 'tab1':
        //     this.tab1 = !this.tab1
        // case 'tab2':
        //     this.tab2 = !this.tab2
        // case 'tab3':
        //     this.tab3 = true
        // case 'tab4':
        //     this.tab4 = true
        // case 'tab5':
        //     this.tab5 = true
        // case 'tab6':
        //     this.tab6 = true
        // case 'tab7':
        //     this.tab7 = true


        //   if(i != val) {
        //       this.state[i] = false
        //   }
        //
        //   for(let i in this.state) {
        // }


        show(id) {


            if (id === 1) {
                this.tab = true



            } else if (id === 2) {


                this.toggle = true


            }  else if (id === 3) {

                this.tab2 = true


            }

        },


        // Func for hiding an element: unnecessary now but can be needed later...
        toggleFunc(id) {
            if (id === 1) {
                this.tab = true
                this.tab2 = false
                this.tab3 = false
                this.tab4 = false
                this.tab5 = false
                this.tab6 = false
                this.tab7 = false
                this.toggle = false


            } else if (id === 2) {
                this.tab = false
                this.tab2 = false
                this.tab3 = false
                this.tab4 = false
                this.tab5 = false
                this.tab6 = false
                this.tab7 = false
                this.toggle = true


            }  else if (id === 3) {
                this.tab = false
                this.tab2 = false
                this.tab3 = false
                this.tab4 =
                this.tab5 = false
                this.tab6 = false
                this.tab7 = false
                this.toggle = false

            }  else if (id === 4) {
                this.tab = false
                this.tab2 = false
                this.tab3 = false
                this.tab4 = false
                this.tab5 = true
                this.tab6 = false
                this.tab7 = false
                this.toggle = false
            }


        }

    //
    }
}














</script>

<style scoped>
/*.educate, .query, custom {*/
/*    display: none;*/
/*}*/

/*.hide {*/
/*    visibility: hidden;*/
/*}*/

/*.show {*/
/*    visibility: visible;*/
/*}*/


/* Стили спойлера */

.modal {
    height: 0;
}

.modal__content {
    height: 100px;
}

.example
#multiCollapseExample7 label {

    padding-left: 20px;

}

.left-check * {
    margin-right: 200px;
}
.left-check label {

    padding-left: 100px;
    display: block;
}


button.btn.btn-primary:hover {
    background: #17a2b8;
    transition: all .1s ease-in;
}


table {
    margin-top: 20px;
}

.btn {
    margin-left: 20px;
}


/*  spoiler     */

/*.block__text {*/
/*    display: none;*/
/*}*/
</style>
