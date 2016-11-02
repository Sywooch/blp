        $(document).ready(function() {

            $('.likes_block > img').on('mouseover', function() {
                $(this).next().show();
            });
            $('.likes_block > img').on('mouseout', function() {
                $(this).next().hide();
            });
            $(".carousel").slick({
                autoplay: true,
                autoplaySpeed: 10000,
                pauseOnDotsHover: true
            });
            googleLoaded.done(function() {
                $('#myTable3').gvChart({
                    chartType: 'BarChart',
                    gvSettings: {
                        vAxis: {title: ''},
                        hAxis: {title: ''},
                        width: 400,
                        height: 150,
                        legend: 'none'
                    }
                });
            });
            $(".gallery-item > img").each(function() {
                $(this).parent().children('.image-helper').height((195 - $(this).prop('height')) / 2);
            });
            $('#logo-helper').height((125 - $('#logo-helper').parent().children('img').prop('height')) / 2);
            $(".gallery-item > img").on('click', function() {
                $.fancybox({
                    href: ($(this).data('original')),
                    helpers: {
                        overlay: {
                            locked: false
                        }
                    }
                });
            });
        });

