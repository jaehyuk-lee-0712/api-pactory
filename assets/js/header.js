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