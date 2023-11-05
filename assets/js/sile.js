const sanPham = document.querySelector('.san-pham');
const sp1List = document.querySelectorAll('.sp1');
const sp1Width = 150; 
let currentIndex = 0;
let autoSlideInterval; 
function nextSlide() {
    currentIndex++;
    if (currentIndex >= sp1List.length) {
        currentIndex = 0; 
    }
    updateSlider();
}

function prevSlide() {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = sp1List.length - 1; 
    }
    updateSlider();
}

function updateSlider() {
    let translateX;
    if (currentIndex === sp1List.length - 1) {
        translateX = -currentIndex * sp1Width;
    } else {
        translateX = -currentIndex * sp1Width + (sp1Width / 2);
    }

    sanPham.style.transition = 'transform 0.3s ease-in-out';
    sanPham.style.transform = `translateX(${translateX}px)`;
}

function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 3000);
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

document.querySelector('.prev-btn').removeEventListener('click', prevSlide);
document.querySelector('.next-btn').removeEventListener('click', nextSlide);
document.querySelector('.prev-btn').addEventListener('click', prevSlide);
document.querySelector('.next-btn').addEventListener('click', nextSlide);
startAutoSlide();
document.querySelector('.sile-san-pham').addEventListener('mouseenter', stopAutoSlide);
document.querySelector('.sile-san-pham').addEventListener('mouseleave', startAutoSlide);

//------------------------------------------------


// Lấy danh sách tất cả các hình ảnh nhỏ
const thumbnailImages = document.querySelectorAll('.img-sp-0001 img');

// Lấy ảnh lớn
const largeImage = document.querySelector('.img-sp img');

// Duyệt qua từng hình ảnh nhỏ và thêm sự kiện click
thumbnailImages.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        // Thay đổi ảnh lớn bằng ảnh nhỏ tương ứng
        largeImage.src = thumbnail.src;
    });
});
