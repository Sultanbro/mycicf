<template>
    <div id="manager">
<!--        <div class="p-4">-->
<!--            <router-link to="/learning">Go to Foo</router-link>-->
<!--            <router-link to="/bar">Go to Bar</router-link>-->
<!--            <a href="learning.vue" class="btn bg-danger ml-3 text-white">Назначить обучения</a>-->
<!--            <a href="#" class="btn bg-primary text-white ml-3">Поступившие заявки</a>-->
<!--            <a href="#" class="btn bg-success text-white ">Загрузить</a>-->
<!--            <a href="#" class="btn bg-warning text-white ml-3 mt-3">Программа обучения</a>-->
<!--            <a href="#" class="btn bg-info mt-3 ml-3">Анонсы обучения</a>-->
<!--            <a href="#" class="btn bg-dark mt-3 ml-3">Отчеты</a>-->
<!--            <a href="#" class="btn bg-white mt-3 ml-3">Отчеты</a>-->
<!--            <a href="#" class="btn bg-secondary mt-3 ml-3">Отчеты</a>-->
<!--        </div>-->

<div class="container">
            <h1>Админка</h1>


            <hr v-bind:style="{'background-color': color, 'height': height}">











<!--





<!--            <div class="custom-control custom-checkbox">-->
<!--            <input type="checkbox" class="custom-control-input" name="Mytoggle" id="customCheck5" @click="toggleFunc(5)">-->
<!--            <label class="custom-control-label" for="customCheck5">Программа обучения</label>-->
<!--        </div>-->
<!--        <div class="custom-control custom-checkbox">-->
<!--            <input type="checkbox" class="custom-control-input " id="customCheck6" @click="toggleFunc(4)">-->
<!--            <label class="custom-control-label " for="customCheck6">Анонсы обучения</label>-->
<!--        </div>-->
<!--        </div>-->

            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Назначение обучения</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Хочу провести обучение</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Хочу пройти обучение</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Загрузки</button>
                    <button class="nav-link" id="v-pills-announcements-tab" data-bs-toggle="pill" data-bs-target="#v-pills-announcements" type="button" role="tab" aria-controls="v-pills-announcements" aria-selected="false">Анонсы обучения</button>
                    <button class="nav-link" id="v-pills-res-tab" data-bs-toggle="pill" data-bs-target="#v-pills-res" type="button" role="tab" aria-controls="v-pills-res" aria-selected="false">Отчеты</button>
                    <button class="nav-link" id="v-pills-download-tab" data-bs-toggle="pill" data-bs-target="#v-pills-download" type="button" role="tab" aria-controls="v-pills-download" aria-selected="false">Программа обучения</button>

                </div>


                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="container">
                            <h2 class="text-align-center">Назначить обучение</h2>
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

                            <label class="custom-control-label" for="customCheck44">Выбор материала</label>
                        </div>
                            <input type="date" class="form-control" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">

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
                                <td>@mdo</td>
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
                                        <label class="custom-control-label" for="customCheck1">Выбрать заявку</label>

                                    </div>

                                </td>

                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.learn}}</td>
                                <td>{{user.deadline}}</td>



                            </tr>
                            </tbody>
                            <button type="submit" class="btn btn-primary">Назначить</button>
                        </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                    <div class="container">
                        <!------------------------------------------------- Хочу провести обучение -------------------------------------------->

                                        <h2 class="text-align-center"> Хочу провести обучение</h2>
                                        <div class="d-flex justify-content-end align-items-end mt-5"><button type="submit" class="btn btn-primary bg-primary">Назначить</button></div>

                                        <div class=d-flex >

                                            <div class=order-0> <h2 class=mt-1 >Фильтр: период...</h2> </div>
                                            <div  class=order-1> <input type="checkbox" class=form-check-input  id=exampleCheck33></div>


                                        </div>


                                        <form action="" method="post">
                                      <div><label>Данные отправителя<input v-model="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Имя"></label></div>
                                      <div><label>Тема  <input v-model="topic" type="text" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com"></label></div>
                                      <div><label>Дата<input v-model="date" type="date" class="form-control" id="exampleFormControlInput3" placeholder="day month year"></label></div>
                                      <div><label>Обратная связь (заполняется вручную) <textarea v-model="description" class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea></label></div>
                                  </form>


                                    <table class="table">

                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Данные отправителя  </th>
                                            <th scope="col">Тема</th>
                                            <th scope="col">Дата </th>
                                            <th scope="col">Обратная связь (заполняется вручную) </th>
                                            <th scope="col">Описание целевая аудитория</th>
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


                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                                <div class="container">


                        <!------------------------------------------------- Хочу пройти обучение  -------------------------------------------->


                                    <h2 class="text-align-center">Хочу пройти обучение</h2>
                                    <form action="" method="post">
                                          <input v-model="sname" type="text" class="form-control" id="exampleFormControlInput111" placeholder="Данные отправителя">
                                          <input v-model="value" type="text" class="form-control" id="exampleFormControlInput222" placeholder="Чем будет полезна">
                                          <input v-model="date" type="text" class="form-control" id="exampleFormControlInput333" placeholder="доп. Комментарий">
                                          <input v-model="audience" type="date" class="form-control" id="exampleFormControlInput444" placeholder="name@example.com">
                                          <textarea v-model="description" class="form-control " id="exampleFormControlTextarea123" rows="3">Обратная связь (заполняется вручную)</textarea>
                                    </form>

                                    <div class=d-flex >

                                        <div class=order-0> <h2 class=mt-1 >Фильтр: период...</h2> </div>
                                        <div  class=order-1> <input type="checkbox" class=form-check-input  id=exampleChec32></div>

                                    </div>

                                    <div class="d-flex justify-content-end">
                                         <button type="submit" class="btn btn-primary">Назначить</button>
                                    </div>

                                    <table class="table">



                                        <thead>

                                         <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Данные отправителя  </th>
                                            <th scope="col">Чем будет полезна  </th>
                                            <th scope="col"> Доп. Комментарий</th>

                                            <th scope="col"> Дата</th>
                                            <th scope="col">  Обратная связь (заполняется вручную) </th>



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


                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                        <div class="container">

                        <!------------------------------------------------- Загрузки  -------------------------------------------->



                            <h2 class="text-align-center">Загрузки</h2>

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


                    <div class="tab-pane fade" id="v-pills-res" role="tabpanel" aria-labelledby="v-pills-res-tab">

                         <div class="container">
                        <!------------------------------------------------- Отчеты -------------------------------------------->
                             <h2 class="text-align-center">Отчеты</h2>

                        <div class="col  left-check">
                            <h3>Создать отчет по:</h3>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck01">
                                <label class="custom-control-label" for="customCheck01">По всем тестированиям</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck-02">
                                <label class="custom-control-label" for="customCheck-02">По результатам тестирования</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  id="customCheck03">
                                <label class="custom-control-label" for="customCheck03">Заявки на обучение</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck04">

                                <label class="custom-control-label" for="customCheck04">Анкеты обратной связи</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck05">
                                <label class="custom-control-label" for="customCheck05">По загрузкам</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  id="customCheck06">
                                <label class="custom-control-label " for="customCheck06">Популярные учебные материалы</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  id="customCheck07">
                                <label class="custom-control-label " for="customCheck07">Популярные учебные материалы</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"  id="customCheck08">
                                <label class="custom-control-label " for="customCheck08">Популярные учебные материалы</label>
                            </div>




                        </div>

                        <table class="table table-dark mt-3">

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


                    <div class="tab-pane fade" id="v-pills-announcements" role="tabpanel" aria-labelledby="v-pills-announcements-tab">

                        <div class="container">
                        <!------------------------------------------------- Анонсы обучения  -------------------------------------------->

                            <h2 class="mt-3">Анонсы обучения </h2>
                        <form action="">
                         <div><label>Тема обучения</label> <input type="text" class="form-control" id="exampleInputEmail132" aria-describedby="emailHelp" placeholder="Тема"></div>
                         <div><label>Cпикер</label> <input type="text" class="form-control" id="exampleInputEmail113" aria-describedby="emailHelp" placeholder="Спикер"></div>
                         <div><label>Описание</label> <textarea class="form-control" id="exampleFormControlTextarea22" rows="3"></textarea></div>
                         <div><label>Дата и время </label>  <input type="date" class="form-control" id="exampleInputEmail101" aria-describedby="emailHelp" placeholder="Описание"></div>
                         <div><label>Формат обучения </label>  <input type="text" class="form-control" id="exampleInputEmail134" aria-describedby="emailHelp" placeholder="Формат"></div>
                         <div><label>Место обучения очно </label><input type="text" class="form-control" id="exampleInputEmail124" aria-describedby="emailHelp" placeholder="Место где очное обучение"></div>
                         <div><label>Место обучения онлайн</label>   <input type="text" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp" placeholder="Место где онлайн обучение"></div>
                         <div><label>Тип обучения</label>    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Тип"></div>
                        </form>



                            <div class="d-flex mt-3">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        <table class="table table-dark">


                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Тема обучения   </th>
                                <th scope="col">Cпикер  </th>
                                <th scope="col">Описание   </th>
                                <th scope="col">Дата и время </th>
                                <th scope="col">Формат обучения </th>
                                <th scope="col">Место обучения очно </th>
                                <th scope="col">Место обучения онлайн </th>
                                <th scope="col">Тип обучения </th>


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


                        </table>

                              </div>

                    </div>

                    <div class="tab-pane fade" id="v-pills-download" role="tabpanel" aria-labelledby="v-pills-res-tab">

                        <div class="container ">
                            <h2 class="text-align-center">Программа обучения</h2>
                            <table class="table table-primary">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Содержание</th>
                                    <th scope="col">Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
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
                                    <td>Larry the Bird</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>

                                </tr>
                                </tbody>
                            </table>

                        </div>


                    </div>

                </div>

            </div>
