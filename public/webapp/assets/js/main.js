$(document).ready(function () {

    $('#showSerieCast').click(function(){
        // alert();
        $('#seriesEpiList').hide();
        $('#seriesEpiCast').show();
        $('#showSerieEpi').removeClass('serieInBtnIn');
        $('#showSerieCast').addClass('serieInBtnIn');
    });
    $('#showSerieEpi').click(function(){
        $('#seriesEpiCast').hide();
        $('#seriesEpiList').show();
        $('#showSerieCast').removeClass('serieInBtnIn');
        $('#showSerieEpi').addClass('serieInBtnIn');
    });
    // $('.topsetshowpop').click(function(){
    //     $('.topsetshowpop').removeClass('shows');
    //     $('.topsetshowpop').addClass('hide');
    //     $('.topsethidepop').removeClass('hide');
    //     $('.topsethidepop').addClass('shows');
    //     $('.header_popup').removeClass('hide');
    //     $('.header_popup').addClass('show');
    // });
    // $('.topsethidepop').click(function(){
    //     $('.topsethidepop').removeClass('shows');
    //     $('.topsethidepop').addClass('hide');
    //     $('.topsetshowpop').removeClass('hide');
    //     $('.topsetshowpop').addClass('shows');
    //     $('.header_popup').removeClass('show');
    //     $('.header_popup').addClass('hide');
    // });
    $('.closepopsortbtn').click(function(){
        $('.sortpop').removeClass('show');
        $('.sortpop').addClass('hide');
    });

	$(document).on("click",'#homeshort,#movieshort,#liveshort,#serieshort,#settingshort,#sortshort',function(){
    
        var id = $(this).attr("id");

        if(id == 'homeshort'){
            window.location.href = 'dashboard.php';
        }else if(id == 'movieshort'){
            window.location.href = 'movies.php';
        }else if(id == 'liveshort'){
            window.location.href = 'live.php';
        }else if(id == 'serieshort'){
            window.location.href = 'series.php';
        }else if(id == 'settingshort'){
            window.location.href = 'settings.php';
        }else if(id == 'sortshort'){
            $('.topsethidepop').removeClass('shows');
            $('.topsethidepop').addClass('hide');
            $('.topsetshowpop').removeClass('hide');
            $('.topsetshowpop').addClass('shows');
            $('.header_popup').removeClass('show');
            $('.header_popup').addClass('hide');
            $('.sortpop').removeClass('hide');
            $('.sortpop').addClass('show');
        }
    });

    $('#scrollCastDivLeft').click(function(){
        $('.movieInStarCastScrolls').animate({scrollLeft: '+=300'},500);
        $('#scrollCastDivRight').removeClass('d-none');
    });
    $('#scrollCastDivRight').click(function(){
        $('.movieInStarCastScrolls').animate({scrollLeft: '-=300'},500);
    });
    $('.openPopSea').click(function(){
        $('.mainSeriePopSeason').show();
    });
    $('.closePopSea').click(function(){
        $('.mainSeriePopSeason').hide();
    });
    $('#scrollCastDivLeft').click(function(){
        $('.epgRightFullScroll').animate({scrollLeft: '-=300'},500);
        $('.epgRightBottomScroll').animate({scrollLeft: '-=300'},500);
    });
    $('#scrollCastDivRight').click(function(){
        $('#scrollCastDivLeft').show();
        $('.epgRightFullScroll').animate({scrollLeft: '+=300'},500);
        $('.epgRightBottomScroll').animate({scrollLeft: '+=300'},500);
        $('#scrollCastDivRight').removeClass('d-none');
    });
    $('#closePopUP').on('click',function(){
        $(".live_body").attr("style","width:100% !important; left:0px;");
        $('.rightCategoryDiv').hide('1000', function(){
            $(".fullLiveDiv").attr("class","col-sm-12 col-xs-12 col-md-12 col-lg-12 fullLiveDiv padding");
        });
        $(".live_header").attr("style","width:100%;");
        $('.fullLiveleftheader').show();
        $('.freeDiv').attr("class","col-sm-10 col-xs-10 col-md-10 col-lg-10 freeDiv padding");
        $(".fullLiverightheader").attr("class","col-sm-1 col-xs-1 col-md-1 col-lg-1 fullLiverightheader padding");
        $(".centerSearch").addClass('forcenterSearch');
        $(".posterDiv").attr("class","col-sm-2 col-xs-2 col-md-2 col-lg-2 posterDiv padding");
        $(".posterDiv").attr("style","width:12.5% !important;");
    });
    $('#showPopUP').click(function(){
        $('.rightCategoryDiv').show({direction: 'right'});
        $(".fullLiveDiv").attr("class","col-sm-9 col-xs-9 col-md-9 col-lg-9 fullLiveDiv padding");
        $('.fullLiveleftheader').hide();
        $(".live_header").removeAttr("style");
        $(".live_body").removeAttr("style");
        $(".centerSearch").removeClass('forcenterSearch');
        $(".centerSearch").hide();
        $('.freeDiv').attr("class","col-sm-11 col-xs-11 col-md-11 col-lg-11 freeDiv padding");
        $(".fullLiverightheader").attr("class","col-sm-1 col-xs-1 col-md-1 col-lg-1 fullLiverightheader padding");
        $(".posterDiv").attr("class","col-sm-2 col-xs-2 col-md-2 col-lg-2 posterDiv padding");
        $(".posterDiv").removeAttr("style");
    });
    $('.searchBar').click(function(){
        $('.liveInsearch').hide();
        $('.liveHead span').hide();
        $('.searchBar').attr('style','opacity:0;');
        $('.liveback').hide();
        $('.div6').hide();
        $('.div1').attr("class","col-sm-7 col-xs-7 col-md-7 col-lg-7 div1 padding");
        $('.centerSearch').show({direction: 'left'});
        $('.livecenterSearch').show({direction: 'left'});
        $('.SearchStreams').select();
        $('#removestreamseach').attr('style','caret-color: white;');  

    });
    $('.closeSearch').click(function(){
        $('.centerSearch').hide();
        $('.livecenterSearch').hide();
        $('.liveHead span').show();
        $('.searchBar').removeAttr("style");
        $('.liveInsearch').show();
        $('.liveback').show();
        $('.div6').show();
        $('.div1').attr("class","col-sm-1 col-xs-1 col-md-1 col-lg-1 div1 padding");
        $('.SearchStreams').val('');
    })

});