<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>

<?php
    include "../connection/connection.php";
    include "../component/header.php";
?>

    <div id="wrap">
        <div class="product__container">
            <div class="left">
                <div class="menu active">카테고리</div>
                <div class="submenu">
                    <li><a href="#" value="member">로그인</a></li>
                    <li><a href="#" value="delivery">배송</a></li>
                    <li><a href="#" value="calendar">달력</a></li>
                    <li><a href="#" value="bank">금융</a></li>
                    <li><a href="#" value="search">데이터 관리</a></li>
                    <li><a href="#" value="map">지도</a></li>
                </div>
            </div>
            <div class="right">
                <div class="right__title">
                    <a href="#" class="category">전체 보기</a>
                    <div style="position: relative; display: inline-block;" class="search__area">
                        <input type="text" id="right__select" placeholder="검색어를 입력해주세요!">
                        <ul class="searchresult-container" style="display: none;"></ul>
                    </div>
                </div>

                <div class="right__main column4">
                </div>

                <!-- 페이징 -->
                <div class="right__paging">
                    <button class="first">처음으로</button>
                    <button class="prev">이전</button>
                    <span class="page-info"></span>
                    <button class="next">다음</button>
                    <button class="last">마지막으로</button>
                </div>

            </div>
        </div>
        <div class="popup-view">
            <img src="../../assets/img/banner2.jpg" alt="#" class="apiImg">
            <h2 class="apiName">발주서 목록 조회</h2>
            <div>
                <h3>설명</h3>
                <p class="apiDesc">발주서 목록을 하루단위 페이징 형태로 조회합니다.
                발주서 목록을 하루단위 페이징 형태로 조회합니다.
                </p>
            </div>
            <a href="#" class="popup-url">사이트 바로가기</a>
            <a href="#" class="popup-close">닫기</a>  
        </div>
    </div>

