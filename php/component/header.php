<header id="header">
<?php
     $currentDir = __DIR__;
     $rootDir = $_SERVER['DOCUMENT_ROOT'];
     $relativePath = str_replace($rootDir, '', $currentDir);
     $relativePath = str_replace('\\', '/', $relativePath);
     $relativePath = rtrim($relativePath, '/');
 
     $loginPath = $relativePath . '/../login/';
     $logoutPath = $loginPath . 'logOutAction.php';
     $loginActionPath = $loginPath . 'login.php?action=login';
     $signupActionPath = $loginPath . 'login.php?action=signup';
?>
    <div id="logos">
        <div id="logo"></div>
        <div id="title">
            <h2><a href="/">apiPactory</a></h2>
        </div>
        <div id="menu">
            <ul>
                <li><a href="../product/product.php">api 상품</a></li>
                <li><a href="#">카테고리</a></li>
                <li><a href="../board/board.php">공지사항</a></li>
            </ul>
        </div>
    </div>
    <div id="controller">
        <div id="searchBar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="검색어를 입력하세요" class="search-input">
            <!-- <div class="autocomplete-container" style="display: none;"> -->
            <div class="autocomplete-container"></div>
        </div>
<?php
    if(isset($_SESSION['userID'])) {
?>            
        <div class="login-member">
            <ul>
                <li class="on"><a href="#"><img src="../../assets/img/profile.png" alt="profile" class="login-profile"></a></li>
                <div  class="profile-box" id="profileMenu">
                    <ul>
                        <li>
                            <a href="../profile/myPage.php">마이페이지</a>
                            <a href="../login/logOutAction.php">로그아웃</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
<?php
    } else {
?>
        <a href="<?php echo $loginActionPath; ?>">로그인</a>
        <a href="<?php echo $signupActionPath; ?>">회원가입</a>
<?php
    }
?>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            // 검색어 입력 시 마다 자동완성 목록 가져오기
            $('.search-input').on('input', function() {
                var searchTerm = $(this).val();

                // AJAX 요청으로 자동완성 데이터 가져오기
                $.ajax({
                    url: 'https://raw.githubusercontent.com/jaehyuk-lee-0712/api-pactory/main/apiData/api-data-20240603.json',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // 검색어와 일치하는 API 이름 목록 추출
                        var matchingAPIs = data.filter(function(item) {
                            if(searchTerm === "" || searchTerm === null) {
                                return "";
                            }else  {
                                return item.apiName.toLowerCase().includes(searchTerm.toLowerCase());
                            }
                        });

                        // 자동완성 목록 HTML 생성
                        var autoCompleteList = '';
                        matchingAPIs.forEach(function(item) {
                            autoCompleteList += '<li><a href="#" class="autocomplete-item">' + item.apiName + '</a></li>';
                        });

                        // 자동완성 목록 표시
                        $('.autocomplete-container').html(autoCompleteList);
                        $('.autocomplete-container').show();
                    }
                });
            });

            // 자동완성 목록 클릭 시 검색어 입력
            $(document).on('click', '.autocomplete-item', function(e) {
                e.preventDefault();
                var selectedAPI = $(this).text();
                $('.search-input').val(selectedAPI);
                $('.autocomplete-container').hide();


                // $(document).trigger('apiSelected', selectedAPI);
                window.location.href = 'php/product/product.php?api=' + encodeURIComponent(selectedAPI);
            });

            // 검색창 바깥 클릭 시 자동완성 목록 숨기기
            $(document).click(function(e) {
                if (!$(e.target).closest('.search-input, .autocomplete-container').length) {
                    $('.autocomplete-container').hide();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // 로그인 박스
            const profileToggle = document.querySelector(".login-member .on");
            const profileBox = document.querySelector(".profile-box");

            if (profileToggle && profileBox) {
                profileToggle.addEventListener("click", function (event) {
                    event.preventDefault();
                    profileBox.classList.toggle("show");
                });

                profileBox.addEventListener("click", function () {
                    profileBox.classList.toggle("show");
                });
            }
        });
    </script>
</header>
