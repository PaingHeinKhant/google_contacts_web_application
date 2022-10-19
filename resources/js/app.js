import './bootstrap';
import Swal from "sweetalert2";

const inputImageFile = document.getElementById("inputImageFile");
const fileInput =document.getElementById('fileInput');

inputImageFile.addEventListener("click", function (){
    fileInput.click();
})


window.showToast = function (message){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: message
    })
}