<?php
    // include "../component/footer.php";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let apiData = [];
    let categoryApiData = [];
    let apiListData = [];
    let currentPage = 1;
    const itemsPerPage = 12;

    var mainSearchApi = new URLSearchParams(window.location.search).get('api'); // header.php search api text

    const callApiData = function () {
        $.ajax({
        url: "https://raw.githubusercontent.com/jaehyuk-lee-0712/api-pactory/main/apiData/api-data-20240603.json",
        method: "GET",
        dataType: "json",
            success: function(data) {
                apiData = data;
                if(mainSearchApi !== null && mainSearchApi !== "") {
                    if(apiData.length > 0 )   {
                        let mainSearchReulst = [];
                        
                        mainSearchReulst = apiData.filter(function(item) {
                            return item.apiName.toLowerCase().includes(mainSearchApi.toLowerCase());
                        })

                        printApiList(mainSearchReulst);
                        updatePaginationInfo(mainSearchReulst);

                        mainSearchApi = ""; // 검색어에 따른 결과 한 번 출력 후 초기화 진행.

                    }
                }else if(mainSearchApi === "" || mainSearchApi === null) {
                    printApiList(data);
                    updatePaginationInfo(data);
                }
            },
            error: function() {
                console.log("Error loading data");
            }
        });
    }

    const returnApiData = function () {

        let returnData = [];

        $.ajax({
        url: "https://raw.githubusercontent.com/jaehyuk-lee-0712/api-pactory/main/apiData/api-data-20240603.json",
        method: "GET",
        dataType: "json",
            success: function(data) {
                returnData = data          
            },
            error: function() {
                console.log("Error loading data");
            }
        });
        
        return returnData;
    }

    function printApiList(listData) {
        
        var rightMain = $(".right__main");
        rightMain.empty();

        var totalPages = Math.ceil(listData.length / itemsPerPage);
        var startIndex = (currentPage - 1) * itemsPerPage;
        var endIndex = Math.min(startIndex + itemsPerPage, listData.length);

        for (var i = startIndex; i < endIndex; i++) {
            var apiValue = "";
            var rightCont = $('<div class="right__cont"></div>');
            var rightImg = $('<div class="right__img"></div>');
            var rightInfo = $('<div class="right__info"><a href="#">' + listData[i].apiName + '</a></div>');

            apiValue = listData[i].apiName.replace(/\s/g, '');

            var rightBtn = $('<div value='+ apiValue +' class="right__btn popup-btn"><div class="info__btn"><a href="#">상세 보기</a></div></div>');

            rightCont.append(rightImg, rightInfo);
            rightCont.append(rightBtn);
            rightMain.append(rightCont);

            // $(".popup-btn").click(function(){
            //     console.log($(this));
            //     $(".popup-view").show()
            // });
        }

        setApiModal();
    }

    function changeCategory() {
        var categoryList = $(".submenu li a");
        for (var i = 0; i < categoryList.length; i++) {
            categoryList[i].addEventListener('click', function(e) {
                e.preventDefault();
                categoryApiData = [];
                const value = this.getAttribute('value');
                for (let j = 0; j < apiData.length; j++) {
                    if (apiData[j].category === value) {
                        categoryApiData.push(apiData[j]);
                    }
                }
                currentPage = 1; // 페이지를 첫 번째 페이지로 리셋
                printApiList(categoryApiData);
                updatePaginationInfo(categoryApiData);

                $(".submenu li a").removeClass("active");
                $(this).addClass("active"); 
                $('.menu').removeClass("active");
            });
        }
    }

    function updatePaginationInfo(list) {
        var totalPages = Math.ceil(list.length / itemsPerPage);
        $('.page-info').text(currentPage + ' / ' + totalPages);

        if(currentPage == 1) {
            $('.first').hide();
            $('.prev').hide();
        }else if(currentPage != 1) {
            $('.first').show();
            $('.prev').show();
        }

        if(currentPage == totalPages) {
            $('.next').hide();
            $('.last').hide();
        }else if(currentPage != totalPages ) {
            $('.next').show();
            $('.last').show();
        }
    }

    $('.first').click(function() {
        currentPage = 1;
        
        if(categoryApiData.length > 0 ) {
            printApiList(categoryApiData);
            updatePaginationInfo(categoryApiData);
        }else {
            printApiList(apiData);
            updatePaginationInfo(apiData);
        }

    });

    $('.prev').click(function() {
        if (currentPage > 1) {
            currentPage--;
            if(categoryApiData.length > 0) {
                printApiList(categoryApiData);
                updatePaginationInfo(categoryApiData);
            }else {
                printApiList(apiData);
                updatePaginationInfo(apiData);
            }            
        }
    });

    $('.next').click(function() {
        var totalPages = Math.ceil(apiData.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            
            if(categoryApiData.length >0) {
                printApiList(categoryApiData);
                updatePaginationInfo(categoryApiData);
            } else {
                printApiList(apiData);
                updatePaginationInfo(apiData);
            }
            
        }
    });

    $('.last').click(function() {
        var totalPages = 0;
        if(categoryApiData.length > 0 ) {
            totalPages = Math.ceil(categoryApiData.length / itemsPerPage);
            currentPage = totalPages;
            printApiList(categoryApiData);
            updatePaginationInfo(categoryApiData);
        }else {
            totalPages = Math.ceil(apiData.length / itemsPerPage);
            currentPage = totalPages;
            printApiList(apiData);
            updatePaginationInfo(apiData);
        }
    });
    

    $("#right__select").on('input' , function() {
        let searchText = $(this).val();
        let findApis = [];
        if(apiData.length > 0) { // api 리스트가 있을 때만 실행.
            if(categoryApiData.length > 0) {
                findApis = categoryApiData.filter(function(item) {
                    if(searchText === "" || searchText === null) {
                        findApis = [];
                        return "";
                    }else {
                        return item.apiName.toLowerCase().includes(searchText.toLowerCase());
                    }
                })

            }else if(categoryApiData.length == 0 && apiData.length > 0) {
                findApis = apiData.filter(function(item) {
                    if(searchText === "" || searchText === null) {
                        findApis = [];
                        return "";
                    }else {
                        return item.apiName.toLowerCase().includes(searchText.toLowerCase());
                    }
                })
            }

            if(findApis.length > 0) {
                let checkIdx = 1;
                checkIdx++ ;
                let searchResultList = '';
                findApis.forEach(function(item) {
                    searchResultList +=  '<li><a href="#" class="searchResult-item">' + item.apiName + '</a></li>';
                })

                // 자동완성 목록 표시
                $('.searchresult-container').html(searchResultList);
                $('.searchresult-container').show();
            }else {
                $('.searchresult-container').hide();
            }
        }   
    });

    
    const mainSearchResult = function () {
        if(mainSearchApi !== null || mainSearchApi !== "") {
            let mainSearchData = returnApiData();
        }else {
            console.log("에러가 발생했습니다. 관리자에게 연락바랍니다.")
        }
    }

    $(document).on('click', '.searchResult-item', function(e) {
        e.preventDefault();
        var selectedAPI = $(this).text();
        let resultApis = [];
        $('#right__select').val(selectedAPI);
        $('.searchresult-container').hide();

        if(apiData.length > 0) {
            resultApis = apiData.filter(function(item) {
                return item.apiName.toLowerCase().includes(selectedAPI.toLowerCase());
            })

            printApiList(resultApis);
            updatePaginationInfo(resultApis);

        }
        
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('.search-input, .searchresult-container').length) {
            $('.searchresult-container').hide();
        }
    });

    
    function showApiDetailData(apiName) {
        console.log(apiName)
    }

    function setApiModal() {
        $(".popup-btn").click(function(){
            const apiValue = $(this).attr('value');
            
            if(apiValue !== "" && apiValue !== null && apiValue !== undefined) {
                if(apiData.length > 0) {
                    console.log(apiValue);
                    let apiDetailInfo = [];
                    for(let i = 0; i<apiData.length; i++) {
                        if(apiData[i].apiName.replace(/\s/g, '') === apiValue) {
                            apiDetailInfo.push(apiData[i]);
                        }
                    }

                    if(apiDetailInfo.length > 0) {
                        $('.apiImg').attr('src' , apiDetailInfo[0].apiImgUrl)
                        $('.apiDesc').text(apiDetailInfo[0].apiDesc);
                        $('.apiName').text(apiDetailInfo[0].apiName);
                        $('.popup-url').attr('href' , apiDetailInfo[0].apiStie)
                    }
                }

                
            }

            $(".popup-view").show()
        });
    }

      // 마우스 오버
    $(".right__main").on("mouseover", ".right__btn", function() {
        $(this).closest(".right__cont").css("background-color", "#8e93a5");
    }, );

    $(".right__main").on("mouseout", ".right__btn", function() {
        $(this).closest(".right__cont").css("background-color", "");
    });

    $(".popup-close").click(function(){
        $(".popup-view").hide()
    })

    

    callApiData();
    changeCategory();
    // mainSearchResult();
});
</script>
</body>
</html>
