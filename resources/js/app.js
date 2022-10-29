import './bootstrap';
import Swal from "sweetalert2";

const inputImageFile = document.getElementById("inputImageFile");
const fileInput =document.getElementById('fileInput');

// inputImageFile.addEventListener("click", function (){
//     fileInput.click();
// })\

//
// let hello = document.getElementById('hello');
//
// hello.addEventListener('click',function (){
//     Swal.fire({
//         title: 'Delete from Contacts?',
//         text: "This contact will be permanently deleted from this account after 30 days.",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Move to Trash'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             const Toast = Swal.mixin({
//                 toast: true,
//                 position: 'top-end',
//                 showConfirmButton: false,
//                 timer: 3000,
//                 timerProgressBar: true,
//                 didOpen: (toast) => {
//                     toast.addEventListener('mouseenter', Swal.stopTimer)
//                     toast.addEventListener('mouseleave', Swal.resumeTimer)
//                 }
//             })
//
//             Toast.fire({
//                 icon: 'success',
//                 title: message
//             })
//         }
//     })
// })


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

const flexCheckIndeterminate = document.getElementById("flexCheckIndeterminate");
const  formCheckInput =document.querySelectorAll('.form-check-input');

flexCheckIndeterminate.addEventListener("change",()=>{
    Array.from(formCheckInput).map((chkbox)=>{
        chkbox.checked = flexCheckIndeterminate.checked;
    });
    // console.log(formCheckInput)
})

window.handleClick = function (arg){
    // console.log(arg)
    return window.location.href = arg;
}

let multipleFormCheck =document.getElementById('multipleFormCheck');
let dublicate =document.getElementById('dublicate');


    dublicate.addEventListener("click", function (){
        multipleFormCheck.setAttribute('action','http://127.0.0.1:8000/multipleDuplicate')
    })

