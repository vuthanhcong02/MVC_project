var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
const input = document.querySelector('input[type="file"]');
input.addEventListener('change', function() {
        // Đọc file hình ảnh được chọn
const file = this.files[0];
const reader = new FileReader();
reader.addEventListener('load', function() {
            // Hiển thị hình ảnh được chọn
const img = document.getElementById('img');
img.src = reader.result;
});
reader.readAsDataURL(file);
});