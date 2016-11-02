<?php $this->title = "Филиалы страховых компаний в регионах России - адреса, телефоны, режим работы." ?>
<div hidden id = "init-fields">
    <div hidden id ="regions"><?= $regions ?></div>
    <div hidden id ="cities"><?= $cities ?></div>
    <div hidden id ="companies"><?= $companies ?></div>
    <input type ="hidden" id ="company_id" value = "<?= $company_id ?>" />
    <input type ="hidden" id ="ax" value = "<?= isset($branch['ax']) ? $branch['ax'] : '' ?>" />
    <input type ="hidden" id ="ay" value = "<?= isset($branch['ay']) ? $branch['ay'] : '' ?>" />
    <input type ="hidden" id ="branch_id" value = "<?= isset($branch['id']) ? $branch['id'] : '' ?>" />
    <input type ="button" class ="company-filter" />
    <input type ="button" class ="one-point" />
</div>

<div id ="map-wrapper">
    <div id ='company-search' class="shadow">
        <form>
            <div>
                <input type ='text'  id ='region'   name ='region' placeholder="Выбрать регион" class ='big-autoselect'  autocomplete="on"   />
                <div class ='arrow'>&#8744;</div>
                <label class ="error region"></label>
            </div>
            <div>
                <input type ='text'     id ='city' name ='city'   placeholder="Выбрать город"  class ='big-autoselect' required />
                <div class ='arrow'>&#8744;</div>
                <label class ="error city"></label>
            </div>
            <div>
                <input type ='text'   id ='company'  name ='company'placeholder="Выберите компанию" class ='little-autoselect' required />
                <div class ='arrow cross-company'>+</div>
                <label class ="error company_id"></label>

                <!--<label class ='company-label'>
                    <span>Компания Z</span><label class ='del-from-search'>X</label>
                    <input type ='hidden' name ='company_arr[]' class = 'hidden-company-name' />
                </label>-->


            </div>
            <div>
                <input type ='button' name ='show'  class ='search-button'    value ='Показать' />
                <input type ='button' name ='add'   class ='clean-filter' value ='Сбросить'/>
                <?php if ($is_admin) { ?>

                    <input type ='button' name ='add'   class ='add-popup-button' value ='+'/>
                <?php } ?>
                <input type ='hidden' name ='_csrf' class = 'toPost'          value ='<?= Yii::$app->request->getCsrfToken() ?>' />
            </div>
        </form>
    </div>
    <div id ='company-add' >
        <h2 style ='color:green; margin: 30px;'>Точка успешно добавлена на карту!</h2>
        <form>
            <div>
                <input type ='text'  id ='regionadd'   name ='region-add' placeholder="Выбрать регион" class ='big-autoselect'  />
                <div class ='arrow'>&#8744;</div>
                <label class ="error region"></label>
            </div>
            <div>
                <input type ='text'     id ='cityadd' name ='city-add'   placeholder="Выбрать город"  class ='big-autoselect' />
                <div class ='arrow'>&#8744;</div>
                <label class ="error city"></label>
            </div>
            <div>
                <input type ='text'     name ='address-add'   placeholder="Адрес"  class ='big-autoselect'  />
                <label class ="error address"></label>
                <label class ="error coordinates"></label>
            </div>
            <div>
                <input type ='text' name ='ax' value =''  placeholder="Коорд. ax" class = 'coordsadd'/>
                <input type ='button' value ='Координаты' class = 'refresh-coords' />
            </div>
            <div>
                <input type ='text' name ='ay' value ='' class = 'coordsadd' placeholder="Kooрд. ay"/>

                <input type ='button' value ='На карте' class ='show-on-map'/>
            </div>
            <div>
                <input type ='text'   id ='companyadd'  name ='company-add' placeholder="Выберите компанию" class ='little-autoselect' />
                <div class ='arrow'>&#8744;</div>
                <label class ="error company_id"></label>
            </div>

            <div>
                <input type ='text'   id ='branch'  name ='branch' placeholder="Филиал"  />
                <label class ="error branch"></label>
            </div>
            <div>
                <input type ='text'   id ='functions'  name ='functions' placeholder="Функции"  />
                <label class ="error functions"></label>
            </div>
            <div>
                <input type ='text'   id ='branch'  name ='work_hours' placeholder="Часы работы"  />
                <label class ="error work_hours"></label>
            </div>
            <div>
                <input type ='text'   id ='branch'  name ='phones' placeholder="Телефоны"  />
                <label class ="error phones"></label>
            </div>
            <div>
                <input type ='text'   id ='branch'  name ='email' placeholder="Электронная почта"  />
                <label class ="error email"></label>
            </div>
            <div>
                <input type="hidden" name="branch-id" value = '' />
                <input type ='button'   name ='hide-this'   value ='Спрятать' class ='hide-this' style ='left: -120px' />
                <input type ='button'   name ='add-branch'   value ='Сохранить' class ='add-branch' />
                <input type ='hidden'   class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
            </div>
        </form>


    </div>
    <div id ='company-edit' >
        <h2 style ='color:green; margin: 30px;'>Филиал отредактирован!</h2>
        <form>
                <div>
                    <input type ='text'  id ='regionedit'   name ='region-add' placeholder="Выбрать регион" class ='big-autoselect'  />
                    <div class ='arrow'>&#8744;</div>
                    <label class ="error region"></label>
                </div>
                <div>
                    <input type ='text'     id ='cityedit' name ='city-add'   placeholder="Выбрать город"  class ='big-autoselect' />
                    <div class ='arrow'>&#8744;</div>
                    <label class ="error city"></label>
                </div>
                <div>
                    <input type ='text'     name ='address-add'   placeholder="Адрес"  class ='big-autoselect'  />
                    <label class ="error address"></label>
                    <label class ="error coordinates"></label>
                </div>
                <div>
                    <input type ='text' name ='ax' value =''  placeholder="Коорд. ax" class = 'coordsadd'/>
                    <input type ='button' value ='Координаты' class = 'refresh-coords' />
                </div>
                <div>
                    <input type ='text' name ='ay' value ='' class = 'coordsadd' placeholder="Kooрд. ay"/>

                    <input type ='button' value ='На карте' class ='show-on-map'/>
                </div>
                <div>
                    <input type ='text'   id ='companyedit'   name ='company-add' placeholder="Выберите компанию" class ='little-autoselect' />
                    <div class ='arrow'>&#8744;</div>
                    <label class ="error company_id"></label>
                </div>

                <div>
                    <input type ='text'   id ='branch'  name ='branch' placeholder="Филиал"  />
                    <label class ="error branch"></label>
                </div>
                <div>
                    <input type ='text'   id ='functions'  name ='functions' placeholder="Функции"  />
                    <label class ="error functions"></label>
                </div>
                <div>
                    <input type ='text'   id ='branch'  name ='work_hours' placeholder="Часы работы"  />
                    <label class ="error work_hours"></label>
                </div>
                <div>
                    <input type ='text'   id ='branch'  name ='phones' placeholder="Телефоны"  />
                    <label class ="error phones"></label>
                </div>
                <div>
                    <input type ='text'   id ='branch'  name ='email' placeholder="Электронная почта"  />
                    <label class ="error email"></label>
                </div>
                <div>
                    <input type="checkbox" id="payt4" name = 'active' value ='1' /><label for="payt4"></label>
                    <input type="button" name="delete" value="Удалить" class="delete" />
                </div>
                <div>
                    <input type="hidden" name="branch-id" value = '' />
                    <input type ='button'   name ='hide-this'   value ='Спрятать' class ='hide-this' />
                    <input type ='button'   name ='add-branch'   value ='Сохранить' class ='add-branch' />
                    <input type ='hidden'   class = 'toPost' name ='_csrf' value ='<?= Yii::$app->request->getCsrfToken() ?>' />
                </div>
            </form>
    </div>
    <div class ='company-wrap'>
        <div id ='company-baloon'>
            <div class="company-baloon_image mobile-hidden">
                <img src="" class = 'company-img'>
            </div>

            <div>
                <span class = 'non-active'>Филиал закрыт</span>
            </div>
            <a class ='company-name company-baloon_this' href='' target="_blank"></a>
            <a class ='company-branch company-baloon_this company-baloon_this_filial' href ='' target="_blank"></a>
            <a class ='des-label company-functions tag_one'></a>
            <div class="">

            </div>
                <span class ='des-label'>Адрес:</span>
                <span class ='company-address des-label des-label_option'></span>


                <span class ='des-label'>Часы работы:</span>
                <span class ='company-works-hours des-label des-label_option'></span>


                <span class ='des-label'>Телефон:</span>
                <span class ='company-phones des-label des-label_option'></span>


                <span class ='des-label'>Email:</span>
                <span class ='company-email des-label des-label_option des-label_option_last'></span>
                <input type = "hidden" class ="branch-branch" value ="" />

            <a href ='' class ='review-link leave_feed_from_map mobile-hidden' target="_blank" >Оставить отзыв</a>

                <?php if ($is_admin) { ?>
                <div>
                    <form class ='edit-admin-fields'>
                        <input type="hidden" value="" class="" name="">
                            <input type="hidden" value="" class="company-name" name="">
                            <input type="hidden" value="" class="company-branch" name="">
                            <input type="hidden" value="" class="company-functions" name="">
                            <input type="hidden" value="" class="company-region" name="">
                            <input type="hidden" value="" class="company-city" name="">
                            <input type="hidden" value="" class="company-email" name="">
                            <input type="hidden" value="" class="company-true-address" name="">
                            <input type="hidden" value="" class="company-work-hours" name="">
                            <input type="hidden" value="" class="company-phones" name="">
                            <input type="hidden" value="" class="branch-id" name="">
                            <input type="hidden" value="" class="company-ax" name="">
                            <input type="hidden" value="" class="company-ay" name="">
                            <input type="hidden" value="" class="company-id" name="">
                            <input type="hidden" value="" class="active" name="">
                    <input type ='button' name ='add'   class ='edit-branch-button' value ='Редактировать'/>
                    </form>
                    </div>
                <?php } ?>

        </div>
    </div>
    <div id="YMapsID" style="width: 100%; height: 100%; "></div>
</div>
<script src="//api-maps.yandex.ru/2.1/?package.full&lang=ru-RU" type="text/javascript"></script>



<script type="text/javascript">
    var regions = <?= $regions ?>;
    var cities = <?= $cities ?>;
    var companies = <?= $companies ?>;
</script>
