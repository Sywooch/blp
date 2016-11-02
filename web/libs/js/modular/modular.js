/**
 * modular.js
 * Библиотека для загрузки модулей
 * Аналогично Require.js, но проще, без лишней инкапсуляции модулей и без проблем с JQuery плагинами
 * Под модулем здесь подразумевается JS функционал и набор его зависимостей, среди которых js, css и html файлы
 * js скрипты подгружаются последовательно (не асинхронно, как в Require.js)
 * css стили подгружаются и автоматически применяются, если у файла расширение ".css"
 * html шаблоны подгружаются и передаются в коллбэк-функцию, если у файла расширение ".html" или ".tpl"
 * Коллбэк-функция в define() принимает в параметрах только html темплейты
 * После полной загрузки зависимостей всех модулей, отрабатывают коллбэк-функции модулей. Возвращаемое коллбэк-функией значение (обычно объект) сохраняется в modular.modules, после чего доступно глобально через modular.modules.имяМодуля
 * После загрузки всех модулей срабатывают коллбэк-функции из modular.ready (аналогично $( document ).ready( function(){...} ))
 */

modular = {

    modules: {},

    define: function( name, dependencies, func ){
        for( var i in modular.modules ) if( i == name ) return;
        for( var i = 0; i < dependencies.length; i ++ ){
            if( dependencies[i].indexOf( '.css' ) == dependencies[i].length - 4 ){
                if( !modular.__internal_data.func.findStyle( dependencies[i] ) ){
                    modular.__internal_data.styles.push( dependencies[i] );
                }
            }
            else if( dependencies[i].indexOf( '.html' ) == dependencies[i].length - 5 || dependencies[i].indexOf( '.tpl' ) == dependencies[i].length - 4 ){
                modular.__internal_data.templates.push( dependencies[i] );
                modular.__internal_data.counter.templates.load ++;
            }
            else if( dependencies[i].indexOf( '.js' ) == dependencies[i].length - 3 ){
                if( !modular.__internal_data.func.findScript( dependencies[i] ) ){
                    modular.__internal_data.scripts.push( dependencies[i] );
                    modular.__internal_data.counter.scripts.load ++;
                }
            }
        }
        modular.modules[ name ] = { dependencies: dependencies, func: func };
        modular.__internal_data.func.loadStyles();
        modular.__internal_data.func.loadTemplates();
        if( !modular.__internal_data.loadingScripts ){
            modular.__internal_data.func.loadScripts();
        }
        modular.__internal_data.loading = true;
    },

    ready: function( f ){
        if( !modular.__internal_data.ready ){
            modular.__internal_data.readyFuncs.push(f);
        } else {
            f();
        }
    },

    __internal_data: {

        loading: false,

        loadingScripts: false,

        checkForReadyTimeoutId: null,

        ready: false,

        readyFuncs: [],

        styles: [],

        scripts: [],

        templates: [],

        counter: { scripts: { load: 0, done: 0 }, templates: { load: 0, done: 0 } },

        loadedTemplates: {},

        func: {

            findStyle: function( href ){
                var styles = document.getElementsByTagName( 'link' );
                for( var i = 0; i < styles.length; i ++ ){
                    if( styles[i].href == href ) return true;
                }
            },

            findScript: function( src ){
                var scripts = document.getElementsByTagName( 'script' );
                for( var i = 0; i < scripts.length; i ++ ){
                    if( scripts[i].src == src ) return true;
                }
            },

            loadStyles: function(){
                while( modular.__internal_data.styles.length ){
                    var url = modular.__internal_data.styles.shift();
                    var style = document.createElement( 'link' );
                    style.rel = 'stylesheet';
                    style.href = url;
                    document.getElementsByTagName( 'head' )[0].appendChild( style );
                }
            },

            loadScripts: function(){
                if( modular.__internal_data.scripts.length ){
                    modular.__internal_data.loadingScripts = true;
                    var url = modular.__internal_data.scripts.shift();
                    var script = document.createElement( 'script' );
                    script.type = 'text/javascript';
                    script.src = url;
                    if( /Trident|MSIE 6|MSIE 7/.test( navigator.userAgent ) ){
                        script.onload = script.onreadystatechange = function(){
                            if( !this.readyState || this.readyState == 'loaded' || this.readyState == 'complete' ){
                                script.onload = script.onreadystatechange = function(){};
                                scriptLoaded();
                            }
                        }
                    } else {
                        script.addEventListener( 'load', scriptLoaded );
                    }
                    document.getElementsByTagName( 'head' )[0].appendChild( script );
                } else {
                    modular.__internal_data.loadingScripts = false;
                    modular.__internal_data.func.checkForReady();
                }
                function scriptLoaded(){
                    setTimeout( function(){
                        modular.__internal_data.counter.scripts.done ++;
                        modular.__internal_data.func.loadScripts();
                        modular.__internal_data.func.checkForReady();
                    }, 0 );
                }
            },

            loadTemplates: function(){
                while( modular.__internal_data.templates.length ){
                    var url = modular.__internal_data.templates.shift();
                    modular.__internal_data.loadedTemplates[ url ] = '';
                    var xhr = new XMLHttpRequest();
                    xhr.open( 'get', url );
                    xhr.onreadystatechange = function(){
                        if( xhr.readyState == 4 ){
                            if( xhr.status >= 200 && xhr.status < 300 || xhr.status == 304 || xhr.status == 1223 ){
                                var _tmp_container = document.createElement( 'div' );
                                _tmp_container.innerHTML = xhr.responseText;
                                modular.__internal_data.loadedTemplates[ url ] = _tmp_container.firstChild;
                                modular.__internal_data.counter.templates.done ++;
                                modular.__internal_data.func.checkForReady();
                            }
                        }
                    };
                    xhr.send( null );
                }
            },

            checkForReady: function(){
                clearTimeout( modular.__internal_data.checkForReadyTimeoutId );
                modular.__internal_data.checkForReadyTimeoutId = setTimeout( function(){
                    if( modular.__internal_data.loading ){
                        var counter = modular.__internal_data.counter;
                        if( counter.scripts.load == counter.scripts.done && counter.templates.load == counter.templates.done ){
                            modular.__internal_data.loading = false;
                            for( var moduleName in modular.modules ){
                                var module = modular.modules[ moduleName ], templates = [];
                                if( module && module.dependencies ){
                                    for( var i = 0; i < module.dependencies.length; i ++ ){
                                        var dependencyName = module.dependencies[i];
                                        for( var tplName in modular.__internal_data.loadedTemplates ){
                                            if( tplName == dependencyName ){
                                                templates.push( modular.__internal_data.loadedTemplates[ tplName ] );
                                            }
                                        }
                                    }
                                    modular.modules[ moduleName ] = module.func.apply( window, templates ) || {};
                                }
                            }
                            for( var i in modular.__internal_data.readyFuncs ){
                                modular.__internal_data.readyFuncs[i]();
                            }
                            modular.__internal_data.ready = true;
                        }
                    }
                }, 100)
            }

        }

    }

};
