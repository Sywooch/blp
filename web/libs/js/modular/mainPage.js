/**
 * Модуль: mainPage
 * стартовый загрузчик модулей на главную страницу
 */
modular.define('mainPage',

		[
                    '/js/src/jquery.rateit.min.js',
                        '/js/src/rateit.css'
		],


		function(  ){



			/**************** определение блоков на странице, подключение соответствующего функционала ****************/


			/* звездный плагин */
			if ($('#head_top_insurance').length) {
				 $('.rateit').rateit();
                                 tooltipShow();
			}
                        
                        
                        /**********/
                        function tooltipShow(){
                            $('#top_insurance_count_reviews div').on('mouseover', function(){
                                     $(this).next().show();
                                 });
                                 $('#top_insurance_count_reviews div').on('mouseout', function(){
                                     $(this).next().hide();
                                 });
                        }
                                
                }





);