<?php
    include "../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
</head>
<body>
    
<?php
    include "../component/header.php";
?>

    <div id="wrap">
        <div class="product__container">
            <div class="left">
                <div class="menu">카테고리</div>
                <div class="submenu">
                    <li><a href="#" value="member">로그인</a></li>
                    <!-- <li><a href="#">날씨</a></li> -->
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
                <select name="#" id="right__select">
                    <option>전체</option>
                    <option value="1">높은 관련성순</option>
                    <option value="2">추천순</option>
                </select>
                </div>
               
                <div class="right__main column4">
                    <!-- CSS 확인 작업용 * 지우지 마시오 * -->
                    <!-- <div class="right__cont">
                        <div class="right__img"></div>
                        <div class="right__info">
                            <a href="#">구글지도 API</a>
                            <div class="right__category"><a href="#">지도</a></div>
                        </div>
                        <div class="right__btn">
                            <div class="info__btn"><a href="#">상세 보기</a></div>
                        </div>
                    </div> -->
                    </div>
                </div>    
            </div>
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

  $.ajax({
    url: "https://raw.githubusercontent.com/jaehyuk-lee-0712/api-pactory/main/apiData/api-data-20240603.json",
    method: "GET",
    dataType: "json",
    success: function(data) {
        apiData = data;
        printApiList(data)
    },
    error: function() {
      console.log("Error loading data");
    }
  });

  function printApiList(listData) {
    var rightMain = $(".right__main");
    rightMain.empty();
      for (var i = 0; i < listData.length; i++) {
        var rightCont = $('<div class="right__cont"></div>');
        var rightImg = $('<div class="right__img"></div>');
        var rightInfo = $('<div class="right__info"><a href="#">'+ listData[i].apiName +'</a></div>');
        var rightBtn = $('<div class="right__btn"><div class="info__btn"><a href="#">상세 보기</a></div></div>');

        rightCont.append(rightImg, rightInfo);
        rightCont.append(rightBtn)
        rightMain.append(rightCont);        

      }
  }

  const categoryList = $(".submenu li a");

  function changeCatogory() {
    
    for(var i = 0; i< categoryList.length; i++) {
        categoryList[i].addEventListener('click' , (e) => {
            e.preventDefault();
            categoryApiData = [];
            const value = event.target.getAttribute('value');
            for(let j = 0; j<apiData.length; j++) {
                if(apiData[j].category === value) {
                    categoryApiData.push(apiData[j]);
                }
            }
            printApiList(categoryApiData);

        })
    }
  }


    let currentPage = 1;
    let itemsPerPage = 12;

    function printApiList(listData) {
        var rightMain = $(".right__main");
        rightMain.empty();

        var totalPages = Math.ceil(listData.length / itemsPerPage);
        var startIndex = (currentPage - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;

        for (var i = 0; i < listData.length; i++) {
            var rightCont = $('<div class="right__cont"></div>');
            var rightImg = $('<div class="right__img"></div>');
            var rightInfo = $('<div class="right__info"><a href="#">' + listData[i].apiName + '</a></div>');
            var rightBtn = $('<div class="right__btn"><div class="info__btn"><a href="#">상세 보기</a></div></div>');

            rightCont.append(rightImg, rightInfo);
            rightCont.append(rightBtn)
            rightMain.append(rightCont);
        }        
    }

 
//   printApiList();
  changeCatogory();
});
</script>
</body>
</html>