</div>


    </div>





<!--            &lt;!&ndash;-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45; Назначение на обучение  &#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->







<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input" id="customCheck11">-->
<!--                                <label class="custom-control-label" for="customCheck11">Департамент/филиал</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input" id="customCheck22">-->
<!--                                <label class="custom-control-label" for="customCheck22">Список сотрудников</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input" id="customCheck33">-->
<!--                                <label class="custom-control-label" for="customCheck33">Выбор даты</label>-->
<!--                            </div>-->
<!--                            <div class="custom-control custom-checkbox">-->
<!--                                <input type="checkbox" class="custom-control-input" id="customCheck44">-->
<!--                                &lt;!&ndash;                        <Check-this-custom-checkbox></Check-this-custom-checkbox>&ndash;&gt;-->
<!--                                &lt;!&ndash;                        x>&ndash;&gt;-->
<!--                                <label class="custom-control-label px-4" for="customCheck44">Выбор материала</label>-->
<!--                            </div>-->



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


</template>

<script>

export default {

name: "manager",

    data() {

    return {


        // Form info for a teacher
        name: '',
        topic: '',
        date: '',
        description: '',
        audience: '',


        // Form info for a student

        sname: '',
        value: '',
        comment: '',
        sdate: '',

        // User
        users: [

            {id: 1, name: 'Mike', learn: 'Eng', deadline: '2021' },
            {id: 2,  name: 'David', learn: 'Eng', deadline: '2021' },
            {id: 3, name: 'FRANK', learn: 'RUS', deadline: '2021' }

            ],
    }


    },

}
</script>

<style scoped>

/* Main block style */

#manager {
    min-width: 1320px;
}

.nav-link {
    width: 200px;
}

/* Forms styles  */

#multiCollapseExample7 label {
    padding-left: 20px;
}

.left-check * {
    margin-right: 200px;
}



input, textarea {
    margin-top: 10px;
}

.custom-file {
    margin-top: 20px;
}



label {
    margin-top: 10px;
    padding-left: 30px;
}


/* Btn styles */

button.btn.btn-primary:hover {
    background: #17a2b8;
    transition: all .1s ease-in;
}

.btn {
    margin-left: 20px;
}


table {
    margin-top: 10px;
}


</style>
